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
	Route::get('/dibooking/batal/{id}', ['uses' => 'BookingController@del']);
	Route::get('/dibooking/transfer/{id}', ['uses' => 'BookingController@transfer']);

	Route::get('/alat/{id}', ['uses' => 'AlatController@alat']);
	Route::get('/alat/edit/{id}', ['uses' => 'AlatController@getEdit']);
	Route::get('/alat/pemeliharaan/{id}', ['uses' => 'PemeliharaanController@add']);
	Route::get('/alat/hapus/{id}', ['uses' => 'AlatController@delete']);
	Route::post('/alat/transaksi/{id}', ['uses' => 'TransaksiController@add']);
	Route::post('/alat/booking/{id}', ['uses' => 'BookingController@add']);
	Route::post('/alat/do_edit', ['uses' => 'AlatController@edit']);

	Route::get('/dipinjam', 'AlatController@getDipinjam');
	
	Route::get('/dipelihara', 'AlatController@getDipelihara');

	Route::get('/tambah', 'AlatController@addForm');

	Route::get('/lokasi', 'LokasiController@listPage');
	Route::post('/lokasi/add', 'LokasiController@add');
	Route::post('/lokasi/edit/{id}', ['uses' => 'LokasiController@edit']);
	Route::get('/lokasi/hapus/{id}', ['uses' => 'LokasiController@del']);
	Route::post('/lokasi/hapus/{id}', ['uses' => 'LokasiController@doDelete']);

	Route::post('/task', 'AlatController@add');

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

	Route::get('/pemeliharaan/selesai/{id}', ['uses' => 'PemeliharaanController@del']);

	Route::post('/pemeliharaan/add', 'PemeliharaanController@add');

	Route::get('/statistik', 'AlatController@statistik');
	Route::get('/statistik/frekuensi/', 'AlatController@statistik_frekuensi');
	Route::get('/statistik/kerusakan/', 'AlatController@statistik_kerusakan_all');
	Route::get('/statistik/user/select', 'AlatController@statistik_user_intro');
	Route::post('/statistik/user/redirect', 'AlatController@statistik_user_redirector');
	Route::get('/statistik/user/{id}', ['uses' => 'AlatController@statistik_user_all']);
});
