<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->integer('estatus_registro')->default('1');
            $table->unsignedBigInteger('id_comerciante')->nullable();
            $table->foreign('id_comerciante')->references('id_comerciante')->on('comerciantes');
            $table->unsignedBigInteger('id_local')->nullable();
            $table->foreign('id_local')->references('id_local')->on('locales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros');
    }
};
