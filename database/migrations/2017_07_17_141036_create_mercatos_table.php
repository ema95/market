<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMercatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mercato', function (Blueprint $table) {
            $table->increments('IDMercato');
            $table->date('dataCreazione');
            $table->integer('IDArea')->unsigned();
            $table->unique(array('dataCreazione','IDArea'));
            $table->foreign('IDArea')->references('IDArea')->on('area')->onDelete('cascade');
        });
        DB::statement('ALTER TABLE mercato DROP PRIMARY KEY , ADD PRIMARY KEY (`IDMercato`  , `IDArea`); ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mercato');
    }
}
