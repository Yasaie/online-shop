<?php

namespace App\Http\Controllers\Front;

use App\Order;
use Illuminate\Http\Request;
use Yasaie\Helper\Y;

class CartController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        return view('front.cart.index');
    }

    public function getList()
    {
        $cart = \Auth::user()
            ->myOrders()
            ->load(['seller.product', 'seller.user']);

        $names = [
            [
                'name' => 'id',
            ],
            [
                'name' => 'name',
                'get' => 'seller.product.title',
            ],
            [
                'name' => 'seller',
                'get' => 'seller.user.full_name'
            ],
            [
                'name' => 'service',
                'get' => 'seller.service'
            ],
            [
                'name' => 'quantity',
            ],
            [
                'name' => 'price',
                'get' => 'current_price_no'
            ],
            [
                'name' => 'prev_price',
                'get' => 'previous_price_no'
            ],
            [
                'name' => 'amount',
                'get' => 'seller.amount'
            ],
            [
                'name' => 'image',
                'get' => 'seller.product.firstThumb()'
            ],
            [
                'name' => 'product_id',
                'get' => 'seller.product_id'
            ]
        ];
        $items = Y::flattenItems($cart, $names, null);

        return $items;
    }

    /**
     * @package quantity
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param Request $request
     *
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function quantity(Request $request)
    {
        $this->validate($request, [
            'id' => 'bail|required|exists:orders',
            'quantity' => 'required|numeric|max:' . Order::find($request->id)->seller->amount
        ]);

        $order = \Auth::user()
            ->myOrder($request->id);

        $order->quantity = $request->quantity;
        return [
            'result' => $order->save()
        ];
    }

    public function removeOrder($id)
    {
        $order = \Auth::user()
            ->myOrder($id);

        $result = false;
        if ($order) {
            $result = $order->delete();
        }
        return compact('result');
    }

    public function addToCart($id)
    {
        \Auth::user()
            ->myOrders(0)
            ->where('seller_id', $id)
            ->firstOrCreate([
                'seller_id' => $id
            ]);

        return redirect()->route('cart.index');
    }
}
