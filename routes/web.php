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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/game/show/{id}', 'GameController@show')->name('game.show');
Route::get('/game/buy/{id}', 'GameController@buy')->name('game.buy');
Route::get('/game/category/{id}', 'GameController@category')->name('game.category');
Route::get('/box', 'BoxController@main')->name('box');
Route::get('/box/order', 'BoxController@order')->name('box.order');
