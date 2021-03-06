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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pago');
            $table->string('folio')->default('null');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->string('rfc');
            $table->float('monto', 8, 2);
            $table->string('dias_laborales');
            $table->string('estatus_pago')->default('2')->comment('1 = pagado, 2 = no pagado');
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
        Schema::dropIfExists('pagos');
    }
};
