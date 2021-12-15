<?php

namespace Database\Seeders;

use App\Models\Record;
use Illuminate\Database\Seeder;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Record::truncate();

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 250; $i++){
            Record::create([
                'app_name' => $faker->domainName,
                'window_name' => $faker->name,
                'event_type' => $faker->sentence,
                'archived' => $faker->numberBetween(0,1),
                'date' => $faker->date,
                'time' => $faker->time,
                'content' => $faker->text
            ]);
        }
    }
}
