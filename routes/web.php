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
  // return view('welcome');
  return redirect()->route('conekta_example.form');
});

Route::prefix('conekta_example')->group(function() {
  Route::get('/', 'PaymentController@form')
    ->name('conekta_example.form');
  Route::post('/', 'PaymentController@payment')
    ->name('conekta_example.payment');
});
