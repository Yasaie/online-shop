<?php

namespace App\Http\Controllers\Admin;

use App\DetailKey;
use App\DetailValue;
use App\Http\Requests\DetailValueRequest;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class DetailValueController extends BaseController
{
    public $route = 'admin.detail.value';
    public $title = 'مقادیر مشخصات';
    public $model = DetailValue::class;
    public $load = ['detailKey.detailCategory'];

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

        return Crud::index($this->model, $heads, 'updated_at', $this->perPage, $this->load);
    }

    /**
     * @package create
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $inputs = [
            [
                'name' => 'detail',
                'type' => 'select',
                'options' => [
                    'all' => DetailKey::all(),
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
     * @param DetailValueRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DetailValueRequest $request)
    {
        $item = DetailValue::create([
            'detail_key_id' => $request->detail
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
            ],
            [
                'name' => 'title',
            ],
            [
                'name' => 'detail',
                'get' => 'detailKey.title',
            ],
            [
                'name' => 'category',
                'get' => 'detailKey.detailCategory.title',
            ],
            [
                'name' => 'created_at',
            ],
            [
                'name' => 'updated_at'
            ]
        ];

        return Crud::show($id, $heads, $this->route, $this->model);
    }

    /**
     * @package edit
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = DetailValue::find($id)
            ->load(['detailKey']);

        $inputs = [
            [
                'name' => 'detail',
                'type' => 'select',
                'options' => [
                    'all' => DetailKey::all(),
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
     * @package update
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param DetailValueRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function update(DetailValueRequest $request, $id)
    {
        $item = DetailValue::find($id);

        $item->update([
            'detail_key_id' => $request->detail
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
