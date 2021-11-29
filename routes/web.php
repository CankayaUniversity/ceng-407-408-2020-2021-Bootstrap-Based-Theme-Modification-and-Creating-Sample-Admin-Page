<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [DashboardController::class, 'home'])->name('home');
Route::get('home', [DashboardController::class, 'home'])->name('home');
// Route Components
Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->name('layout-full');
Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');


// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);


Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [AuthenticationController::class, 'login_cover'])->name('auth-login');
    Route::get('register', [AuthenticationController::class, 'register_cover'])->name('auth-register');
    Route::get('forgot-password', [AuthenticationController::class, 'forgot_password_cover'])->name('auth-forgot-password');
    Route::get('reset-password', [AuthenticationController::class, 'reset_password_cover'])->name('auth-reset-password');
    Route::get('verify-email', [AuthenticationController::class, 'verify_email_cover'])->name('auth-verify-email');
    Route::get('two-steps', [AuthenticationController::class, 'two_steps_cover'])->name('auth-two-steps');
});