<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'Api\Auth\RegisterController@register');
Route::post('login', 'Api\Auth\LoginController@login');
Route::post('login/data', 'Api\Auth\LoginController@data');
Route::post('refresh', 'Api\Auth\LoginController@refresh');


Route::middleware('auth:api')->group(function () {
    
    Route::post('logout', 'Api\Auth\LoginController@logout');
    Route::get('setting', 'Api\Auth\SettingController@settingAkun');
    Route::patch('ubahakun', 'Api\Auth\SettingController@ubahAkun');

    Route::get('siswa', 'Api\SiswaController@index');
    Route::post('siswa/cari', 'Api\SiswaController@cari');
    Route::get('siswa/profile', 'Api\SiswaController@profile');
    Route::post('siswa', 'Api\SiswaController@ubahProfile');

    Route::get('guru', 'Api\GuruController@index');
    Route::get('dataguru', 'Api\GuruController@tampil');
    Route::post('guru/cariguru', 'Api\GuruController@cariguru');
    Route::post('guru/carigurukelas', 'Api\GuruController@carigurukelas');
    Route::get('guru/show', 'Api\GuruController@show');
    Route::post('guru', 'Api\GuruController@ubahProfile');
    Route::get('guru/detailguru/{id}', 'Api\GuruController@detailguru');

    Route::get('berita', 'Api\BeritaController@index');
    Route::get('berita/{id}', 'Api\BeritaController@show');

    Route::post('mata-pelajaran', 'Api\MataPelajaranController@index');
    Route::get('kelas', 'Api\KelasContoroller@index');

    Route::post('history', 'Api\HistoryController@insert');
    Route::get('historyguru', 'Api\HistoryController@historyGuru');
    Route::get('historysiswa', 'Api\HistoryController@historySiswa');
    Route::post('detailhistorysiswa', 'Api\HistoryController@detailHistorySiswa');
    Route::post('detailhistoryguru', 'Api\HistoryController@detailHistoryGuru');
    Route::delete('history/{id}', 'Api\HistoryController@batalkanBooking');
    Route::patch('history/terima', 'Api\HistoryController@terimaBooking');
    Route::patch('history/tolak', 'Api\HistoryController@tolakBooking');
    Route::patch('history/selesai', 'Api\HistoryController@selesaiBooking');

    Route::post('materi-guru', 'Api\MateriGuruController@store');
    Route::get('materi-guru/tampil', 'Api\MateriGuruController@tampildata');
    Route::get('materi-guru', 'Api\MateriGuruController@index');

    Route::post('chat', 'Api\ChatController@store');
    Route::get('chat/siswa', 'Api\ChatController@chatSiswa');
    Route::get('chat/guru', 'Api\ChatController@chatGuru');
    Route::get('detail/chat/guru/{id}', 'Api\ChatController@detailChatGuru');
    Route::get('chat/guru/{id}', 'Api\ChatController@guru');
    Route::get('chat/siswa/{id}', 'Api\ChatController@siswa');
});
