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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('artikel', 'ArtikelController');
    Route::post('/artikelFormData/{id}','ArtikelController@update');
    Route::post('deleteImageIsi','ArtikelController@deleteImageIsi');
    Route::get('getArtikel','ArtikelController@getTableArtikel');
    Route::put('gantiStatusArtikel/{id}','ArtikelController@gantiStatus');
    Route::resource('kategori', 'KategoriArtikelController');
    Route::get('getKategori','KategoriArtikelController@getTableKategori');
    Route::put('gantiStatusKategori/{id}','KategoriArtikelController@gantiStatus');
    Route::resource('menuGrouping', 'MenuGroupingController');
    Route::get('/getMenu','MenuGroupingController@getMenu');
});