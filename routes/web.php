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


//Route 
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
Route::get('/', 'HomeController@index');


//Route User
Route::get('user', 'UserController@index');
Route::get('user/create', 'UserController@create');
Route::post('user', 'UserController@store');
Route::get('user/edit/{user}', 'UserController@edit');
Route::patch('user/{user}', 'UserController@update');
Route::get('user/destroy/{user}', 'UserController@destroy');

//Route AdminController
Route::get('admin', 'AdminController@index');
Route::get('admin/edit/{user}', 'AdminController@edit');
Route::patch('admin/{user}', 'AdminController@update');
Route::get('admin/destroy/{user}', 'AdminController@destroy');
Route::get('profile', 'AdminController@profile');
Route::post('profile', 'AdminController@actionProfile')->name('profile');

//Route Guru
Route::get('guru', 'GuruController@index');
Route::get('guru/create', 'GuruController@create');
Route::get('guru/show/{user}', 'GuruController@show');
Route::get('guru/edit/{user}', 'GuruController@edit');
Route:: get('/guru/create/mata-pelajaran/{id}', 'GuruController@mata_pelajaran');
Route::post('guru', 'GuruController@store');
Route::patch('guru/{user}', 'GuruController@update');
Route::get('guru/destroy/{user}', 'GuruController@destroy');

//Route Siswa
Route::get('siswa', 'SiswaController@index');
Route::get('siswa/create', 'SiswaController@create');
Route::get('siswa/show/{user}', 'SiswaController@show');
Route::get('siswa/edit/{user}', 'SiswaController@edit');
Route::post('siswa', 'SiswaController@store');
Route::patch('siswa/{user}', 'SiswaController@update');
Route::get('siswa/destroy/{user}', 'SiswaController@destroy');

//Route Kategori Kelas
Route::get('category-kelas', 'CategoryKelasController@index');
Route::get('category-kelas/create', 'CategoryKelasController@create');
Route::get('category-kelas/edit/{category_kelas}', 'CategoryKelasController@edit');
Route::post('category-kelas', 'CategoryKelasController@store');
Route::patch('category-kelas/{category_kelas}', 'CategoryKelasController@update');
Route::get('category-kelas/destroy/{category_kelas}', 'CategoryKelasController@destroy');


//Route Mata Pelajaran
Route::get('mata-pelajaran', 'MataPelajaranController@index');
Route::get('mata-pelajaran/create', 'MataPelajaranController@create');
Route::get('mata-pelajaran/edit/{mata_pelajaran}', 'MataPelajaranController@edit');
Route::post('mata-pelajaran', 'MataPelajaranController@store');
Route::patch('mata-pelajaran/{mata_pelajaran}', 'MataPelajaranController@update');
Route::get('mata-pelajaran/destroy/{mata_pelajaran}', 'MataPelajaranController@destroy');

//Route Berita
Route::get('berita', 'BeritaController@index');
Route::get('berita/create', 'BeritaController@create');
Route::post('berita', 'BeritaController@store');
Route::get('berita/edit/{id}', 'BeritaController@edit');
Route::patch('berita/{id}', 'BeritaController@update');
Route::get('berita/destroy/{id}', 'BeritaController@destroy');


Route::get('berita1', 'HomeController@tampil');