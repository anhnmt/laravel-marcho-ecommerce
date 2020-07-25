<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 23; $i++) {
            Product::updateOrCreate([
                'category_id' => 1,
                'name' => 'Sản phẩm ' . $i,
                'image' => '/uploads/products/thumbs/product' . $i . '.jpg',
                'description' => '',
                'body' => '',
                'quantity' => rand(5, 20),
                'price' => 150000,
                'sale_price' => null,
                'status' => 1,
            ]);
        }
    }
}
