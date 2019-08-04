<?php

namespace App\Http\Controllers\Admin;

use App\DetailCategory;
use App\Http\Requests\BaseRequest;
use App\Http\Requests\DetailCategoryRequest;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class DetailCategoryController extends BaseController
{
    public $route = 'admin.detail.category';
    public $title = 'دسته‌بندی مشخصات';
    public $model = DetailCategory::class;
    public $load = ['detailKey'];

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
            ],
            [
                'name' => 'details',
                'get' => 'detailKey.count()',
            ],
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
        $multilang = [
            [
                'name' => 'title',
                'type' => 'text',
            ]
        ];
        return Crud::create([], $multilang);
    }

    /**
     * @package store
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param BaseRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BaseRequest $request)
    {
        $item = DetailCategory::create([]);

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
                'name' => 'details',
                'get' => 'detailKey.count()',
                'link' => [
                    'search' => 'title',
                    'column' => 'category',
                    'route' => 'admin.detail.key.index'
                ]
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
     * @package update
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param BaseRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function update(BaseRequest $request, $id)
    {
        $item = DetailCategory::find($id);

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
