<?php

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::create([
            'name' => 'Size',
            'slug' => 'size',
            'type' => 'select',
        ]);

        Attribute::create([
            'name' => 'Color',
            'slug' => 'color',
            'type' => 'select',
        ]);
    }
}
