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

Route::get('/', 'HomeController@index')
    ->name('home');

Route::namespace('Front')
    ->group(function () {
        Route::get('product/{id}/{slag?}', 'ProductController@index');
        Route::get('product_t/{id}/{slag?}', 'ProductController@index_t');
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
                Route::post('global', 'SettingController@globalStore')
                    ->name('global.store');

                Route::get('clear-cache', 'SettingController@clearCache')
                    ->name('clear-cache');
            });
        # Report
        Route::name('report.')
            ->group(function () {
                Route::get('index', 'ReportController@index')
                    ->name('index');
            });
    });

Route::get('lang/{id}', 'PublicController@lang');
Route::get('currency/{id}', 'PublicController@currency');
Auth::routes();

//Route::get('/image/{image}.{ext}', 'PublicController@image');
//Route::get('/file/{model}/{model_id}/{file_id}/{file_area}/{file_name}', 'PublicController@file');