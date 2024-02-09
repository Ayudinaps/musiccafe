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

Route::get('/', function () {
    return view('index');
});

//Route untuk Data Lagu
Route::get('/lagu', 'LaguController@lagutampil');
Route::post('/lagu/tambah','LaguController@lagutambah');
Route::get('/lagu/hapus/{id_lagu}','LaguController@laguhapus');
Route::put('/lagu/edit/{id_lagu}', 'LaguController@laguedit');

//Route untuk Data Lagu
Route::get('/home', function(){return view('view_home');});

//Route untuk Data Pendengar
Route::get('/pendengar', 'PendengarController@pendengartampil');
Route::post('/pendengar/tambah', 'PendengarController@pendengartambah');
Route::get('/pendengar/hapus/{id_pendengar}', 'PendengarController@pendengarhapus');
Route::put('/pendengar/edit/{id_pendengar}', 'PendengarController@pendengaredit');

//Route untuk Data Dj
Route::get('/dj', 'DjController@djtampil');
Route::post('/dj/tambah', 'DjController@djtambah');
Route::get('/dj/hapus/{id_dj}', 'DjController@djhapus');
Route::put('/dj/edit/{id_dj}', 'DjController@djedit');

//Route untuk Data Putar
Route::get('/putar', 'PutarController@putartampil');
Route::post('/putar/tambah','PutarController@putartambah');
Route::get('/putar/hapus/{id_putar}','PutarController@putarhapus');
Route::put('/putar/edit/{id_putar}', 'PutarController@putaredit');