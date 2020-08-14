<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define('App\Models\Product', function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1, 6),
        'name' => $faker->sentence(5),
        'image' => '/uploads/products/thumbs/product' . $faker->numberBetween(1, 23) . '.jpg',
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
        'price' => $faker->numberBetween(50000, 1000000),
        'sale_price' => null,
        'status' => 1,
    ];
});
