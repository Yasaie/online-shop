<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Product;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;
use Yasaie\Dictionary\Dictionary;
use Yasaie\Helper\Y;
use Yasaie\Paginate\Helper;
use Yasaie\Support\Yalp;

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
                'hidden' => 1,
                'sortable' => true
            ],
            [
                'name' => 'title',
                'searchable' => 'title.title',
            ],
            [
                'name' => 'parent',
                'searchable' => 'parent.title',
            ],
            [
                'name' => 'trees',
                'get' => 'panelLinks()',
            ],
            [
                'name' => 'products',
                'sortable' => true
            ]
        ];

        # Get item joins
        $products = Product::select([
            \DB::raw('count(*) as products'),
            'category_id'
        ])->groupBy('category_id');

        $category = Category::select();
        $category = joinDictionary($category, Category::class);

        # get items
        $items = $category
            ->leftJoinSub($category, 'parent', 'parent.id', 'categories.parent_id')
            ->leftJoinSub($products, 'products', 'products.category_id', 'categories.id')
            ->select([
                'categories.id',
                'categories.path',
                'title.title',
                'parent.title as parent',
                'products'
            ]);

        return Crud::all($items, $heads, $this->perPage);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empty = (new Category())->fill([
            'id' => null,
            'title' => __('model.main')
        ]);

        $all = Category::all()->prepend($empty);

        $inputs = [
            [
                'name' => 'parent',
                'type' => 'select',
                'options' => [
                    'all' => $all,
                ],
            ],
            [
                'name' => 'image',
                'type' => 'file',
                'options' => [
                    'thumb' => 'image',
                    'max_files' => 1
                ]
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
     * @package store
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param CategoryRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function store(CategoryRequest $request)
    {
        $item = Category::create([
            'parent_id' => $request->parent ?: null,
        ]);

        $item->setDepth();
        $item->createLocale('title', $request->title);

        Crud::upload($item, $request->image, 'image');

        \Cache::delete('app.categories');
        \Cache::delete('app.categories.tree');

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
                'name' => 'title',
            ],
            [
                'name' => 'parent',
                'get' => 'parent.title',
                'link' => [
                    'search' => 'parent.title',
                    'column' => 'parent',
                    'route' => 'admin.category.index'
                ]
            ],
            [
                'name' => 'trees',
                'get' => 'panelLinks()'
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
            'id' => 0,
            'title' => __('model.main')
        ]);

        $all = Category::all()->prepend($empty);
        $item = $all->find($id);

        $inputs = [
            [
                'name' => 'parent',
                'type' => 'select',
                'options' => [
                    'all' => $all->where('id', '<>', $item->id),
                ],
                'value' => $item->parent_id
            ],
            [
                'name' => 'image',
                'type' => 'file',
                'value' => $item,
                'options' => [
                    'max_files' => 1
                ]
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
     * @param CategoryRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function update(CategoryRequest $request, $id)
    {
        $item = Category::find($id);

        $item->update([
            'parent_id' => $request->parent,
        ]);

        $item->setDepth();
        $item->updateLocale('title', $request->title);

        Crud::upload($item, $request->image, 'image');

        \Cache::delete('app.categories');
        \Cache::delete('app.categories.tree');

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
