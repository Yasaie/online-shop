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
        # Product
        Route::resource('product', 'ProductController');
        # Addresses
        Route::name('address.')
            ->group(function ()
            {
                Route::resource('country', 'CountryController');
                Route::resource('state', 'StateController');
                Route::resource('city', 'CityController');
            });
        # Settings
        Route::name('setting.')
            ->prefix('setting')
            ->group(function ()
            {
                Route::get('global', 'SettingController@global')->name('global');
            });
        # Product Details
        Route::name('detail.')
            ->prefix('detail')
            ->group(function ()
            {
                Route::resource('category', 'DetailCategoryController');
                Route::resource('value', 'DetailsController');
            });
    });

Route::get('lang/{id}', 'PublicController@lang');
Route::get('currency/{id}', 'PublicController@currency');


//Route::get('/image/{image}.{ext}', 'PublicController@image');

//Route::get('/file/{model}/{model_id}/{file_id}/{file_area}/{file_name}', 'PublicController@file');

//Route::get('/storage', '')