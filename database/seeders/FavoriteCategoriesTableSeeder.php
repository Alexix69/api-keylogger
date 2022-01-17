<?php

namespace Database\Seeders;

use App\Models\FavoriteCategory;
use Illuminate\Database\Seeder;
use Namshi\JOSE\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        JWTAuth::attempt(['email' => 'administrador@dashboard.com', 'password' => '123123']);
        for ($i = 0; $i < 5; $i++) {
            FavoriteCategory::create([
                'folder_name' => $faker->name,
                'description' => $faker->sentence
            ]);
        }
    }
}
