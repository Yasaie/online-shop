<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Requests\StateRequest;
use App\State;
use function compact;
use function flattenItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function paginate;
use const SORT_NATURAL;
use function view;
use Yasaie\Cruder\Crud;

class StateController extends BaseController
{
    public $route = 'admin.address.state';
    public $title = 'استان‌ها';
    public $model = State::class;
    public $load = ['country', 'city'];

    /**
     * @package index
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
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
                'name' => 'name',
            ],
            [
                'name' => 'country',
                'get' => 'country.name',
            ],
            [
                'name' => 'cities',
                'get' => 'city.count()',
            ],
        ];

        return Crud::index($this->model, $heads, 'name', $this->perPage, $this->load);
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
                'name' => 'name',
                'type' => 'text',
            ],
            [
                'name' => 'country',
                'type' => 'select',
                'options' => [
                    'all' => Country::all(),
                    'name' => 'name'
                ],
            ]
        ];
        return Crud::create($inputs);
    }

    /**
     * @package store
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param StateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StateRequest $request)
    {
        $item = State::create([
            'name' => $request->name,
            'country_id' => $request->country,
        ]);

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
                'name' => 'name',
            ],
            [
                'name' => 'country',
                'get' => 'country.name',
            ],
            [
                'name' => 'cities',
                'get' => 'city.name',
            ],
        ];

        return Crud::show($id, $heads, $this->route, $this->model, $this->load);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = State::find($id);
        $inputs = [
            [
                'name' => 'name',
                'type' => 'text',
                'value' => $item->name
            ],
            [
                'name' => 'country',
                'type' => 'select',
                'options' => [
                    'all' => Country::all(),
                    'name' => 'name',
                ],
                'value' => $item->country_id
            ]
        ];
        return Crud::create($inputs);
    }

    /**
     * @package update
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param StateRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StateRequest $request, $id)
    {
        $item = State::find($id);

        $item->update([
            'name' => $request->name,
            'country_id' => $request->country
        ]);

        $item->touch();
        return redirect()->route($this->route . '.show', $id);
    }

    /**
     * @package destroy
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        return Crud::destroy($id, $this->model);
    }
}
