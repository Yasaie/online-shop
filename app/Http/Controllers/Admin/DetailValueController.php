<?php

namespace App\Http\Controllers\Admin;

use App\DetailKey;
use App\DetailValue;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class DetailValueController extends BaseController
{
    public $route = 'admin.detail.value';
    public $title = 'مقادیر مشخصات';

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
                'name' => 'detail',
                'get' => 'detailKey.title',
                'visible' => 1
            ],
            [
                'name' => 'category',
                'get' => 'detailKey.detailCategory.title',
                'visible' => 1
            ]
        ];
        # Load items for send to view
        $items = DetailValue::get()
            ->load(['detailKey.detailCategory']);

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
                'name' => 'detail',
                'type' => 'select',
                'content' => [
                    'all' => DetailKey::all(),
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
                'visible' => 1
            ],
            [
                'name' => 'detail',
                'get' => 'detailKey.title',
                'visible' => 1
            ],
            [
                'name' => 'category',
                'get' => 'detailKey.detailCategory.title',
                'visible' => 1
            ]
        ];
        # Load items for send to view
        $item = DetailValue::find($id)
            ->load(['detailKey.detailCategory']);

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
        $item = DetailValue::find($id)
            ->load(['detailKey']);

        $inputs = [
            [
                'name' => 'detail',
                'type' => 'select',
                'content' => [
                    'all' => DetailKey::all(),
                    'name' => 'title',
                ],
                'value' => $item->detailKey ? $item->detailKey->id : null
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
