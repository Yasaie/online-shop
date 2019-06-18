<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index($id, $slag = null)
    {
        \DB::enableQueryLog();
        $product = Product::find($id);
        $categories[0] = $product->category()->first();
        $categories[1] = $categories[0] ? $categories[0]->parent()->first() : [];
        $categories[2] = $categories[1] ? $categories[1]->parent()->first() : [];
        $product_specs = $product->productSpecs()->get();
        $comments = $product->comments()->get();
        $rates = $product->rates()->avg('rate');
        $related_products = $categories[0]->products()->get();

        krsort($categories);

        return view('frontend.product.index')
            ->with(compact(
                'id', 'product', 'product_specs', 'comments',
                'categories', 'rates', 'related_products'
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
