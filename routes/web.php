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

Auth::routes(['verified' => true]);
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('verifyemail/{token}','Auth\RegisterController@verify');
Route::group(['middleware' => ['auth','verified']], function () {
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
    Route::get('usersIndex','ManagementUsersController@usersIndex');
    Route::get('createUsers','ManagementUsersController@createUsers');
    Route::post('oprationUsers','ManagementUsersController@storeUsers');
    Route::delete('oprationUsers/{id}','ManagementUsersController@destroyUsers');
    Route::get('oprationUsers/{id}/edit','ManagementUsersController@editUsers');
    Route::put('oprationUsers/{id}/','ManagementUsersController@updateUsers');    
    Route::get('getUsers','ManagementUsersController@getUsers');
    Route::get('getApi','ManagementUsersController@getApi');
});