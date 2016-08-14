<?php

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('about', 'AboutController@index');
Route::get('contact', 'ContactController@index');
Route::get('articles', 'ArticlesController@index');