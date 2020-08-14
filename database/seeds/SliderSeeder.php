<?php

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::updateOrCreate([
            'name' => 'Thời trang nam',
            'body' => 'Giảm tới 50% tất cả sản phẩm',
            'link' => 'product?category=1',
            'image' => '/uploads/sliders/thumbs/slider2.jpg',
            'status' => 1,
        ]);

        Slider::updateOrCreate([
            'name' => 'Thời trang nữ',
            'body' => 'Giảm tới 50% trong tuần này',
            'link' => 'product?category=2',
            'image' => '/uploads/sliders/thumbs/slider1.jpg',
            'status' => 1,
        ]);

        Slider::updateOrCreate([
            'name' => 'Khuyến mãi hè',
            'body' => 'Đưa đến những trải nghiệm mới',
            'link' => 'product?category=3',
            'image' => '/uploads/sliders/thumbs/slider3.jpg',
            'status' => 1,
        ]);
    }
}
