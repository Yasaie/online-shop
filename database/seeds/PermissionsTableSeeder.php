<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create(['name' => 'product.view']);

        $customer = Role::create(['name' => 'customer']);
        $seller = Role::create(['name' => 'seller']);
        $admin = Role::create(['name' => 'admin']);

        $users = \App\User::all();

        $users->find(1)->assignRole('admin');
        $users->find(2)->assignRole('seller');
    }
}
