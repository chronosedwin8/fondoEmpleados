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

Route::resource('fondo/banco','BancoController');

Route::resource('fondo/cuenta','CuentaController');

Route::resource('fondo/tcuenta','TCuentaController');

Route::resource('fondo/genero','GeneroController');

Route::resource('fondo/civil','CivilController');

Route::resource('fondo/profesion','ProfesionController');

Route::resource('fondo/jornada','JornadaController');

Route::resource('fondo/contrato','ContratoController');

Route::resource('fondo/salario','SalarioController');

Route::resource('fondo/origen','OrigenController');



