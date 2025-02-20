<?php

use App\Http\Controllers\AdminOrdersController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth')->group(function () {

// Route::group(['middleware' => ['auth', 'adminauth']], function () {

// Route::middleware(['auth', 'user-access:admin'])->group(function () {
Route::middleware('is_admin')->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/admin/login', function () {
        return view('auth.login');
    });
    Route::get('/signup', function () {
        return view('signup');
    });

    Route::get('/dashboard', [AdminOrdersController::class, 'dashboard'])->name('dashboard');

    Route::get('/orders', [AdminOrdersController::class, 'index'])->name('order_index');
    // Route::get('/orderedit/{orderId}', [AdminOrdersController::class, 'orderedit'])->name('orderedit');

    Route::post('/orderedit/{id}', [AdminOrdersController::class, 'orderedit'])->name('orderedit');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    Route::get('/signin', function () {
        return view('signin');
    });

    Route::get('/users', function () {
        return view('users');
    });
    Route::get('/add_user', function () {
        return view('add_user');
    });
    Route::get('/settings', function () {
        return view('settings');
    });
    Route::resource('product_category', ProductCategoriesController::class);
    Route::resource('product', ProductController::class);

});
require __DIR__.'/auth.php';
