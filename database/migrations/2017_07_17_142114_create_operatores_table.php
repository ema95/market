<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operatore', function (Blueprint $table) {
            $table->increments('IDOperatore');
            $table->string('nome');
            $table->string('cognome');
            $table->string('codiceFiscale')->unique();
            $table->string('tipo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operatore');
    }
}
