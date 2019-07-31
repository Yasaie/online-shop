<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Yasaie\Cruder\Crud;

class CommentController extends BaseController
{
    public $route = 'admin.comment';
    public $title = 'نظرات';
    public $model = Comment::class;
    public $loads = ['product', 'user'];

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
                'name' => 'product',
                'get' => 'product.title',
                'visible' => 1
            ],
            [
                'name' => 'user',
                'get' => 'user.full_name',
                'visible' => 1
            ],
            [
                'name' => 'title',
                'visible' => 1
            ],
            [
                'name' => 'sent_date',
                'get' => 'created_at',
                'visible' => 1,
            ]
        ];

        return Crud::index($this->model, $heads, 'sent_date_desc', $this->perPage, $this->loads);
    }

    public function unread()
    {
        view()->share('title', 'نظرات خوانده نشده');

        # table headers
        $heads = [
            [
                'name' => 'id',
            ],
            [
                'name' => 'product',
                'get' => 'product.title',
                'visible' => 1
            ],
            [
                'name' => 'user',
                'get' => 'user.full_name',
                'visible' => 1
            ],
            [
                'name' => 'title',
                'visible' => 1
            ],
            [
                'name' => 'sent_date',
                'get' => 'created_at',
                'visible' => 1,
            ]
        ];

        $items = Comment::get()
            ->load($this->loads)
            ->where('is_changed', false);

        return Crud::index($items, $heads, 'sent_date_desc', $this->perPage);
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
        $item = Comment::find($id);

        if($item) $item->touch();

        $heads = [
            [
                'name' => 'id',
            ],
            [
                'name' => 'product',
                'get' => 'product.title',
            ],
            [
                'name' => 'user',
                'get' => 'user.full_name'
            ],
            [
                'name' => 'title'
            ],
            [
                'name' => 'body',
            ],
            [
                'name' => 'sent_date',
                'get' => 'created_at',
            ],
            [
                'name' => 'read_date',
                'get' => 'updated_at'
            ]
        ];

        return Crud::show($item, $heads, $this->route);
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
