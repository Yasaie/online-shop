<?php

namespace App\Http\Controllers\Admin;

use App\DetailCategory;
use App\DetailKey;
use App\DetailValue;
use App\Http\Requests\DetailKeyRequest;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class DetailKeyController extends BaseController
{
    public $route = 'admin.detail.key';
    public $title = 'مشخصه‌ها';
    public $model = DetailKey::class;
    public $load = ['detailCategory', 'detailValues'];

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
                'hidden' => 1
            ],
            [
                'name' => 'title',
                'searchable' => 'title.title'
            ],
            [
                'name' => 'category',
                'searchable' => 'category.title'
            ],
            [
                'name' => 'highlighted',
                'sortable' => true
            ],
            [
                'name' => 'detail_values',
                'sortable' => true
            ],
            [
                'name' => 'updated_at',
                'sortable' => true
            ]
        ];

        $detail_category = DetailCategory::select();
        $detail_category = joinDictionary($detail_category, DetailCategory::class);

        $detail_value = DetailValue::select([
                'detail_key_id',
                \DB::raw('count(*) as detail_values')
            ])->groupBy('detail_key_id');

        $items = $this->model::select();
        $items = joinDictionary($items, $this->model);

        $items = $items->select([
            'detail_keys.*',
            'title.title',
            'category.title as category',
            'values.detail_values'
        ])
            ->joinSub($detail_category, 'category', 'category.id', 'detail_keys.detail_category_id')
            ->joinSub($detail_value, 'values', 'values.detail_key_id', 'detail_keys.id');

        return Crud::all($items, $heads, $this->perPage, 'updated_at_desc');
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
                'options' => [
                    'all' => DetailCategory::all(),
                ],
            ],
            [
                'name' => 'highlighted',
                'type' => 'select',
                'options' => [
                    'all' => [
                        ['id' => 0, 'title' => 'خیر'],
                        ['id' => 1, 'title' => 'بلی'],
                    ],
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
     * @package store
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param DetailKeyRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DetailKeyRequest $request)
    {
        $item = DetailKey::create([
            'detail_category_id' => $request->category,
            'highlighted' => $request->highlighted
        ]);

        $item->createLocale('title', $request->title);

        return redirect()->route($this->route . '.show', $item->id);
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
                'hidden' => 1
            ],
            [
                'name' => 'title',
            ],
            [
                'name' => 'category',
                'get' => 'detailCategory.title',
            ],
            [
                'name' => 'highlighted',
            ],
            [
                'name' => 'values',
                'get' => 'detailValues.*.title',
                'string' => true
            ],
            [
                'name' => 'created_at',
            ],
            [
                'name' => 'updated_at'
            ]
        ];

        return Crud::show($id, $heads, $this->model);
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
                'options' => [
                    'all' => DetailCategory::all(),
                ],
                'value' => $item->detailCategory->id
            ],
            [
                'name' => 'highlighted',
                'type' => 'select',
                'options' => [
                    'all' => [
                        ['id' => 0, 'title' => 'خیر'],
                        ['id' => 1, 'title' => 'بلی'],
                    ],
                ],
                'value' => $item->highlighted
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
     * @package update
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param DetailKeyRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function update(DetailKeyRequest $request, $id)
    {
        $item = DetailKey::find($id);

        $item->update([
            'detail_category_id' => $request->category,
            'highlighted' => $request->highlighted,
        ]);

        $item->updateLocale('title', $request->title);

        $item->touch();
        return redirect()->route($this->route . '.show', $id);
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
