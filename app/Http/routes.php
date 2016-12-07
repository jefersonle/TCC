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

    Route::controller('imagem', 'ImagemController');

    Route::controller('likes', 'LikesController');

    

    Route::controller('/dashboard/anuncios', 'Dashboard\AnuncioController');   
    Route::controller('/dashboard/comentarios', 'Dashboard\ComentarioController');  
    Route::controller('/dashboard/mensagens', 'Dashboard\MensagemController');
    Route::controller('/dashboard/perfil', 'Dashboard\PerfilController'); 

    Route::controller('/admin/anuncios', 'Admin\AnuncioController');   
    Route::controller('/admin/categorias', 'Admin\CategoriaController');
    Route::controller('/admin/pagamento', 'Admin\FormaDePagamentoController');
    Route::controller('/admin/entrega', 'Admin\FormaDeEntregaController');
    Route::controller('/admin/moedas', 'Admin\MoedaController');
    Route::controller('/admin/statuslist', 'Admin\StatusController');
    Route::controller('/admin/mensagens', 'Admin\MensagemController');   
    Route::controller('/admin/comentarios', 'Admin\ComentarioController');   
    Route::controller('/admin/denuncias', 'Admin\DenunciaController');   
    Route::controller('/admin/cidades', 'Admin\CidadeController');   
    Route::controller('/admin/estados', 'Admin\EstadoController'); 
    Route::controller('/admin/usuarios', 'Admin\UsuarioController');
    Route::controller('/admin/perfil', 'Admin\PerfilController');  

    Route::get("/admin", function(){
        return redirect("/admin/anuncios");
    });
    

    Route::auth();

});



Route::get('ajaxtest', function(){

	return view('ajaxtest');

});





