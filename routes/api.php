<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')
    ->name('api.')
    ->group(function () {
        # Category
        Route::get('category', 'CategoryController@index')
            ->name('category');

        # Addresses
        Route::name('address.')
            ->group(function () {
                Route::get('address/country', 'AddressController@country')
                    ->name('country');
                Route::get('address/state/{country}', 'AddressController@state')
                    ->name('state');
                Route::get('address/city/{state}', 'AddressController@city')
                    ->name('city');
            });

        Route::get('product.json', 'ProductController@index')
            ->name('products');

    });