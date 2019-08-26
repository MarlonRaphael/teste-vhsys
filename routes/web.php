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
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Rotas para o painel administrativo e de autenticação
|
*/

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){

    Route::get('/', 'AdminController@index')->name('admin');
    Route::resource('clubes', 'ClubeController');
    Route::resource('jogadores', 'JogadorController', ['parameters' => [
        'jogadores' => 'jogador'
    ]]);
});
