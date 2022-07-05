<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Comerciante;
use App\Models\Local;
use App\Models\Tiangui;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ComercianteController extends Controller
{
    //
    public function index(){
        $types = Categoria::all();

        return view('merchants.rComerciantes', compact('types'));
    }

    public function saveMerchant(Request $request)
    {
        # code...
        //dd($request);
        $business = "";
        $days = "";
        $giros = $request->giro;
        $wdays = $request->dia;
        if ($request->giro != null) {
            # code...
            $request->validate([
                'nombre' => ['required', 'string', 'min:2', 'max:40'],
                'apellidos' => ['required', 'string', 'min:5', 'max:40'],
                'rfc' => ['string', 'min:13', 'max:15', 'unique:comerciantes'], 
                'telefono1' => ['required', 'string', 'numeric', 'digits:10'],
                'direccion' => ['required', 'string', 'max:255'],
                'dia' => ['required'],
                'giro' => ['required'],
            ]);

        }
        else{
            $request->validate([
                'nombre' => ['required', 'string', 'min:2', 'max:40'],
                'apellidos' => ['required', 'string', 'min:5', 'max:40'],
                'rfc' => ['string', 'min:13', 'max:15', 'unique:comerciantes'], 
                'telefono1' => ['required', 'string', 'numeric', 'digits:10'],
                'direccion' => ['required', 'string', 'max:255'],
                'dia' => ['required'],
                'otrosg' => ['required'],
            ]);
        }
        //dd($giros);
        $contador = count($request->giro);
        for ($i=0; $i < $contador; $i++) { 
            # code...
            $business = $business.strtoupper($giros[$i]).',';
        }
        if($request->otrosg != null)
        {
            $business = $business.strtoupper($request->otrosg).',';
        }

        $contador = count($request->dia);
        for ($i=0; $i < $contador; $i++) { 
            # code...
            $days = $days.strtoupper($wdays[$i]).',';
        }
        
        //dd($wdays);
        $merchant = new Comerciante();

        $merchant->nombre_comerciante = strtoupper($request->nombre);
        $merchant->apellido_comerciante = strtoupper($request->apellidos);
        $merchant->rfc = strtoupper($request->rfc);
        $merchant->domicilio = strtoupper($request->direccion);
        $merchant->telefono1 = strtoupper($request->telefono1);
        if ($request->telefono2 != null) {
            $merchant->telefono2 = strtoupper($request->telefono2);
            # code...
        }
        
        $merchant->giro = strtoupper($business);
        $merchant->dias = strtoupper($days);
        $merchant->id_user = Auth::user()->id;
        $merchant->id_categoria = strtoupper($request->categoria);
        $rfc = strtoupper($request->rfc);
        //dd($merchant);
        try {
            //code...
            $merchant->save();
            
            sleep(2);
            return redirect()->route('home')->with('message', 'El comerciante se ha agregado correctamente');
        } catch (\Throwable $th) {
            //throw $th;
            return view('home')->with('failureMerchantMsg','El comerciante no se ha sido registrado D:.', compact('th'));
        }
    
    }

    public function registerLocal(){
        $merchants = Comerciante::all()->where('estatus_comerciante', 1);

        return view('merchants.rLocales', compact('merchants'));
    }

    public function listMerchant(){
        $merchants = Comerciante::all()->where('estatus_comerciante', 1);
        //dd($merchants);
        return view('merchants.lComerciantes', compact('merchants'));
    }

    public function dataLocal($rfc) {
        //dd($rfc);
        $merchant = Comerciante::where('rfc', $rfc)->first();
        $tianguis = Tiangui::where('estatus_tianguis', '!=', 2); //el distinto de 2 es por si en algún momento hay otro status en el tianguis, ejemplo: en construcción y se quiera mostrar la información
        //dd($merchant);

        return view ('merchants.dLocales', compact('merchant','tianguis'));
    }

    public function saveLocal(Request $request, $rfc) {
        //dd($request, $rfc, $tianguis);

        $local = new Local();
        $local->dimx = $request->dimx;
        $local->dimy = $request->dimy;
        $local->ubicacion_reco = $request->ubicacion;
        if ($request->cat == 1) {
            # code...
            $tianguis = Tiangui::where('id_tiangui', $request->tianguis)->first();
            $local->hora_inicio = $tianguis->thora_inicio; 
            $local->hora_final = $tianguis->thora_final;
            $local->id_tianguis = $tianguis->id_tiangui;
        }
        elseif ($request->cat == 2 )
        {
            $local->hora_inicio = $request->IHour; 
            $local->hora_final = $request->fHour; 
        }
        else
        {
            $local->hora_inicio = $request->IHour; 
            $local->hora_final = $request->fHour; 
        }

    }

}
