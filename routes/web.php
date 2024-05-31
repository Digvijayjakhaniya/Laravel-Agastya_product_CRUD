<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\productController;
use App\Http\Controllers\frontview;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/',[frontview::class,'index'])->name('frontend.index');


Route::get('/admin',[loginController::class,'loginpage'])->name('admin.login.index');
Route::post('/admin/check',[loginController::class,'check'])->name('admin.login.check');
Route::get('/admin/home',[logincontroller::class,'home'])->name('admin.home.index');
Route::get('/admin/logout',[logincontroller::class,'logout'])->name('admin.home.logout');


Route::get('/admin/create-product',[productController::class,'create'])->name('admin.home.create');
Route::post('/admin/store-product',[productController::class,'store'])->name('admin.home.store');
Route::get('/admin/product/{id}/edit',[productController::class,'edit'])->name('admin.home.edit');
Route::post('/admin/product/{id}/update',[productController::class,'update'])->name('admin.home.update');
Route::get('/admin/product/{id}/delete',[productController::class,'destroy'])->name('admin.home.delete');
