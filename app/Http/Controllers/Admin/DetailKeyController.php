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
    public $model = DetailKey::class;
    public $load = ['detailCategory'];

    /**
     * @package index
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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

        return Crud::index($this->model, $heads, 'updated_at', $this->perPage, $this->load);
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
     * @package show
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
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

        return Crud::show($id, $heads, $this->route, $this->model);
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
        return Crud::destroy($id, $this->model);
    }
}
