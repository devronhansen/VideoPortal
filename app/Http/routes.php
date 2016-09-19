<?php

Route::auth();

Route::get('video/{slug}', 'BlogController@getSingle')->where('slug', '[\w\d\-\_]+');/*['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');*/
Route::get('/', 'ArticlesController@welcome');
Route::get('about', 'AboutController@index');
Route::get('contact', 'ContactController@index');
Route::get('articles', 'ArticlesController@index');

Route::resource('posts', 'PostController');