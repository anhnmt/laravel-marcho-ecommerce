<?php

use App\Models\AttributeValue;
use Illuminate\Database\Seeder;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Size
        $size_values = [
            [
                'value' => 'XXS',
                'code' => 'xxs',
            ],
            [
                'value' => 'XS',
                'code' => 'xs',
            ],
            [
                'value' => 'S',
                'code' => 's',
            ],
            [
                'value' => 'M',
                'code' => 'm',
            ],
            [
                'value' => 'L',
                'code' => 'l',
            ],
            [
                'value' => 'XL',
                'code' => 'xl',
            ],
            [
                'value' => 'XXL',
                'code' => 'xxl',
            ],
        ];

        // color
        $color_values = [
            [
                'value' => 'White',
                'code' => 'white',
            ],
            [
                'value' => 'Blue',
                'code' => 'blue',
            ],
            [
                'value' => 'Green',
                'code' => 'green',
            ],
            [
                'value' => 'Yellow',
                'code' => 'yellow',
            ],
            [
                'value' => 'Orange',
                'code' => 'orange',
            ],
            [
                'value' => 'Pink',
                'code' => 'pink',
            ],
            [
                'value' => 'Gray',
                'code' => 'gray',
            ],
            [
                'value' => 'Red',
                'code' => 'red',
            ],
            [
                'value' => 'Black',
                'code' => 'black',
            ],
            [
                'value' => 'Brown',
                'code' => 'brown',
            ],
            [
                'value' => 'Violet',
                'code' => 'violet',
            ],
        ];

        foreach ($size_values as $value) {
            AttributeValue::updateOrCreate([
                'attribute_id' => 1,
                'value' => $value['value'],
                'code' => $value['code'],
            ]);
        }

        foreach ($color_values as $value) {
            AttributeValue::updateOrCreate([
                'attribute_id' => 2,
                'value' => $value['value'],
                'code' => $value['code'],
            ]);
        }
    }
}
