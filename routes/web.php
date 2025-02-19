<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\OrderController;


Route::get('/', function () {
    return view('homepage');
});

Auth::routes();

Route::get('/aboutus') -> name('products.about');

//Shopping Cart Logic
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout')->middleware('auth');


//Product Page Logic
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

//admin
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.createProduct');
Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.store');
Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.deleteProduct');
Route::get('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.deleteProduct');
Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::get('/admin/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
Route::post('/admin/orders/{order}/accept', [OrderController::class, 'accept'])->name('admin.orders.accept');
Route::post('/admin/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('admin.orders.cancel');



//contact 
use App\Http\Controllers\ContactController;

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
