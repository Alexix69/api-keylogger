<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdColumnRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->unsignedBigInteger('favorite_category_id')->default(null)->nullable();
            $table->foreign('favorite_category_id')->references('id')->on('favorite_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->dropForeign(['favorite_category_id']);
        });
    }
}

//RELACIÓN PARA VER REPORTES POR CATEGORIAS LISTA, AÑADIR RUTA
