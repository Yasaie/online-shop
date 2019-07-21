<?php

namespace App\Http\Controllers\Admin;

use App\DetailCategory;
use App\DetailKey;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class DetailKeyController extends BaseController
{
    public $route = 'admin.detail.key';
    public $title = 'مشخصه‌ها';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
                'name' => 'category',
                'get' => 'detailCategory.title',
                'visible' => 1
            ],
            [
                'name' => 'values',
                'get' => 'detailValues.count()',
                'visible' => 1
            ]
        ];
        # Load items for send to view
        $items = DetailKey::get()
            ->load(['detailCategory']);

        return Crud::index($items, $heads, 'updated_at', $this->perPage);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inputs = [
            [
                'name' => 'category',
                'type' => 'select',
                'content' => [
                    'all' => DetailCategory::all(),
                    'name' => 'title',
                ],
            ]
        ];
        $multilang = [
            [
                'name' => 'title',
                'type' => 'text',
            ],
        ];
        return Crud::create($inputs, $multilang);
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
                'name' => 'category',
                'get' => 'detailCategory.title',
            ],
            [
                'name' => 'values',
                'get' => 'detailValues.count()',
                'link' => [
                    'search' => 'title',
                    'column' => 'detail',
                    'route' => 'admin.detail.value.index'
                ]
            ]
        ];
        # Load items for send to view
        $item = DetailKey::find($id)
            ->load(['detailCategory', 'detailValues']);

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
        $item = DetailKey::find($id)
            ->load(['detailCategory']);

        $inputs = [
            [
                'name' => 'category',
                'type' => 'select',
                'content' => [
                    'all' => DetailCategory::all(),
                    'name' => 'title',
                ],
                'value' => $item->detailCategory->id
            ]
        ];
        $multilang = [
            [
                'name' => 'title',
                'type' => 'text',
                'value' => $item
            ],
        ];
        return Crud::create($inputs, $multilang);
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
