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

Route::get('/', 'HomeController@index');
Route::get('/product/{id}/{slag?}', 'ProductController@index');


Route::get('/lang/{id}', 'PublicController@lang');
Route::get('/image/{image}.{ext}', 'PublicController@image');