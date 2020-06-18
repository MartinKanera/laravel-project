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

Route::patch('/cds/{cd}', 'CDsController@update')->name('cds.update');
Route::post('/cds', 'CDsController@store');
Route::get('/', 'CDsController@index');
Route::get('/cds/create', 'CDsController@create');
Route::get('/cds/{cd}', 'CDsController@show');
Route::delete('/cds/{cd}', 'CDsController@destroy')->name('cds.destroy');
Route::get('/cds/{cd}/edit', 'CDsController@edit');

Route::patch('/genres/{genre}', 'GenresController@update')->name('cds.update');
Route::post('/genres', 'GenresController@store');
Route::get('/genres', 'GenresController@index');
Route::get('/genres/create', 'GenresController@create');
Route::delete('/genres/{genre}', 'GenresController@destroy')->name('genres.destroy');;
Route::get('/genres/{genre}', 'GenresController@show');
Route::get('/genres/{genre}/edit', 'GenresController@edit');


