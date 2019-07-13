<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Carbon\Language;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class ProductController extends BaseController
{

    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        view()->share(['title' => 'محصولات']);
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        dd(Language::all());
        # table headers
        $heads = [
            [
                'name' => 'id',
            ],
            [
                'name' => 'title',
                'visible' => 1
            ],
            [
                'name' => 'category_title',
                'get' => 'category.title',
                'visible' => 1
            ],
            [
                'name' => 'updated_at',
                'visible' => 1
            ]
        ];
        # Load items for send to view
        $items = Product::get()
            ->load(['category']);

        return Crud::index($items, $heads, $request, 'updated_at', $this->perPage);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crud.create');
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
        # table headers
        $heads = [
            [
                'name' => 'id',
            ],
            [
                'name' => 'title',
            ],
            [
                'name' => 'category_title',
                'get' => 'category.title',
            ],
            [
                'name' => 'created_at',
            ],
            [
                'name' => 'updated_at',
            ]
        ];

        $item = Product::find($id)
            ->load('category');

        return Crud::show($item, $heads);
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
