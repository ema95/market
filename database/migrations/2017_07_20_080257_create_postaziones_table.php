<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostazionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postazione', function (Blueprint $table) {
            $table->increments('IDPostazione');
            $table->integer('IDTipologia')->unsigned()->nullable();
            $table->decimal('latitudine',17,15);
            $table->decimal('longitudine',17,15);
            $table->integer('IDArea')->unsigned();

            $table->unique(['latitudine','longitudine','IDArea']);

            $table->foreign('IDArea')->references('IDArea')->on('area')->onDelete('cascade');
            $table->foreign('IDTipologia')->references('IDTipologia')->on('tipologia')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postazione');
    }
}
