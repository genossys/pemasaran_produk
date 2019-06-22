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


Route::get('/keranjang', function () {
    return view('/umum/keranjang');
})->name('keranjang');

Route::get('/getDataKeranjang', 'Transaksi\KeranjangController@getDataKeranjang');



Route::get('/pembayaran', function () {
    return view('/umum/pembayaran');
})->name('pembayaran');


Route::get('/registermember', 'Master\memberController@showFormRegistrasi');
Route::post('/postRegister', 'Master\memberController@register')->name('registermember');

//Login Admin dan Member
Route::get('/login','Auth\LoginController@login')->name('login');
Route::post('/postlogin','Auth\LoginController@postlogin');
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'product'], function(){
    Route::get('/', 'Master\productController@index')->name('product');
    Route::post('/simpanProduct', 'Transaksi\KeranjangController@insert');
    
});


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
                Route::post('/editUser', 'Master\userController@editUser');
                Route::post('/editPassword', 'Master\userController@editPassword');
                Route::delete('/deleteUser', 'Master\userController@delete');
            });

            Route::group(['prefix' => 'member'], function(){
                Route::get('/', 'Master\memberController@index')->name('pagemember');
                Route::get('/dataMember', 'Master\memberController@getDataMember');
                Route::delete('/hapusMember', 'Master\memberController@delete');
            });

            Route::group(['prefix' => 'kategori'], function(){
                Route::get('/', 'Master\kategoriController@index')->name('pagekategori');
                Route::get('/dataKategori', 'Master\kategoriController@getDatakategori');
                Route::post('/simpankategori', 'Master\kategoriController@insert');
                Route::post('/editkategori', 'Master\kategoriController@edit');
                Route::delete('/deletekategori', 'Master\kategoriController@delete');
            });
            Route::group(['prefix' => 'satuan'], function(){
                Route::get('/', 'Master\satuanController@index')->name('pagesatuan');
                Route::get('/dataSatuan', 'Master\satuanController@getDataSatuan');
                Route::post('/simpanSatuan', 'Master\satuanController@insert');
                Route::post('/editSatuan', 'Master\satuanController@edit');
                Route::delete('/deleteSatuan', 'Master\satuanController@delete');
            });

            Route::group(['prefix' => 'product'], function(){
                Route::get('/', 'Master\productController@masterProduct')->name('pageproduct');
                Route::get('/dataSatuan', 'Master\productController@getDataSatuan');
                Route::get('/dataKategori', 'Master\productController@getDatakategori');
                Route::get('/getDataProduct', 'Master\productController@getDataproduct');
                Route::post('/simpanDataProduct','Master\productController@insert');
                Route::post('/editProduct','Master\productController@edit');
                Route::post('/editPromo', 'Master\productController@editpromo');
                Route::delete('/deleteProduct','Master\productController@delete');

            });

    });

    

Route::get('/kategori', function () {
    return view('/admin/master/datakategori');
})->name('kategori');




});

