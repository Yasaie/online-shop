<?php

namespace App\Http\Controllers\Front;

class CartController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = \Auth::user()
            ->carts()
            ->where('status', '<=', 5)
            ->first()
            ->orders
            ->load(['seller.product', 'seller.user']);

        $total_prev = 0;
        $total = 0;
        foreach ($cart as $order) {

            $total += str_replace(',', '', $order->seller->current_price);
            $total_prev += str_replace(',', '', $order->seller->previous_price);
        }

        return view('front.cart.index')
            ->with(compact('cart', 'total', 'total_prev'));
    }
}
