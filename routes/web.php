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

Route::group(['prefix' => 'changepassword', 'as' => 'changepassword.'], function () {
    Route::post('', ['as' => 'update', 'uses' => 'HomeController@updatepassword']);
    Route::get('/edit', ['as' => 'edit', 'uses' => 'HomeController@editpassword']);
});

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
    Route::get('', ['as' => 'index', 'uses' => 'KatIbadahController@index'])->middleware('permission:read katibadah');
    Route::post('', ['as' => 'store', 'uses' => 'KatIbadahController@store'])->middleware('permission:create katibadah');
    Route::get('/create', ['as' => 'create', 'uses' => 'KatIbadahController@create'])->middleware('permission:create katibadah');
    Route::get('/{kategori}', ['as' => 'show', 'uses' => 'KatIbadahController@show'])->middleware('permission:read katibadah');
    Route::put('/{kategori}', ['as' => 'update', 'uses' => 'KatIbadahController@update'])->middleware('permission:update katibadah');
    Route::delete('/{kategori}', ['as' => 'destroy', 'uses' => 'KatIbadahController@destroy'])->middleware('permission:delete katibadah');
    Route::get('/{kategori}/edit', ['as' => 'edit', 'uses' => 'KatIbadahController@edit'])->middleware('permission:update katibadah');
});

Route::group(['prefix' => 'setKeuangan', 'as' => 'setKeuangan.'], function () {
    Route::get('', ['as' => 'index', 'uses' => 'SetKeuanganController@index'])->middleware('permission:read setkeuangan');
    Route::post('', ['as' => 'store', 'uses' => 'SetKeuanganController@store'])->middleware('permission:create setkeuangan');
    Route::get('/create', ['as' => 'create', 'uses' => 'SetKeuanganController@create'])->middleware('permission:create setkeuangan');
    Route::get('/{setKeuangan}', ['as' => 'show', 'uses' => 'SetKeuanganController@show'])->middleware('permission:read setkeuangan');
    Route::put('/{setKeuangan}', ['as' => 'update', 'uses' => 'SetKeuanganController@update'])->middleware('permission:update setkeuangan');
    Route::delete('/{setKeuangan}', ['as' => 'destroy', 'uses' => 'SetKeuanganController@destroy'])->middleware('permission:delete setkeuangan');
    Route::get('/{setKeuangan}/edit', ['as' => 'edit', 'uses' => 'SetKeuanganController@edit'])->middleware('permission:update setkeuangan');
});

Route::group(['prefix'=>'jemaat','as'=>'jemaat.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'JemaatController@index'])->middleware('permission:read jemaat');
    Route::post('', ['as' => 'store', 'uses' => 'JemaatController@store'])->middleware('permission:create jemaat');
    Route::get('/create', ['as' => 'create', 'uses' => 'JemaatController@create'])->middleware('permission:create jemaat');
    Route::get('/{jemaat}', ['as' => 'show', 'uses' => 'JemaatController@show'])->middleware('permission:read jemaat');
    Route::put('/{jemaat}', ['as' => 'update', 'uses' => 'JemaatController@update'])->middleware('permission:update jemaat');
    Route::delete('/{jemaat}', ['as' => 'destroy', 'uses' => 'JemaatController@destroy'])->middleware('permission:delete jemaat');
    Route::get('/{jemaat}/edit', ['as' => 'edit', 'uses' => 'JemaatController@edit'])->middleware('permission:update jemaat');
});

Route::group(['prefix'=>'baptis','as'=>'baptis.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'BaptisController@index'])->middleware('permission:read baptis');
    Route::post('', ['as' => 'store', 'uses' => 'BaptisController@store'])->middleware('permission:create baptis');
    Route::get('/create', ['as' => 'create', 'uses' => 'BaptisController@create'])->middleware('permission:create baptis');
    Route::get('/{baptis}', ['as' => 'show', 'uses' => 'BaptisController@show'])->middleware('permission:read baptis');
    Route::put('/{baptis}', ['as' => 'update', 'uses' => 'BaptisController@update'])->middleware('permission:update baptis');
    Route::delete('/{baptis}', ['as' => 'destroy', 'uses' => 'BaptisController@destroy'])->middleware('permission:delete baptis');
    Route::get('/{baptis}/edit', ['as' => 'edit', 'uses' => 'BaptisController@edit'])->middleware('permission:update baptis');
});

Route::group(['prefix'=>'sidi','as'=>'sidi.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'SidiController@index'])->middleware('permission:read sidi');
    Route::post('', ['as' => 'store', 'uses' => 'SidiController@store'])->middleware('permission:create sidi');
    Route::get('/create', ['as' => 'create', 'uses' => 'SidiController@create'])->middleware('permission:create sidi');
    Route::get('/{sidi}', ['as' => 'show', 'uses' => 'SidiController@show'])->middleware('permission:read sidi');
    Route::put('/{sidi}', ['as' => 'update', 'uses' => 'SidiController@update'])->middleware('permission:update sidi');
    Route::delete('/{sidi}', ['as' => 'destroy', 'uses' => 'SidiController@destroy'])->middleware('permission:delete sidi');
    Route::get('/{sidi}/edit', ['as' => 'edit', 'uses' => 'SidiController@edit'])->middleware('permission:update sidi');
});

Route::group(['prefix'=>'nikah','as'=>'nikah.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'NikahController@index'])->middleware('permission:read nikah');
    Route::post('', ['as' => 'store', 'uses' => 'NikahController@store'])->middleware('permission:create nikah');
    Route::get('/create', ['as' => 'create', 'uses' => 'NikahController@create'])->middleware('permission:create nikah');
    Route::get('/{nikah}', ['as' => 'show', 'uses' => 'NikahController@show'])->middleware('permission:read nikah');
    Route::put('/{nikah}', ['as' => 'update', 'uses' => 'NikahController@update'])->middleware('permission:update nikah');
    Route::delete('/{nikah}', ['as' => 'destroy', 'uses' => 'NikahController@destroy'])->middleware('permission:delete nikah');
    Route::get('/{nikah}/edit', ['as' => 'edit', 'uses' => 'NikahController@edit'])->middleware('permission:update nikah');
});

Route::group(['prefix'=>'pengumuman','as'=>'pengumuman.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'PengumumanController@index'])->middleware('permission:read pengumuman');
    Route::post('', ['as' => 'store', 'uses' => 'PengumumanController@store'])->middleware('permission:create pengumuman');
    Route::get('/create', ['as' => 'create', 'uses' => 'PengumumanController@create'])->middleware('permission:create pengumuman');
    Route::get('/{pengumuman}', ['as' => 'show', 'uses' => 'PengumumanController@show'])->middleware('permission:read pengumuman');
    Route::put('/{pengumuman}', ['as' => 'update', 'uses' => 'PengumumanController@update'])->middleware('permission:update pengumuman');
    Route::delete('/{pengumuman}', ['as' => 'destroy', 'uses' => 'PengumumanController@destroy'])->middleware('permission:delete pengumuman');
    Route::get('/{pengumuman}/edit', ['as' => 'edit', 'uses' => 'PengumumanController@edit'])->middleware('permission:update pengumuman');
});

Route::group(['prefix'=>'ibadah','as'=>'ibadah.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'IbadahController@index'])->middleware('permission:read ibadah');
    Route::post('', ['as' => 'store', 'uses' => 'IbadahController@store'])->middleware('permission:create ibadah');
    Route::get('/create', ['as' => 'create', 'uses' => 'IbadahController@create'])->middleware('permission:create ibadah');
    Route::get('/{ibadah}', ['as' => 'show', 'uses' => 'IbadahController@show'])->middleware('permission:read ibadah');
    Route::put('/{ibadah}', ['as' => 'update', 'uses' => 'IbadahController@update'])->middleware('permission:update ibadah');
    Route::delete('/{ibadah}', ['as' => 'destroy', 'uses' => 'IbadahController@destroy'])->middleware('permission:delete ibadah');
    Route::get('/{ibadah}/edit', ['as' => 'edit', 'uses' => 'IbadahController@edit'])->middleware('permission:update ibadah');
});

Route::group(['prefix'=>'keuangan','as'=>'keuangan.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'KeuanganController@index'])->middleware('permission:read keuangan');
    Route::post('', ['as' => 'store', 'uses' => 'KeuanganController@store'])->middleware('permission:create keuangan');
    Route::get('/create', ['as' => 'create', 'uses' => 'KeuanganController@create'])->middleware('permission:create keuangan');
    Route::get('/{keuangan}', ['as' => 'show', 'uses' => 'KeuanganController@show'])->middleware('permission:read keuangan');
    Route::put('/{keuangan}', ['as' => 'update', 'uses' => 'KeuanganController@update'])->middleware('permission:update keuangan');
    Route::delete('/{keuangan}', ['as' => 'destroy', 'uses' => 'KeuanganController@destroy'])->middleware('permission:delete keuangan');
    Route::get('/{keuangan}/edit', ['as' => 'edit', 'uses' => 'KeuanganController@edit'])->middleware('permission:update keuangan');
    Route::post('/getData', ['as' => 'getData', 'uses' => 'KeuanganController@getDaftarKeuangan']);
    Route::post('/getTable', ['as' => 'getTable', 'uses' => 'KeuanganController@getTable']);
});

Route::group(['prefix'=>'keuangankeluar','as'=>'keuangankeluar.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'KeuanganController@index_keluar'])->middleware('permission:read keuangan');
    Route::post('', ['as' => 'store', 'uses' => 'KeuanganController@store'])->middleware('permission:create keuangan');
    Route::get('/create', ['as' => 'create', 'uses' => 'KeuanganController@create_keluar'])->middleware('permission:create keuangan');
    Route::get('/{keuangan}', ['as' => 'show', 'uses' => 'KeuanganController@show'])->middleware('permission:read keuangan');
    Route::put('/{keuangan}', ['as' => 'update', 'uses' => 'KeuanganController@update'])->middleware('permission:update keuangan');
    Route::delete('/{keuangan}', ['as' => 'destroy', 'uses' => 'KeuanganController@destroy_keluar'])->middleware('permission:delete keuangan');
    Route::get('/{keuangan}/edit', ['as' => 'edit', 'uses' => 'KeuanganController@edit_keluar'])->middleware('permission:update keuangan');
    Route::post('/getData', ['as' => 'getData', 'uses' => 'KeuanganController@getDaftarKeuangan']);
    Route::post('/getTable', ['as' => 'getTable', 'uses' => 'KeuanganController@getTableKeluar']);
});

Route::group(['prefix'=>'lapkeuangan','as'=>'lapkeuangan.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'LapKeuanganController@index']);
    Route::post('/getTable', ['as' => 'getTable', 'uses' => 'LapKeuanganController@getTable']);
    Route::post('/getSaldo', ['as' => 'getSaldo', 'uses' => 'LapKeuanganController@getSaldo']);
    Route::post('/getJumlah', ['as' => 'getJumlah', 'uses' => 'LapKeuanganController@getJumlah']);
    Route::post('/export', ['as' => 'export', 'uses' => 'LapKeuanganController@export_excel']);
});

Route::group(['prefix'=>'setmajelis','as'=>'setmajelis.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'SetMajelisController@index']);
    Route::post('', ['as' => 'store', 'uses' => 'SetMajelisController@store']);
    Route::get('/create', ['as' => 'create', 'uses' => 'SetMajelisController@create']);
    Route::get('/{setmajelis}', ['as' => 'show', 'uses' => 'SetMajelisController@show']);
    Route::put('/{setmajelis}', ['as' => 'update', 'uses' => 'SetMajelisController@update']);
    Route::delete('/{setmajelis}', ['as' => 'destroy', 'uses' => 'SetMajelisController@destroy']);
    Route::get('/{setmajelis}/edit', ['as' => 'edit', 'uses' => 'SetMajelisController@edit']);
});