<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->string('passaportClient', 9);
            $table->foreign('passaportClient')->references('passaportClient')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->string('codiVol', 6);
            $table->foreign('codiVol')->references('codiVol')->on('vols')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['passaportClient', 'codiVol']);
            $table->string('localitzadorReserva');
            $table->integer('numeroSeient');
            $table->boolean('isEquipatgeMa');
            $table->boolean('isEquipatgeCabinaMenor20');
            $table->integer('quantitatEquipatgesFacturats');
            $table->enum('tipusAsseguranca', [1000, 500, 0]);
            $table->float('preuVol');
            $table->enum('tipusChecking', ["Online", "Mostrador", "Quiosc"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
