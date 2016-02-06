<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

	Route::get('/', 'AlatController@index');

	Route::get('/add', 'AlatController@addForm');

	Route::get('/lokasi', function () {
	    return view('lokasi');
	});
	Route::post('/lokasi/add', 'LokasiController@add');

	Route::post('/task', 'AlatController@add');
	Route::post('/task2', 'TransaksiController@add');
	Route::post('/task3', 'TransaksiController@del');
	Route::get('/transaksi', function () {
	    return view('transaksi');
	});

});
