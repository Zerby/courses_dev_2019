<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('movies', 'MovieController');

Route::resource('articles', 'ArticleController');
