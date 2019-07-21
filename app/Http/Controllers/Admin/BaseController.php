<?php
/**
 * @package     shop
 * @author      Payam Yasaie <payam@yasaie.ir>
 * @copyright   2019-06-22
 */

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Product;

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

        $menu_items = [
            [
                'name'  =>  'داشبورد',
                'icon'  => 'dashboard',
                'base'  => 'admin.home',
                'route' =>  '',
            ],
            [
                'name'  => 'محصولات',
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
                'name' => 'واحد پول',
                'icon' => 'money',
                'base' => 'admin.currency.',
                'count' => Currency::count(),
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
                'name' => 'نظرات',
                'icon' => 'comment',
                'base' => 'admin.comment.',
                'count' => Comment::count(),
                'child' => [
                    [
                        'name' => 'همه',
                        'route' => 'index'
                    ]
                ]
            ],
            [
                'name' => 'تنظیمات',
                'icon' => 'gear',
                'base' => 'admin.setting.',
                'child' => [
                    [
                        'name' => 'عمومی',
                        'route' => 'global'
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