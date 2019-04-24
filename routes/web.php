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

Route::get('/book/step1', 'BookingsController@showStep1');
Route::post('/book/step1', 'BookingsController@postStep1');

Route::get('/book/step2', 'BookingsController@showStep2');
Route::post('/book/step2', 'BookingsController@postStep2');

Route::get('/book/step3', 'BookingsController@showStep3');
Route::post('/book/step3', 'BookingsController@postStep3');

Route::get('/book/thankyou', 'BookingsController@thankyou');


Route::get('/houses', 'HousesController@index');
