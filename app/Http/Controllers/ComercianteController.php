<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Comerciante;
use App\Models\Local;
use App\Models\Registro;
use App\Models\Tiangui;
use GrahamCampbell\ResultType\Success;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

            //$catMerchant = Comerciante::where('rfc', $rfc)->first();
            //dd($catMerchant);
            return redirect()->route('rLocal', ['rfc' => $rfc])->with('message', 'El comerciante se ha agregado correctamente');
            
           
        } catch (\Throwable $th) {
            //throw $th;
            $del = Comerciante::where('rfc',$rfc)->delete();
            return redirect()->route('home')->with('failureMerchantMsg','El comerciante no se ha sido registrado D:.', compact('th'));
        }
        
    }

    public function listMerchant(){
        $merchants = Comerciante::all()->where('estatus_comerciante', 1);
        //$locals = Local::all();
        // dd($locals);
        return view('merchants.lComerciantes', compact('merchants'));
    }

    public function registerLocal($rfc) {

        $merchant = Comerciante::all()->where('rfc', $rfc)->first();
        $dias = $merchant->dias;
        $tianguis = Tiangui::all();
        //dd($tianguis);
        return view('merchants.rLocal', compact('rfc', 'tianguis', 'merchant', 'dias'));
    }

    public function saveMerchantLocal($rfc, Request $request){
        //dd($request, $rfc);
        $rfc = $rfc;
        $local = new Local();

        $local->dimx = $request->dimx; 
        $local->dimy = $request->dimy; 
        $local->ubicacion_reco = strtoupper($request->ubicacion);
        if ($request->tianguis != null) {
            # code...
            $tianguis = Tiangui::select('thora_inicio', 'thora_final')->where('id_tianguis', $request->tianguis)->where('estatus_tianguis', 1)->first();
            //dd($tianguis);  
            $local->id_tianguis = $request->tianguis;
            $local->lhora_inicio = $tianguis->thora_inicio;
            $local->lhora_final = $tianguis->thora_final;
            //dd($local);
            
        }
        else {
            # code...
            $local->id_tianguis = null;
            $local->lhora_inicio = $request->IHour;
            $local->lhora_final = $request->FHour;
        }
        
        //dd($local);
        try {
                
            $local->save();

            sleep(2);
            //dd($local);
            $locals = Local::orderBy('id_local','desc')->first();
            $registroComerciante = Comerciante::select('id_comerciante')->where('rfc', $rfc)->first();

            $registro = new Registro();
            $registro->id_comerciante = $registroComerciante->id_comerciante;
            $registro->id_local = $locals->id_local;
            //dd($registro);

            $registro->save();
            $registros = Registro::orderBy('id_registro', 'desc')->first();
            sleep(1);
            //dd($registro);
            
            return redirect()->route('payment.new', ['rfc' => $rfc, 'registro' => $registros->id_registro])->with('message', 'El local del comerciante se ha agregado correctamente.');
            
        } catch (ModelNotFoundException $exception) {
            //throw $th;
            $delLocal = Local::select('id_local')->orderBy('id_local','desc')->first();
            //dd($delLocal);
            $delocal = Local::where('id_local', $delLocal)->delete();

            $delRegis = Registro::orderBy('id_local','desc')->first();
            $delRegi = Registro::where('id_local', $delRegis)->delete();
            return redirect()->back()->withError($exception->getMessage())->withInput();
        }
    }
    

}
