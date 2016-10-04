<?php

Route::auth();

Route::get('video/{slug}', 'VideoController@getSingle')->where('slug', '[\w\d\-\_]+');/*['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');*/
Route::get('/', 'VideoController@welcome');
Route::get('about', 'AboutController@index');

Route::get('contact', 'ContactController@index');
Route::post('contact', 'ContactController@sendMail');

Route::get('video', 'VideoController@index');

Route::get('video/sort/{category_id}', 'VideoController@giveAjax');
Route::get('all', 'VideoController@getAll');

Route::resource('posts', 'PostController');

Route::resource('categories', 'CategoryController', ['except' => ['create']]);

//Comments
Route::post('comments/{post_id}', 'CommentsController@store');