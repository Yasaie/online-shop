<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yasaie\Helper\Y;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $role = Role::create(['name' => 'writer']);
//        $permission = Permission::create(['name' => 'edit articles']);
//        $role->givePermissionTo($permission);

//        $users = \App\User::all();
//
//        $users->find(1)->assignRole('admin');
//        $users->find(2)->assignRole('seller');

//        $permission = Permission::create(['name' => 'product.view']);
//
//        $admin = Role::create(['name' => 'admin']);
//        $seller = Role::create(['name' => 'seller']);
//
//        $users = \App\User::all();
//
//        $users->find(1)->assignRole('admin');
//        $users->find(2)->assignRole('seller');
        return view('home');
    }
}
