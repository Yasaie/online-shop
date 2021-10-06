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

use App\Http\Controllers\Front\{
    CartController,
    CategoryController,
    HomeController,
    PayController,
    ProductController,
    ProfileController,
    UserController
};

use App\Http\Controllers\Admin\{CartController as AdminCartController,
    CommentController,
    HomeController as AdminHomeController,
    ProductController as AdminProductController,
    ReportController,
    SettingController,
    UserController as AdminUserController};

Route::get('home', function () {
    return redirect()->route('home');
});

Route::get('lang/{id}', 'PublicController@lang')
    ->name('language');
Route::get('currency/{id}', 'PublicController@currency')
    ->name('currency');
Auth::routes(['verify' => true]);


# FRONT CONTROLLERS
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('product/{id}/{slag?}', [ProductController::class, 'index'])
    ->name('product');

Route::get('category/{id}', [CategoryController::class, 'filter'])
    ->name('category');
Route::get('category', [CategoryController::class, 'index'])
    ->name('category.index');

# Need verification
Route::middleware('verified')
    ->group(function () {
        # Profile
        Route::name('profile')
            ->prefix('profile')
            ->group(function () {
                Route::get('/', [ProfileController::class, 'index']);
                Route::get('orders', [ProfileController::class, 'orders'])
                    ->name('.orders');
                Route::get('order/{id}', [ProfileController::class, 'order'])
                    ->name('.order');

                Route::middleware('role:customer')
                    ->group(function () {
                        Route::get('seller', [ProfileController::class, 'seller'])
                            ->name('.seller');
                        Route::post('seller/update', [ProfileController::class, 'updateSeller'])
                            ->name('.seller.update');
                    });

                Route::post('password', [UserController::class, 'password'])
                    ->name('.password');
                Route::post('update', [UserController::class, 'profile'])
                    ->name('.update');
            });

        # Cart
        Route::name('cart.')
            ->prefix('cart')
            ->group(function () {
                Route::get('/', [CartController::class, 'index'])
                    ->name('index');
                Route::get('list', [CartController::class, 'getList'])
                    ->name('list');
                Route::post('quantity', [CartController::class, 'quantity'])
                    ->name('quantity');
                Route::delete('order/{id}', [CartController::class, 'removeOrder'])
                    ->name('destroy');
                Route::get('add/{id}', [CartController::class, 'addToCart'])
                    ->name('add');

                Route::get('pay', [PayController::class, 'index'])
                    ->name('pay');
                Route::any('ipn', [PayController::class, 'ipn'])
                    ->name('ipn');

            });

        Route::post('product/comment', [UserController::class, 'comment'])
            ->name('product.comment');
        Route::post('product/rate', [UserController::class, 'rate'])
            ->name('product.rate');
    });


# ADMIN CONTROLLERS
Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

        # Admin and seller
        Route::middleware('role:admin|writer')
            ->group(function () {
                Route::name('product.')
                    ->prefix('product')
                    ->group(function () {
                        Route::get('create', [AdminProductController::class, 'create'])
                            ->name('create');
                        Route::post('', [AdminProductController::class, 'store'])
                            ->name('store');
                        Route::get('category', [AdminProductController::class, 'apiCategory'])
                            ->name('category');
                    });
            });

        # Admin, Seller And writers
        Route::middleware('role:admin|seller|writer')
            ->group(function () {
                # Common for both Admin and Seller
                Route::get('/', [AdminHomeController::class, 'index'])
                    ->name('home');
                # Pricing
                Route::name('seller.')
                    ->group(function () {
                        Route::resource('pricing', 'Admin\PricingController');
                    });
                # Order
                Route::name('cart.')
                    ->group(function () {
                        Route::resource('order', 'Admin\OrderController')
                            ->only(['index', 'show', 'edit', 'update']);
                    });
            });

        # Just ADMIN
        Route::middleware('role:admin')
            ->group(function () {
                # Category
                Route::resource('category', 'Admin\CategoryController');
                # Product
                Route::resource('product', 'Admin\ProductController')
                    ->except(['create', 'store']);
                # Product Details
                Route::name('detail.')
                    ->prefix('detail')
                    ->group(function () {
                        Route::resource('category', 'Admin\DetailCategoryController');
                        Route::resource('key', 'Admin\DetailKeyController');
                        Route::resource('value', 'Admin\DetailValueController');
                    });
                # Users
                Route::name('user.')
                    ->group(function () {
                        Route::resource('user', 'Admin\UserController');
                        Route::resource('profile', 'Admin\ProfileController');
                        Route::get('seller-request', [AdminUserController::class, 'sellerRequest'])
                            ->name('sellerRequest');

                    });
                # Currency
                Route::resource('currency', 'Admin\CurrencyController');
                # Addresses
                Route::name('address.')
                    ->group(function () {
                        Route::resource('country', 'Admin\CountryController');
                        Route::resource('state', 'Admin\StateController');
                        Route::resource('city', 'Admin\CityController');
                    });
                # Sellers
                Route::resource('seller', 'Admin\SellerController');
                # Comments
                Route::get('comment/unread', [CommentController::class, 'unread'])
                    ->name('comment.unread');
                Route::resource('comment', 'Admin\CommentController')
                    ->only(['index', 'show', 'destroy']);
                # Report
                Route::name('report.')
                    ->group(function () {
                        Route::get('report/list', [ReportController::class, 'index'])
                            ->name('list');
                    });
                # Cart
                Route::prefix('cart')
                    ->group(function () {
                        Route::get('success', [AdminCartController::class, 'success'])
                            ->name('cart.success');
                        Route::get('checking', [AdminCartController::class, 'checking'])
                            ->name('cart.checking');
                        Route::resource('cart', 'Admin\CartController')
                            ->only(['index', 'show', 'edit', 'update']);
                    });
                # Settings
                Route::name('setting.')
                    ->prefix('setting')
                    ->group(function () {
                        Route::get('global', [SettingController::class, 'global'])
                            ->name('global.index');
                        Route::post('global', [SettingController::class, 'storeGlobal'])
                            ->name('global.store');

                        Route::get('slider', [SettingController::class, 'slider'])
                            ->name('slider.index');
                        Route::post('slider', [SettingController::class, 'storeSlider'])
                            ->name('slider.store');

                        Route::get('advertising', [SettingController::class, 'advertising'])
                            ->name('advertising.index');
                        Route::post('advertising', [SettingController::class, 'storeAdvertising'])
                            ->name('advertising.store');

                        Route::get('clear-cache', [SettingController::class, 'clearCache'])
                            ->name('clear-cache');
                    });
            });
    });
