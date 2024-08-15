<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Frontend\ClientController;
use App\Http\Controllers\Frontend\HomeController;
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


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});
Route::controller(ClientController::class)->group(function () {
    Route::get('/category', 'category')->name('category');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/single-product/{id}/{slug}', 'singleProduct')->name('singleProduct');
    Route::get('/category/{id}/{slug}', 'categoryPage')->name('category');
});

Route::middleware(['auth', 'role:user', 'verified'])->group(function () {
    Route::controller(ClientController::class)->group(function () {
        Route::get('/add-to-cart', 'addToCart')->name('addToCart');
        Route::post('/add-product-to-cart', 'addProductToCart')->name('addProductToCart');
        Route::get('remove-cart-item/{id}', 'removeCartItem')->name('removeCartItem');
        Route::get('get-shipping-address', 'shippingAddress')->name('shippingAddress');
        Route::post('add-shipping-address', 'addShippingAddress')->name('addShippingAddress');
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::post('place-order', 'placeOrder')->name('placeOrder');
        Route::get('/user-profile', 'userProfile')->name('userProfile');
        Route::get('/pending-orders', 'pendingOrders')->name('pendingOrders');
        // Aamerpay payment
        Route::get('payment', [\App\Http\Controllers\paymentController::class, 'payment'])->name('payment');

        //You need declear your success & fail route in "app\Middleware\VerifyCsrfToken.php"
        Route::post('success', [\App\Http\Controllers\paymentController::class, 'success'])->name('success');
        Route::post('fail', [\App\Http\Controllers\paymentController::class, 'fail'])->name('fail');
        Route::get('cancel', [\App\Http\Controllers\paymentController::class, 'cancel'])->name('cancel');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('adminDashboard');
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'allCategory')->name('allCategory');
        Route::get('/admin/add-category', 'addCategory')->name('addCategory');
        Route::post('/admin/store-category', 'storeCategory')->name('storeCategory');
        Route::get('/admin/edit-category/{id}', 'editCategory')->name('editCategory');
        Route::post('/admin/update-category', 'updateCategory')->name('updateCategory');
        Route::get('/admin/delete-category/{id}', 'deleteCategory')->name('deleteCategory');
    });
    Route::controller(SubcategoryController::class)->group(function () {
        Route::get('/admin/all-subcategory', 'allSubcategory')->name('allSubcategory');
        Route::get('/admin/add-subcategory', 'addSubcategory')->name('addSubcategory');
        Route::post('/admin/store-subcategory', 'storeSubcategory')->name('storeSubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'editSubcategory')->name('editSubcategory');
        Route::post('/admin/update-subcategory', 'updateSubcategory')->name('updateSubcategory');
        Route::get('/admin/delete-subcategory/{id}', 'deleteSubcategory')->name('deleteSubcategory');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/all-product', 'allProduct')->name('allProduct');
        Route::get('/admin/add-product', 'addProduct')->name('addProduct');
        Route::post('/admin/store-product', 'storeProduct')->name('storeProduct');
        Route::get('/admin/edit-product/{id}', 'editProduct')->name('editProduct');
        Route::post('/admin/update-product', 'updateProduct')->name('updateProduct');
        Route::get('/admin/edit-image/{id}', 'editImage')->name('editImage');
        Route::post('/admin/update-image', 'updateImage')->name('updateImage');
        Route::get('/admin/delete-product/{id}', 'deleteProduct')->name('deleteProduct');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/pending-order', 'pendingOrder')->name('pendingOrder');
        Route::post('/admin/confirm-order/{id}', 'confirmOrder')->name('confirmOrder');
        Route::get('/admin/confirmed-order', 'approvedOrder')->name('approvedOrder');
        Route::get('/admin/invoice/view/{id}', 'invoice')->name('viewInvoice');
        Route::get('/admin/generate-invoice/{id}', 'generateInvoice')->name('generateInvoice');
    });
});


require __DIR__ . '/auth.php';
