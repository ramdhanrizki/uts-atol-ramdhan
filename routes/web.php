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

Route::get('/', function () {
    return view('welcome');
});

// Routing untuk event
Route::get('/event','EventController@index');
Route::get('/event-tambah','EventController@add');
Route::get('/event','EventController@index');
Route::post('/event','EventController@store');
Route::get('/event-update/{id}','EventController@update');
Route::post('/event-update/{id}','EventController@storeUpdate');
Route::get('/event-delete/{id}','EventController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
