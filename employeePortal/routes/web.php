<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\EmployeeController;
use \App\Http\Controllers\ProfileController;
use \App\Http\Controllers\PasswordController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\SiteController;
use \App\Http\Controllers\CustomerRegisterController;
use \App\Http\Controllers\CustomerLoginController;

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

Route::resource('site', SiteController::class)->except('show');
Route::get('site/{product}/', [SiteController::class, 'edit'])->name('site.edit');
Route::resource('register', CustomerRegisterController::class);

Route::get('sitelogin', [CustomerLoginController::class, 'index'])->name('sitelogin.index');
Route::post('sitelogin', [CustomerLoginController::class, 'login'])->name('sitelogin.login');
Route::get('sitelogout', [CustomerLoginController::class, 'logout'])->name('sitelogin.logout');


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('products', ProductController::class);

    Route::group(['middleware' => ['useradmin']], function() {
        Route::resource('employees', EmployeeController::class);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile', [PasswordController::class, 'update'])->name('password.update');
});