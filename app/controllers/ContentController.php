<?php
/*
 *	Controller handling saving and rendering content
 *
 */
class ContentController extends BaseController {

	public function saveContent()
	{
		Log::debug('Saving file content');
		if (Input::file('postImage')->isValid())
		{
			$file = Input::file('postImage');
			$fileName = uniqid();
			Log::debug('File is valid. Save it as: '.$fileName);
			Log::debug(__DIR__.'/../../public/img/content/');
			$file->move(__DIR__.'/../../public/img/content/', $fileName.".png");
			$post = new Post();
			$post->post_key = $fileName;
			$post->title = Input::get("title");
			$post->post_text = Input::get("postText");
			$post->user_id = 1;
			$post->save();
			$tagNames = Input::get("tags");
			Log::debug("Tag names: ".implode(",",$tagNames));
			$tm = new TagManager();
			$rankCounter = 0;
			foreach ($tagNames as $tagName) {
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
			
		}else{
			Log::error('File is invalid');
		}
		$data = array("message"=>"Content Saved.");
		return View::make('includes.decorator')->nest('contentView', 'addContent', $data);
	}

}
