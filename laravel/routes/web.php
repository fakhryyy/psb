<?php

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

Route::get('/', 'c_home@index');
Route::get('/home', 'c_home@index')->name('home');
Route::get('/daftar', 'c_pendaftaran@index');
Route::get('/daftar/pdf/{id}', 'c_pendaftaran@generateBukti')->name('daftar.pdf');
Route::post('/daftar/post', 'c_pendaftaran@simpan');

Route::get('api/kategori', 'api@kategori');
Route::get('api/provinsi', 'api@provinsi');
Route::get('api/kabupaten/{id}', 'api@kabupaten');
Route::get('api/kecamatan/{id}', 'api@kecamatan');
Route::get('api/kelurahan/{id}', 'api@kelurahan');

Route::get('/cekNik/{id}', 'c_pendaftaran@cekNik');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/data-santri', 'c_pendaftaran@data_santri');
    Route::get('/edit-data/{id}', 'c_pendaftaran@edit');
    Route::post('/update-data', 'c_pendaftaran@update');
    Route::get('/excel/{kat}', 'c_pendaftaran@excel')->name('export-data');
    Route::get('/api-datasantri/{id}/{status}', 'c_pendaftaran@apiDatasantri');
    Route::get('/pengaturan', 'PengaturanController@index');
    Route::post('/pengaturan-save', 'PengaturanController@saveData');
    Route::get('/akademik', 'PengaturanController@addAkademik')->name('akademik.index');
    Route::post('/akademik/store', 'PengaturanController@storeAkademik')->name('akademik.store');
});




Route::get('/download/pesantren', function () {
    $file = public_path() . '/download/pesantren.jpeg';
    return response()->download($file, 'brosur_pesantren.jpg');
});
Route::get('/download/sma', function () {
    $file = public_path() . '/download/sma.jpeg';
    return response()->download($file, 'brosur_sma.jpg');
});
Route::get('/download/smp', function () {
    $file = public_path() . '/download/smp.jpeg';
    return response()->download($file, 'brosur_smp.jpg');
});
