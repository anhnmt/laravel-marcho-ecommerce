<?php

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'super-admin',
        ]);

        Role::create([
            'name' => 'admin',
        ])->givePermissionTo(Permission::all());

        Role::create([
            'name' => 'editor',
        ])->givePermissionTo([
            'admin.dashboard',
            'admin.blog.list',
            'admin.blog.index',
            'admin.blog.create',
            'admin.blog.edit',
            'admin.blog.store',
            'admin.blog.update',
            'admin.blog.destroy',
        ]);

        Role::create([
            'name' => 'test',
        ])->givePermissionTo([
            'admin.dashboard',
            'admin.blog.list',
            'admin.blog.index',
        ]);
    }
}
