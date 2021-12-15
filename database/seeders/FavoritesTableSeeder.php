<?php

namespace Database\Seeders;

use App\Models\Favorite;
use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Favorite::truncate();

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 50; $i++){
            Favorite::create([
                'folder_name' => $faker->firstName,
                'description' => $faker->sentence
            ]);
        }
    }
}
