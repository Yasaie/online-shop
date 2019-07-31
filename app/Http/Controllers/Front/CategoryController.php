<?php

namespace App\Http\Controllers\Front;

use App\Category;

class CategoryController extends BaseController
{
    public function index($id = null)
    {
        if ($id) {
            return view('front.category.filter');
        } else {
            return view('front.category.index');
        }
    }
}
