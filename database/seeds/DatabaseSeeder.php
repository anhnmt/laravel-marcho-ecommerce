<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(AttributeValueSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(PermissionSeeder::class);
    }
}
