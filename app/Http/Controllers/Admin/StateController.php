<?php

namespace App\Http\Controllers\Admin;

use App\Country;
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
            ],
            [
                'name' => 'name',
                'visible' => 1
            ],
            [
                'name' => 'country_name',
                'get' => 'country.name',
                'visible' => 1
            ],
            [
                'name' => 'cities',
                'get' => 'city.count()',
                'visible' => 1
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
            ],
            [
                'name' => 'country',
                'type' => 'select',
                'content' => [
                    'all' => Country::all(),
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
                'name' => 'country_name',
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
                'content' => [
                    'all' => Country::all(),
                    'name' => 'name',
                ],
                'value' => $item->country_id
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
