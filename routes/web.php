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
Auth::routes();

Route::get('/', function () {
    return view('umum/welcome');
});

Route::get('/keranjang', function () {
    return view('/umum/keranjang');
})->name('keranjang');


Route::get('/pembayaran', function () {
    return view('/umum/pembayaran');
})->name('pembayaran');


Route::get('/product','Master\productController@index')->name('product');



//member register
Route::get('/registermember', 'Auth\RegisterMemberController@index');
Route::post('/postRegister', 'Auth\RegisterMemberController@register')->name('register');

//Login
Route::get('/login','Auth\LoginController@login')->name('login');
Route::post('/postlogin','Auth\LoginController@postlogin');
Route::get('/logout','Auth\LoginController@logout')->name('logout');



Route::group(['middleware' => 'auth'],function(){

    Route::group(['prefix' => 'admin', 'middleware' => 'hakakses:pimpinan|admin'], function(){

        Route::get('/', function () {
            return view('/admin/menuawal');
        })->name('admin');

            Route::group(['prefix' => 'user'], function(){
                Route::get('/dataUser','Master\userController@getDataUser');
                Route::post('/simpanUser','Auth\RegisterController@register');
            });

            Route::group(['prefix' => 'satuan'], function(){

            });

            Route::group(['prefix' => 'product'], function(){

            });

    });




Route::get('/produk', function () {
    return view('/admin/master/dataproduk');
})->name('produk');

Route::get('/user', function () {
    return view('/admin/master/datauser');
})->name('user');

Route::get('/kategori', function () {
    return view('/admin/master/datakategori');
})->name('kategori');




});

