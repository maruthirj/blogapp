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
		}else{
			Log::error('File is invalid');
		}
		$data = array("message"=>"Content Saved.");
		return View::make('includes.decorator')->nest('contentView', 'addContent', $data);
	}

}
