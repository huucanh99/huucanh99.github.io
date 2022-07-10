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

Route::get("/welcome",function(){
    return view('welcome');}
);
Route::get("/","QuanLyBanHang@getIndex")->name("TrangChu");

Route::get("/loai-san-pham/{loai}","QuanLyBanHang@getLoaisanpham")->name("loaisanpham");

Route::get("/chi-tiet-san-pham/{id}","QuanLyBanHang@getChitietsanpham")->name("chitietsanpham");

Route::get("/lien-he","QuanLyBanHang@getLienhe") -> name ("lienhe");
Route::get("/gioi-thieu","QuanLyBanHang@getGioithieu") -> name ("gioithieu");

Route::get('/add-to-cart/{id}','QuanLyBanHang@getAddtoCart')->name('themgiohang');
Route::get('/del-cart/{id}','QuanLyBanHang@getDelItemCart')->name('xoagiohang');

Route::get('/dat-hang','QuanLyBanHang@getCheckout')->name('dathang');
Route::post('/dat-hang','QuanLyBanHang@postCheckout')->name('dathang');

Route::get('/dang-nhap','QuanLyBanHang@getDangnhap')->name('dangnhap');
Route::post('/dang-nhap','QuanLyBanHang@postDangnhap')->name('dangnhap');

Route::get("/dangky", "QuanLyBanHang@getdangky")->name('dangky');
Route::post("/dangky", "QuanLyBanHang@postdangky")->name('dangky');

Route::get("/tim-kiem", "QuanLyBanHang@getSearch")->name('search');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
