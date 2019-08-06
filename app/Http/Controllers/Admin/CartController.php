<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yasaie\Cruder\Crud;

/**
 * Class CartController
 * @package App\Http\Controllers\Admin
 */
class CartController extends BaseController
{
    public $route = 'admin.cart';
    public $title = 'سفارشات';
    public $model = Cart::class;
    public $load = ['user'];

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
                'name' => 'full_name',
                'get' => 'user.full_name',
            ],
            [
                'name' => 'status',
                'get' => 'status_locale',
            ],
            [
                'name' => 'traceno',
            ],
            [
                'name' => 'total',
            ],
            [
                'name' => 'status_code',
            ],
            [
                'name' => 'created_at',
            ],
        ];

        return Crud::index($this->model, $heads, 'created_at_desc', $this->perPage, $this->load);
    }

    /**
     * @param $status
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function byStatus($status)
    {
        # table headers
        $heads = [
            [
                'name' => 'id',
                'hidden' => 1
            ],
            [
                'name' => 'full_name',
                'get' => 'user.full_name',
            ],
            [
                'name' => 'status',
                'get' => 'status_locale',
            ],
            [
                'name' => 'traceno',
            ],
            [
                'name' => 'total',
            ],
            [
                'name' => 'status_code',
            ],
            [
                'name' => 'created_at',
            ],
        ];

        $items = Cart::where('status', $status)
            ->get()
            ->load($this->load);

        return Crud::index($items, $heads, 'created_at_desc', $this->perPage);
    }

    public function success()
    {
        return $this->byStatus('success');
    }

    public function checking()
    {
        return $this->byStatus('checking');
    }

    /**
     * @package show
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $item = Cart::find($id);
        $items = $item->orders;

        view()->share([
            'title' => 'سفارشات ' . $item->user->full_name,
            'crud' => [
                'show' => 0,
                'edit' => 0,
                'create' => 0,
                'destroy' => 0
            ]
        ]);

        # table headers
        $heads = [
            [
                'name' => 'id',
                'hidden' => 1
            ],
            [
                'name' => 'seller',
                'get' => 'seller.user.full_name',
            ],
            [
                'name' => 'product',
                'get' => 'seller.product.title',
            ],
            [
                'name' => 'service',
                'get' => 'seller.service',
            ],
            [
                'name' => 'price',
                'get' => 'seller.current_price',
                'append' => ' ' . config('app.current_currency')->title,
            ],
            [
                'name' => 'confirmation'
            ],
            [
                'name' => 'created_at',
            ]
        ];

        return Crud::index($items, $heads, 'created_at_desc', $this->perPage);
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
        $item = Cart::find($id);

        $status = [
            [
                'id' => 'checking',
                'title' => __('inc/cart.checking')
            ],
            [
                'id' => 'ready',
                'title' => __('inc/cart.ready')
            ],
            [
                'id' => 'sending',
                'title' => __('inc/cart.sending')
            ],
            [
                'id' => 'received',
                'title' => __('inc/cart.received')
            ]
        ];

        $inputs = [
            [
                'name' => 'status',
                'type' => 'select',
                'options' => [
                    'all' => $status,
                ],
                'value' => $item->status
            ],
        ];

        return Crud::create($inputs);
    }

    /**
     * @package update
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $status = [
            'checking',
            'ready',
            'sending',
            'received'
        ];
        $this->validate($request, [
            'status' => [
                Rule::in($status)
            ]
        ]);

        $item = Cart::find($id);

        $item->update([
            'status' => $request->status
        ]);

        $item->touch();
        return redirect()->route($this->route . '.show', $id);
    }

}
