<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Comerciante;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
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
            $business = $business.$giros[$i].',';
        }
        if($request->otrosg != null)
        {
            $business = $business.$request->otrosg.',';
        }

        $contador = count($request->dia);
        for ($i=0; $i < $contador; $i++) { 
            # code...
            $days = $days.$wdays[$i].',';
        }
        
        //dd($wdays);
        $merchant = new Comerciante();

        $merchant->nombre_comerciante = $request->nombre;
        $merchant->apellido_comerciante = $request->apellidos;
        $merchant->rfc = $request->rfc;
        $merchant->domicilio = $request->direccion;
        $merchant->telefono1 = $request->telefono1;
        if ($request->telefono2 != null) {
            $merchant->telefono2 = $request->telefono2;
            # code...
        }
        
        $merchant->giro = $business;
        $merchant->dias = $days;

        $merchant->id_categoria = $request->categoria;
        $rfc = $request->rfc;
        //dd($merchant);
        if ($merchant->save())
        {
            $message = 'success';
        }else{
            $message = 'error';
        }
        
        sleep(2);
       
        //$merchants = Comerciante::all();
        return view('home')->with('message', $message);;

    }

    public function registerLocal(){
        $merchants = Comerciante::all();

        return view('merchants.rLocales', compact('merchants'));
    }
}
