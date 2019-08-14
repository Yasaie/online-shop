<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\DetailKey;
use App\Product;
use Yasaie\Helper\Y;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Front
 */
class CategoryController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('front.category.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filter($id)
    {
        $current_category = $this->categories->firstWhere('id', $id);

        $products = catsProducts($id, 1);

        $products = $products->flatMap(function ($d) {
            return $d->products;
        });

        $filters = DetailKey::select(['detail_keys.id'])
            ->distinct()
            ->join('detail_values', 'detail_key_id', 'detail_keys.id')
            ->join('product_details', 'detail_value_id', 'detail_values.id')
            ->join('products', 'product_id', 'products.id')
            ->join('categories', 'category_id', 'categories.id')
            ->where('detail_keys.highlighted', 1)
            ->where('categories.path', 'regexp', "(^|\/)$id($|\/)")
            ->with(['detailValues'])
            ->get();

        return view('front.category.filter')
            ->with(compact('current_category', 'products', 'filters', 'id'));
    }
}
