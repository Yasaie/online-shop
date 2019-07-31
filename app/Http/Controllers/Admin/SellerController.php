<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\Http\Requests\SellerRequest;
use App\Product;
use App\Seller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
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
                'name' => 'product',
                'get' => 'product.title',
                'visible' => 1
            ],
            [
                'name' => 'amount',
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
        $sellers = Role::where('name', 'admin')
            ->orWhere('name', 'seller')->get()->flatMap(function ($item) {
                return $item->users;
            });

        $inputs = [
            [
                'name' => 'product',
                'type' => 'select',
                'options' => [
                    'all' => Product::all()
                ],
            ],
            [
                'name' => 'seller',
                'type' => 'select',
                'options' => [
                    'all' => $sellers,
                    'name' => 'full_name'
                ],
            ],
            [
                'name' => 'amount',
                'type' => 'number',
                'value' => 0
            ],
            [
                'name' => 'currency',
                'type' => 'select',
                'options' => [
                    'all' => Currency::all(),
                    'name' => 'name'
                ],
                'value' => config('app.current_currency')->id
            ],
            [
                'name' => 'price',
                'type' => 'text',
                'value' => 0
            ],
            [
                'name' => 'prev_price',
                'type' => 'text',
                'value' => 0
            ],
            [
                'name' => 'post_price',
                'type' => 'text',
                'value' => 0
            ]
        ];
        $multilang = [
            [
                'name' => 'service',
                'type' => 'text',
            ]
        ];

        return Crud::create($inputs, $multilang);
    }

    /**
     * @package store
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param SellerRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SellerRequest $request)
    {
        $item = Seller::create([
            'product_id' => $request->product,
            'user_id' => $request->seller,
            'currency_id' => $request->currency,
            'amount' => $request->amount,
            'price' => $request->price,
            'prev_price' => $request->prev_price,
            'post_price' => $request->post_price
        ]);

        $item->createLocale('service', $request->service);

        return redirect()->route($this->route . '.show', $item->id);
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
                'name' => 'product',
            ],
            [
                'name' => 'service'
            ],
            [
                'name' => 'amount',
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
                'name' => 'post_price'
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
     * @package edit
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = Seller::find($id);
        $sellers = Role::where('name', 'admin')
            ->orWhere('name', 'seller')->get()->flatMap(function ($item) {
                return $item->users;
            });

        $inputs = [
            [
                'name' => 'products',
                'type' => 'select',
                'options' => [
                    'all' => Product::all()
                ],
                'value' => $item->product_id
            ],
            [
                'name' => 'seller',
                'type' => 'select',
                'options' => [
                    'all' => $sellers,
                    'name' => 'full_name'
                ],
                'value' => $item->user_id
            ],
            [
                'name' => 'amount',
                'type' => 'number',
                'value' => $item->amount
            ],
            [
                'name' => 'currency',
                'type' => 'select',
                'options' => [
                    'all' => Currency::all(),
                    'name' => 'name'
                ],
                'value' => $item->currency_id
            ],
            [
                'name' => 'price',
                'type' => 'text',
                'value' => $item->price
            ],
            [
                'name' => 'prev_price',
                'type' => 'text',
                'value' => $item->prev_price
            ],
            [
                'name' => 'post_price',
                'type' => 'text',
                'value' => $item->post_price
            ]
        ];
        $multilang = [
            [
                'name' => 'service',
                'type' => 'text',
                'value' => $item
            ]
        ];

        return Crud::create($inputs, $multilang);
    }

    /**
     * @package update
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param SellerRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function update(SellerRequest $request, $id)
    {
        $item = Seller::find($id);

        $item->update([
            'product_id' => $request->product,
            'user_id' => $request->seller,
            'currency_id' => $request->currency,
            'amount' => $request->amount,
            'price' => $request->price,
            'prev_price' => $request->prev_price,
            'post_price' => $request->post_price
        ]);

        $item->updateLocale('service', $request->service);

        $item->touch();
        return redirect()->route($this->route . '.show', $id);
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
