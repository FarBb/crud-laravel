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

// Route::get('/dashboard', function () {
//     if (session('berhasil_login')) {
//         return view('index');
//     } else {
//         return redirect('/')->with('massage', 'Silahkan Login Terlebih Dahulu!');
//     }
// });

Route::get('/', 'Auth\AuthController@index')->name('login');
Route::post('login', 'Auth\AuthController@login')->name('login');

// Route::get('crud', 'CrudController@index')->name('crud')->middleware('cekLogin');


Route::group(['middleware' => 'cekLogin'], function () {
    //
    Route::get('/dashboard', function () {
        return view('index');
    });
    Route::get('crud', 'CrudController@index')->name('crud');
    Route::get('crud/tambah', 'CrudController@tambah')->name('crud.tambah');
    Route::post('crud/simpan', 'CrudController@simpan')->name('crud.simpan');
    Route::delete('crud/{id}', 'CrudController@hapus')->name('crud.hapus');
    Route::get('crud/{id}/edit', 'CrudController@edit')->name('crud.edit');
    Route::patch('crud/{id}', 'CrudController@update')->name('crud.update');
    Route::get('logout', 'Auth\AuthController@logout')->name('keluar');
});
