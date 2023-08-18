<?php

use App\Http\Middleware\IsHotelAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\FlutterwaveController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HotelsController::class, 'index'])->name('index');
    Route::get('/hotels/{hotel}', [HotelsController::class, 'view'])->name('hotels.view');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
    Route::get('/rooms/{room}', [HotelsController::class, 'room'])->name('rooms.view');
    Route::post('/rooms/{room}/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
    Route::get('/rooms/{room}/pay/callback', [FlutterwaveController::class, 'callback'])->name('pay.callback');
    Route::get('/invoice/{booking}', [BookingController::class, 'invoice'])->name('invoice');
    Route::get('/transactions', [BookingController::class, 'transactions'])->name('transactions');
    Route::get('/search', [HotelsController::class, 'search'])->name('search');
    Route::middleware([IsHotelAdmin::class])->group(function () {
        Route::get('/admin/rooms', [HotelsController::class, 'adminRooms'])->name('admin.rooms');
        Route::get('/dashboard', [HotelsController::class, 'dashboard'])->name('dashboard');
    });
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forget_password');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/lang/{lang}', [LanguageController::class, 'switchLang'])->name('switch_lang');
Route::get('/pagination-per-page/{per_page}', [PaginationController::class, 'set_pagination_per_page'])->name('pagination_per_page');
