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
            'name' => 'Demo Admin',
            'email' => 'xdorro@gmail.com',
            'password' => bcrypt('1230123'),
        ]);

        User::create([
            'name' => 'Demo User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('1230123'),
        ]);
    }
}
