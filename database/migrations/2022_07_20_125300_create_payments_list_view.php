<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::statement(("create View pagoLista as
                SELECT 
                    comerciantes.id_comerciante, 
                    comerciantes.nombre_comerciante, 
                    comerciantes.apellido_comerciante,
                    comerciantes.rfc,
                    comerciantes.dias,
                    comerciantes.giro,
                    comerciantes.apercibimientos,
                    comerciantes.estatus_comerciante,
                    locales.id_local,
                    locales.dimx,
                    locales.dimy,
                    locales.id_tianguis,
                    locales.lhora_inicio,
                    locales.lhora_final,
                    locales.status_local,
                    locales.ubicacion_reco,
                    tianguis.nombre_tianguis,
                    tianguis.estatus_tianguis

                    FROM comerciantes
                        JOIN registros
                            on comerciantes.id_comerciante = registros.id_comerciante
                        JOIN locales
                            on registros.id_local = locales.id_local
                        JOIN tianguis
                            on locales.id_tianguis =  tianguis.id_tianguis
                        
            ")) ;
         
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments_list_view');
    }
};
