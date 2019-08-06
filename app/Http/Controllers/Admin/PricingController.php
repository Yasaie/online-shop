<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\Http\Requests\PricingRequest;
use App\Product;
use App\Seller;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class PricingController extends BaseController
{
    public $route = 'admin.seller.pricing';
    public $title = 'قیمت گذاری';
    public $model = Seller::class;
    public $load = ['product', 'currency'];

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
                'hidden' => 1
            ],
            [
                'name' => 'product',
                'get' => 'product.title',
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
                'name' => 'currency',
                'get' => 'currency.name',
            ]
        ];

        $items = \Auth::user()->sellers
            ->load($this->load);

        return Crud::index($items, $heads, 'id', $this->perPage);
    }

    /**
     * @package create
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $inputs = [
            [
                'name' => 'product',
                'type' => 'select',
                'options' => [
                    'all' => Product::all()
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
     * @param PricingRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PricingRequest $request)
    {
        $item = Seller::create([
            'product_id' => $request->product,
            'user_id' => \Auth::id(),
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
                'name' => 'product',
                'get' => 'product.title'
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

        $inputs = [
            [
                'name' => 'product',
                'type' => 'select',
                'options' => [
                    'all' => Product::all()
                ],
                'value' => $item->product_id
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
     * @param PricingRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function update(PricingRequest $request, $id)
    {
        $item = Seller::find($id);

        $item->update([
            'product_id' => $request->product,
            'user_id' => \Auth::id(),
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
     * @package destroy
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param $id
     *
     * @return array
     */
    public function destroy($id)
    {
        return Crud::destroy($id, 'sellers', \Auth::user()->hasRole('admin'));
    }
}
