<?php

Route::auth();

Route::get('video/{slug}', 'VideoController@getSingle')->where('slug', '[\w\d\-\_]+');/*['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');*/
Route::get('/', 'VideoController@welcome');
Route::get('about', 'AboutController@index');
Route::get('contact', 'ContactController@index');
Route::get('video', 'VideoController@index');

Route::resource('posts', 'PostController');