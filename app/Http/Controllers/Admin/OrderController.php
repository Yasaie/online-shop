<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Seller;
use App\User;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class OrderController extends BaseController
{
    public $route = 'admin.cart.order';

    /**
     * @package index
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param null $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id = null)
    {
        $id = $id ?: \Auth::id();

        $item = User::find($id);

        if(! $item or ! $item->hasRole(['admin', 'seller']))
            abort(404);

        if(\Auth::id() != $id and !\Auth::user()->hasRole('admin'))
            abort(401);

        $items = $item->sellers->flatMap(function (Seller $q) {
            return $q->orders()->whereHas('cart', function ($q) {
                $q->where('status', '>=', 6);
            })->get();
        });

        view()->share([
            'title' => 'درخواست‌های ' . $item->full_name,
            'crud' => [
                'show' => 0,
                'edit' => 1,
                'create' => 0,
                'destroy' => 0
            ]
        ]);

        # table headers
        $heads = [
            [
                'name' => 'id',
                'hidden' => 1
            ],
            [
                'name' => 'product',
                'get' => 'seller.product.title',
            ],
            [
                'name' => 'service',
                'get' => 'seller.service',
            ],
            [
                'name' => 'price',
                'get' => 'seller.current_price',
                'append' => ' ' . config('app.current_currency')->title,
            ],
            [
                'name' => 'status',
                'get' => 'cart.status',
                'options' => [
                    'translate_get' => true
                ],
            ],
            [
                'name' => 'confirmation',
            ],
            [
                'name' => 'created_at',
            ]
        ];

        return Crud::index($items, $heads, 'created_at_desc', $this->perPage);
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
        return $this->index($id);
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
        $item = Order::find($id);

        $status = [
            [
                'id' => 0,
                'title' => __('inc/cart.confirmed')
            ],
            [
                'id' => 1,
                'title' => __('inc/cart.unconfirmed')
            ],
        ];

        $inputs = [
            [
                'name' => 'confirmation',
                'type' => 'select',
                'options' => [
                    'all' => $status,
                ],
                'value' => $item->confirmed
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
        $this->validate($request, [
            'confirmation' => 'required|boolean'
        ]);

        $item = Order::find($id);

        $item->update([
            'confirmed' => $request->confirmation
        ]);

        $item->touch();
        return redirect()->route($this->route . '.index');
    }
}
