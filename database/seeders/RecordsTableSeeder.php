<?php

namespace Database\Seeders;

use App\Models\Record;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        JWTAuth::attempt(['email' => 'administrador@dashboard.com', 'password' => '123123']);


        for ($i = 0; $i < 600; $i++) {
            Record::create([
                'app_name' => $faker->domainName,
                'window_name' => $faker->name,
                'event_type' => $faker->lastName,
//                'archived' => 0,
//                'favorite' => 0,
                'date' => '2022-01-05',
                'time' => $faker->time,
                'type' => 'screenshot',
                'content' => $faker->imageUrl(1050, 600),
                'client_id' => $faker->numberBetween(1, 5),
                //'favorite_category_id' => $faker->numberBetween(1, 5)
            ]);
        }

        for ($i = 0; $i < 200; $i++) {
            Record::create([
                'app_name' => $faker->domainName,
                'window_name' => $faker->name,
                'event_type' => $faker->lastName,
//                'archived' => 0,
//                'favorite' => 0,
                'date' => '2022-01-06',
                'time' => $faker->time,
                'type' => 'website',
                'content' => $faker->url,
                'client_id' => $faker->numberBetween(1, 5),
                //'favorite_category_id' => $faker->numberBetween(1, 5)
            ]);
        }
        for ($i = 0; $i < 50; $i++) {
            Record::create([
                'app_name' => $faker->domainName,
                'window_name' => $faker->name,
                'event_type' => $faker->lastName,
//                'archived' => 0,
//                'favorite' => 0,
                'date' => '2022-01-04',
                'time' => $faker->time,
                'type' => 'keystroke',
                'content' => 'musica',
                'client_id' => $faker->numberBetween(1, 5),
                //'favorite_category_id' => $faker->numberBetween(1, 5)
            ]);
        }

        for ($i = 0; $i < 50; $i++) {
            Record::create([
                'app_name' => $faker->domainName,
                'window_name' => $faker->name,
                'event_type' => $faker->lastName,
//                'archived' => 0,
//                'favorite' => 0,
                'date' => '2022-01-04',
                'time' => $faker->time,
                'type' => 'keystroke',
                'content' => $faker->text,
                'client_id' => $faker->numberBetween(1, 5),
                //'favorite_category_id' => $faker->numberBetween(1, 5)
            ]);
        }

        for ($i = 0; $i < 50; $i++) {
            Record::create([
                'app_name' => $faker->domainName,
                'window_name' => $faker->name,
                'event_type' => $faker->lastName,
//                'archived' => 0,
//                'favorite' => 0,
                'date' => '2022-01-04',
                'time' => $faker->time,
                'type' => 'keystroke',
                'content' => "libros",
                'client_id' => $faker->numberBetween(1, 5),
                //'favorite_category_id' => $faker->numberBetween(1, 5)
            ]);
        }

        for ($i = 0; $i < 50; $i++) {
            Record::create([
                'app_name' => $faker->domainName,
                'window_name' => $faker->name,
                'event_type' => $faker->lastName,
//                'archived' => 0,
//                'favorite' => 0,
                'date' => '2022-01-04',
                'time' => $faker->time,
                'type' => 'keystroke',
                'content' => 'autos deportivos',
                'client_id' => $faker->numberBetween(1, 5),
                //'favorite_category_id' => $faker->numberBetween(1, 5)
            ]);
        }
    }
}
