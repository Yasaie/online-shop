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

    public function __construct()
    {
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
            ]
        ];
        view()->share(compact('menu_items'));
    }
}