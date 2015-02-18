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

Route::get('signup', function()
{
	return View::make('signupForm');
});
Route::post('signup', 'UserController@signup');
Route::get('login', function()
{
	return View::make('loginForm');
});
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