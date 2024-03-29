<?php

namespace App\Http\Controllers\Front;


class ProfileController extends BaseController
{

    public function index()
    {
        return view('front.profile.index');
    }

    public function orders()
    {
        $carts = \Auth::user()->carts()
            ->orderBy('created_at','desc')
            ->get();

        return view('front.profile.orders')
            ->with(compact('carts'));
    }

    public function order($id)
    {
        $cart = \Auth::user()
            ->carts()
            ->find($id);

        if ($cart->status_id <= 5) {
            $cart->update([
                'status' => 'factor',
            ]);

            $cart->orders->each->updatePrice();
        }

        if (! $cart) {
            return abort(404);
        }

        return view('front.profile.order')
            ->with(compact('cart'));
    }

    public function seller()
    {
        return view('front.profile.seller');
    }

}
