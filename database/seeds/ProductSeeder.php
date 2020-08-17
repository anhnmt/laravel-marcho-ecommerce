<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 1; $i < 24; $i++) {
            Product::create([
                'category_id' => $faker->numberBetween(1, 6),
                'name' => $faker->sentence(5),
                'image' => '/uploads/products/thumbs/product' . $i . '.jpg',
                'description' => $faker->text(),
                'body' => '<p>' . $faker->paragraph(15) . '</p>
                <blockquote>
                    <h4>“' . $faker->paragraph(5) . '”</h4>
                    <h6>JHON DOE</h6>
                </blockquote>
                <p>' . $faker->paragraph(15) . '</p>
                <p>' . $faker->paragraph(15) . '</p>
                <p>' . $faker->paragraph(15) . '</p>
                <p>' . $faker->paragraph(15) . '</p>',
                'quantity' => $faker->numberBetween(1, 20),
                'price' => $faker->randomElement(['100000', '150000', '200000', '250000', '300000', '350000', '400000', '450000', '500000', '550000', '600000', '650000', '700000', '750000', '800000', '850000', '900000', '950000', '1000000']),
                'sale_price' => null,
                'status' => 1,
            ]);
        }
    }
}
