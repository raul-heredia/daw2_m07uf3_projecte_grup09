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
            $table->string('passaportClient')->unique()->primary();
            $table->string('nom');
            $table->string('cognoms');
            $table->date('edat');
            $table->string('telefon')->unique();
            $table->string('direccio');
            $table->string('ciutat');
            $table->string('pais');
            $table->string('email')->unique();
            $table->enum('tipusTarjeta', ['Dèbit', 'Crèdit']);
            $table->bigInteger('numTarjeta')->unique();
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
