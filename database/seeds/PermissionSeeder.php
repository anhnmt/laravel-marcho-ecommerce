<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $routes = Route::getRoutes();
        $permissions = Permission::all();
        $permission = [];
        // dd($permissions);

        foreach ($permissions as $value) {
            array_push($permission, $value->name);
        }

        foreach ($routes as $route) {
            $route_name = $route->getName();

            if (
                strpos($route_name, 'admin') !== false
                && strpos($route_name, 'unisharp') === false
                && in_array($route_name, $permission) === false
            ) {
                Permission::updateOrCreate([
                    'name' => $route_name,
                    'guard_name' => 'web'
                ]);
            }
        }
    }
}
