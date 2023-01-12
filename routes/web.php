<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::group(['middleware' => ['role:super_admin']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    // user
    Route::get('/user', 'SuperAdmin\UserController@index')->name('user');
    Route::post('/user_store', 'SuperAdmin\UserController@store');
    Route::get('/user_edit/{id}', 'SuperAdmin\UserController@edit')->name('user_edit');
    Route::post('/user/update', 'SuperAdmin\UserController@update');
    Route::delete('/user/delete', 'SuperAdmin\UserController@destroy')->name('user_delete');
    // end
    // kategori
    Route::get('/categories', 'SuperAdmin\CategoryController@index')->name('categories');
    Route::post('/kategori_store', 'SuperAdmin\CategoryController@store');
    Route::get('/kategori_edit/{id}', 'SuperAdmin\CategoryController@edit')->name('kategori_edit');
    Route::post('/kategori/update', 'SuperAdmin\CategoryController@update');
    Route::delete('/kategori/delete', 'SuperAdmin\CategoryController@destroy')->name('kategori_delete');
    // end
    // produk
    Route::get('/produk', 'SuperAdmin\ProductController@index')->name('produk');
    Route::post('/store', 'SuperAdmin\ProductController@store');
    Route::get('/produk_edit/{id}', 'SuperAdmin\ProductController@edit')->name('produk_edit');
    Route::post('/produk/update', 'SuperAdmin\ProductController@update');
    Route::delete('/produk/delete', 'SuperAdmin\ProductController@destroy')->name('produk_delete');
    // end
    // stok
    Route::get('/stok_barang', 'SuperAdmin\StockController@index')->name('stok_barang');
    Route::post('/stok_store', 'SuperAdmin\StockController@store');
    Route::get('/edit_stok/{id}', 'SuperAdmin\StockController@edit')->name('edit_stok');
    Route::post('/stok/update', 'SuperAdmin\StockController@update');
    Route::get('stok/ajax/{id}', 'SuperAdmin\StockController@stok_ajax')->name('stok.ajax');
    // end
    // toko1
    Route::get('/toko1', 'SuperAdmin\Toko1Controller@toko1')->name('toko1');
    Route::get('toko1/ajax/{id}', 'SuperAdmin\Toko1Controller@toko1_ajax')->name('toko1.ajax');
    Route::post('/toko1_store', 'SuperAdmin\Toko1Controller@store1');
    // end
    // toko2
    Route::get('/toko2', 'SuperAdmin\Toko2Controller@toko2')->name('toko2');
    Route::get('toko2/ajax/{id}', 'SuperAdmin\Toko2Controller@toko2_ajax')->name('toko2.ajax');
    Route::post('/toko2_store', 'SuperAdmin\Toko2Controller@store2');
    // end
    // toko3
    Route::get('/toko3', 'SuperAdmin\Toko3Controller@toko3')->name('toko3');
    Route::get('toko3/ajax/{id}', 'SuperAdmin\Toko3Controller@toko3_ajax')->name('toko3.ajax');
    Route::post('/toko3_store', 'SuperAdmin\Toko3Controller@store3');
    // end
    // toko4
    Route::get('/toko4', 'SuperAdmin\Toko4Controller@toko4')->name('toko4');
    Route::get('toko4/ajax/{id}', 'SuperAdmin\Toko4Controller@toko4_ajax')->name('toko4.ajax');
    Route::post('/toko4_store', 'SuperAdmin\Toko4Controller@store4');
    // end
    // toko5
    Route::get('/toko5', 'SuperAdmin\Toko5Controller@toko5')->name('toko5');
    Route::get('toko5/ajax/{id}', 'SuperAdmin\Toko5Controller@toko5_ajax')->name('toko5.ajax');
    Route::post('/toko5_store', 'SuperAdmin\Toko5Controller@store5');
    // end
});
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard', 'HomeController@admin')->name('dashboard');
});
