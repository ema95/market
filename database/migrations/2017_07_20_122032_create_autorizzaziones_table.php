<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutorizzazionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autorizzazione', function (Blueprint $table) {
            $table->increments('IDAutorizzazione');
            $table->integer('IDTipologia')->unsigned()->unique();
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
        Schema::dropIfExists('autorizzazione');
    }
}
