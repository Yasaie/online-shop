<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class CountryController extends BaseController
{
    public $route = 'admin.address.country';
    public $title = 'کشورها';
    public $model = Country::class;
    public $load = ['state', 'city'];

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
                'name' => 'states',
                'get' => 'state.count()',
                'visible' => 1,
            ],
            [
                'name' => 'cities',
                'get' => 'city.count()',
                'visible' => 1,
            ],
        ];

        return Crud::index($this->model, $heads, 'id', $this->perPage, $this->load);
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
            ]
        ];
        return Crud::create($inputs);
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
                'name' => 'states',
                'get' => 'state.name',
            ],
            [
                'name' => 'cities',
                'get' => 'city.count()',
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
        $country = Country::find($id);
        $inputs = [
            [
                'name' => 'name',
                'type' => 'text',
                'value' => $country->name
            ]
        ];
        return Crud::create($inputs);
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
