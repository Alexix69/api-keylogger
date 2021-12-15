<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::truncate();

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 10; $i++){
            Type::create([
                'type_name' => 'keystroke',
                'description' => $faker->sentence
            ]);
        }

        for($i = 0; $i < 10; $i++){
            Type::create([
                'type_name' => 'screenshot',
                'description' => $faker->sentence
            ]);
        }

        for($i = 0; $i < 10; $i++){
            Type::create([
                'type_name' => 'website',
                'description' => $faker->sentence
            ]);
        }
    }
}
