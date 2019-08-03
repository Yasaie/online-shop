<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class CartController extends BaseController
{
    public $route = 'admin.cart';
    public $title = 'سفارشات';
    public $model = Cart::class;
    public $load = [];

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
                'name' => 'product',
                'get' => 'seller.product.title',
                'visible' => 1
            ],
            [
                'name' => 'seller',
                'get' => 'seller.user.full_name',
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
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Cart::find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
