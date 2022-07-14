<?php

namespace App\Http\Controllers;

use App\Models\Comerciante;
use App\Models\Local;
use App\Models\Pago;
use App\Models\Registro;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    //
    public function index() {
        $payments = Pago::all();

        return view('payments.lPayments', compact('payments'));
    }

    public function newPayment($rfc, $registro) {
        //dd($rfc, $registro);
        $merchant = Comerciante::all()->where('rfc', $rfc)->where('estatus_comerciante', 1)->first();
        $merchant->dias = str_replace("1","LUNES", $merchant->dias);
        $merchant->dias = str_replace("2","MARTES", $merchant->dias);
        $merchant->dias = str_replace("3","MIÉRCOLES", $merchant->dias);
        $merchant->dias = str_replace("4","JUEVES", $merchant->dias);
        $merchant->dias = str_replace("5","VIERNES", $merchant->dias);
        $merchant->dias = str_replace("6","SÁBADO", $merchant->dias);
        $merchant->dias = str_replace("7","DOMINGO", $merchant->dias);
        $registration = Registro::all()->where('id_registro', $registro)->where('estatus_registro', 1)->first();
        $local = Local::all()->where('id_local', $registration->id_local)->where('status_local', 1)->first();
        //dd($merchant, $registration, $local);
        

        return view('payments/nPayment', ['rfc' => $rfc, 'registro' => $registration->id_registro])->with(compact('merchant', 'registration', 'local'));
    }
}
