<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('homepage');
});

Auth::routes();

Route::get('/about', function () {
    return view('products/about');
})->name('about');

// Customer Orders
Route::middleware(['auth'])->group(function () {
    Route::get('/my-orders', [OrderController::class, 'customerOrders'])->name('customer.orders');
    Route::get('/my-orders/{order}', [OrderController::class, 'customerOrderDetails'])->name('customer.orders.show');
    Route::post('/my-orders/{order}/cancel', [OrderController::class, 'cancelOrder'])->name('customer.orders.cancel');
});

// Admin Orders
Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
Route::get('/admin/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
Route::post('/admin/orders/{order}/accept', [AdminOrderController::class, 'accept'])->name('admin.orders.accept');
Route::post('/admin/orders/{order}/cancel', [AdminOrderController::class, 'cancel'])->name('admin.orders.cancel');
Route::delete('/admin/orders/{order}', [AdminOrderController::class, 'destroy'])->name('admin.orders.delete');

Route::get('/products/about', function () {
    return view('products.about');
})->name('products.about');

//brand page Logic
Route::get('/brands', [ProductController::class, 'index'])->name('products.index');

Route::get('/brands/Nike', function () {
    return view('brands.Nike');
})->name('brands.Nike');

Route::get('/brands/adida', function () {
    return view('brands.adida');
})->name('brands.adida');

Route::get('/brands/jordan', function () {
    return view('brands.Jordan');
})->name('brands.jordan');

Route::get('/brands/underarmour', function () {
    return view('brands.Under Armour');
})->name('brands.underarmour');

Route::get('/brands/vans', function () {
    return view('brands.Vans');
})->name('brands.vans');

Route::get('/brands/northface', function () {
    return view('brands.The North Face');
})->name('brands.northface');

Route::get('/brands/9inedouble0we', function () {
    return view('brands.9inedouble0we');
})->name('brands.9inedouble0we');

Route::get('/brands/jadeddldn', function () {
    return view('brands.Jadeddldn');
})->name('brands.jadeddldn');

Route::get('/brands/glofwang', function () {
    return view('brands.Glofwang');
})->name('brands.glofwang');

Route::get('/brands/glogangworldwide', function () {
    return view('brands.Glogangworldwide');
})->name('brands.glogangworldwide');

Route::get('/brands/racerworldwide', function () {
    return view('brands.Racerworldwide');
})->name('brands.racerworldwide');

Route::get('/brands/osbatt', function () {
    return view('brands.Osbatt');
})->name('brands.osbatt');

//Shopping Cart Logic
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
});
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
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

Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.deleteProduct');
Route::get('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.deleteProduct');
Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.store');



//contact 
use App\Http\Controllers\ContactController;

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//password change 
use App\Http\Controllers\PasswordController;

Route::get('/change-password', [PasswordController::class, 'showChangePasswordForm'])->name('password.change.form');
Route::post('/change-password', [PasswordController::class, 'changePassword'])->name('password.change');

//search bar 
Route::get('/search', [ProductController::class, 'search'])->name('product.search');

//home controller
Route::get('/home', [HomeController::class, 'index'])->name('home');