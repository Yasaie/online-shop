<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class PermissionsTableSeeder
 */
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_routes = [];
        foreach (\Route::getRoutes() as $route) {
            $name = $route->getName();
            if (preg_match('/^admin\..*(?<!store|update)$/', $name)) {
                $admin_routes[] = $name;
            }
        }
        foreach ($admin_routes as $permission) {
            $permission = ['name' => $permission];
            Permission::create($permission);
        }

        $admin = Role::create(['name' => 'admin']);
        $customer = Role::create(['name' => 'customer']);
        $seller = Role::create(['name' => 'seller']);
        $writer = Role::create(['name' => 'writer']);

        $admin->givePermissionTo($admin_routes);

        $seller->givePermissionTo([
            'admin.home',
            'admin.seller.pricing.index',
            'admin.seller.pricing.create',
            'admin.cart.order.index'
        ]);

        $writer->givePermissionTo([
            'admin.home',
            'admin.product.create'
        ]);

        $users = User::all();

        $users->find(1)->assignRole('admin');
        $users->find(2)->assignRole(['seller', 'writer']);
    }
}
