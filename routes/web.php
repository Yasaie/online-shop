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


        Route::get('profile', 'ProfileController@index')
            ->name('profile');
        Route::get('profile/orders', 'ProfileController@orders')
            ->name('profile.orders');
        Route::get('profile/order/{id}', 'ProfileController@order')
            ->name('profile.order');
        Route::get('profile/seller', 'ProfileController@seller')
            ->name('profile.seller');

        Route::get('cart', 'CartController@index')
            ->name('cart.index');
    });

Route::namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
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
        # Category
        Route::resource('category', 'CategoryController');
        Route::resource('product', 'ProductController');
        # Product Details
        Route::name('detail.')
            ->prefix('detail')
            ->group(function () {
                Route::resource('category', 'DetailCategoryController');
                Route::resource('key', 'DetailKeyController');
                Route::resource('value', 'DetailValueController');
            });
        # Sellers
        Route::resource('seller', 'SellerController');
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
        # Comments
        Route::get('comment/unread', 'CommentController@unread')
            ->name('comment.unread');
        Route::resource('comment', 'CommentController')
            ->only(['index', 'show', 'destroy']);
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
        # Report
        Route::name('report.')
            ->group(function () {
                Route::get('report/list', 'ReportController@index')
                    ->name('list');
            });
        # Cart
        Route::get('cart/new', 'CartController@newOrders')
            ->name('cart.new');
        Route::get('cart/seller/{id?}', 'CartController@seller')
            ->name('cart.seller');
        Route::resource('cart', 'CartController')
            ->only(['index', 'show', 'edit', 'update']);
    });

Route::get('lang/{id}', 'PublicController@lang')
    ->name('language');
Route::get('currency/{id}', 'PublicController@currency')
    ->name('currency');
Auth::routes();
