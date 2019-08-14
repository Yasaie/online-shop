<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'category' => ['required', 'numeric', 'exists:categories,id']
        ]);

        $products = catsProducts($request->category)
            ->load(['rates']);

        $products = $products->map(function ($p) {
            $seller = $p->sellers
                ->where('amount', '>', 0)
                ->sortBy('current_price', SORT_NATURAL)
                ->first();

            $output = $p->only([
                'id',
                'visitors',
                'product_rate'
            ]);
            $gets = [
                'title' => $p->title,
                'price' => $seller ? $seller->current_price : null,
                'prev_price' => $seller ? $seller->previous_price : null,
                'off_percent' => $seller ? $seller->off_percent : null,
                'image' => $p->firstThumb(),
                'url' => route('product', ['id' => $p->id, 'slag' => $p->slag,]),
                'created_at' => $p->created_at->__toString(),
                'updated_at' => $p->updated_at->__toString()
            ];

            return collect($output)->merge($gets);
        });

        return $products;
    }
}
