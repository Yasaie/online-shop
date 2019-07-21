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
     * @package store
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param DetailValueRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DetailValueRequest $request)
    {
        $result = DetailValue::create([
            'detail_key_id' => $request->detail
        ]);

        $result->dictionary()->createLocale('title', $request->title);
//        foreach ($request->title as $lang => $title) {
//            if ($title) {
//                $result->dictionary()->create([
//                    'key' => 'title',
//                    'value' => $title,
//                    'language_id' => $lang
//                ]);
//            }
//        }


        return redirect()->route($this->route . '.index');
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
        return Crud::destroy($id, $this->model);
    }
}
