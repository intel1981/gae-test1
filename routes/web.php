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
    return view('layouts.dashboard');
});

Route::resource('escuelas', 'EscuelaController');
Route::resource('ciclos', 'CicloController');
/*
 * Rutas para obtener los niveles y servicios para los select dependientes
 */
Route::get('niveltipo/{tipo_id}','NivelController@niveltipo');
Route::get('servnivel/{nivel_id}', 'ServicioController@servnivel');
