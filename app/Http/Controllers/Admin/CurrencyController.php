<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\Http\Requests\CurrencyRequest;
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
     * @package store
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param CurrencyRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function store(CurrencyRequest $request)
    {
        $item = Currency::create([
            'language_id' => $request->default_language,
            'key' => $request->key,
            'symbol' => $request->symbol,
            'ratio' => $request->ratio,
            'places' => $request->places
        ]);

        $item->createLocale('name', $request->name);

        \Cache::delete('app.currencies');

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
     * @package update
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param CurrencyRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function update(CurrencyRequest $request, $id)
    {
        $item = Currency::find($id);

        $item->language_id = $request->default_language;
        $item->key = $request->key;
        $item->symbol = $request->symbol;
        $item->ratio = $request->ratio;
        $item->places = $request->places;

        $item->save();

        $item->updateLocale('name', $request->name);

        \Cache::delete('app.currencies');

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
