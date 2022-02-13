<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
            //$table->string('nickname');
            //$table->string('desktop_name');
            //$table->boolean('is_active')->default(true);
            $table->string("id")->primary();
            $table->timestamps();
            $table->string("nickname");
            $table->string('desktop_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
