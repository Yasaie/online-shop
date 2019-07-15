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

    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        view()->share([
            'title' => 'استان‌ها',
            'route' => 'admin.address.state'
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
        # Load items for send to view
        $items = State::get()
            ->load(['country', 'city']);

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
                'type' => 'input',
            ],
            [
                'name' => 'country',
                'type' => 'select',
                'content' => [
                    'all' => Country::all(),
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
                'name' => 'country_name',
                'get' => 'country.name',
            ],
            [
                'name' => 'cities',
                'get' => 'city.name',
            ],
        ];

        $item = State::find($id)
            ->load(['country', 'city']);

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
        $item = State::find($id);
        $inputs = [
            [
                'name' => 'name',
                'type' => 'input',
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
