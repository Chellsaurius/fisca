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
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->integer('status_local')->default('1');
            $table->unsignedBigInteger('id_tiangui')->nullable();
            $table->foreign('id_tiangui')->references('id_tiangui')->on('tianguis');
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
