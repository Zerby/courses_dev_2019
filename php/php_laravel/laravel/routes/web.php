<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// je désire afficher le fichier /resources/views/exemple/affichage.blade.php
// url d'acces : http://localhost/laravel/public/affichage
Route::get('/affichage_exemple', function () {
    return view('exemple.affichage');
});

Route::get('/exemple_controller', 'MonController@maMethode');

