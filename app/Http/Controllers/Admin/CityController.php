<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Requests\CityRequest;
use App\State;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class CityController extends BaseController
{
    public $route = 'admin.address.city';
    public $title = 'شهرها';
    public $model = City::class;
    public $load = ['state', 'state.country'];

    /**
     * @package index
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param Request $request
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
                'searchable' => 'cities.name'
            ],
            [
                'name' => 'state',
                'searchable' => 'states.name'
            ],
            [
                'name' => 'country',
                'searchable' => 'countries.name'
            ],
        ];

        $items = City::select([
            'cities.*',
            'states.name as state',
            'countries.name as country'
        ])
            ->join('states', 'states.id', 'cities.state_id')
            ->join('countries', 'countries.id', 'states.country_id');

        return Crud::all($items, $heads, $this->perPage, 'name');
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
                'name' => 'state',
                'type' => 'select',
                'options' => [
                    'all' => State::all(),
                    'name' => 'name',
                ],
            ]
        ];
        return Crud::create($inputs);
    }

    /**
     * @package store
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param CityRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CityRequest $request)
    {
        $item = City::create([
            'name' => $request->name,
            'state_id' => $request->state,
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
                'name' => 'state',
                'get' => 'state.name',
            ],
            [
                'name' => 'country',
                'get' => 'state.country.name',
            ],
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
        $item = City::find($id);
        $inputs = [
            [
                'name' => 'name',
                'type' => 'text',
                'value' => $item->name
            ],
            [
                'name' => 'state',
                'type' => 'select',
                'options' => [
                    'all' => State::all(),
                    'name' => 'name',
                ],
                'value' => $item->state_id
            ]
        ];
        return Crud::create($inputs);
    }

    /**
     * @package update
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param CityRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CityRequest $request, $id)
    {
        $item = City::find($id);

        $item->update([
            'name' => $request->name,
            'state_id' => $request->state
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
