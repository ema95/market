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

            $table->integer('IDTipologia')->unsigned();
            $table->integer('riga');
            $table->integer('colonna');
            $table->integer('IDArea')->unsigned();

            $table->primary(['riga','colonna','IDArea']);

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
