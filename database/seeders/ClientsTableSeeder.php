<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::truncate();

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 6; $i++){
            Client::create([
                'nickname' => $faker->firstName,
                'desktop_name' => $faker->userName,
                'is_active' => $faker->numberBetween(0, 1)
            ]);
        }
    }
}
