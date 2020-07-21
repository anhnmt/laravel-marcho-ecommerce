<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\User;

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

        $routes = [];
        $route = \Route::getRoutes();

        foreach ($route as $value) {
            $name = $value->getName();
            if (strpos($name, 'admin') !== false && strpos($name, 'unisharp') === false && !in_array($name, $routes)) {
                array_push($routes, $name);
            }
        }

        unset($routes[0]);

        for ($i = 1; $i < count($routes); $i++) {
            DB::table('permissions')->insert([
                [
                    'name' => $routes[$i],
                    'guard_name' => 'web'
                ],
            ]);
        }

        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = User::create([
            'name' => 'Nguyễn Tuấn Minh',
            'email' => 'minh@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $user->assignRole($role3);
    }
}
