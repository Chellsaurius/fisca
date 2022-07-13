<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;

use function GuzzleHttp\Promise\inspect;

class InspectoresController extends Controller
{
    //
    public function index(){
        $inspectores = User::all()->where('role', 2)->where('estatus_user', 1);
        
        return view('inspectors.lInspectores', compact('inspectores'));

    }

    public function nInspector() {
        return view('inspectors.nInspector');
    }

    public function saveInspector(Request $request) {
        //dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'pass' => ['required', 'string', 'min:2'],
        ]);
        //dd($request);
        $inspectores = User::all()->where('role', 2)->where('estatus_user', 1);
        $inspector = new User();

        $inspector->name = strtoupper($request->name);
        $inspector->email = strtoupper($request->email);
        $inspector->role = 2;

        if ($request->pass == $request->pass_verified) {
            # code...
            $pass = Hash::make($request->pass);
            $inspector->password = $pass;
            try {
                //code...
                //dd($inspector);
                $inspector->save();
                sleep(2);
    
                return redirect()->route('inspectores', compact('inspectores'))->with('message', 'Inspector agregado correctamente.');
            } catch (\Throwable $th) {
                //throw $th;
                $user = User::select('id')->orderBy('id','desc')->first();
                $delUser = User::where('id', $user)->delete();
    
                return redirect()->back()->with('message', 'Inspector no agregado, favor de verificar correctamente.', compact('inspectores'));
            }
        }
        else
        {
            return redirect()->back()->with('message', 'Inspector no agregado, favor de verificar contraseñas.', compact('inspectores'));
        }
        
        
    }
}
