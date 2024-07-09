<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'allCategory')->name('allCategory');
        Route::get('/admin/add-category', 'addCategory')->name('addCategory');
    });
    Route::controller(SubcategoryController::class)->group(function () {
        Route::get('/admin/all-subcategory', 'allSubcategory')->name('allSubcategory');
        Route::get('/admin/add-subcategory', 'addSubcategory')->name('addSubcategory');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/all-product', 'allProduct')->name('allProduct');
        Route::get('/admin/add-product', 'addProduct')->name('addProduct');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/pending-order', 'pendingOrder')->name('pendingOrder');
    });
});


require __DIR__ . '/auth.php';
