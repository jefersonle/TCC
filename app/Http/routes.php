<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::controller('anuncio', 'AnuncioController');

Route::controller('categoria', 'CategoriaController');

Route::controller('cidade', 'CidadeController');

Route::controller('estado', 'EstadoController');

Route::controller('usuario', 'UsuarioController');

Route::get('ajaxtest', function(){
	return view('ajaxtest');
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::controller('/', 'HomeController');