<?php

use App\Http\Controllers\admin\home\Dashboard;
use App\Http\Controllers\admin\settings\Settings;
use App\Http\Controllers\admin\store\Store;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\landing\UserLanding;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CustomerMiddleware;
use App\Http\Middleware\signinMiddleware;
use App\Http\Middleware\signoutMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/admin_anitialization',[AuthController::class,'admin_anitialization'])->name('admin_anitialization');
Route::get('/', function () {
    return redirect()->route('sign-in');
})->name('home');
Route::prefix('/Auth')->middleware([signinMiddleware::class])->group(function (){
    Route::get('/sign-in',[AuthController::class,'sign_in_page'])->name('sign-in_page');
    Route::post('/sign-in',[AuthController::class,'sign_in'])->name('sign-in');
    Route::get('/sign-up',[AuthController::class,'sign_up_page'])->name('sign-up_page');
    Route::post('/sign-up',[AuthController::class,'sign_up'])->name('sign-up');
    Route::get('/forgot-password',[AuthController::class,'forgot_password_page'])->name('forgot-password_page');
    Route::post('/forgot-password',[AuthController::class,'forgot_password'])->name('forgot-password');
    Route::get('/reset-password/{token}',[AuthController::class,'reset_password_page'])->name('reset_password_page');
    Route::post('/reset-password',[AuthController::class,'reset_password'])->name('reset-password');
});
Route::prefix('/Auth')->middleware([signoutMiddleware::class])->group(function (){
    Route::get('/sign-out',[AuthController::class,'sign_out_page'])->name('sign-out_page');
});
Route::prefix('/landing')->middleware(CustomerMiddleware::class)->group(function () {
    Route::get('/index',[UserLanding::class,'home'])->name('homepage');
    Route::get('/product-details',[UserLanding::class,'product_details'])->name('product-details');
    Route::get('/fav',[UserLanding::class,'fav'])->name('fav');
    Route::get('/cart',[UserLanding::class,'cart'])->name('cart');
    Route::get('/products-filter',[UserLanding::class,'products_filter'])->name('product-filter');
    Route::get('/wishlist',[UserLanding::class,'wishlist'])->name('wishlist');
    Route::get('/shipping-info',[UserLanding::class,'shipping_info'])->name('shipping-info');
    Route::get('/checkout',[UserLanding::class,'checkout'])->name('checkout');
    Route::get('/order-tracking',[UserLanding::class,'order_tracking'])->name('order-tracking');
});
Route::prefix('/admin/home')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/dashboard',[Dashboard::class,'dashboard'])->name('dashboard');
});
Route::prefix('/admin/store')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/add-product',[Store::class,'add_product_page'])->name('add-product');
    Route::post('/add-product',[Store::class,'add_product'])->name('add-product');
    Route::post('/draft-product',[Store::class,'draft_product'])->name('draft-product');
    Route::post('/discard-product',[Store::class,'discard_product'])->name('discard-product');
    Route::post('/add-product-pics',[Store::class,'add_product_pics'])->name('add-porduct-pics');
    Route::delete('/product-image/{id}', [Store::class, 'deleteImage']);
    Route::get('/product',[Store::class,'product'])->name('product');
    Route::get('/fetch/products/{productType}', [Store::class, 'fetch_product_all'])->name('admin.products.index');
    Route::get('/edit/product/{id}', [Store::class, 'edit_product'])->name('admin.products.edit');
    Route::get('/customer',[Store::class,'customer'])->name('customer');
    Route::get('/customer-details',[Store::class,'customer_details'])->name('customer-details');
    Route::get('/order',[Store::class,'order'])->name('order');
    Route::get('/order-details',[Store::class,'order_details'])->name('order-details');
    Route::get('/refund',[Store::class,'refund'])->name('refund');
});
Route::prefix('/admin/settings')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/add-new-category',[Settings::class,'add_new_category_page'])->name('add-new-category-page');
    Route::post('/add-new-category',[Settings::class,'add_new_category'])->name('add-new-category');
});