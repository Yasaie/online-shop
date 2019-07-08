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

class CountryController extends BaseController
{
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

        # Url query requested
        $query = [
            'search' => $request->search,
            'sort' => $request->sort,
            'desc' => $request->desc
        ];

        # Custom fields
        $search = $request->search;
        $sort = $request->sort ?: 'id';
        $desc = $request->desc ? 1 : 0;

        # Load items for send to view
        $items = Country::get()
            ->load(['state', 'city']);

        # flatten and Search in model if search requested
        $items = flattenItems($items, $heads, $search);
        # Sort and desc/asc items
        $items = $items->sortBy($sort, SORT_NATURAL, $desc);
        # Paginate items
        $pages = paginate($items, $request->page, $this->perPage);

        return view('admin.crud.table')
            ->with(compact('heads', 'sort', 'desc', 'search', 'items', 'pages', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
