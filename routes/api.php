<?php



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| ixs assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('/cadastropedido', 'Mimica\WebController@cadastroPedido');
// Route::post('/atualizacaopedido', 'Mimica\WebController@atualizacaoPedido');
// Route::post('/atualizacaoproduto', 'Mimica\WebController@atualizacaoProduto');

Route::get('/instagram/listpost', 'Mimica\WebController@listPostsInstagram');
