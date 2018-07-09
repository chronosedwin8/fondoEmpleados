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

Route::resource('fondo/mes','MesesController');

Route::resource('fondo/estado','EstadoController');

Route::resource('fondo/tcredito','TCreditoController');

Route::resource('fondo/tusuario','TUsuarioController');

Route::resource('fondo/modulo','ModuloController');

Route::resource('fondo/etiqueta','EtiquetaController');
