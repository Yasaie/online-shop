<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\DetailValue;
use App\Http\Requests\ProductRequest;
use App\Product;
use Spatie\MediaLibrary\Models\Media;
use Yasaie\Cruder\Crud;
use Yasaie\Helper\Y;

class ProductController extends BaseController
{
    public $title = 'محصولات';
    public $route = 'admin.product';
    public $model = Product::class;
    public $load = ['category'];

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
                'name' => 'title',
                'visible' => 1
            ],
            [
                'name' => 'category',
                'get' => 'category.title',
                'visible' => 1
            ],
            [
                'name' => 'updated_at',
                'visible' => 1
            ]
        ];

        return Crud::index($this->model, $heads, 'updated_at_desc', $this->perPage, $this->load);
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
                'name' => 'category',
                'type' => 'select',
                'options' => [
                    'all' => Category::all(),
                ]
            ],
            [
                'name' => 'details',
                'type' => 'multiselect',
                'options' => [
                    'all' => DetailValue::all(),
                    'name' => 'key_value'
                ]
            ],
            [
                'name' => 'files',
                'get' => 'images',
                'type' => 'file',
            ],
        ];
        $multilang = [
            [
                'name' => 'title',
                'type' => 'text'
            ],
            [
                'name' => 'description',
                'type' => 'texthtml'
            ]
        ];

        return Crud::create($inputs, $multilang);
    }

    /**
     * @package store
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param ProductRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $item = Product::create([
            'category_id' => $request->category,
        ]);

        Y::addAndRemove($item->details(), 'detail_value_id', $request->details);

        $item->createLocale('title', $request->title);
        $item->createLocale('description', $request->description);

        Crud::upload($item, $request->images, 'images');

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
            ],
            [
                'name' => 'title',
            ],
            [
                'name' => 'category',
                'get' => 'category.title',
            ],
            [
                'name' => 'description',
            ],
            [
                'name' => 'details',
                'get' => 'details.key_value',
            ],
            [
                'name' => 'visitors',
            ],
            [
                'name' => 'visits',
            ],
            [
                'name' => 'created_at',
            ],
            [
                'name' => 'updated_at',
            ]
        ];

        return Crud::show($id, $heads, $this->route, $this->model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $inputs = [
            [
                'name' => 'category',
                'type' => 'select',
                'options' => [
                    'all' => Category::all(),
                ],
                'value' => $product->category_id
            ],
            [
                'name' => 'details',
                'type' => 'multiselect',
                'options' => [
                    'all' => DetailValue::all(),
                    'name' => 'key_value'
                ],
                'value' => $product->details->pluck('detail_value_id')->toArray()
            ],
            [
                'name' => 'images',
                'get' => 'images',
                'type' => 'file',
                'value' => $product
            ]
        ];
        $multilang = [
            [
                'name' => 'title',
                'type' => 'text',
                'value' => $product
            ],
            [
                'name' => 'description',
                'type' => 'texthtml',
                'value' => $product
            ]
        ];

        return Crud::create($inputs, $multilang);
    }

    /**
     * @package update
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param ProductRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function update(ProductRequest $request, $id)
    {
        $item = Product::find($id);

        $item->update([
            'category_id' => $request->category
        ]);

        Y::addAndRemove($item->details(), 'detail_value_id', $request->details);

        $item->updateLocale('title', $request->title);
        $item->updateLocale('description', $request->description);

        Crud::upload($item, $request->images, 'images');

        $item->touch();
        return redirect()->route($this->route . '.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Crud::destroy($id, $this->model);
    }

}
