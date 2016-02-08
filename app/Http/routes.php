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

	Route::get('/', 'AlatController@getAvailable');

	Route::get('/dibooking', 'AlatController@getDibooking');

	Route::get('/alat/{id}', ['uses' => 'AlatController@alat']);

	Route::get('/dipinjam', 'AlatController@getDipinjam');
	Route::get('/dipelihara', 'AlatController@getDipelihara');

	Route::get('/tambah', 'AlatController@addForm');

	Route::get('/lokasi', function () {
	    return view('lokasi');
	});
	Route::post('/lokasi/add', 'LokasiController@add');

	Route::post('/task', 'AlatController@add');
	Route::post('/task2', 'TransaksiController@add');

	Route::get('/transaksi', function () {
	    return view('transaksi');
	});

	Route::get('/transaksi/selesai/{id}', ['uses' => 'TransaksiController@del']);

	Route::get('/booking', function () {
	    return view('booking');
	});
	Route::post('/booking/add', 'BookingController@add');

	Route::get('/pemeliharaan', function () {
	    return view('pemeliharaan');
	});
	Route::post('/pemeliharaan/add', 'PemeliharaanController@add');

});
