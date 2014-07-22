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
Route::get('/usuario/cerrarsesion', 'UsuarioController@actionCerrarSesion');
Route::any('/usuario/insertar', 'UsuarioController@actionInsertar');
Route::get('/usuario/ver', 'UsuarioController@actionVer');
Route::post('/usuario/editar', 'UsuarioController@actionEditar');

/*CATEGORIA*/
Route::any('/categoria/insertar', 'CategoriaController@actionInsertar');
Route::get('/categoria/ver', 'CategoriaController@actionVer');
Route::post('/categoria/editar', 'CategoriaController@actionEditar');

/*PRODUCTO*/
Route::any('/producto/insertar', 'ProductoController@actionInsertar');

/*VENTA*/
Route::any('/venta/insertar', 'VentaController@actionInsertar');