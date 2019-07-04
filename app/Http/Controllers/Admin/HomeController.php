<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index()
    {
        return view('admin.home.index');
    }
}
