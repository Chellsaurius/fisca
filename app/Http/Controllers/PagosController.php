<?php

namespace App\Http\Controllers;

use App\Models\Comerciante;
use App\Models\Local;
use App\Models\Monto;
use App\Models\Pago;
use App\Models\Registro;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagosController extends Controller
{
    //
    public function index() {
        $payments = Pago::all()->where('estatus_pago', 1);
        //$merchants = Comerciante::all()->where('estatus_comerciante', 1);

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
        $merchant->dias = substr($merchant->dias, 0, -1);
        //$merchant->giro = substr($merchant->giro, 0, -1);
        $registration = Registro::all()->where('id_registro', $registro)->where('estatus_registro', 1)->first();
        $local = Local::all()->where('id_local', $registration->id_local)->where('status_local', 1)->first();
        
        $ahorita = Carbon::now();
        $fModificada = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ahorita)->format('Y');
        $monto = Monto::orderBy('id_montos', 'desc')->where('year', $fModificada)->first();
        //dd($merchant, $registration, $local);
        $total = 1 * $local->dimx * $local->dimy * $monto->monto;
       
        //dd($today, $dates,  );
        
        return view('payments/nPayment', ['rfc' => $rfc, 'registro' => $registration->id_registro])
            ->with(compact('merchant', 'registration', 'local', 'monto', 'total'));
    }

    public function savePayment(Request $request) {

        $merchant = Comerciante::all()->where('rfc', $request->rfc)->where('estatus_comerciante', 1)->first();
        //dd($request, $merchant);

        /*
        $contador = strlen($merchant->dias);
        $dias = $merchant->dias;
        
        $dia = ["","","","","","",""];
        $counter = 0;

        for ($i=0; $i < $contador; $i++) { 
            
            if($i%2 == 0) {         //esta parte es para preparar el conteido del arreglo quitando las comas 
                $dia[$counter] = $dias[$i];     //ya que el arreglo viene 1,2,3,4 si deja residio de la división con 2 se quita
                $counter++;
            }  
        }

        $count = 0;
        $startDate = \Carbon\Carbon::parse($request->IDatePayment); 
        $endDate = \Carbon\Carbon::parse($request->FDatePayment);
       
        $interval = $startDate->diff($endDate);
        $numberOfDays = $interval->format('%d');

        for ($j=1; $j <= $numberOfDays; $j++) { 
            # code...
            if ($startDate->format('N') == $dia[0]) {
                # code...
                $count++;
            }
            if ($startDate->format('N') == $dia[1]) {
                # code...
                $count++;
            }
            if ($startDate->format('N') == $dia[2]) {
                # code...
                $count++;
            }
            if ($startDate->format('N') == $dia[3]) {
                # code...
                $count++;
            }
            if ($startDate->format('N') == $dia[4]) {
                # code...
                $count++;
            }
            if ($startDate->format('N') == $dia[5]) {
                # code...
                $count++;
            }
            if ($startDate->format('N') == $dia[6]) {
                # code...
                $count++;
            }

            $startDate->modify("+1 days");
        }

        $total = $request->value * $count;
        round($total, 2);
        number_format((float)$total, 2, '.', '',);
        */
        $pago = new Pago();
        $pago->folio = $request->folio;
        $pago->fecha_inicio = $request->IDatePayment;
        $pago->fecha_final = $request->FDatePayment;
        $pago->rfc = $request->rfc;
        $pago->monto = $request->total;
        $pago->dias_laborales = $request->dWorked;
        $pago->id_comerciante = $request->id_comerciante;
        $pago->id_local = $request->id_local;

        try {
            
            //code...
            $pago->save();
            sleep(2);

            return redirect()->route('home')->with('message', 'El pago del comerciante se ha agregado correctamente.');

        } catch (ModelNotFoundException $exception) {
            //throw $th;
            $delPago = Pago::select('id_pago')->orderBy('id_pago', 'desc')->first();
            $delPago = Pago::where('id_pago', $delPago)->delete();

            return redirect()->back()->withErrors($exception->getMessage())->withInput();
        }

    }

    public function localsPayment ($rfc) {
        //dd($rfc);

        $locales = DB::table('comerciantes')
            ->join('registros', 'comerciantes.id_comerciante', '=', 'registros.id_comerciante')
            ->join('locals', 'registros.id_local', '=', 'locals.id_local')
            ->leftJoin('tianguis', 'tianguis.id_tiangui', '=', 'locals.id_tiangui')
            ->select('comerciantes.*', 'locals.*', 'tianguis.*')
            ->where('estatus_registro', 1)
            ->where('rfc', $rfc)
            ->get();
        //dd($locales);

       
            
        
        return view('payments.dPayments',  ['rfc' => $rfc])->with(compact('locales'));
        //return view('payments/DPayments', ['rfc' => $rfc, 'registro' => $registration->id_registro])
        //    ->with(compact('merchant', 'registration', 'local', 'monto', 'total'));
        //return view('merchants.rComerciantes', compact('types'));
    }
}
