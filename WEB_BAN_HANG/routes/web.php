<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TheloaiController;
use App\Http\Controllers\Admin\SanphamController;
use App\Http\Controllers\Admin\DonhangController;
use App\Http\Controllers\Admin\DanhsachdonhangController;
use App\Http\Controllers\WebsiteController;
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

Route::group(['prefix' => 'admin'],function(){
    Route::resource('theloai',TheloaiController::class);
    Route::resource('sanpham',SanphamController::class);
    Route::resource('donhang',DonhangController::class);
    Route::resource('danhsach',DanhsachdonhangController::class);
});
Route::group(['prefix'=>'website'],function(){
    Route::get('trangchu',[WebsiteController::class,'index'])->name('trangchu');
    Route::get('chitiet/{id}',[WebsiteController::class,'chitiet'])->name('chitiet');
    Route::get('addCart/{id}',[WebsiteController::class,'addCart'])->name('addCart');
    Route::get('getCart',[WebsiteController::class,'getCart'])->name('getCart');
});
