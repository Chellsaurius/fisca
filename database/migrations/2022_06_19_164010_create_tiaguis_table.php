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
            $table->id('id_tiangui');
            $table->string('nombre_tianguis');
            $table->integer('dia');
            $table->string('horario');
            $table->integer('estatus_tianguis')->default('1');
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
