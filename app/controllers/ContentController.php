<?php
use Illuminate\Database\Eloquent\Collection;
/*
 *	Controller handling saving and rendering content
 *
 */
class ContentController extends BaseController {

	/**
	 * This is for croppic to temporarily upload a new image when it is selected (before cropping)
	 * Has to return a json of this format:
	 * {
				"status":"success",
				"url":"path/img.jpg",
				"width":originalImgWidth,
				"height":originalImgHeight
		}

		OR

		{
			"status":"error",
			"message":"your error message text"
		}
	 */
	public function tempImageUpload()
	{
		if (Input::file('img')->isValid())
		{
			$file = Input::file('img');
			$fileExtArr = explode(".", $file->getClientOriginalName());
			$fileExt = $fileExtArr[count($fileExtArr)-1];
			Log::debug("File ext: ".$fileExt);
			if(strlen($fileExt)!=3){
				return Response::json(array('status' => 'error',
						'message' => 'Can upload only image files with a 3 character extension'));
			}
			if(strcasecmp($fileExt,"jpg")!=0 && strcasecmp($fileExt,"png")!=0){
				return Response::json(array('status' => 'error',
						'message' => 'Only JPG and PNG formats are accepted'));
			}
			$fileName = uniqid();
			Log::debug('File is valid. Save it as: '.$fileName);
			Log::debug(__DIR__.'/../../public/img/content/tmp/');

			$image = Image::make($file->getRealPath());
			$height = $image->height();
			$width = $image->width();
			if($height<600 || $width<900){
				return Response::json(array('status' => 'error',
						'message' => 'Minimum image size W x H shoud be 900 x 600'));
			}
			$file->move(__DIR__.'/../../public/img/content/tmp/', $fileName.".".$fileExt);

			return Response::json(array('status' => 'success',
										'url' => 'img/content/tmp/'.$fileName.".".$fileExt,
										'width' => $width,
										'height' => $height));
		}
		return Response::json(array('status' => 'error',
				'message' => 'Could not upload file'));
	}

	/**
	 * Function to crop the uploaded temp image
	 */
	public function cropTempImage(){
		$croppedImage = Input::get("imgUrl");
		$image = Image::make($croppedImage);
		$scaledWidth = intval(Input::get('imgW'));
		$scaledHeight = intval(Input::get('imgH'));
		$width = intval(Input::get('cropW'));
		$height = intval(Input::get('cropH'));
		$x = intval(Input::get('imgX1'));
		$y = intval(Input::get('imgY1'));
		$image->resize($scaledWidth,$scaledHeight)->crop($width,$height,$x,$y);
		$imgPathArr = explode("/",$croppedImage);

		$image->save(__DIR__.'/../../public/img/content/'.$imgPathArr[count($imgPathArr)-1]);

		return Response::json(array('status' => 'success',
				'url' => 'img/content/'.$imgPathArr[count($imgPathArr)-1]));
	}

	/**
	 * Method handling submission after cropping the image
	 */
	public function saveContent()
	{
		Log::debug('Saving file content');
		$imageUrl = Input::get('imageUrl');
		$imagePathArr = explode("/",$imageUrl);
		$fileName = $imagePathArr[count($imagePathArr)-1];
		Log::debug("Image Url: ".$imageUrl);
		Log::debug("File name: ".$fileName);
		$post = new Post();
		$post->post_key = $fileName;
		$post->title = Input::get("title");
		$post->post_text = Input::get("postText");
		$post->user_id = Auth::id();
		$post->flag=0;
		$post->save();
		$tm = new TagManager();
		$rankCounter = 0;
		$tags = $_POST['tags'];
		foreach ($tags as $tagName) {
		  if ($tagName) {
			$rankCounter = $rankCounter+1;
			Log::debug("Tag name = ".$tagName);
			$id = $tm->findOrCreateTag($tagName);
			Log::debug("Tag id: ".$id);
			$postTagRank = new Posttagrank();
			$postTagRank->post_id = $post->id;
			$postTagRank->tag_id = $id;
			$postTagRank->rank = $rankCounter;
			$postTagRank->save();
		  }
		}
		$data = array("message"=>"Post Saved. You may add more posts.");
		return View::make('includes.decorator')->nest('contentView', 'addContent', $data);
	}

	/**
	 * Function responsible for rendering content on the main page
	 */
	public function renderContent($searchStr=NULL){
		Log::debug("Search str: ".$searchStr);
		session_start();
		unset($_SESSION['displayedKeys']);
		$post=null;
		if(strpos($searchStr,"tag=")!==false){
			Log::debug("Tag search");
			$searchStr = str_replace("tag=", "", $searchStr);
			$tag = Tag::where("name",$searchStr)->first();
			//REVISIT - put this thru the getNextPost logic
			//code to save rank starts
			if(!isset($_COOKIE[$searchStr])) {
				$rank = $tag->rank;
				$rank = $rank + 1;
				//echo $rank;
				if(strpos($searchStr, ' ')!==false){
				$searchStr=str_replace(' ', '_', $searchStr);
				}
				setcookie($searchStr,$rank);
				$tag->rank = $rank;
				$tag->save();
			}
			//code to save rank ends
			$post = $tag->posts()->first();
		}else if(strlen($searchStr)!=0){
			Log::debug("Key search");
			$post = Post::where('post_key', 'like', $searchStr."%")->first();
			Log::debug("Post: ".$post);
		}else {
			Log::debug("Home page hit.. pull up random post");
			//$post = Post::first();
			$post = Post::orderByRaw("RAND()")->first();
			Log::debug("Post: ".$post);
		}
		$data = array("post"=>$post);
		return View::make('includes.decorator')->nest('contentView', 'welcome', $data);
	}

	/**
	 * Get the next page based on certain rules which we will evolve as time goes. For now keep it simple
	 * REVISIT: THIS FUNCTION NEEDS A LOT MORE THOUGHT and OPTIMIZATION.. getting it going for now
	 */
	public function getNextPost($key){
		$keysArray= array();
		session_start();
		if(!isset( $_SESSION['displayedKeys'] )){
		   $_SESSION['displayedKeys'] = array();
		}
		$keysArray = $_SESSION['displayedKeys'];
		//echo "sesion array".implode($keysArray)."...<br/>";
		//echo "key ".$key."<br/>";
		$keysArray[$key]='true';						//Mark this key as displayed by adding it here
		//echo "local array".implode($keysArray)."...<br/>";
		$_SESSION['displayedKeys'] = $keysArray;

		//First see if there are other posts related to the same tag
		$post = Post::where('post_key', '=', $key)->first();
		$tags = $post->tags()->get();
		Log::debug("Tags: ".$tags);
		//Log::debug("Session data: ".implode(Session::get('displayedKeys')));

		$relatedPosts = array();
		foreach ($tags as $tag)
		{
			$posts = $tag->posts()->get();
			foreach ($posts as $post){
				array_push($relatedPosts,$post);
			}
		}

		//find a post thats not displayed
		foreach ($relatedPosts as $relPost){
			$postKey = $relPost->post_key;
			if(array_key_exists($postKey,$keysArray)){
				continue;
			}
			Log::debug("Found post: ".$relPost);
			return View::make('postView')->with("post", $relPost);
		}
		//If a related post not found, find any other post
		$postFound = Post::whereNotIn('post_key', array_keys($keysArray))->first();
		Log::debug("Post found: ".$postFound);
		if(!$postFound){
			echo "post not found";
			//Clear the session and return any post
			Session::put('displayedKeys',array());
			$postFound = Post::first();
		}
		return View::make('postView')->with("post", $postFound);
	}

	/**
	 * Function to retrieve tags for a given postkey for rendering into the right panel
	 * @param string $key Optional post key to get tags for
	 */
	public function getTags($key=NULL){
		//Going to use this array like a map to ensure uniqueness of keys
		$tags = array();
		if($key){
			Log::debug("Looking for tags for key: ".$key);
			$post = Post::where("post_key",$key)->first();
			foreach ($post->tags()->get() as $tag){
				$tags[$tag->name]=$tag;
			}
		}
		Log::debug("Related tag count: ".count($tags));
		if(count($tags)<50){
			Log::debug("Adding more tags to list from related tags");
			foreach ($tags as $tag){
				$tagRelations = Tagrelationranks::where("tag_from_id",$tag->id)->get();
				foreach ($tagRelations as $tagRel){
					$toTags = $tagRel->toTags()->get();
					foreach ($toTags as $toTag){
						$tags[$toTag->name]=$toTag;
					}
				}
			}
		}
		Log::debug("Related tag count2: ".count($tags));
		if(count($tags)<50){
			Log::debug("Adding more tags to list from system");
			$generalTags = Tag::take(count($tags)-10)->get();
			foreach ($generalTags as $genTag){
				$tags[$genTag->name]=$genTag;
			}
		}
		return View::make('tags')->with("tags", $tags);
	}
	public function getTagRelations($key=NULL){
		$tags = Tag::all();
		return View::make('tagRelationForm')->with("tags", $tags);
		
	}
	
	public function searchTags($key=NULL){
	    $term = Input::get('term');
		$results = Tag::whereRaw('name like ?',array('%'.$term.'%'))->get();
		$response = array();
		foreach($results as $value){
			$array = array();
			$array = array_add($array,"label",$value->name);
			$array = array_add($array,"id",$value->id);
			array_push($response,$array);
		}
		return Response::json($response);
		
	}
	public function saveTagsRelations($key=NULL){
		$tagMapping = Input::get('tagMapping');
		$arr = explode("],",$tagMapping);
		foreach ($arr as $value) {
		   $fromId = explode(":",$value)[0];
		   if(str_contains($fromId, "{")){
			  $fromId = explode("{",$fromId)[1];
		   }
		   $fromId = explode('"',$fromId)[1];
		   $toIdArr = explode(",",explode(":",$value)[1]);
		   foreach ($toIdArr as $value) {
		       $toId = $value;
			   if(str_contains($toId, "[")){
				  $toId = explode("[",$toId)[1];
			   }
			   if(str_contains($toId, "]")){
				  $toId = explode("]",$toId)[0];
			   }
			   $tagrelationranks = new Tagrelationranks();
			   $tagrelationranks -> tag_from_id = $fromId;
			   $tagrelationranks -> tag_to_id = $toId;
			   $tagrelationranks -> rank = 0;
			   $tagrelationranks->save();
		   }
		}
		return View::make('includes.decorator')->nest('contentView', 'tagRelationForm');
	}
	public function createTagsRelations($key=NULL){
		$tagIds = Input::get('tagIds');
		$arr = explode(",",$tagIds);
		echo "Test".count($arr);
		for($i=0;$i<count($arr); $i++){
			$fromId = $arr[$i];
			foreach ($arr as $value) {
			  if($value != $fromId){
				$tagrelationranks = new Tagrelationranks();
			    $tagrelationranks -> tag_from_id = $fromId;
			    $tagrelationranks -> tag_to_id = $value;
			    $tagrelationranks -> rank = 0;
			    $tagrelationranks->save();
			  }
			}
		}
		//return View::make('includes.decorator')->nest('contentView', 'tagRelationForm');
	}
	
	// this saves the ratings in the database and calculate the overall rating of each image
	public function saveRating(){
		$rating = Input::get('rating');
		$postId = Input::get('postId');
		$post = Post::where("id",$postId)->get();
		echo $post[0]->post_key;
		if(isset($_COOKIE[$post[0]->id])) {
			echo "cookie found";
			return;
		}
		echo "cookie not found";
		$overallRating = $post[0]->overall_rating;
		if($overallRating == null){
			$overallRating = $rating;
		}else{
			$overallRating = ($overallRating + $rating)/2;
		}
		echo $overallRating;
		setcookie($post[0]->id,$rating);
		$post[0]->overall_rating = $overallRating;
		$post[0]->save();
		
		//return Response::json();;
	}
	
	public function saveEditContent(){
		$title = Input::get('title');
		$postText = Input::get('postText');
		$tagVal = Input::get('tag');
		$pid = Input::get('pid');
		$tid = Input::get('tid');
		$post = Post::where("id",$pid)->get();
		$post[0]->post_text = $postText;
		$post[0]->title = $title;
		$post[0]->save();
		$tag = Tag::where("id",$tid)->get();
		$tag[0]->name = $tagVal;
		$tag[0]->save();
		
	}
	public function deleteContent(){
		$pid = Input::get('pid');
        $tid = Input::get('tid');
		$posttagrank = Posttagrank::where("post_id",$pid)->get();
		$posttagrank[0]->delete();
		$tag = Tag::where("id",$tid)->get();
		$tag[0]->delete();
        $post = Post::where("id",$pid)->get();
        $post[0]->delete();
	}
	
	public function saveApprovedContent(){
		$pid = Input::get('pid');
		Log::info("pid -----------------------------------------------------------------: ".$pid);
		$post = Post::where("id",$pid)->get();
		$post[0]->flag = 1;
		$post[0]->save();
	}
}
?>