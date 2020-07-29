<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'jabatan', 'as' => 'jabatan.'], function () {
    Route::get('', ['as' => 'index', 'uses' => 'JabatanController@index']);
    Route::post('', ['as' => 'store', 'uses' => 'JabatanController@store']);
    Route::get('/create', ['as' => 'create', 'uses' => 'JabatanController@create']);
    Route::get('/{jabatan}', ['as' => 'show', 'uses' => 'JabatanController@show']);
    Route::put('/{jabatan}', ['as' => 'update', 'uses' => 'JabatanController@update']);
    Route::delete('/{jabatan}', ['as' => 'destroy', 'uses' => 'JabatanController@destroy']);
    Route::get('/{jabatan}/edit', ['as' => 'edit', 'uses' => 'JabatanController@edit']);
});

Route::group(['prefix' => 'kategori', 'as' => 'kategori.'], function () {
    Route::get('', ['as' => 'index', 'uses' => 'KatIbadahController@index']);
    Route::post('', ['as' => 'store', 'uses' => 'KatIbadahController@store']);
    Route::get('/create', ['as' => 'create', 'uses' => 'KatIbadahController@create']);
    Route::get('/{kategori}', ['as' => 'show', 'uses' => 'KatIbadahController@show']);
    Route::put('/{kategori}', ['as' => 'update', 'uses' => 'KatIbadahController@update']);
    Route::delete('/{kategori}', ['as' => 'destroy', 'uses' => 'KatIbadahController@destroy']);
    Route::get('/{kategori}/edit', ['as' => 'edit', 'uses' => 'KatIbadahController@edit']);
});

Route::group(['prefix' => 'setKeuangan', 'as' => 'setKeuangan.'], function () {
    Route::get('', ['as' => 'index', 'uses' => 'SetKeuanganController@index']);
    Route::post('', ['as' => 'store', 'uses' => 'SetKeuanganController@store']);
    Route::get('/create', ['as' => 'create', 'uses' => 'SetKeuanganController@create']);
    Route::get('/{setKeuangan}', ['as' => 'show', 'uses' => 'SetKeuanganController@show']);
    Route::put('/{setKeuangan}', ['as' => 'update', 'uses' => 'SetKeuanganController@update']);
    Route::delete('/{setKeuangan}', ['as' => 'destroy', 'uses' => 'SetKeuanganController@destroy']);
    Route::get('/{setKeuangan}/edit', ['as' => 'edit', 'uses' => 'SetKeuanganController@edit']);
});

Route::group(['prefix'=>'jemaat','as'=>'jemaat.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'JemaatController@index']);
    Route::post('', ['as' => 'store', 'uses' => 'JemaatController@store']);
    Route::get('/create', ['as' => 'create', 'uses' => 'JemaatController@create']);
    Route::get('/{jemaat}', ['as' => 'show', 'uses' => 'JemaatController@show']);
    Route::put('/{jemaat}', ['as' => 'update', 'uses' => 'JemaatController@update']);
    Route::delete('/{jemaat}', ['as' => 'destroy', 'uses' => 'JemaatController@destroy']);
    Route::get('/{jemaat}/edit', ['as' => 'edit', 'uses' => 'JemaatController@edit']);
});

Route::group(['prefix'=>'baptis','as'=>'baptis.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'BaptisController@index']);
    Route::post('', ['as' => 'store', 'uses' => 'BaptisController@store']);
    Route::get('/create', ['as' => 'create', 'uses' => 'BaptisController@create']);
    Route::get('/{baptis}', ['as' => 'show', 'uses' => 'BaptisController@show']);
    Route::put('/{baptis}', ['as' => 'update', 'uses' => 'BaptisController@update']);
    Route::delete('/{baptis}', ['as' => 'destroy', 'uses' => 'BaptisController@destroy']);
    Route::get('/{baptis}/edit', ['as' => 'edit', 'uses' => 'BaptisController@edit']);
});

Route::group(['prefix'=>'sidi','as'=>'sidi.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'SidiController@index']);
    Route::post('', ['as' => 'store', 'uses' => 'SidiController@store']);
    Route::get('/create', ['as' => 'create', 'uses' => 'SidiController@create']);
    Route::get('/{sidi}', ['as' => 'show', 'uses' => 'SidiController@show']);
    Route::put('/{sidi}', ['as' => 'update', 'uses' => 'SidiController@update']);
    Route::delete('/{sidi}', ['as' => 'destroy', 'uses' => 'SidiController@destroy']);
    Route::get('/{sidi}/edit', ['as' => 'edit', 'uses' => 'SidiController@edit']);
});

Route::group(['prefix'=>'nikah','as'=>'nikah.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'NikahController@index']);
    Route::post('', ['as' => 'store', 'uses' => 'NikahController@store']);
    Route::get('/create', ['as' => 'create', 'uses' => 'NikahController@create']);
    Route::get('/{nikah}', ['as' => 'show', 'uses' => 'NikahController@show']);
    Route::put('/{nikah}', ['as' => 'update', 'uses' => 'NikahController@update']);
    Route::delete('/{nikah}', ['as' => 'destroy', 'uses' => 'NikahController@destroy']);
    Route::get('/{nikah}/edit', ['as' => 'edit', 'uses' => 'NikahController@edit']);
});

Route::group(['prefix'=>'pengumuman','as'=>'pengumuman.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'PengumumanController@index']);
    Route::post('', ['as' => 'store', 'uses' => 'PengumumanController@store']);
    Route::get('/create', ['as' => 'create', 'uses' => 'PengumumanController@create']);
    Route::get('/{pengumuman}', ['as' => 'show', 'uses' => 'PengumumanController@show']);
    Route::put('/{pengumuman}', ['as' => 'update', 'uses' => 'PengumumanController@update']);
    Route::delete('/{pengumuman}', ['as' => 'destroy', 'uses' => 'PengumumanController@destroy']);
    Route::get('/{pengumuman}/edit', ['as' => 'edit', 'uses' => 'PengumumanController@edit']);
});

Route::group(['prefix'=>'ibadah','as'=>'ibadah.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'IbadahController@index']);
    Route::post('', ['as' => 'store', 'uses' => 'IbadahController@store']);
    Route::get('/create', ['as' => 'create', 'uses' => 'IbadahController@create']);
    Route::get('/{ibadah}', ['as' => 'show', 'uses' => 'IbadahController@show']);
    Route::put('/{ibadah}', ['as' => 'update', 'uses' => 'IbadahController@update']);
    Route::delete('/{ibadah}', ['as' => 'destroy', 'uses' => 'IbadahController@destroy']);
    Route::get('/{ibadah}/edit', ['as' => 'edit', 'uses' => 'IbadahController@edit']);
});

Route::group(['prefix'=>'keuangan','as'=>'keuangan.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'KeuanganController@index']);
    Route::post('', ['as' => 'store', 'uses' => 'KeuanganController@store']);
    Route::get('/create', ['as' => 'create', 'uses' => 'KeuanganController@create']);
    Route::get('/{keuangan}', ['as' => 'show', 'uses' => 'KeuanganController@show']);
    Route::put('/{keuangan}', ['as' => 'update', 'uses' => 'KeuanganController@update']);
    Route::delete('/{keuangan}', ['as' => 'destroy', 'uses' => 'KeuanganController@destroy']);
    Route::get('/{keuangan}/edit', ['as' => 'edit', 'uses' => 'KeuanganController@edit']);
    Route::post('/getData', ['as' => 'getData', 'uses' => 'KeuanganController@getDaftarKeuangan']);
});