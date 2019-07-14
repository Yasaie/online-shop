<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Product;
use function compact;
use function flattenItems;
use Illuminate\Http\Request;
use function paginate;
use const SORT_NATURAL;
use function view;
use Yasaie\Cruder\Crud;

class CountryController extends BaseController
{

    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        view()->share([
            'title' => 'کشورها',
            'route' => 'admin.address.country'
        ]);
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        # Load items for send to view
        $items = Country::get()
            ->load(['state', 'city']);

        return Crud::index($items,$heads, $request, 'id', $this->perPage);
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
                'name' => 'states',
                'get' => 'state.count()',
            ],
            [
                'name' => 'cities',
                'get' => 'city.count()',
            ],
        ];

        $item = Country::find($id)
            ->load(['state', 'city']);

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
        $country = Country::find($id);
        $inputs = [
            [
                'name' => 'name',
                'type' => 'input',
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
        //
    }
}
