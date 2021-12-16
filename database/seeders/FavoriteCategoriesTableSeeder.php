<?php

namespace Database\Seeders;

use App\Models\FavoriteCategory;
use Illuminate\Database\Seeder;

class FavoriteCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FavoriteCategory::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            FavoriteCategory::create([
                'folder_name' => $faker->name,
                'description' => $faker->sentence
            ]);
        }
    }
}
