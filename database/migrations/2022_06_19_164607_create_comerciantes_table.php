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
        Schema::create('comerciantes', function (Blueprint $table) {
            $table->id('id_comerciante');
            $table->string('nombre_comerciante');
            $table->string('apellido_comerciante');
            $table->string('rfc');
            $table->string('domicilio');
            $table->string('telefono1');
            $table->string('telefono2');
            $table->string('giro');
            $table->string('dias');
            $table->text('observaciones');
            $table->integer('apercibimientos');
            $table->integer('estatus_comerciante')->default('1');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
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
        Schema::dropIfExists('comerciantes');
    }
};
