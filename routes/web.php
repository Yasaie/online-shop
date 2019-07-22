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

Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Front')->group(function () {
    Route::get('product/{id}/{slag?}', 'ProductController@index');
    Route::get('product_t/{id}/{slag?}', 'ProductController@index_t');
});

Route::namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function ()
    {
        Route::get('/', 'HomeController@index')->name('home');
        # Category
        Route::resource('category', 'CategoryController');
        # Product
        Route::resource('product', 'ProductController');
        # Product Details
        Route::name('detail.')
            ->prefix('detail')
            ->group(function ()
            {
                Route::resource('category', 'DetailCategoryController');
                Route::resource('key', 'DetailKeyController');
                Route::resource('value', 'DetailValueController');
            });
        # Sellers
        Route::resource('seller', 'SellerController');
        # Users
        Route::resource('user', 'UserController');
        # Currency
        Route::resource('currency', 'CurrencyController');
        # Addresses
        Route::name('address.')
            ->group(function ()
            {
                Route::resource('country', 'CountryController');
                Route::resource('state', 'StateController');
                Route::resource('city', 'CityController');
            });
        # Comments
        Route::resource('comment', 'CommentController')
            ->only(['index', 'show', 'destroy']);
        # Settings
        Route::name('setting.')
            ->prefix('setting')
            ->group(function ()
            {
                Route::get('global', 'SettingController@global')->name('global.index');
                Route::post('global', 'SettingController@globalStore')->name('global.store');
            });
    });

Route::get('lang/{id}', 'PublicController@lang');
Route::get('currency/{id}', 'PublicController@currency');


//Route::get('/image/{image}.{ext}', 'PublicController@image');

//Route::get('/file/{model}/{model_id}/{file_id}/{file_area}/{file_name}', 'PublicController@file');

//Route::get('/storage', '')

