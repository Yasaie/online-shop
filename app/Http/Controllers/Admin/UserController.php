<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
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
     * @package create
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $inputs = [
            [
                'name' => 'first_name',
                'type' => 'text',
            ],
            [
                'name' => 'last_name',
                'type' => 'text',
            ],
            [
                'name' => 'email',
                'type' => 'text',
            ],
            [
                'name' => 'password',
                'type' => 'password',
            ],
            [
                'name' => 'confirm_password',
                'type' => 'password',
            ],
            [
                'name' => 'role',
                'type' => 'select',
                'options' => [
                    'all' => Role::all(),
                    'name' => 'name'
                ],
                'value' => 1,
            ]
        ];

        return Crud::create($inputs);
    }

    /**
     * @package store
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param UserRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $item = User::create($request->all());

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
        $heads[] = [
            'name' => 'created_at'
        ];
        $heads[] = [
            'name' => 'updated_at'
        ];

        return Crud::show($item, $heads, $this->route);
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
        $item = User::find($id);

        $inputs = [
            [
                'name' => 'first_name',
                'type' => 'text',
                'value' => $item->first_name
            ],
            [
                'name' => 'last_name',
                'type' => 'text',
                'value' => $item->last_name
            ],
            [
                'name' => 'email',
                'type' => 'text',
                'value' => $item->email
            ],
            [
                'name' => 'password',
                'type' => 'password',
            ],
            [
                'name' => 'confirm_password',
                'type' => 'password',
            ],
            [
                'name' => 'role',
                'type' => 'select',
                'options' => [
                    'all' => Role::all(),
                    'name' => 'name'
                ],
                'value' => $item->roles->first()->id,
            ]
        ];

        return Crud::create($inputs);
    }

    /**
     * @package update
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param UserRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        $item = User::find($id);

        $fields = $request->only('first_name', 'last_name', 'email');
        if ($request->password) {
            $fields['password'] = $request->password;
        }
        $item->update($fields);

        $item->touch();
        return redirect()->route($this->route . '.show', $id);
    }

    /**
     * @package destroy
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param $id
     *
     * @return bool|null
     * @throws \Exception
     */
    public function destroy($id)
    {
        return Crud::destroy($id, $this->model);
    }
}
