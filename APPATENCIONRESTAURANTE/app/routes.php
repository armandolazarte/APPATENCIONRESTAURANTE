<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*USUARIO*/
Route::any('/', 'UsuarioController@actionLogin');
Route::any('/usuario/login', 'UsuarioController@actionLogin');
Route::any('/usuario/insertar', 'UsuarioController@actionInsertar');
Route::get('/usuario/ver', 'UsuarioController@actionVer');
Route::any('/usuario/editar/{codigoUsuario?}', 'UsuarioController@actionEditar');

/*VENTA*/
Route::any('/venta/insertar', 'VentaController@actionInsertar');