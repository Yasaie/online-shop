<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;
use Yasaie\Helper\Y;

class UserController extends BaseController
{
    public $route = 'admin.user.user';
    public $title = 'کاربران';
    public $model = User::class;
    public $load = [];

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
                'name' => 'full_name',
                'visible' => 1
            ],
            [
                'name' => 'email',
                'visible' => 1
            ],
            [
                'name' => 'role',
                'get' => 'getRoleNames().toArray()',
                'string' => true,
                'options' => [
                    'translate_get' => true
                ],
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
                'name' => 'first_name',
            ],
            [
                'name' => 'last_name',
            ],
            [
                'name' => 'email',
            ],
            [
                'name' => 'role',
                'get' => 'getRoleNames().toArray()',
                'options' => [
                    'translate_get' => true
                ]
            ],
        ];

        $item = User::find($id);
        foreach ($item->profile as $profile) {
            $heads[] = [
                'name' => $profile->title,
                'get' => 'profile.pivot.data',
                'options' => [
                    'translate_name' => false
                ]
            ];
        }

        return Crud::show($item, $heads, $this->route);
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
