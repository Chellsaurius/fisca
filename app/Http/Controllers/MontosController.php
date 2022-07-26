<?php

namespace App\Http\Controllers;

use App\Models\Monto;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

use function PHPUnit\Framework\returnArgument;

class MontosController extends Controller
{
    //
    public function index (){
        $montos = Monto::all();
        //dd($montos);
        return view('amounts.montos', compact('montos'));
    }

    public function store(Request $request){
        $montos = Monto::all();
        $monto = new Monto();
        $ahorita = Carbon::now();
        $fModificada = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ahorita)->format('Y');

        $montoOrd = Monto::orderBy('year', 'desc')->first();
        //$highscores = HighScore::orderBy('score', 'asc')->get();
        $monto->monto = $request->monto;
        $monto->year = $request->year;
        //dd($request, $montoOrd, $monto, $newDate);
        if($montoOrd->year < $monto->year ){
            $monto->save();
            sleep(2);
            $montos = Monto::all();
            return redirect()->route('montos', compact('montos'))->with('message', 'Monto agregado correctamente');
        }
        else{
            return redirect()->back()->with('message', 'El año ya existe, favor de verificar correctamente.', compact('montos'));
        }

    }

    public function nmonto(){
        return view('amounts.nmonto');
    }

    public function activateMonto($id)
    {
        # code...
        //dd($id);
        $affected = DB::table('montos')
            ->update(['estatus_monto' => 0]);

        $affected = DB::table('montos')
            ->where('id_montos', $id)
            ->update(['estatus_monto' => 1]);

        $montos = Monto::all();

        return redirect()->route('montos', compact('montos'))->with('message', 'Monto agregado correctamente');
    }
}
