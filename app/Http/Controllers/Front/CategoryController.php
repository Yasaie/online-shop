<?php

namespace App\Http\Controllers\Front;

use App\Category;

class CategoryController extends BaseController
{
    public function index()
    {
        return view('front.category.index');
    }

    public function filter($id)
    {
        return view('front.category.filter');
    }
}
