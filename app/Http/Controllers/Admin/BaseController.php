<?php
/**
 * @package     shop
 * @author      Payam Yasaie <payam@yasaie.ir>
 * @copyright   2019-06-22
 */

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;

/**
 * Class BaseController
 * @package App\Http\Controllers\Admin
 */
abstract class BaseController extends Controller
{
    protected $user = null;
    protected $perPage = 15;
    protected $crud;

    public $route = '';
    public $title = '';

    public function __construct()
    {
        $this->crud = [
            'create' => method_exists($this, 'create'),
            'show' => method_exists($this, 'show'),
            'edit' => method_exists($this, 'edit'),
            'destroy' => method_exists($this, 'destroy'),
        ];

        $menu_items = $this->menuItems();

        view()->share([
            'menu_items' => $menu_items,
            'crud' => $this->crud,
            'route' => $this->route,
            'title' => $this->title
        ]);
    }

    /**
     * @return array
     */
    protected function menuItems()
    {
        $comment = Comment::get();
        $cart = Cart::where('status', 'success')
            ->count();

        return [
            [
                'name' => 'داشبورد',
                'icon' => 'dashboard',
                'base' => 'admin.home',
                'route' => '',
            ],
            [
                'name' => __('model.category'),
                'icon' => 'bars',
                'base' => 'admin.category.',
                'child' => [
                    [
                        'name' => 'همه',
                        'route' => 'index'
                    ]
                ]
            ],
            [
                'name' => __('model.products'),
                'icon' => 'gift',
                'count' => Product::count(),
                'base' => 'admin.product.',
                'child' => [
                    [
                        'name' => 'همه محصولات',
                        'route' => 'index'
                    ],
                    [
                        'name' => 'ایجاد',
                        'route' => 'create'
                    ]
                ]
            ],
            [
                'name' => 'خصوصیات',
                'icon' => 'asterisk',
                'base' => 'admin.detail.',
                'child' => [
                    [
                        'name' => 'دسته‌بندی',
                        'route' => 'category.index',
                    ],
                    [
                        'name' => 'مشخصه‌‌ها',
                        'route' => 'key.index',
                    ],
                    [
                        'name' => 'مقادیر',
                        'route' => 'value.index',
                    ]
                ]
            ],
            [
                'name' => 'فروشندگان',
                'icon' => 'tag',
                'base' => 'admin.seller.',
                'child' => [
                    [
                        'name' => 'همه',
                        'route' => 'index',
                    ],
                    [
                        'name' => 'قیمت گذاری‌ها',
                        'route' => 'pricing.index',
                    ],
                    [
                        'name' => 'قیمت گذاری جدید',
                        'route' => 'pricing.create'
                    ]
                ]
            ],
            [
                'name' => 'کاربران',
                'icon' => 'user',
                'base' => 'admin.user.',
                'count' => User::count(),
                'child' => [
                    [
                        'name' => 'همه',
                        'route' => 'user.index',
                    ],
                ]
            ],
            [
                'name' => 'واحد پول',
                'icon' => 'money',
                'base' => 'admin.currency.',
                'child' => [
                    [
                        'name' => 'همه',
                        'route' => 'index'
                    ],
                    [
                        'name' => 'ایجاد',
                        'route' => 'create',
                    ]
                ]
            ],
            [
                'name' => 'سفارشات',
                'icon' => 'shopping-cart',
                'base' => 'admin.cart.',
                'child' => [
                    [
                        'name' => 'همه',
                        'route' => 'index',
                    ],
                    [
                        'name' => __('inc/cart.success'),
                        'route' => 'success',
                        'count' => $cart,
                    ],
                    [
                        'name' => __('inc/cart.checking'),
                        'route' => 'checking',
                        'count' => Cart::where('status', 'checking')
                            ->count(),
                    ],
                    [
                        'name' => 'درخواست‌های من',
                        'route' => 'order.index',
                        'count' => 'requestedOrders().count()'
                    ]
                ]
            ],
            [
                'name' => 'نظرات',
                'icon' => 'comment',
                'base' => 'admin.comment.',
                'count' => $comment->count(),
                'child' => [
                    [
                        'name' => 'همه',
                        'route' => 'index'
                    ],
                    [
                        'name' => 'خوانده نشده',
                        'count' => $comment->where('is_changed', false)->count(),
                        'route' => 'unread'
                    ]
                ]
            ],
            [
                'name' => 'آدرس‌ها',
                'icon' => 'map',
                'base' => 'admin.address.',
                'child' => [
                    [
                        'name' => 'کشور',
                        'route' => 'country.index',
                    ],
                    [
                        'name' => 'استان',
                        'route' => 'state.index',
                    ],
                    [
                        'name' => 'شهر',
                        'route' => 'city.index',
                    ],

                ]
            ],
            [
                'name' => 'گزارشات',
                'icon' => 'signal',
                'base' => 'admin.report.',
                'child' => [
                    [
                        'name' => 'بازدیدها',
                        'route' => 'list'
                    ],

                ]
            ],
            [
                'name' => 'تنظیمات',
                'icon' => 'gear',
                'base' => 'admin.setting.',
                'child' => [
                    [
                        'name' => 'عمومی',
                        'route' => 'global.index'
                    ],
                    [
                        'name' => 'اسلایدر',
                        'route' => 'slider.index'
                    ],
                    [
                        'name' => 'پاکسازی کش‌ها',
                        'route' => 'clear-cache'
                    ]
                ],
            ]
        ];
    }
}