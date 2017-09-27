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

/*Route::get('/candidato', function () {
    return view('candidato');
});

Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'CandidatoController@index');
Route::resource('/candidato', 'CandidatoController');
Route::get('/teste', 'CandidatoController@teste');