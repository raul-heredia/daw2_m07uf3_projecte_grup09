<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vols', function (Blueprint $table) {
            $table->string('codiVol', 6)->unique()->primary();
            $table->string('codiAvio');
            $table->string('ciutatOrigen');
            $table->string('ciutatDestinacio');
            $table->string('terminalOrigen');
            $table->string('terminalDestinacio');
            $table->dateTime('dataSortida');
            $table->dateTime('dataArribada');
            $table->enum('classe', ['Turista', 'Bussiness', 'Primera']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vols');
    }
}
