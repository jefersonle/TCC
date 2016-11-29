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

    



    Route::get('/home', 'HomeController@index');

    Route::get('/', 'HomeController@index');

    

    Route::controller('anuncio', 'AnuncioController');

    

    Route::controller('categoria', 'CategoriaController');

    

    Route::controller('cidade', 'CidadeController');

    

    Route::controller('estado', 'EstadoController');

    

    Route::controller('usuario', 'UsuarioController');

    

    Route::controller('anuncio', 'AnuncioController');

    Route::controller('comentario', 'ComentarioController');

    Route::controller('mensagem', 'MensagemController');

    Route::controller('likes', 'LikesController');

    

    Route::controller('/dashboard/anuncio', 'Dashboard\AnuncioController');

    

    Route::get('admin', function(){

        return view('admin');

    })->middleware('auth');

    

    Route::auth();

});



Route::get('ajaxtest', function(){

	return view('ajaxtest');

});





