<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\AdminReturnController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;


Route::get('/', function () {
    return view('homepage');
});

Auth::routes();

Route::middleware([CheckAdmin::class])->group(function () {
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/admin/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::post('/admin/orders/{order}/accept', [AdminOrderController::class, 'accept'])->name('admin.orders.accept');
    Route::post('/admin/orders/{order}/cancel', [AdminOrderController::class, 'cancel'])->name('admin.orders.cancel');
    Route::delete('/admin/orders/{order}', [AdminOrderController::class, 'destroy'])->name('admin.orders.delete');
    Route::get('/admin/products/{id}/edit-stock', [ProductController::class, 'editStock'])->name('admin.editStock');
    Route::put('/admin/products/{id}/update-stock', [ProductController::class, 'updateStock'])->name('admin.updateStock');
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{id}', [AdminController::class, 'viewUser'])->name('admin.viewUser');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.createProduct');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.deleteProduct');
    Route::get('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.deleteProduct');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.store');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.editProduct');
    Route::post('/admin/products/{id}/update', [ProductController::class, 'update'])->name('admin.updateProduct');
    Route::post('/admin/products/{id}/add-image', [ProductController::class, 'addImage'])->name('admin.addProductImage');
    Route::delete('/admin/products/{id}/remove-image', [ProductController::class, 'removeImage'])->name('admin.removeProductImage');
    Route::get('/admin/returns', [AdminReturnController::class, 'index'])->name('admin.returns.index');
    Route::get('/admin/returns/{returnRequest}', [AdminReturnController::class, 'show'])->name('admin.returns.show');
    Route::post('/admin/returns/{returnRequest}/accept', [AdminReturnController::class, 'accept'])->name('admin.returns.accept');
    Route::post('/admin/returns/{returnRequest}/reject', [AdminReturnController::class, 'reject'])->name('admin.returns.reject');
    Route::post('/admin/returns/{returnRequest}/received', [AdminReturnController::class, 'markAsReceived'])->name('admin.returns.received');
});

Route::get('/about', function () {
    return view('products/about');
})->name('about');

// Customer Orders
Route::middleware(['auth'])->group(function () {
    Route::get('/my-orders', [OrderController::class, 'customerOrders'])->name('customer.orders');
    Route::get('/my-orders/{order}', [OrderController::class, 'customerOrderDetails'])->name('customer.orders.show');
    Route::post('/my-orders/{order}/cancel', [OrderController::class, 'cancelOrder'])->name('customer.orders.cancel');

    Route::get('/customer/profile', [CustomerController::class, 'edit'])->name('customer.editProfile');
    Route::put('/customer/profile/{id}', [CustomerController::class, 'updateProfile'])->name('customer.updateProfile');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::put('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');

    Route::get('/checkoutPage', [CartController::class, 'checkoutPage'])->name('cart.checkoutPage'); 
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout'); 

    Route::get('/orders/{order}/returns', [ReturnController::class, 'showReturnPage'])->name('customer.orders.returns');
Route::post('/orders/{order}/returns', [ReturnController::class, 'processReturn'])->name('customer.orders.process_return');
});

// Admin Orders



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
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/reviews/{id}', [ProductReviewController::class, 'show'])->name('reviews.show');
Route::get('/reviews/{id}/create', [ProductReviewController::class, 'create'])->name('reviews.create')->middleware('auth');
Route::post('/reviews', [ProductReviewController::class, 'store'])->name('reviews.store')->middleware('auth');





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

//change passowrd controller
use App\Http\Controllers\Auth\ChangePasswordController;

Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/change-password', [ChangePasswordController::class, 'updatePassword'])->name('password.update');


//wishlist
use App\Http\Controllers\WishlistController;

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/add/{productId}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::delete('/wishlist/remove/{productId}', [WishlistController::class, 'removeFromWishlist'])
    ->name('wishlist.remove');




