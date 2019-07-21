<?php

namespace App\Http\Controllers\Front;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{

    public function index($id, $slag = null)
    {
        $product = Product::find($id)
            ->load([
                'rates',
                'comments.user',
                'sellers.currency',
                'sellers.sellerService',
                'sellers.user.products.rates',
                'details.detailValue.detailKey.detailCategory',
            ]);

        $product_cats = collect();
        $product_cats[0] = $this->categories->firstWhere('id', $product->category_id)
            ->load('products');
        $product_cats[1] = $product_cats[0] ? $this->categories->firstWhere('id', $product_cats[0]->parent_id) : [];
        $product_cats[2] = $product_cats[1] ? $this->categories->firstWhere('id', $product_cats[1]->parent_id) : [];
        $comments = $product->comments;
        $rates = $product->product_rate;
        $related_products = $product_cats[0]->products;
        $sellers = $product->sellers->sortBy('current_price', SORT_NATURAL);
        $first_seller = $sellers->first();
        $product_details = [];

        foreach ($product->details as $detail) {
            $detailValue = $detail->detailValue;
            $detailKey = $detail->detailKey;
            $detailCategory = $detailKey->detailCategory;
            $category_id = $detailCategory ? $detailCategory->id : 0;

            if (!isset($product_details[$category_id])) {
                $product_details[$category_id] = collect();
                $product_details[$category_id]->title = $category_id ? $detailCategory->title : '';
                $product_details[$category_id]->children = [];
            }

            $product_details[$category_id]->children[] = (object)[
                'key'   => $detailKey->title,
                'value' => $detailValue ? $detailValue->title : null,
            ];
        }

        return view('front.product.index')
            ->with(compact(
                'id', 'product', 'comments', 'product_details',
                'product_cats', 'rates', 'related_products', 'sellers', 'first_seller'
            ));
    }

    public function index_t($id, $slag = null)
    {
        $product = Product::find($id);
        $categories[0] = $product->category()->first();
        $categories[1] = $categories[0] ? $categories[0]->parent()->first() : [];
        $categories[2] = $categories[1] ? $categories[1]->parent()->first() : [];
        $product_specs = [];
        $comments = $product->comments()->get();
        $rates = $product->rates()->avg('rate');
        $related_products = $categories[0]->products()->get();
        $sellers = $product->sellers()->with(['user', 'currency'])->get();

        krsort($categories);

        return view('front.product.post')
            ->with(compact(
                'id', 'product', 'product_specs', 'comments',
                'categories', 'rates', 'related_products', 'sellers'
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
