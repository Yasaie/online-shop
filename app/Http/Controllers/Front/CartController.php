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
        return view('front.cart.index');
    }
}
