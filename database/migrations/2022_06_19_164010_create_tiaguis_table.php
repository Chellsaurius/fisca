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
        Schema::create('tianguis', function (Blueprint $table) {
            $table->id('id_tianguis');
            $table->string('nombre_tianguis');
            $table->integer('dia');
            $table->time('thora_inicio');
            $table->time('thora_final');
            $table->integer('estatus_tianguis')->default('1')->comment('1 = activo, 2 = inactivo');
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
        Schema::dropIfExists('tiaguis');
    }
};
