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

Route::get('/', function()
{
	return View::make('includes.decorator')->nest('contentView', 'welcome');
});

Route::get('images/{name}', function($name)
{
    return View::make('imageView')->with("name",$name);
})
->where('name', '[A-Za-z\-]+');
Route::get('addContent', function()
{
	return View::make('includes.decorator')->nest('contentView', 'addContent');
});
Route::post('saveContent', 'ContentController@saveContent');
