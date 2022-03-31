<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use GuzzleHttp\Psr7\Request;
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

Route::get('/', function () {
    return view('welcome');
});

// Home 
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/subscription', function () {
    return view('subscription');
})->name('subscription');

// //Admin Dashboard
Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('auth');
Route::get('admin', [DashboardController::class,'index'])->name('admin')->middleware('auth');

//auth update profile
Route::post('update/{id}', [AuthController::class,'update'])->name('update');
// User Excel 
Route::get('file_export', [AuthController::class, 'Export'])->name('file_export');
Route::any('file_import', [AuthController::class, 'Import'])->name('file_import');


// userList 
Route::get('admin/userView', [AdminController::class,'userList'])->name('admin.userView');

// register
Route::get('register', [RegisterController::class,'register'])->name('register');
Route::post('register', [RegisterController::class,'storeUser']);

// login
Route::get('login', [LoginController::class,'login'])->name('login');
Route::post('login', [LoginController::class,'loginUser']);
Route::get('logout', [LoginController::class,'logout'])->name('logout');

// Post 
Route::get('/',[PostController::class, 'home'])->name('home');
Route::get('post/view', [PostController::class,'view'])->name('post.view');
Route::get('post', [PostController::class,'index']);
Route::post('post', [PostController::class,'store'])->name('post');

// Post Excel 
Route::get('file-export', [PostController::class, 'fileExport'])->name('file-export');
Route::any('file-import', [PostController::class, 'fileImport'])->name('file-import');

// invoice 
Route::any('invoice', [SubscriptionController::class, 'invoice'])->name('Invoice.invoice');
// Subscription 
Route::get('subscripbe', [SubscriptionController::class, 'index'])->name('subscripbe');
Route::any('subscription/{id}', [SubscriptionController::class, 'subscribe'])->name('subscription.id');


