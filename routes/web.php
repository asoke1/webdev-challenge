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


Route::get('/', 'MyController@index');

// Route::post('/import', 'MyController@import_inventory');

Route::post('/import', 'MyController@import_inventory')->name('import');
Route::get('/search_result', 'MyController@search_result')->name('search');

