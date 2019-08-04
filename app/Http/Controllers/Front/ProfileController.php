<?php

namespace App\Http\Controllers\Front;


class ProfileController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        return view('front.profile.index');
    }

    public function orders()
    {
        $carts = \Auth::user()->carts;

        return view('front.profile.orders')
            ->with(compact('carts'));
    }

    public function order($id)
    {
        $cart = \Auth::user()
            ->carts()
            ->find($id);

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
