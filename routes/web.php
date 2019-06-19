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

//menampilkan halaman utama
Route::get('/', function () {
    return view('umum/welcome');
});

Route::get('/product', function () {
    return view('/admin/master/product');
})->name('product');


Route::get('/keranjang', function () {
    return view('/admin/master/keranjang');
})->name('keranjang');



Route::get('/pembayaran', function () {
    return view('/admin/master/pembayaran');
})->name('pembayaran');


Route::get('/registermember', 'Master\memberController@showFormRegistrasi');
Route::post('/postRegister', 'Master\memberController@register')->name('registermember');

//Login Admin dan Member
Route::get('/login','Auth\LoginController@login')->name('login');
Route::post('/postlogin','Auth\LoginController@postlogin');
Route::get('/logout','Auth\LoginController@logout')->name('logout');

//Route yang bisa di akses setelah melakukan login
Route::group(['middleware' => 'auth'],function(){

    //Route yang hanya bisa di akses oleh pimpinan atau admin
    Route::group(['prefix' => 'admin', 'middleware' => 'hakakses:pimpinan|admin'], function(){

        Route::get('/', function () {
            return view('/admin/menuawal');
        })->name('admin');

            Route::group(['prefix' => 'user'], function(){
                Route::get('/','Master\userController@index')->name('pageuser');
                Route::get('/dataUser','Master\userController@getDataUser');
                Route::post('/simpanUser', 'Master\userController@addUser');
            });

            Route::group(['prefix' => 'member'], function(){
                Route::get('/', 'Master\memberController@index')->name('pagemember');
                Route::get('/dataMember', 'Master\memberController@getDataMember');
            });

            Route::group(['prefix' => 'satuan'], function(){
                Route::get('/','Master\satuanController@index')->name('pagesatuan');
                Route::get('/dataSatuan','Master\satuanController@getDataSatuan');
            });

            Route::group(['prefix' => 'product'], function(){
                Route::get('/', 'Master\productController@index');

            });

    });




Route::get('/produk', function () {
    return view('/admin/master/dataproduk');
})->name('produk');


Route::get('/kategori', function () {
    return view('/admin/master/datakategori');
})->name('kategori');




});

