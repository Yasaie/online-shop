<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

/**
 * @author Payam Yasaie <payam@yasaie.ir>
 *
 * Class CategoryController
 * @package App\Http\Controllers\Admin
 * @mixin Crud
 */
class CategoryController extends BaseController
{
    public $route = 'admin.category';
    public $title = 'دسته‌بندی';
    public $model = Category::class;
    public $load = ['products', 'parent'];

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
                'name' => 'parent',
                'get' => 'parent.title',
                'visible' => 1
            ],
            [
                'name' => 'products',
                'get' => 'products.count()',
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
        $inputs = [
            [
                'name' => 'parent',
                'type' => 'select',
                'option' => [
                    'all' => Category::all(),
                ],
            ]
        ];
        $multilang = [
            [
                'name' => 'title',
                'type' => 'text',
            ],
        ];
        return Crud::create($inputs, $multilang);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $item = Category::create([
            'parent_id' => $request->parent ?: null
        ]);

        $item->createLocale('title', $request->title);

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
                'name' => 'parent',
                'get' => 'parent.title',
                'link' => [
                    'search' => 'parent.title',
                    'column' => 'title',
                    'route' => 'admin.category.index'
                ]
            ],
            [
                'name' => 'products',
                'get' => 'products.count()',
                'link' => [
                    'search' => 'title',
                    'column' => 'category',
                    'route' => 'admin.product.index'
                ]
            ],
            [
                'name' => 'created_at',
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
        $empty = (new Category())->fill([
            'id' => 10,
            'title' => __('model.main')
        ]);

        $all = Category::all()->prepend($empty);
        $item = $all->find($id);

        $inputs = [
            [
                'name' => 'parent',
                'type' => 'select',
                'option' => [
                    'all' => $all->where('id', '<>' ,$item->id),
                ],
                'value' => $item->parent_id
            ]
        ];
        $multilang = [
            [
                'name' => 'title',
                'type' => 'text',
                'value' => $item
            ],
        ];
        return Crud::create($inputs, $multilang);
    }

    /**
     * @package update
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function update(Request $request, $id)
    {
        $item = Category::find($id);

        $item->update([
            'parent_id' => $request->parent
        ]);

        $item->updateLocale('title', $request->title);

        $item->touch();
        return redirect()->route($this->route . '.show', $id);
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
