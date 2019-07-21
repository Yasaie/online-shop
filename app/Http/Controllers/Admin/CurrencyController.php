<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class CurrencyController extends BaseController
{
    public $route = 'admin.currency';
    public $title = 'واحد پول';
    public $model = Currency::class;

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
                'name' => 'name',
                'visible' => 1
            ],
            [
                'name' => 'symbol',
                'visible' => 1
            ],
            [
                'name' => 'ratio',
                'visible' => 1
            ]
        ];

        return Crud::index($this->model, $heads, 'updated_at', $this->perPage);
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
                'name' => 'symbol',
                'type' => 'text',
            ],
            [
                'name' => 'key',
                'type' => 'text',
            ],
            [
                'name' => 'ratio',
                'type' => 'text',
            ],
            [
                'name' => 'places',
                'type' => 'text',
            ],
            [
                'name' => 'default_language',
                'type' => 'select',
                'content' => [
                    'all' => config('global.langs'),
                    'name' => 'getNativeName()',
                    'id' => 'getId()'
                ],
            ]
        ];

        $multilang = [
            [
                'name' => 'name',
                'type' => 'text',
            ]
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
                'name' => 'name',
            ],
            [
                'name' => 'symbol',
            ],
            [
                'name' => 'key',
            ],
            [
                'name' => 'ratio',
            ],
            [
                'name' => 'places',
            ],
            [
                'name' => 'default_language',
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
        $item = Currency::find($id);

        $inputs = [
            [
                'name' => 'symbol',
                'type' => 'text',
                'value' => $item->symbol
            ],
            [
                'name' => 'key',
                'type' => 'text',
                'value' => $item->key
            ],
            [
                'name' => 'ratio',
                'type' => 'text',
                'value' => $item->ratio
            ],
            [
                'name' => 'places',
                'type' => 'text',
                'value' => $item->places
            ],
            [
                'name' => 'default_language',
                'type' => 'select',
                'content' => [
                    'all' => config('global.langs'),
                    'name' => 'getNativeName()',
                    'id' => 'getId()'
                ],
                'value' => $item->language_id
            ]
        ];

        $multilang = [
            [
                'name' => 'name',
                'type' => 'text',
                'value' => $item
            ]
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
