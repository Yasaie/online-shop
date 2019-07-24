<?php
/**
 * @package     shop
 * @author      Payam Yasaie <payam@yasaie.ir>
 * @copyright   2019-06-22
 */

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;

abstract class BaseController extends Controller
{
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

        $comment = Comment::get();

        $menu_items = [
            [
                'name'  =>  'داشبورد',
                'icon'  => 'dashboard',
                'base'  => 'admin.home',
                'route' =>  '',
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
                'name'  => __('model.products'),
                'icon'  => 'gift',
                'count' => Product::count(),
                'base'  => 'admin.product.',
                'child' => [
                    [
                        'name'  => 'همه محصولات',
                        'route'   => 'index'
                    ],
                    [
                        'name'  => 'ایجاد',
                        'route'   => 'create'
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
                        'route' => 'index'
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
                        'route' => 'index'
                    ]
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
                'name'  =>  'سفارشات',
                'icon'  => 'shopping-cart',
                'base'  => 'admin.home',
                'child' => [
                    [
                        'name' => 'همه',
                        'route' => ''
                    ],
                    [
                        'name' => 'ارسال نشده',
                        'route' => ''
                    ],
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
                'name'  =>  'گزارشات',
                'icon'  => 'signal',
                'base'  => 'admin.home',
                'child' => [
                    [
                        'name' => 'بازدید',
                        'route' => ''
                    ],
                    [
                        'name' => 'فروش',
                        'route' => ''
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
                    ]
                ]
            ]

//            #=========================================
//            [
//                'name' => 'دسته بندی',
//                'icon' => 'gift',
//                // 'count' => Product::count(),
//                'base' => 'admin.product.',
//                'child' => [
//                    [
//                        'name' => 'همه',
//                        'route' => 'index'
//                    ],
//                    [
//                        'name' => 'ایجاد',
//                        'route' => 'create'
//                    ]
//                ]
//            ],
//
//            #=========================================
//            [
//                'name' => 'کاربران',
//                'icon' => 'gift',
//                // 'count' => Product::count(),
//                'base' => 'admin.product.',
//                'child' => [
//                    [
//                        'name' => 'همه',
//                        'route' => 'index'
//                    ],
//                    [
//                        'name' => 'ایجاد',
//                        'route' => 'create'
//                    ]
//                ]
//            ],
//
//
//            #=========================================
//            [
//                'name' => 'اطلاعیه ها',
//                'icon' => 'gift',
//                // 'count' => Product::count(),
//                'base' => 'admin.product.',
//                'child' => [
//                    [
//                        'name' => 'همه',
//                        'route' => 'index'
//                    ]
//                ]
//            ],
//
//            #=========================================
//            [
//                'name' => 'تنظیمات',
//                'icon' => 'gift',
//                // 'count' => Product::count(),
//                'base' => 'admin.product.',
//                'child' => [
//                    [
//                        'name' => 'اسلایدشوها',
//                        'route' => 'index'
//                    ],
//                    [
//                        'name' => 'محصولات صفحه اول',
//                        'route' => 'index'
//                    ],
//                    [
//                        'name' => 'عنوان سایت',
//                        'route' => 'index'
//                    ],
//                    [
//                        'name' => 'لوگوی سایت',
//                        'route' => 'index'
//                    ],
//                    [
//                        'name' => 'توضیحات سایت',
//                        'route' => 'index'
//                    ],
//                    [
//                        'name' => '4 بلاک فوتر',
//                        'route' => 'index'
//                    ],
//                ]
//            ],
//
//            #========================================
//
//            #=========================================
//            [
//                'name' => 'گزارش',
//                'icon' => 'gift',
//                // 'count' => Product::count(),
//                'base' => 'admin.product.',
//                'child' => [
//                    [
//                        'name' => 'فاکتورها',
//                        'route' => 'index',
//                          'child' => [
//                         [
//                            'name' => 'همه',
//                            'route' => 'index'
//                        ]
//                        ]
//        ]
//
//                ]
//            ],


        ];

        view()->share([
            'menu_items' => $menu_items,
            'crud' => $this->crud,
            'route' => $this->route,
            'title' => $this->title
        ]);
    }
}