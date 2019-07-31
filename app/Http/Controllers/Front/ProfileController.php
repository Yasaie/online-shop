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
        return view('front.profile.orders');
    }
}
