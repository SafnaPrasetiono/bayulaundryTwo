<?php

use App\Http\Controllers\LogoutHandlerController;
use App\Http\Middleware\adminAuthenticate;
use App\Http\Middleware\userAuthenticate;
use App\Livewire\Admin\Account\AdminAccountCreate;
use App\Livewire\Admin\Account\AdminAccountData;
use App\Livewire\Admin\Account\AdminAccountDetail;
use App\Livewire\Admin\Account\AdminAccountUpdate;
use App\Livewire\Admin\Home\Dashboard;
use App\Livewire\Admin\Order\AdminOrder;
use App\Livewire\Admin\Order\AdminOrderDetail;
use App\Livewire\Admin\Pages\ContentHomePages;
use App\Livewire\Admin\Payment\AdminPaymentMethod;
use App\Livewire\Admin\Product\Commerce\AdminProductCommerceCreate;
use App\Livewire\Admin\Product\Commerce\AdminProductCommerceData;
use App\Livewire\Admin\Product\Commerce\AdminProductCommerceDetail;
use App\Livewire\Admin\Product\Commerce\AdminProductCommerceUpdate;
use App\Livewire\Admin\Product\Laundry\AdminProductLaundryCreate;
use App\Livewire\Admin\Product\Laundry\AdminProductLaundryData;
use App\Livewire\Admin\Product\Laundry\AdminProductLaundryDetail;
use App\Livewire\Admin\Product\Laundry\AdminProductLaundryUpdate;
use App\Livewire\Admin\Profile\AdminProfile;
use App\Livewire\Auth\AdminLogin;
use App\Livewire\Auth\UserLogin;
use App\Livewire\Auth\UserRegister;
use App\Livewire\Pages\Aboutme;
use App\Livewire\Pages\Howtopayment;
use App\Livewire\Pages\IndexPages;
use App\Livewire\Pages\Privacy;
use App\Livewire\Pages\Termcondition;
use App\Livewire\Auth\UserActivation;
use App\Livewire\Pages\checkout\Checkout;
use App\Livewire\Pages\ShoppingCart;
use App\Livewire\User\UserAddresses;
use App\Livewire\User\UserOrders;
use App\Livewire\User\UserOrdersDetail;
use App\Livewire\User\UserProfile;
use Illuminate\Support\Facades\Route;



Route::get('/', IndexPages::class)->name('index');
Route::get('/home', IndexPages::class)->name('index');
Route::get('/about', Aboutme::class)->name('about');
Route::get('/privasi', Privacy::class)->name('privacy');
Route::get('/cara_pemesanan', Howtopayment::class)->name('howpayment');
Route::get('/term&condition', Termcondition::class)->name('termcondition');




//ROUTING ORDER
Route::get('/pemesanan-produk', ShoppingCart::class)->name('order');
Route::get('/pemesanan-produk/checkout', Checkout::class)->name('checkout');




// ROUTING_USERS
Route::get('/login', UserLogin::class)->name('login');
Route::get('/signup', UserRegister::class)->name('signup');
Route::get('/signup/active/{email}/{vkey}', UserActivation::class)->name('signup.activasi');
Route::prefix('user')->middleware([userAuthenticate::class])->group(function () {
    Route::get('/account/profile', UserProfile::class)->name('user.profile');
    Route::get('/account/address', UserAddresses::class)->name('user.address');

    Route::get('/pesanan-saya', UserOrders::class)->name('user.orders');
    Route::get('/pesanan-saya/{inv}', UserOrdersDetail::class)->name('user.orders.detail');

    // LOGOUT
    Route::get('/logout', [LogoutHandlerController::class, 'LogoutUser'])->name('user.logout');
});







// ROUTING_ADMIN
Route::get('/admin/login', AdminLogin::class)->name('admin.login');
Route::prefix('admin')->middleware(adminAuthenticate::class)->group(function () {
    // DASHBOARD
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');

    // PROFILE_ADMIN
    Route::get('/profile', AdminProfile::class)->name('admin.profile');

    // ACCOUNT_ADMIN
    Route::get('/account', AdminAccountData::class)->name('admin.account');
    Route::get('/account/data', AdminAccountData::class)->name('admin.account.data');
    Route::get('/account/create', AdminAccountCreate::class)->name('admin.account.create');
    Route::get('/account/detail/{id}/{slug}', AdminAccountDetail::class)->name('admin.account.detail');
    Route::get('/account/update/{id}/{slug}', AdminAccountUpdate::class)->name('admin.account.update');

    // PRODUCT_LAUNDRY
    Route::get('/product/laundry', AdminProductLaundryData::class)->name('admin.product.laundry');
    Route::get('/product/laundry/data', AdminProductLaundryData::class)->name('admin.product.laundry.data');
    Route::get('/product/laundry/create', AdminProductLaundryCreate::class)->name('admin.product.laundry.create');
    Route::get('/product/laundry/detail/{id}/{slug}', AdminProductLaundryDetail::class)->name('admin.product.laundry.detail');
    Route::get('/product/laundry/update/{id}/{slug}', AdminProductLaundryUpdate::class)->name('admin.product.laundry.update');

    // PRODUCT_COMMERCE
    Route::get('/product/commerce', AdminProductCommerceData::class)->name('admin.product.commerce');
    Route::get('/product/commerce/data', AdminProductCommerceData::class)->name('admin.product.commerce.data');
    Route::get('/product/commerce/create', AdminProductCommerceCreate::class)->name('admin.product.commerce.create');
    Route::get('/product/commerce/detail/{id}/{slug}', AdminProductCommerceDetail::class)->name('admin.product.commerce.detail');
    Route::get('/product/commerce/update/{id}/{slug}', AdminProductCommerceUpdate::class)->name('admin.product.commerce.update');

    // PAYMENT_METHOD
    Route::get('/payment/method', AdminPaymentMethod::class)->name('admin.payment.method');

    // ORDERS
    Route::get('/orders', AdminOrder::class)->name('admin.order');
    Route::get('/orders/{id}/{inv}', AdminOrderDetail::class)->name('admin.order.detail');


    // PAGES
    Route::get('/pages/home-content', ContentHomePages::class)->name('admin.pages.home');


    // LOGOUT
    Route::get('/logout', [LogoutHandlerController::class, 'LogoutAdmin'])->name('admin.logout');
});
