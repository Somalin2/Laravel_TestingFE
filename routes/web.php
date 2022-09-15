<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ContactUsFormController;

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
Route::get('/test1', function () {
    return "Hello test1";
});
Route::get('/test2', function () {
    return "Hello test2";
});
Route::get('/test3', function () {
    return "Hello TEST3";
});
Route::get('/test4',[TestController::class,'index']);

Route::get('/test5', function () {
    return view('test5');
});

Route::get('/test6',[TestController::class,'list']);

Route::get('/admin', function () {
    return view('admin.index');
});
Route::resource('/category', CategoryController::class);

Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::get('/product/{product}',[ProductController::class,'show'])->name('product.show');
Route::delete('/product/{product}',[ProductController::class,'destroy'])->name('product.destroy');
Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{product}',[ProductController::class,'update'])->name('product.update');

// Route::get('/admin/login', [AdminController::class, 'index'])->name('admin.login');
// Route::post('/admin/post-login', [AdminController::class, 'postLogin'])->name('admin.login.post');
// Route::get('/admin', [AdminController::class,'dashboard'])->name('admin.dashboard');
// Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// login and register
Route::get('/admin/login', [AdminController::class, 'index'])->name('admin.login');
Route::post('/admin/post-login', [AdminController::class, 'postLogin'])->name('admin.login.post');
Route::get('/admin/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Frontend
Route::get('/',[FrontendController::class,'index']);
Route::get('/show/{product}',[FrontendController::class,'show']);
Route::get('/frontend/category/{category}', [FrontendController::class,'getByCategory']);
Route::get('/frontend/search/', [FrontendController::class,'getBySearch']);

Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

