<?php

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

Route::get('home', function () {
    return redirect()->route('home');
});

Route::get('lang/{id}', 'PublicController@lang')
    ->name('language');
Route::get('currency/{id}', 'PublicController@currency')
    ->name('currency');
Auth::routes(['verify' => true]);

Route::namespace('Front')
    ->group(function () {
        Route::get('/', 'HomeController@index')
            ->name('home');

        Route::get('product/{id}/{slag?}', 'ProductController@index')
            ->name('product');

        Route::get('category/{id}', 'CategoryController@filter')
            ->name('category');
        Route::get('category', 'CategoryController@index')
            ->name('category.index');

        # Profile
        Route::name('profile')
            ->prefix('profile')
            ->group(function () {
                Route::get('/', 'ProfileController@index');
                Route::get('orders', 'ProfileController@orders')
                    ->name('.orders');
                Route::get('order/{id}', 'ProfileController@order')
                    ->name('.order');
                Route::get('seller', 'ProfileController@seller')
                    ->name('.seller');
            });

        # Cart
        Route::name('cart.')
            ->prefix('cart')
            ->group(function () {
                Route::get('/', 'CartController@index')
                    ->name('index');
                Route::get('list', 'CartController@getList')
                    ->name('list');
                Route::post('quantity', 'CartController@quantity')
                    ->name('quantity');
                Route::delete('order/{id}', 'CartController@removeOrder')
                    ->name('destroy');
                Route::get('add/{id}', 'CartController@addToCart')
                    ->name('add');
            });
    });

Route::namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

        # Admin and seller
        Route::middleware('role:admin|writer')
            ->group(function () {
                Route::name('product.')
                    ->prefix('product')
                    ->group(function () {
                        Route::get('create', 'ProductController@create')
                            ->name('create');
                        Route::post('', 'ProductController@store')
                            ->name('store');
                    });
            });

        # Admin, Seller And writers
        Route::middleware('role:admin|seller|writer')
            ->group(function () {
                # Common for both Admin and Seller
                Route::get('/', 'HomeController@index')
                    ->name('home');
                # Media Upload and Unlink
                Route::name('media.')
                    ->group(function () {
                        Route::post('media/upload', 'MediaController@upload')
                            ->name('upload');
                        Route::delete('media/unlink/{id?}', 'MediaController@unlink')
                            ->name('unlink');
                    });
                # Pricing
                Route::name('seller.')
                    ->group(function () {
                        Route::resource('pricing', 'PricingController');
                    });
                # Order
                Route::name('cart.')
                    ->group(function () {
                        Route::resource('order', 'OrderController');
                    });
            });

        # Just ADMIN
        Route::middleware('role:admin')
            ->group(function () {
                # Category
                Route::resource('category', 'CategoryController');
                # Product
                Route::resource('product', 'ProductController')
                    ->except(['create', 'store']);
                # Product Details
                Route::name('detail.')
                    ->prefix('detail')
                    ->group(function () {
                        Route::resource('category', 'DetailCategoryController');
                        Route::resource('key', 'DetailKeyController');
                        Route::resource('value', 'DetailValueController');
                    });
                # Users
                Route::name('user.')
                    ->group(function () {
                        Route::resource('user', 'UserController');
                        Route::resource('profile', 'ProfileController');
                    });
                # Currency
                Route::resource('currency', 'CurrencyController');
                # Addresses
                Route::name('address.')
                    ->group(function () {
                        Route::resource('country', 'CountryController');
                        Route::resource('state', 'StateController');
                        Route::resource('city', 'CityController');
                    });
                # Sellers
                Route::resource('seller', 'SellerController');
                # Comments
                Route::get('comment/unread', 'CommentController@unread')
                    ->name('comment.unread');
                Route::resource('comment', 'CommentController')
                    ->only(['index', 'show', 'destroy']);
                # Report
                Route::name('report.')
                    ->group(function () {
                        Route::get('report/list', 'ReportController@index')
                            ->name('list');
                    });
                # Cart
                Route::prefix('cart')
                    ->group(function () {
                        Route::get('success', 'CartController@success')
                            ->name('cart.success');
                        Route::get('checking', 'CartController@checking')
                            ->name('cart.checking');
                        Route::resource('cart', 'CartController')
                            ->only(['index', 'show', 'edit', 'update']);
                    });
                # Settings
                Route::name('setting.')
                    ->prefix('setting')
                    ->group(function () {
                        Route::get('global', 'SettingController@global')
                            ->name('global.index');
                        Route::post('global', 'SettingController@storeGlobal')
                            ->name('global.store');

                        Route::get('slider', 'SettingController@slider')
                            ->name('slider.index');
                        Route::post('slider', 'SettingController@storeSlider')
                            ->name('slider.store');

                        Route::get('clear-cache', 'SettingController@clearCache')
                            ->name('clear-cache');
                    });
            });
    });