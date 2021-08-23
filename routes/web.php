<?php

use App\Http\Livewire\ShopComponent;
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
Route::get('/cart', function(){ return view('cart');});
Route::get('/shop', function(){ return view('shop');});
Route::get('/detail', function(){ return view('detail');});


// Route::get('/shop', ShopComponent::class);
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('customer')->group(function () {
        Route::get('/wishlist', function(){ return view('customer/wishlist');});
        Route::get('/account', function(){ return view('customer/account');});
        Route::get('/profile-info', function(){ return view('customer/profile-info');});
        Route::get('/manage-address', function(){ return view('customer/manage-address');});
        Route::get('/change-password', function(){ return view('customer/change-password');});
    });
    Route::get('/dashboard', [App\Http\Controllers\LoginRedirectController::class, 'index'])->name('dashboard');
    Route::prefix('/users-management')->group(function(){
        Route::get('users', [App\Http\Controllers\Admin\UserManagerController::class, 'users'])->name('users-management.users');
        Route::resource('roles', App\Http\Controllers\Admin\RolesController::class);
        Route::get('permissions', [App\Http\Controllers\Admin\UserManagerController::class, 'permissions'])->name('users-management.permissions');

    });
    Route::prefix('/products')->name('products.')->group(function () {
        Route::get('list', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('list');
        Route::get('categories', [App\Http\Controllers\Admin\ProductsController::class, 'categories'])->name('categories');
        Route::get('units', [App\Http\Controllers\Admin\ProductsController::class, 'units'])->name('units');
    });
});

