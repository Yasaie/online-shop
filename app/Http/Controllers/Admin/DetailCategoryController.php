<?php

namespace App\Http\Controllers\Admin;

use App\DetailCategory;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class DetailCategoryController extends BaseController
{

    public function __construct()
    {
        view()->share([
            'title' => 'دسته‌بندی مشخصات',
            'route' => 'admin.detail.category'
        ]);
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
                'name' => 'details',
                'get' => 'detailKey.count()',
                'visible' => 1
            ],
        ];
        # Load items for send to view
        $items = DetailCategory::get()
            ->load(['detailKey']);

        return Crud::index($items, $heads, $request, 'updated_at', $this->perPage);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $multilang = [
            [
                'name' => 'title',
                'type' => 'text',
            ]
        ];
        return Crud::create([], $multilang);
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
                'name' => 'details',
                'get' => 'detailKey.count()',
            ],
        ];

        # Load items for send to view
        $item = DetailCategory::find($id)
            ->load(['detailKey']);

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
        $item = DetailCategory::find($id);
        $multilang = [
            [
                'name' => 'title',
                'type' => 'text',
                'value' => $item
            ]
        ];
        return Crud::create([], $multilang);
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
