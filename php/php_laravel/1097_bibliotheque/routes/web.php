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

use App\Abonne;

Route::get('/', function () {
    $abonnes = Abonne::all();
    return view('abonnes.index', compact('abonnes'));
});

Route::resource('abonnes', 'AbonneController');

Route::resource('livres', 'LivreController');

Route::resource('emprunts', 'EmpruntController');
