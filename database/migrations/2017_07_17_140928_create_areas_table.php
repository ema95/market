<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area', function (Blueprint $table) {
            $table->increments('IDArea');
            $table->string('luogo');
            $table->decimal('latitudine',17,15);
            $table->decimal('longitudine',17,15);
            //$table->unique(['latitudine','longitudine'); //Shouldn't be existing two place with same coordinates?
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area');
    }   
}
