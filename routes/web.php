<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/home', 'ArticlesController@showArticle');

Route::get('/', function () {
  if(Auth::check()){return Redirect::to('home');}
   return view('welcome');
});

Route::post('/addArticle', 'ArticlesController@addArticle');