<?php

namespace App\Http\Controllers;

use App\Models\Comerciante;
use App\Models\Local;
use App\Models\Monto;
use App\Models\Pago;
use App\Models\Registro;
use Carbon\Carbon;
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
        $contador = strlen($merchant->dias);
        $contador = $contador/2;
        $merchant->dias = str_replace("1","LUNES", $merchant->dias);
        $merchant->dias = str_replace("2","MARTES", $merchant->dias);
        $merchant->dias = str_replace("3","MIÉRCOLES", $merchant->dias);
        $merchant->dias = str_replace("4","JUEVES", $merchant->dias);
        $merchant->dias = str_replace("5","VIERNES", $merchant->dias);
        $merchant->dias = str_replace("6","SÁBADO", $merchant->dias);
        $merchant->dias = str_replace("7","DOMINGO", $merchant->dias);
        $merchant->dias = substr($merchant->dias, 0, -1);
        $merchant->giro = substr($merchant->giro, 0, -1);
        $registration = Registro::all()->where('id_registro', $registro)->where('estatus_registro', 1)->first();
        $local = Local::all()->where('id_local', $registration->id_local)->where('status_local', 1)->first();
        
        $ahorita = Carbon::now();
        $fModificada = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ahorita)->format('Y');
        $monto = Monto::orderBy('id_montos', 'desc')->where('year', $fModificada)->first();
        //dd($merchant, $registration, $local);
        $total = $contador * $local->dimx * $local->dimy * $monto->monto;
        $today = today(); 
        $dates = []; 

        for($i=1; $i < $today->daysInMonth + 1; ++$i) {
            $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('F-d-Y');
        }
        //dd($today, $dates);

        return view('payments/nPayment', ['rfc' => $rfc, 'registro' => $registration->id_registro])
            ->with(compact('merchant', 'registration', 'local', 'contador', 'monto', 'total'));
    }

    public function savePayment(Request $request) {

        $total = 0;
        for ($i=$request->IDatePayment; $i < $request->FDateTianguis; $i++) { 
            # code...
            /*if (date('N', $i) == 1 || date('N', $i) == 2) {
                $total++;
            }*/
            $total++;
        }
        $demo = date('N');
        dd($request, $total, $demo);
    }
}
