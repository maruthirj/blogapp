<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//route for signup
Route::get('signup', function()
{
	return View::make('signupForm');
});
//signup controller
Route::post('signup', 'UserController@signup');
Route::get('login', function()
{
	return View::make('includes.decorator')->nest('contentView', 'loginForm');
});

//route for tag relation
Route::get('tagRelation',function(){
	return View::make('includes.decorator')->nest('contentView', 'tagRelationForm');
});
//route for searching images from search box
Route::resource('searchTags', 'ContentController@searchTags');
Route::resource('createTagsRelations', 'ContentController@createTagsRelations');
Route::post('login', 'UserController@login');
Route::get('logout', function()
{
	Auth::logout();
	return Redirect::to('login');
});
Route::get('/', 'ContentController@renderContent');
Route::get('posts/{key}', function($key)
{
	$post = Post::where("post_key",$key)->first();
    return View::make('postView')->with("post",$post);
});
/**
 * Authenticated pages
 */
Route::get('editContent', array('before' => 'auth', function()
{
	return View::make('includes.decorator')->nest('contentView', 'editContent');
}));
Route::get('reset', function()
{
	return View::make('includes.decorator')->nest('contentView', 'reset');
});
Route::get('addContent', array('before' => 'auth', function()
{
	return View::make('includes.decorator')->nest('contentView', 'addContent');
}));
Route::post('tempImageUpload', array('before' => 'auth', 'uses' => 'ContentController@tempImageUpload'));
Route::post('cropTempImage', array('before' => 'auth', 'uses' => 'ContentController@cropTempImage'));
Route::post('saveContent', array('before' => 'auth', 'uses' => 'ContentController@saveContent'));

Route::get('/getNextPost/{key}', 'ContentController@getNextPost');
Route::get('/tags/{key?}', 'ContentController@getTags');
Route::get('/{searchStr?}', 'ContentController@renderContent');
Route::post('saveRating', 'ContentController@saveRating');
Route::post('saveEditContent', array('before' => 'auth', 'uses' => 'ContentController@saveEditContent'));
Route::post('saveDeleteContent', array('before' => 'auth', 'uses' => 'ContentController@saveDeleteContent'));
Route::post('forgotPassword', 'UserController@forgotPassword');
Route::post('updatePassword', 'UserController@updatePassword');



