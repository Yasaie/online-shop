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
            ],
            [
                'name' => 'name',
                'visible' => 1
            ],
            [
                'name' => 'state',
                'get' => 'state.name',
                'visible' => 1
            ],
            [
                'name' => 'country',
                'get' => 'state.country.name',
                'visible' => 1
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
                'name' => 'state',
                'type' => 'select',
                'content' => [
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
                'content' => [
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

        $item->name = $request->name;
        $item->state_id = $request->state;
        $item->save();

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
