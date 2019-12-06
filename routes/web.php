<?php
//switalert
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

Route::group(['middleware' => 'noautenticado'], function(){
	Route::get('/', 'UsuarioController@login')->name('usuarios.login');
	Route::post('logear', 'UsuarioController@logear')->name('usuarios.logear');
});

Route::group(['middleware' => 'autenticado'], function(){

	Route::get('logout', 'UsuarioController@logout')->name('usuarios.logout');
	Route::get('usuarios/registro', 'UsuarioController@registro')->name('usuarios.registro');
		Route::post('usuarios/registrar', 'UsuarioController@registrar')->name('usuarios.registrar');
		Route::get('usuarios/{Cuenta}/DarAlta', 'UsuarioController@DarAlta')->name('usuarios.DarAlta');
		Route::get('usuarios/{Cuenta}/DarBaja', 'UsuarioController@DarBaja')->name('usuarios.DarBaja');
		Route::get('usuarios/{Cuenta}/editarPass', 'UsuarioController@editarPass')->name('usuarios.editarPass');
	Route::match(['put', 'patch'], 'usuarios/actualizarPass/{cuenta}','UsuarioController@actualizarPass')->name('usuarios.actualizarPass');
	Route::resource('usuarios', 'UsuarioController');

Route::get('home', 'UsuarioController@home')->name('plantillas.principal');



Route::get('unidades/registro', 'UnidadController@registro')->name('unidades.registro');
		Route::get('unidades/{IdUnidad}/asignacion', 'UnidadController@asignacion')->name('unidades.asignacion');
		Route::get('unidades/{Cuenta}/DarAlta', 'UnidadController@DarAlta')->name('unidades.DarAlta');
		Route::get('unidades/{Cuenta}/DarBaja', 'UnidadController@DarBaja')->name('unidades.DarBaja');
		Route::post('unidades/storeAsignacion', 'UnidadController@storeAsignacion')->name('unidades.storeAsignacion');	
		Route::get('unidades/{IdAsignacion}/desasignar', 'UnidadController@desasignar')->name('unidades.desasignar');
	Route::resource('unidades', 'UnidadController');

Route::get('solicitantes/registro', 'SolicitanteController@registro')->name('solicitantes.registro');
		Route::get('solicitantes/{Ci}/DarAlta', 'SolicitanteController@DarAlta')->name('solicitantes.DarAlta');
		Route::get('solicitantes/{Ci}/DarBaja', 'SolicitanteController@DarBaja')->name('solicitantes.DarBaja');
		Route::get('solicitantes/{FkSolicitante}/registroFolio', 'SolicitanteController@registroFolio')->name('solicitantes.registroFolio');
		Route::post('solicitantes/storeFolio', 'SolicitanteController@storeFolio')->name('solicitantes.storeFolio');
	Route::resource('solicitantes', 'SolicitanteController');

Route::post('folios/EliminarFolio', 'FolioController@EliminarFolio')->name('folios.EliminarFolio');
Route::resource('folios', 'FolioController');

Route::resource('tipotramites', 'TipoTramiteController');
});