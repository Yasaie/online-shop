<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Requests\UserRequest;
use App\State;
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
            ],
            [
                'name' => 'country',
                'get' => 'country.name',
                'type' => 'select',
                'options' => [
                    'all' => Country::all(),
                    'name' => 'name'
                ],
            ],
            [
                'name' => 'state',
                'get' => 'state.name',
                'type' => 'ajaxselect',
                'options' => [
                    'url' => route('api.address.state', 'country'),
                    'check' => 'country'
                ],
            ],
            [
                'name' => 'city',
                'get' => 'city.name',
                'type' => 'ajaxselect',
                'options' => [
                    'url' => route('api.address.city', 'state'),
                    'check' => 'state'
                ],
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
        $item = User::create(array_merge($request->all(), [
            'country_id' => $request->country,
            'state_id' => $request->state,
            'city_id' => $request->city,
        ]));
        $item->assignRole($request->role);

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
                'name' => 'country',
                'get' => 'country.name',
            ],
            [
                'name' => 'state',
                'get' => 'state.name'
            ],
            [
                'name' => 'city',
                'get' => 'city.name'
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
            ],
            [
                'name' => 'country',
                'get' => 'country.name',
                'type' => 'select',
                'options' => [
                    'all' => Country::all(),
                    'name' => 'name'
                ],
                'value' => $item->country_id,
            ],
            [
                'name' => 'state',
                'get' => 'state.name',
                'type' => 'ajaxselect',
                'options' => [
                    'url' => route('api.address.state', 'country'),
                    'check' => 'country'
                ],
                'value' => $item->state_id,
            ],
            [
                'name' => 'city',
                'get' => 'city.name',
                'type' => 'ajaxselect',
                'options' => [
                    'url' => route('api.address.city', 'state'),
                    'check' => 'state'
                ],
                'value' => $item->city_id,
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

        $item->update(array_merge($fields, [
            'country_id' => $request->country,
            'state_id' => $request->state,
            'city_id' => $request->city,
        ]));

        $item->roles()->each(function ($id) use ($item) {
            $item->removeRole($id->id);
        });
        $item->assignRole($request->role);

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
