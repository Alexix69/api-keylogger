<?php

namespace Database\Seeders;

use App\Models\FavoriteCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Schema::disableForeignKeyConstraints();
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(RecordsTableSeeder::class);
        $this->call(FavoriteCategoriesTableSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
