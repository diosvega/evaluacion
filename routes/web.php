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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/item','ItemController@index')->name('item');
Route::post('/item/saveItem','ItemController@ItemSave')->name('saveItem');
Route::get('/item/editItem/','ItemController@Edit')->name('editItem');
Route::get('/item/updateItem','ItemController@ItemUpdate')->name('updateItem');
Route::get('/item/deleteItem','ItemController@Delete')->name('deleteItem');


