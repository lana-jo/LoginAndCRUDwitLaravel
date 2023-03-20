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

Auth::routes();
// Route::get('yuklogin','LoginController@yukLogin');
//jika user
Route::get('/','HomeController@index');
Route::get('daftar-transaksi','TransaksiController@index');
Route::get('create-transaksi/{id}','TransaksiController@create');
Route::get('show-transaksi/{id}','TransaksiController@show');
Route::post('store_transaksi','TransaksiController@store');
Route::post('terima_transaksi/{id}','TransaksiController@terima');
Route::post('tolak_transaksi/{id}','TransaksiController@tolak');
Route::post('transaksi_selesai/{id}','TransaksiController@selesaiPinjam');
// Route::post('transaksi_selesai','AjaxController@transaksiSelesai');

Route::resource('ruangan','RuanganController');
// use Illuminate\Http\Request;
// use App\User;
// Route::get('/cari',function(Request $request) {
//     return User::cari($request->cari)->get();
// });
Route::get('/cari','MahasiswaController@cari');
// Route::get('/search','UserController@search');
Route::post('store_feedback','FeedbackController@store');


Route::resource('user','UserController');
// Route::get('mahasiswa.cari','MahasiswaController@cari');
Route::resource('mahasiswa','MahasiswaController');
Route::get('change-password',function(){
    return view('app.change_pass');
});
Route::post('change-password','UserController@change_password');
