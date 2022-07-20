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
        Schema::create('locales', function (Blueprint $table) {
            $table->id('id_local');
            $table->float('dimx', 8, 2);
            $table->float('dimy', 8 ,2);
            $table->text('ubicacion_reco');
            $table->time('lhora_inicio');
            $table->time('lhora_final');
            $table->integer('status_local')->default('1')->comment('1 = activo, 2 = inactivo');
            $table->unsignedBigInteger('id_tianguis')->nullable();
            $table->foreign('id_tianguis')->references('id_tianguis')->on('tianguis');
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
        Schema::dropIfExists('locals');
    }
};
