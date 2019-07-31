<?php

namespace App\Http\Controllers\Front;

use App\Category;
use Yasaie\Helper\Y;

class CategoryController extends BaseController
{
    public function index()
    {
        return view('front.category.index');
    }

    public function filter($id)
    {
        $current_category = $this->categories->firstWhere('id', $id);

        $products = catsProducts($id, 1)
            ->load('products.details.detailValue');

        $products = $products->flatMap(function ($p) {
            return $p->products;
        });
        $filters = $products->flatMap(function ($d) {
            return $d->details;
        });


        return view('front.category.filter')
            ->with(compact('current_category', 'products'));
    }
}
