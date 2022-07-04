<?php

namespace App\Http\Controllers;

use App\Models\Tiangui;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class TianguisContoller extends Controller
{
    //
    public function index (){
        $tianguis = Tiangui::all();
        //dd($montos);
        return view('tianguis.lTianguis', compact('tianguis'));
    }

    public function nTianguis() {
        return view('tianguis.nTianguis');
    }

    public function store(Request $request) {
        //dd($request);
       

        //$horas =  'Inicia: '.$request->IHourTianguis.' y termina: '.$request->FHourTianguis;
        //dd($horas);

        try {
            //code...
            
            $tiangui = new Tiangui();

            $tiangui->nombre_tianguis = $request->nameTianguis;
            $tiangui->dia = $request->dayTianguis;
            $tiangui->horario = 'De '.$request->IHourTianguis.' a '.$request->FHourTianguis;
            $tiangui->save();
            sleep(2);
            $tianguis = Tiangui::all();
            
           
            return redirect()->route('lTianguis', compact('tianguis'))->with('message', 'Tianguis agregado correctamente');

        } catch (\Throwable $th) {
            //throw $th;

            $tianguis = Tiangui::all();
            return redirect()->route('lTianguis', compact('tianguis', 'th'))->with('th');
        }
            
           
       
        
    }
}
