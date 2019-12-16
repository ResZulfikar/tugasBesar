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

Route::get('/', 'Beranda_controller@index');

//search bar
Route::get('search','Beranda_controller@search');

//about us
Route::get('about','Beranda_controller@about_us');

//route group middleware auth
Route::group(['middleware'=>'auth'], function(){
    //otomatis harus login untuk bisa masuk ke route ini
    Route::get('admin','Admin\Beranda_controller@index');
    
    Route::get('/home', function(){
        return redirect('admin');
    });

    //manage kategori
    Route::get('admin/kategori','Admin\Kategori_controller@index');

    //tambah kategori
    Route::get('admin/kategori/add','Admin\Kategori_controller@add');

    Route::post('admin/kategori/add','Admin\Kategori_controller@store');

    //edit
    Route::get('admin/kategori/{id}','Admin\Kategori_controller@edit');
    Route::put('admin/kategori/{id}','Admin\Kategori_controller@update');
    //delete
    Route::delete('admin/kategori/{id}','Admin\Kategori_controller@delete');
    
    // Manage Artikel
	Route::get('admin/artikel','Admin\Artikel_controller@index');
	Route::get('admin/artikel/add','Admin\Artikel_controller@add');
	Route::post('admin/artikel/add','Admin\Artikel_controller@store');
	Route::get('admin/artikel/{id_artikel}','Admin\Artikel_controller@edit');
	Route::put('admin/artikel/{id_artikel}','Admin\Artikel_controller@update');
    Route::delete('admin/artikel/{id_artikel}','Admin\Artikel_controller@delete');

    //manage komentar
    Route::get('admin/komentar','Admin\Komentar_controller@index');
    Route::get('hapus/komentar/{id}','Admin\Komentar_controller@delete');

    //manage user
    Route::get('admin/user','Admin\User_controller@index');
	Route::get('admin/user/add','Admin\User_controller@add');
	Route::post('admin/user','Admin\User_controller@store');
	Route::get('admin/user/{id}','Admin\User_controller@edit');
	Route::put('admin/user/{id}','Admin\User_controller@update');
	Route::delete('admin/user/{id}','Admin\User_controller@delete');
});

Route::get('keluar', function(){
    //menghapus semua histori login
    \Auth::logout();
    //auto redirect ke halaman login lagi setelah logout
    return redirect('login');
});

Auth::routes();

Route::get('detail/{artikel_id}','Beranda_controller@detail');

Route::post('komentar/{artikel_id}','Beranda_controller@komentar');

//pindah halaman berdasarkan kategori
Route::get('artikel/kategori/{kategori_id}','Beranda_controller@artikel_kategori');

