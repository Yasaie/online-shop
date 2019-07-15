<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\State;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class CityController extends BaseController
{

    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        view()->share([
            'title' => 'شهرها',
            'route' => 'admin.address.city'
        ]);
        parent::__construct();
    }

    /**
     * @package index
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
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
                'name' => 'state_name',
                'get' => 'state.name',
                'visible' => 1
            ],
            [
                'name' => 'country_name',
                'get' => 'state.country.name',
                'visible' => 1
            ],
        ];
        # Load items for send to view
        $items = City::get()
            ->load(['state', 'state.country']);

        return Crud::index($items, $heads, $request, 'id', $this->perPage);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
                'name' => 'state_name',
                'get' => 'state.name',
            ],
            [
                'name' => 'country_name',
                'get' => 'state.country.name',
            ],
        ];

        $item = City::find($id)
            ->load(['state', 'state.country']);

        return Crud::show($item, $heads);
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
        //
    }
}
