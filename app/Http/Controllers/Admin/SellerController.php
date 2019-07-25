<?php

namespace App\Http\Controllers\Admin;

use App\Seller;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class SellerController extends BaseController
{
    public $route = 'admin.seller';
    public $title = 'فروشندگان';
    public $model = Seller::class;
    public $load = ['user', 'product', 'currency'];

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
                'name' => 'seller',
                'get' => 'user.full_name',
                'visible' => 1
            ],
            [
                'name' => 'product.title',
                'visible' => 1
            ],
            [
                'name' => 'price',
                'visible' => 1
            ],
            [
                'name' => 'prev_price',
                'visible' => 1
            ],
            [
                'name' => 'currency',
                'get' => 'currency.name',
                'visible' => 1
            ]
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
        # table headers
        $heads = [
            [
                'name' => 'id',
            ],
            [
                'name' => 'seller',
                'get' => 'user.full_name',
            ],
            [
                'name' => 'product.title',
            ],
            [
                'name' => 'price',
            ],
            [
                'name' => 'prev_price',
            ],
            [
                'name' => 'off_percent',
                'append' => ' %'
            ],
            [
                'name' => 'currency',
                'get' => 'currency.name',
            ],
            [
                'name' => 'current_price',
                'append' => ' ' . config('app.current_currency')->title
            ],
            [
                'name' => 'created_at'
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
