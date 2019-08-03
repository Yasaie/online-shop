<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yasaie\Cruder\Crud;

class CartController extends BaseController
{
    public $route = 'admin.cart';
    public $title = 'سفارشات';
    public $model = Cart::class;
    public $load = ['user'];

    /**
     * @package index
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        # table headers
        $heads = [
            [
                'name' => 'id',
            ],
            [
                'name' => 'full_name',
                'get' => 'user.full_name',
                'visible' => 1
            ],
            [
                'name' => 'status',
                'visible' => 1
            ],
            [
                'name' => 'traceno',
                'visible' => 1
            ],
            [
                'name' => 'total',
                'visible' => 1
            ],
            [
                'name' => 'status_code',
                'visible' => 1
            ],
            [
                'name' => 'created_at',
                'visible' => 1
            ],
        ];

        return Crud::index($this->model, $heads, 'created_at_desc', $this->perPage, $this->load);
    }

    public function newOrders()
    {
        # table headers
        $heads = [
            [
                'name' => 'id',
            ],
            [
                'name' => 'full_name',
                'get' => 'user.full_name',
                'visible' => 1
            ],
            [
                'name' => 'status',
                'visible' => 1
            ],
            [
                'name' => 'traceno',
                'visible' => 1
            ],
            [
                'name' => 'total',
                'visible' => 1
            ],
            [
                'name' => 'status_code',
                'visible' => 1
            ],
            [
                'name' => 'created_at',
                'visible' => 1
            ],
        ];

        $items = Cart::where('status', 'success')
            ->get()
            ->load($this->load);

        return Crud::index($items, $heads, 'created_at_desc', $this->perPage);
    }

    public function seller($id = null)
    {
        $id = $id ?: \Auth::id();

        $item = User::find($id);

        if(! $item or ! $item->hasRole(['admin', 'seller']))
            abort(404);

        if(\Auth::id() != $id and !\Auth::user()->hasRole('admin'))
            abort(401);

        $items = $item->sellers->flatMap(function ($q) {
            return $q->orders()->whereHas('cart', function ($q) {
                $q->where('status', '>=', 6);
            })->get();
        });

        view()->share([
            'title' => 'درخواست‌های ' . $item->full_name,
            'crud' => [
                'show' => 0,
                'edit' => 0,
                'create' => 0,
                'destroy' => 0
            ]
        ]);

        # table headers
        $heads = [
            [
                'name' => 'id',
            ],
            [
                'name' => 'product',
                'get' => 'seller.product.title',
                'visible' => 1
            ],
            [
                'name' => 'service',
                'get' => 'seller.service',
                'visible' => 1
            ],
            [
                'name' => 'price',
                'get' => 'seller.current_price',
                'append' => ' ' . config('app.current_currency')->title,
                'visible' => 1
            ],
            [
                'name' => 'status',
                'get' => 'cart.status',
                'visible' => 1
            ],
            [
                'name' => 'created_at',
                'visible' => 1
            ]
        ];

        return Crud::index($items, $heads, 'created_at_desc', $this->perPage);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * @package show
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $item = Cart::find($id);
        $items = $item->orders;

        view()->share([
            'title' => 'سفارشات ' . $item->user->full_name,
            'crud' => [
                'show' => 0,
                'edit' => 0,
                'create' => 0,
                'destroy' => 0
            ]
        ]);

        # table headers
        $heads = [
            [
                'name' => 'id',
            ],
            [
                'name' => 'seller',
                'get' => 'seller.user.full_name',
                'visible' => 1
            ],
            [
                'name' => 'product',
                'get' => 'seller.product.title',
                'visible' => 1
            ],
            [
                'name' => 'service',
                'get' => 'seller.service',
                'visible' => 1
            ],
            [
                'name' => 'price',
                'get' => 'seller.current_price',
                'append' => ' ' . config('app.current_currency')->title,
                'visible' => 1
            ],
            [
                'name' => 'created_at',
                'visible' => 1
            ]
        ];

        return Crud::index($items, $heads, 'created_at_desc', $this->perPage);
    }

    /**
     * @package edit
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = Cart::find($id);

        $status = [
            [
                'id' => 'checking',
                'title' => 'checking'
            ],
            [
                'id' => 'ready',
                'title' => 'ready',
            ],
            [
                'id' => 'sending',
                'title' => 'sending',
            ],
            [
                'id' => 'received',
                'title' => 'received'
            ]
        ];

        $inputs = [
            [
                'name' => 'status',
                'type' => 'select',
                'options' => [
                    'all' => $status,
                ],
                'value' => $item->status
            ],
        ];

        return Crud::create($inputs);
    }

    /**
     * @package update
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $status = [
            'checking',
            'ready',
            'sending',
            'received'
        ];
        $this->validate($request, [
            'status' => [
                Rule::in($status)
            ]
        ]);

        $item = Cart::find($id);

        $item->update([
            'status' => $request->status
        ]);

        $item->touch();

        return redirect()->route($this->route . '.show', $id);
    }

}
