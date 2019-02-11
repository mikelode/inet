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

Route::get('/', 'inet\welcomeController@index');

Route::get('load/eventos', 'inet\eventController@index');
Route::get('directorio','inet\directoryController@index');
Route::post('directorio/contacto','inet\directoryController@store');
Route::post('directorio/encontrar','inet\directoryController@filter');

Route::post('usuario/store','inet\customizeController@storeUsuario');
Route::post('usuario/update','inet\customizeController@updateUsuario');

Route::post('persona/store','inet\customizeController@storePersona');
Route::post('persona/update','inet\customizeController@updatePersona');
Route::post('persona/evento','inet\customizeController@eventoPersona');


Route::post('entidad/store','inet\customizeController@storeEntidad');
Route::post('entidad/update','inet\customizeController@updateEntidad');


Route::post('obra/store','inet\customizeController@storeObra');
Route::post('obra/update','inet\customizeController@updateObra');


Route::post('evento/update','inet\customizeController@updateEvento');
Route::post('evento/uploadicon','inet\customizeController@uploadIcon');

/* consultas */
Route::get('listUbigeo','inet\customizeController@listUbigeo');
Route::get('listTipoeventos','inet\customizeController@listTipoeventos');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){

    Route::get('custom/eventos','inet\customizeController@indexEvento');
    Route::get('custom/personas','inet\customizeController@indexPersona');
    Route::get('custom/entidades','inet\customizeController@indexEntidad');
    Route::get('custom/obras','inet\customizeController@indexObra');
    Route::get('custom/usuarios','inet\customizeController@indexUsuario');

    Route::group(['middleware' =>  'can:create-events,\App\Models\Evento'], function(){

        Route::post('evento/store','inet\customizeController@storeEvento');

    });

});

/* Rutas de la sección servicios */

// HOJASS DE VIAJE
Route::get('service/travelsheet','inet\travelsheetController@index');
Route::get('travelsheet/new','inet\travelsheetController@create');
Route::post('travelsheet/store','inet\travelSheetController@store');
Route::get('travelsheet/{id}/pdf','inet\travelSheetController@pdf')->name('hojaviaje.pdf');
Route::get('travelsheet/{id}/htmlpdf','inet\travelSheetController@htmlPdf');
Route::get('travelsheet/show/{id}','inet\travelSheetController@show');
Route::post('travelsheet/update/{id}','inet\travelSheetController@update');

// PUBLICACIONES
Route::get('release','inet\releaseController@index');
Route::post('release/store','inet\releaseController@store');
Route::get('release/{id}/edit','inet\releaseController@edit');
Route::post('release/{id}/update','inet\releaseController@update');
Route::delete('release/{id}/remove','inet\releaseController@destroy');

Route::post('comment/{release}/add','inet\releaseController@storeComment');

/* PERSONAL CONTROL DS PLANILLAS */
Route::get('control', 'inet\personalController@index');
Route::get('personal/show/{id}/{anio}','inet\personalController@show');
Route::get('personal/list/{name}/{anio}','inet\personalController@list');