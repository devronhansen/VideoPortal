<?php

Route::auth();

Route::get('/', 'ArticlesController@welcome');
Route::get('about', 'AboutController@index');
Route::get('contact', 'ContactController@index');
Route::get('articles', 'ArticlesController@index');

Route::resource('posts', 'PostController');