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
        Attribute::updateOrCreate([
            'name' => 'Size',
            'slug' => 'size',
        ]);

        Attribute::updateOrCreate([
            'name' => 'Color',
            'slug' => 'color',
        ]);
    }
}
