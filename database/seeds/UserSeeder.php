<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Demo Super Admin',
            'email' => 'sa@gmail.com',
            'password' => bcrypt('123456'),
        ])->assignRole('super-admin');

        User::create([
            'name' => 'Demo Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Demo Editor',
            'email' => 'editor@gmail.com',
            'password' => bcrypt('123456'),
        ])->assignRole('editor');

        User::create([
            'name' => 'Demo Test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('123456'),
        ])->assignRole('test');

        User::create([
            'name' => 'Demo User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
