<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','FatoraController@show');

Route::get('/','FatoraController@index')->name('index');
Route::get('/fatora/index',['as'=>'fatora.index','uses'=>'FatoraController@index']);

Route::get('/create','FatoraController@create')->name('create');

Route::get('change-language/{locale}',['as'=>'frontend_change_locale','uses'=>'GeneralController@changeLanguage']);

Route::resource('fatora','FatoraController' );


