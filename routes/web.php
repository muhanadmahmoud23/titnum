<?php

use App\Http\Controllers\Client\ClientHomeController;
use App\Http\Controllers\ClientRegisterController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CoachesController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SessionPaymentController;
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

Auth::routes();

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('clients', ClientsController::class);
    Route::resource('coache', CoachesController::class);
    Route::resource('register', ClientRegisterController::class);
    Route::resource('session', SessionController::class);
    Route::resource('session-payment', SessionPaymentController::class);
    Route::resource('notification', NotificationsController::class);
    Route::post('/clientImport',[ExcelController::class,'clientImport'])->name('clientImport');
});

Route::middleware('auth', 'client')->prefix('client')->group(function () {
    Route::get('/home', [ClientHomeController::class, 'index'])->name('home');
    Route::get('/schedule', [ClientHomeController::class, 'schedule'])->name('schedule');
    Route::get('/notifications', [ClientHomeController::class, 'notifications'])->name('notifications');
    Route::get('/book_services', [ClientHomeController::class, 'book_services'])->name('book_services');
    Route::get('/paidServices', [ClientHomeController::class, 'paidServices'])->name('paidServices');
    Route::get('/profile', [ClientHomeController::class, 'profile'])->name('profile');
});
