<?php

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Faker\Factory;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 16; $i++) {
            Blog::create([
                'user_id' => 1,
                'name' => $faker->sentence(10),
                'image' => '/uploads/blogs/thumbs/' . $i . '.jpg',
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
            ]);
        }
    }
}
