<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Tiangui;
use Illuminate\Http\Request;

class LocalesController extends Controller
{
    //
    public function index() {
        $locales = Local::all()->where('status_local', 1);
        //dd($locales);
        return view('locales.lLocales', compact('locales'));
    }

    public function nuevoLocalT(){
        $tianguis = Tiangui::all()->where('estatus_tianguis', 1);

        return view('locales.nLocalT', compact('tianguis'));
    }

    public function nuevoLocalA(){
        $tianguis = Tiangui::all()->where('estatus_tianguis', 1);

        return view('locales.nLocalA', compact('tianguis'));
    }

    public function saveLocal(Request $request, $rfc) {
        //dd($request, $rfc);
     
        $nlocal = new Local();
        $nlocal->dimx = $request->dimx;
        $nlocal->dimy = $request->dimy;
        $nlocal->ubicacion_reco = $request->ubicacion;
        if ($request->cat == 1) {
            # code...
            $tianguis = Tiangui::where('id_tiangui', $request->tianguis)->first();
            $nlocal->hora_inicio = $tianguis->thora_inicio; 
            $nlocal->hora_final = $tianguis->thora_final;
            $nlocal->id_tianguis = $tianguis->id_tiangui;
            //dd($local);
        }
        if ($request->cat == 2 || $request->cat == 3)
        {
            $nlocal->hora_inicio = $request->IHour; 
            $nlocal->hora_final = $request->FHour; 
        }
        

        //dd($local);

        try {
            //code...
            
            $nlocal->save();
            //dd($nlocal);
            sleep(2);
            return redirect()->route('home')->with('message', 'El local del comerciante se ha agregado correctamente :D.');
        } catch (\Throwable $th) {
            //throw $th;
            return view('home')->with('message','El local del comerciante no se ha sido registrado D:.', compact('th'));
        }
    }

}
