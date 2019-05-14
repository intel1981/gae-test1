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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('escuelas', 'EscuelaController');
Route::resource('ciclos', 'CicloController');
/*
 * Rutas para obtener los tipos de escuela
 * Niveles de acuerdo al tipo de escuela elegido
 * Servicios de acuerdo al tipo y nivel elegidos
 */
Route::get('tipos', 'TipoController@tipos')->name('tiposEscuela');
Route::get('niveltipo/{tipo_id}','NivelController@niveltipo');
Route::get('servnivel/{nivel_id}', 'ServicioController@servnivel');
