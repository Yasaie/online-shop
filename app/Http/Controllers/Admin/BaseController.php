<?php
/**
 * @package     shop
 * @author      Payam Yasaie <payam@yasaie.ir>
 * @copyright   2019-06-22
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;

class BaseController extends Controller
{

    protected $perPage = 15;

    public function __construct()
    {
        $menu_items = [
            [
                'name'  =>  'داشبورد',
                'icon'  => 'dashboard',
                'base'  => 'admin.home',
                'route' =>  '',
            ],

            #=========================================
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
                'name' => 'آدرس‌ها',
                'icon' => 'map',
                'base' => 'admin.address.',
                'child' => [
                    [
                        'name' => 'کشور',
                        'route' => 'country.index'
                    ],
                    [
                        'name' => 'استان',
                        'route' => 'state.index'
                    ],
                    [
                        'name' => 'شهر',
                        'route' => 'city.index'
                    ],

                ]
            ],

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
//            #=========================================
//            [
//                'name' => 'نظرات',
//                'icon' => 'gift',
//                // 'count' => Product::count(),
//                'base' => 'admin.product.',
//                'child' => [
//                    [
//                        'name' => 'همه',
//                        'route' => 'index'
//                    ]
//
//                ]
//            ],
//
//            #=========================================
//            [
//                'name' => 'واحد پول',
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
//                        'route' => 'index'
//                    ]
//
//                ]
//            ],
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
        view()->share(compact('menu_items'));
    }
}