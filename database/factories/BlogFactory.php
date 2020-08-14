<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define('App\Models\Blog', function (Faker $faker) {
    return [
        'user_id' => 1,
        'name' => $faker->sentence(10),
        'image' => '/uploads/blogs/thumbs/' . $faker->numberBetween(1, 16) . '.jpg',
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
        'status' => 1,
    ];
});
