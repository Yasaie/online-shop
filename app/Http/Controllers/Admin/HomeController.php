<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Spatie\Permission\Models\Role;
use Yasaie\Tracker\Model\Tracker;

class HomeController extends BaseController
{
    public function index()
    {
        $sellers_count = Role::findByName('admin')->users->count();
        $users_count = User::count();
        $products_visits = Tracker::where('route', 'product')->count();

        return view('admin.home.index')
            ->with(compact('sellers_count', 'users_count', 'products_visits'));
    }
}
