<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Client\Productontroller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/myAcc', [HomeController::class, 'myAcc'])->name('auth.acc')->middleware(['auth']);
Route::get('/hdDetail/{id}', [HomeController::class, 'hdDetail'])->name('hd.hdDetail');
Route::get('/confirmOrder/{id}', [HomeController::class, 'confirmOrder'])->name('hd.confirmOrder');

Route::resource('products', Productontroller::class);
// Auth::routes();

Route::get('auth/login', [LoginController::class, 'showFormLogin'])->name('login');
Route::post('auth/login', [LoginController::class, 'login']);

Route::post('auth/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('auth/register', [RegisterController::class, 'showFormRegister'])->name('register');
Route::post('auth/register', [RegisterController::class, 'register']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// mua bán hàng
Route::any('cart/list', [CartController::class, 'list'])->name('cart.list');
Route::get('order/checkout', [CartController::class, 'checkout'])->name('order.checkout');
Route::post('order/save', [CartController::class, 'save'])->name('order.save');
// xử lý dữ liệu thanh toán online
Route::get('vnpay/payment', [CartController::class, 'payment'])->name('vnpay.payment');