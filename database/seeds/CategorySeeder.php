<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::updateOrCreate([
            'name' => 'Nam',
            'image' => '/uploads/categories/thumbs/5f12293a9dd36.jpg',
            'description' => 'Đồ cho nam',
            'status' => 1,
        ]);

        Category::updateOrCreate([
            'name' => 'Nữ',
            'image' => '/uploads/categories/thumbs/5f12293a9dd36.jpg',
            'description' => 'Đồ cho nữ',
            'status' => 1,
        ]);

        Category::updateOrCreate([
            'name' => 'Giảm giá',
            'image' => '/uploads/categories/thumbs/5f12293a9dd36.jpg',
            'description' => 'Giảm giá',
            'status' => 1,
        ]);

        Category::updateOrCreate([
            'name' => 'Thời trang',
            'image' => '/uploads/categories/thumbs/5f12293a9dd36.jpg',
            'description' => 'Thời trang',
            'status' => 1,
        ]);

        Category::updateOrCreate([
            'name' => 'Hot',
            'image' => '/uploads/categories/thumbs/5f12293a9dd36.jpg',
            'description' => 'Sản phẩm Hot',
            'status' => 1,
        ]);

        Category::updateOrCreate([
            'name' => 'Phụ kiện',
            'image' => '/uploads/categories/thumbs/5f12293a9dd36.jpg',
            'description' => 'Phụ kiện',
            'status' => 1,
        ]);
    }
}
