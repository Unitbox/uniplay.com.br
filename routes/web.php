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

Route::get('/get-token', 'Mimica\WebController@getLongToken')->name('token.instagram');

//Inicio Login com as redes sociais
Route::get('/login/{provider}', 'SocialiteController@redirectToProvider')->name('login.socialite');
Route::get('/login/{provider}/callback', 'SocialiteController@handleProviderCallback')->name('login.callback');
//Fim Login com as redes sociais
Route::get('/configuracao/anonimo', 'SocialiteController@loginAnonimo')->name('anonimo');
Route::post('/configuracao/anonimo/post', 'SocialiteController@loginAnonimoPost')->name('anonimo.post');

Route::group(['namespace' => 'Mimica', 'as' => 'mimica.' ], function () 
{
    // Inicio Rota Web
    Route::get('/', 'WebController@home')->name('home');
    Route::get('/privacidade', 'WebController@privacidade')->name('privacidade');
    Route::get('/termosdeuso', 'WebController@termosDeUso')->name('termos');
    // Fim Rota Web

    // Inicio rota blog
    Route::get('/posts', 'BlogController@blog')->name('blog');
    Route::post('/posts', 'BlogController@search')->name('blog.search');
    Route::get('/posts/artigo/{slug}', 'BlogController@artigo')->name('blog.artigo');
    // Fim rota blog
    
    Route::group(['middleware' => ['auth']], function () {
        
        //inicia as configuracoes da partida
        Route::get('/configuracao/partida', 'GameController@configuracao')->name('configuracao');  
        Route::post('/configuracao/partida/add', 'GameController@cadastrarConfiguracaoPartida')->name('configuracao.add');
    
        Route::get('/configuracao/equipe/{codigo}', 'GameController@equipes')->name('configuracao.equipes');
        Route::post('/condiguracao/equipe/add', 'GameController@cadastrarEquipe')->name('configuracao.equipe.add');
        Route::post('/condiguracao/equipe/delete', 'GameController@excluirEquipePartida')->name('configuracao.equipe.delete');
     
        //Inicio Partida Modo Em equipe
        Route::post('/partida/start', 'GameController@startPartida')->name('partida.start');

        Route::get('/partida/sala/{codigo}', 'PartidaController@partida')->name('partida');
        Route::get('/partida/list/{codigo}', 'PartidaController@listaPartida')->name('partida.list');
        Route::get('/partida/equipe/{codigo}', 'PartidaController@listaEquipedaVezRodada')->name('partida.equipe');

        Route::get('/partida/cartas/{codigo}', 'PartidaController@listaCartas')->name('partida.cartas');
        Route::post('/partida/marca-pontos', 'PartidaController@marcarPontos')->name('partida.marcarpontos');

        Route::get('/partida/sala/proximo/{idpartidaequipe}', 'PartidaController@proximaPartida')->name('partida.proximo');
        Route::get('/partida/ganhador/{codigo}', 'PartidaController@ganhador')->name('partida.ganhador');
        //Fim Partida Modo Em equipe

        Route::get('/partida/livre/{codigo}', 'PartidaController@partidaLivre')->name('partida.livre');
        Route::get('/partida/livre/cartas/{codigo}', 'PartidaController@proximaCarta')->name('partida.livre.cartas');


    });
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.' ], function () {
        
    Route::get('/login', 'AuthController@showLoginForm')->name('login');
    Route::post('/login', 'AuthController@login')->name('login.do');

    Route::get('/logout', 'AuthController@logout')->name('logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/home', 'DashboardController@index')->name('dashboard');
        Route::resource('/idioma', 'IdiomaController'); // CRUD RESOURCE
        Route::resource('/categoria', 'CategoriaController',['parameters' => [
            'categoria' => 'categoria' ]]);
        Route::resource('/equipe', 'EquipeController');
        Route::resource('/carta', 'CartaController');
        Route::resource('/cartaItem', 'CartaItemController');
        Route::resource('/blog', 'BlogController');

    });

});
