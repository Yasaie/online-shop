<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Yasaie\Cruder\Crud;

class CommentController extends BaseController
{
    public $route = 'admin.comment';
    public $title = 'نظرات';
    public $model = Comment::class;

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
                'name' => 'product.title',
                'visible' => 1
            ],
            [
                'name' => 'body',
                'visible' => 1
            ],
            [
                'name' => 'sent_date',
                'get' => 'created_at',
                'visible' => 1,
            ]
        ];

        return Crud::index($this->model, $heads, 'updated_at', $this->perPage);
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
                'name' => 'product.title',
                'visible' => 1
            ],
            [
                'name' => 'body',
                'visible' => 1
            ],
            [
                'name' => 'sent_date',
                'get' => 'created_at',
                'visible' => 1,
            ]
        ];

        return Crud::show($id, $heads, $this->route, $this->model);
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
