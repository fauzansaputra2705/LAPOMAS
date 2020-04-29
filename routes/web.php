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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/jsongetchat', 'LaporanController@jsongetchat');
// Route::post('/jsonstorechat', 'LaporanController@jsonstorechat');

Auth::routes();

Route::group(['prefix' => 'superadmin', 'middleware' => "superadmin"], function() {
    Route::get('/', 'superadmin\SuperAdminController@index')->name('superadmin.index');

    //daftaradmin
    Route::get('/daftar-admin', 'superadmin\AkunAdminController@index')->name('superadmin.daftar-admin');
    Route::get('/json/daftaradmin', 'superadmin\AkunAdminController@json')->name('json.daftaradmin');
    Route::get('/daftar-admin/create', 'superadmin\AkunAdminController@create')->name('superadmin.createadmin');
    Route::post('/daftar-admin/create', 'superadmin\AkunAdminController@store')->name('superadmin.storeadmin');
    Route::get('/daftar-admin/{id}/edit', 'superadmin\AkunAdminController@edit');
    Route::put('/daftar-admin/edit/{id}', 'superadmin\AkunAdminController@update');
    Route::get('daftar-admin/edit/gambar', 'superadmin\AkunAdminController@deleteimage');
    Route::delete('/daftar-admin/delete/{id}', 'superadmin\AkunAdminController@destroy');

    //daftarpetugas
    Route::get('/daftar-petugas', 'AkunPetugasController@index');
    Route::get('/json/daftarpetugas', 'AkunPetugasController@json');
    Route::get('/daftar-petugas/create', 'AkunPetugasController@create');
    Route::post('/daftar-petugas/create', 'AkunPetugasController@store');
    Route::get('/daftar-petugas/{id}/edit', 'AkunPetugasController@edit');
    Route::put('/daftar-petugas/edit/{id}', 'AkunPetugasController@update');
    Route::get('daftar-petugas/edit/gambar', 'AkunPetugasController@deleteimage');
    Route::delete('/daftar-petugas/delete/{id}', 'AkunPetugasController@destroy');

    //daftaruser
    Route::get('/daftar-user', 'superadmin\AkunUserController@index')->name('superadmin.daftar-user');
    Route::get('/json/daftaruser', 'superadmin\AkunUserController@json')->name('json.daftaruser');

    //daftarkategori
    Route::get('/daftar-kategori', 'superadmin\DaftarKategoriController@index')->name('superadmin.daftar-kategori');
    Route::get('/json/daftarkategori', 'superadmin\DaftarKategoriController@json')->name('json.daftarkategori');
    Route::post('/daftar-kategori/create', 'superadmin\DaftarKategoriController@store');
    Route::get('/daftar-kategori/{id}/edit', 'superadmin\DaftarKategoriController@edit');
    Route::put('/daftar-kategori/edit/{id}', 'superadmin\DaftarKategoriController@update');
    Route::delete('/daftar-kategori/delete/{id}', 'superadmin\DaftarKategoriController@destroy');

    //daftarinstansi
    // Route::get('/daftar-instansi', 'superadmin\DaftarInstansiController@index')->name('superadmin.daftar-instansi');
    // Route::get('/json/daftarinstansi', 'superadmin\DaftarInstansiController@json')->name('json.daftarinstansi');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    //laporan
	Route::get('/', 'AdminController@index')->name('admin.index');
	Route::get('/daftar-pengaduan', 'AdminController@pengaduan')->name('admin.pengaduan');
    Route::get('/json/daftarlaporan', 'AdminController@json')->name('admin.jsondaftarlaporan');
    Route::put('/daftar-pengaduan/updatelaporan/{id}', 'AdminController@updatelaporan');
    Route::post('/daftar-pengaduan/tanggapan', 'TanggapanController@store');

    //daftarpetugas
    Route::get('/daftar-petugas', 'AkunPetugasController@index');
    Route::get('/json/daftarpetugas', 'AkunPetugasController@json');
    Route::get('/daftar-petugas/create', 'AkunPetugasController@create');
    Route::post('/daftar-petugas/create', 'AkunPetugasController@store');
    Route::get('/daftar-petugas/{id}/edit', 'AkunPetugasController@edit');
    Route::put('/daftar-petugas/edit/{id}', 'AkunPetugasController@update');
    Route::get('daftar-petugas/edit/gambar', 'AkunPetugasController@deleteimage');
    Route::delete('/daftar-petugas/delete/{id}', 'AkunPetugasController@destroy');
});

Route::group(['prefix' => 'petugas', 'middleware' => 'petugas'], function() {
	Route::get('/', 'PetugasController@index')->name('petugas.index');
    Route::get('/daftar-pengaduan', 'PetugasController@pengaduan')->name('petugas.pengaduan');
    Route::get('/json/daftarlaporan', 'PetugasController@json')->name('petugas.jsondaftarlaporan');
    Route::get('/daftar-pengaduan/chat/{id}', 'PetugasController@chat');
    Route::post('/daftar-pengaduan/chat/store', 'TanggapanController@store');
    Route::put('/daftar-pengaduan/updatelaporan/{id}', 'PetugasController@updatelaporan');
});

Route::group(['prefix' => 'user', 'middleware' => 'user'], function() {
	Route::get('/', 'LaporanController@index')->name('user.index');
    Route::post('/', 'LaporanController@store');
    Route::get('/laporan/detail/{id}', 'LaporanController@show');
    Route::get('/laporan/detail/{id}/edit', 'LaporanController@edit');
    Route::put('/laporan/detail/{id}', 'LaporanController@update');
    Route::get('/laporan/detail/gambar', 'LaporanController@deleteimage');
    Route::delete('/laporan/detail/{id}/{gambar}', 'LaporanController@destroy');

    Route::get('/json/daftarpengaduan', 'UserController@jsonpengaduan')->name('json.daftarpengaduan');
    Route::get('/cara-penggunaan', 'UserController@penggunaan')->name('user.carapenggunaan');
    Route::get('/pengaduan-saya', 'UserController@pengaduan')->name('user.pengaduansaya');

    Route::get('/profile/{id}', function($id){
        $data['layout'] = 'user.profile';
        $data['user'] = \App\User::find($id);
        \QrCode::size(500)
        ->format('png')
        ->generate('#', public_path('images/qrcode.png'));
        return view('layouts.header',$data);
    });
});
