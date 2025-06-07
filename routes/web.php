<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderdetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShoppingcartController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/save-design', [ShopController::class, 'store']);

Route::get('/sitelogin', [AuthenticatedSessionController::class, 'sitelogin'])->name('sitelogin');
Route::post('/sitestore', [AuthenticatedSessionController::class, 'sitestore'])->name('sitestore');
Route::post('/register', [AuthenticatedSessionController::class, 'register'])->name('register');

Route::get('/sitelogout', [AuthenticatedSessionController::class, 'sitelogout'])->name('sitelogout.store');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
Route::patch('/updatesiteuser', [ProfileController::class, 'updatesiteuser'])->name('profile.updatesiteuser');
Route::patch('/updatesiteuserpass', [ProfileController::class, 'updatesiteuserpass'])->name('profile.updatesiteuserpass');

// Route::match(['get', 'post'], '/login', [AuthenticatedSessionController::class, 'login'])->name('sitelogin');
// Route::get('/', function () {
//     return view('dashboard');
// })->name('home');
Route::get('/contact', function () {
    return view('contact/index');
});

// Update Route Login and Register
// Route::get('/user_login', function () {
//     return view('site_login.login');
// });

Route::get('/user_login', function () {
    return view('site_login.login');
})->name('user_login');

Route::get('/user_register', function () {
    return view('site_login.register');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/thankyou', function () {
    return view('thankyou');
});

Route::get('/Order_failed', function () {
    return view('order_failed');
});

Route::get('/my_account', function () {
    return view('my_account');
});

Route::get('/my_address', function () {
    return view('my_address');
});
Route::get('/my_orders', function () {
    return view('my_orders');
});
Route::get('/my_wishlist', function () {
    return view('my_wishlist');
});
Route::get('/profile_update', function () {
    return view('profile_update');
});

// Route::get('/shop-single', function () {
//     return view('shop-single');
// });

// Route::get('/shop', function () {
//     return view('shop');

// });

Route::get('temp_login', function () {
    Auth::loginUsingId(1);

    return auth()->user()->name;
});

Route::get('temp_logout', function () {
    Auth::logout();

    return 'Logged out successfully!';
});
Route::get('/', [ShopController::class, 'index'])->name('index');
Route::get('/shop-single/{productID}', [ShopController::class, 'shopsingle'])->name('shop-single');

Route::get('/design/create/{product_id}', [ShopController::class, 'create'])->name('design.create');


Route::get('/cart', [ShoppingcartController::class, 'index'])->name('cart');
Route::resource('shoppingcart', ShoppingcartController::class);
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::post('/update_cart', [ShoppingcartController::class, 'update_cart'])->name('update_cart');
Route::resource('orderdetail', OrderdetailController::class);
Route::get('orderdetail', [OrderdetailController::class, 'index'])->name('orderdetail-page');
Route::middleware('auth')->group(function () {
    Route::post('/orderdetail', [OrderDetailController::class, 'store'])->name('orderdetail.store');

    Route::get('thankyou', [OrderdetailController::class, 'thankyou']);

    // Route::get('pagination-ajax', 'paginationAjax');
    Route::get('/pagination/fetch_data', [OrderdetailController::class, 'fetch_data']);

    Route::get('/myorders', [OrderdetailController::class, 'accountdata'])->name('accountdata');
    Route::get('/orderbilling/{orderDetailId}', [OrderdetailController::class, 'orderbilling'])->name('orderbilling');

    Route::post('/search', [ProductController::class, 'search'])->name('search');

    Route::get('/accountdata', [OrderdetailController::class, 'myorders'])->name('myorders');

    Route::get('/wishlist', [OrderdetailController::class, 'wishlist'])->name('wishlist');

    Route::get('/productsfilter', [ProductController::class, 'productsfilter'])->name('productsfilter');

});

Route::middleware('auth')->group(function () {
    Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
});

Route::middleware('auth')->group(function () {
    Route::post('/wishlist/remove/{productId}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
});

Route::post('/wishlist/toggle', [WishlistController::class, 'toggleWishlist'])->name('wishlist.toggle');

Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

// Route::post('/wishlist/remove/{productId}', 'WishlistController@removeFromWishlist')->name('wishlist.remove');

//temporary login for testing

// require __DIR__.'/auth.php';
