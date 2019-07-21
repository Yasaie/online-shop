<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Yasaie\Cruder\Crud;

class CommentController extends BaseController
{
    public $route = 'admin.comment';
    public $title = 'نظرات';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        # Load items for send to view
        $items = Comment::get();

        return Crud::index($items, $heads, 'updated_at', $this->perPage);
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
        # Load item for send to view
        $item = Comment::find($id);

        return Crud::show($item, $heads);
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
