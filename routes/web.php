<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'Front\FrontController@index')->name('index');
// Route::get('/products/{slug?}', function () {return view('frontend/pages/products');});
// Route::get('/category', function () {
//     return view('frontend/pages/category');
// });

// Route::get('/category', 'CategoryController@category')->name('category');


Route::group(['namespace' => 'Front'], function () {
    //social login
    Route::get ( '/redirect/{service}', 'SocialAuthController@redirect');
    Route::get ( '/callback/{service}', 'SocialAuthController@callback' );
    //footer
    Route::get('about', 'FooterController@about')->name('about');
    Route::get('refund-policy', 'FooterController@refund')->name('refund');
    Route::get('privacy-policy', 'FooterController@privacy')->name('privacy');
    Route::get('faq', 'FooterController@faq')->name('faq-page');
    Route::post('search-results', 'SearchController@search_results')->name('search-results');
    //cart details//
    Route::get('/product-details/{slug?}', 'CategoryController@product_details')->name('product-details');
    Route::get('/category/{slug?}', 'CategoryController@product_list')->name('product-list');
    Route::get('/brand/{slug?}', 'CategoryController@brand_list')->name('brand-list');
    Route::get('/popular-products', 'CategoryController@popular_products')->name('popular-products');
    Route::post('/cart', 'CartController@add_cart')->name('cart-add');
    Route::get('/cart-filter', 'CartController@cart_filter')->name('cart-filter');
    Route::get('/cart-page', 'CartController@cart_item')->name('cart-item');
    Route::get('/cart-remove/{id?}', 'CartController@cart_remove')->name('cart-remove');
    Route::post('/cart-update/{id?}', 'CartController@cart_update')->name('cart-update');
//wishlist//
    Route::get('wishlist', 'CartController@show_wishlist')->name('wishlist');
    Route::get('wishlist/{id?}', 'CartController@add_wishlist')->name('add-wishlist');
    Route::get('delete-wishlist/{id}', 'CartController@delete_wishlist')->name('delete-wishlist');
    //search results
    Route::get('search-results', 'SearchController@search_results')->name('search-results');
    Route::post('search-results', 'SearchController@search_results')->name('search-results');
    //Product review
    Route::post('product-review', 'ReviewController@add_review')->name('add-review');


//checkout details//
    Route::get('/checkout-address', 'CheckoutController@checkout_address')->name('checkout-address');
    Route::post('/checkout-address', 'CheckoutController@checkout_address')->name('checkout-address');
    Route::get('/checkout-shipping', 'CheckoutController@shipping_page')->name('shipping-page');
    Route::get('/checkout-payment/{id?}', 'CheckoutController@checkout_payment')->name('checkout-payment');
    Route::post('/checkout-payment', 'CheckoutController@checkout_payment')->name('checkout-payment');
    Route::get('/checkout-review/{id?}', 'CheckoutController@checkout_review')->name('checkout-review');
    Route::get('/checkout-complete', 'CheckoutController@checkout_complete')->name('checkout-complete');
    Route::get('/track-form', 'CheckoutController@track_form')->name('track-form');
    Route::get('/track-order', 'CheckoutController@track_order')->name('track-order');

    Route::get('stripe', 'PaymentController@stripe');
    Route::post('stripe', 'PaymentController@stripePost')->name('stripe.post');
    Route::get('payment/verify/', 'PaymentController@verification')->name('payment-verify');
    Route::get('/payment-method','PaymentController@payment_method')->name('payment.method');
    Route::post('/payment-method','PaymentController@payment_method')->name('payment.method');
    //user dashboard
    Route::get('/account-address', 'UserController@address')->name('user-address');
    Route::get('/order-details-modal/{id?}', 'UserController@order_details')->name('order-detail-modal');
    Route::post('/account-address', 'UserController@address')->name('user-address');
    Route::get('/change-password', 'UserController@change_password')->name('change-password');
    Route::post('/change-password', 'UserController@change_password')->name('change-password');
    Route::get('/account-orders/{id?}', 'UserController@orders')->name('user-orders');
    Route::get('/account-password-recovery', 'UserController@password_recovery')->name('password-recovery');
//    Route::get('/account-payment', function () {return view('frontend/pages/account-payment');});
    Route::get('/account-profile', 'UserController@user_profile')->name('user-profile');
    Route::post('/account-profile', 'UserController@user_profile')->name('user-profile');
//Route::get('/account-signin', function () {return view('frontend/pages/account-signin');});
//    Route::get('/account-signup', function () {return view('frontend/pages/account-signup');});
    Route::get('/account-tickets', function () {
        return view('frontend/pages/account-tickets');
    });
    Route::get('/account-wishlist', function () {
        return view('frontend/pages/account-wishlist');
    });


});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/register-page', 'RegisterController@register_page')->name('register');
    Route::post('/register', 'RegisterController@store')->name('user-registration');
    Route::get('/login', 'LoginController@login_page')->name('login-page');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::any('/logout', 'LoginController@logout')->name('logout');
    Route::get('/user/verify/{token}', 'RegisterController@verifyUser')->name('verify-user');

});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'usercheck']], function () {
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::post('/wholesale-user', 'AdminController@wholesale_user')->name('wholesale-user');
    Route::get('/wholesale-user', 'AdminController@wholesale_user')->name('wholesale-user');
    Route::get('/admin-password', 'AdminController@admin_password')->name('admin-password');
    Route::post('/admin-password', 'AdminController@admin_password')->name('admin-password');


    Route::group(['prefix' => 'category'], function () {
        Route::get('category/{id?}', 'CategoryController@add_category')->name('add-category');
        Route::post('category', 'CategoryController@add_category')->name('add-category');
        Route::any('show-category', 'CategoryController@show_category')->name('show-category');
        Route::any('edit-category/{id?}', 'CategoryController@edit_category')->name('edit-category');
        Route::any('delete-category/{id}', 'CategoryController@delete_category')->name('delete-category');
        Route::any('update-category', 'CategoryController@update_category')->name('update-category');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('add-product', 'ProductController@add_product')->name('add-product');
        Route::get('all-products', 'ProductController@all_product')->name('all-product');
        Route::post('store-product', 'ProductController@store_product')->name('store-product');
        Route::any('show-product/{slug?}', 'ProductController@show_product')->name('show-product');
        Route::get('edit-product/{id}', 'ProductController@edit_product')->name('edit-product');
        Route::post('edit-product/{id?}', 'ProductController@edit_product')->name('edit-product');
        Route::any('delete-product/{id}', 'ProductController@delete_product')->name('delete-product');
        Route::any('delete-specification/{id}', 'ProductController@delete_specification')->name('delete-specification');
        Route::any('show-review', 'ProductController@show_review')->name('show-review');
        Route::any('deal-status', 'ProductController@deal_status')->name('deal-status');
        Route::get('deal-products', 'ProductController@deal_products')->name('deal-products');
        Route::post('deal-date', 'ProductController@deal_products')->name('deal-date');

        Route::get('stock_delete/{id}', 'ProductController@stock_delete')->name('delete-stock');
        Route::get('image_delete/{id}', 'ProductController@delete')->name('delete-img');
        Route::get('is_main_edit/{id}', 'ProductController@change_main')->name('change-main');
        //---------------------------------------------------------Sizes------------------
        Route::post('add-size', 'SizeController@store')->name('add-size');
        Route::get('add-size', 'SizeController@view')->name('add-size');
        Route::get('delete_size/{id?}', 'SizeController@delete')->name('delete-size');
//        Colors
        Route::post('add-color', 'ColorController@store')->name('add-color');
        Route::get('add-color', 'ColorController@view')->name('add-color');
        Route::get('delete_color/{id?}', 'ColorController@delete')->name('delete-color');
        //---------------------------------------------------------Brands------------------
        Route::post('add-brand', 'BrandController@manage_brand')->name('add-brand');
        Route::get('add-brand', 'BrandController@manage_brand')->name('add-brand');
        Route::get('delete_brand/{id?}', 'BrandController@delete_brand')->name('delete-brand');
        Route::post('edit_brand/{id?}', 'BrandController@edit_brand')->name('edit-brand');

    });
//Shipping
    Route::group(['prefix' => 'shipping'], function () {
        Route::get('/shipping-location', 'ShippingController@add_location')->name('add-location');
        Route::post('/shipping-location', 'ShippingController@post_location')->name('post_location');
        Route::get('delete-location/{id}', 'ShippingController@delete_location')->name('delete-location');
        Route::post('/add-country', 'ShippingController@add_country')->name('add-country');
        Route::get('/add-country', 'ShippingController@add_country')->name('add-country');
        Route::any('edit-country/{id?}', 'ShippingController@edit_country')->name('edit-country');
        Route::get('delete-country/{id}', 'ShippingController@delete_country')->name('delete-country');
        Route::post('/add-city', 'ShippingController@add_city')->name('add-city');
        Route::get('/add-city', 'ShippingController@add_city')->name('add-city');
        Route::post('edit-city/{id?}', 'ShippingController@edit_city')->name('edit-city');
        Route::get('delete-city/{id}', 'ShippingController@delete_city')->name('delete-city');
        Route::any('shipping-status', 'ShippingController@deal_status')->name('shipping-status');

        Route::get('/payment-method','PaymentController@payment_method')->name('payment.method');
        Route::get('/payment-method/{id?}','PaymentController@delete_method')->name('delete.payment');
        Route::post('/payment-method','PaymentController@payment_method')->name('payment.method');
        Route::any('payment-status', 'PaymentController@deal_status')->name('payment-status');


    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/all-orders', 'OrderController@all_orders')->name('view-orders');
        Route::any('order-details/{id}', 'OrderController@order_details')->name('order-details');
        Route::any('order-delete/{id}', 'OrderController@order_delete')->name('order-delete');
        Route::any('order-status', 'OrderController@order_status')->name('order-status');
        Route::get('generate-pdf/{id}','OrderController@generatePDF')->name('pdf-generate');

    });

    Route::group(['prefix' => 'Setting'], function () {
        Route::get('setting-page', 'SettingController@setting_page')->name('setting-page');
        Route::post('setting-page', 'SettingController@setting_page')->name('setting-page');
        Route::get('faq', 'SettingController@faq')->name('faq');
        Route::post('faq', 'SettingController@faq')->name('faq');
    });
    //Subir Routes
    Route::resources([
        'banner'=>'BannerController'
    ]);
    Route::get('banner/{id}/destroy','BannerController@destroy');
});



