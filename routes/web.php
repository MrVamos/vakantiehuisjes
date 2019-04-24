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

Route::get('/', 'PagesController@index');

Route::get('/book/step1', 'BookHousesController@showStep1');
Route::post('/book/step1', 'BookHousesController@postStep1');

Route::get('/book/step2', 'BookHousesController@showStep2');
Route::post('/book/step2', 'BookHousesController@postStep2');

Route::get('/book/step3', 'BookHousesController@showStep3');
Route::post('/book/step3', 'BookHousesController@postStep3');

Route::get('/book/thankyou', 'BookHousesController@thankyou');
