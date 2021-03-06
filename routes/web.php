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

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('register','RegistrationController@create');
Route::post('register','RegistrationController@store');

Route::get('login','SessionController@index')->name('login');
Route::post('login','SessionController@store');
Route::get('logout','SessionController@destroy');

Route::group(['middleware'=>'auth'], function(){

	Route::get('inserisci-mercato', 'MarketController@insert');
	Route::post('mercato','MarketController@store');
	Route::post('mercato/getArea','MarketController@getArea');


	Route::get('inserisci-operatore', 'OperatorController@insert');
	Route::post('operatore','OperatorController@store');


	Route::get('inserisci-area','AreaController@insert');
	Route::post('area','AreaController@store');

	Route::get('inserisci-postazione','PlaceController@insert');
	Route::post('postazione','PlaceController@store');

	Route::get('inserisci-tipologia','TypeController@insert');
	Route::post('tipologia','TypeController@store');

	Route::get('inserisci-autorizzazione','AuthorizationController@insert');
	Route::post('autorizzazione','AuthorizationController@store');


});

