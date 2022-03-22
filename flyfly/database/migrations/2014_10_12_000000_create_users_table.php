<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('nom');
            $table->string('cognoms');
            $table->string('email')->unique()->primary();
            $table->string('password');
            $table->boolean('isCapDepartament');
            $table->timestamp('horaEntrada', $precision = 0)->nullable();
            $table->timestamp('horaSortida', $precision = 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuaris');
    }
}
