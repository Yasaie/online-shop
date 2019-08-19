<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\Order;
use App\Product;
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

        $product = Product::select();
        $product = joinDictionary($product, Product::class);

        $seller = Seller::select();
        $seller = joinDictionary($seller, Seller::class);

        $base_currency = Currency::whereRatio(1)->first()->id;

        $items = Order::select([
            'orders.id',
            'orders.created_at',
            'orders.confirmed as confirmation',
            'orders.confirmed',
            \DB::raw('orders.price * ratio AS price'),
            \DB::raw($base_currency . ' as currency_id'),
            'carts.status',
            'seller.service',
            'product.title as product',
        ])
            ->join('currencies', 'currencies.id', 'orders.currency_id')
            ->join('carts', 'carts.id', 'orders.cart_id')
            ->joinSub($seller, 'seller', 'seller.id', 'orders.seller_id')
            ->joinSub($product, 'product', 'product.id', 'seller.product_id')
            ->where('status', '>=', 6)
            ->where('seller.user_id', $id);

//        dd($items->get());
//            ->select([
//                'product.title as product',
//                'sellers.*',
//                \DB::raw('price * ratio AS price'),
//                \DB::raw($currency . ' as currency_id')
//            ])
//            ->joinSub($product, 'product', 'product.id', 'sellers.product_id')
//            ->join('currencies', 'currencies.id', 'sellers.currency_id');

        view()->share([
            'title' => 'درخواست‌های ' . $item->full_name,
//            'crud' => [
//                'show' => 0,
//                'edit' => 1,
//                'create' => 0,
//                'destroy' => 0
//            ]
        ]);

        # table headers
        $heads = [
            [
                'name' => 'id',
                'hidden' => 1
            ],
            [
                'name' => 'product',
                'searchable' => 'product.title'
            ],
            [
                'name' => 'service',
                'searchable' => 'sellers.service'
            ],
            [
                'name' => 'price',
                'get' => 'current_price',
                'append' => ' ' . config('app.current_currency')->title,
                'sortable' => true
            ],
            [
                'name' => 'status',
                'get' => 'status_locale',
                'sortable' => true
            ],
            [
                'name' => 'confirmation',
                'sortable' => true
            ],
            [
                'name' => 'created_at',
                'sortable' => true
            ]
        ];

        return Crud::all($items, $heads, $this->perPage, 'created_at_desc');
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
                'id' => 1,
                'title' => __('inc/cart.confirmed')
            ],
            [
                'id' => 0,
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
