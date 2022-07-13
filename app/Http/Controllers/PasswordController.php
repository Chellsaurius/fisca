<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    //
    public function index(){
        return view('cambiarContrasena');
        
    }

    public function changePass(Request $request )
    {
        # code...
        //dd($request);
        $request->validate([
            'lastPass' => ['required'],
            'newPass' => ['required', 'string', 'min:2'],
        ]);

        $user = User::where('id', $request->user)->first();

        $hasher = app('hash');
        if ($hasher->check($request->lastPass, $user->password)) {
            // Success
            
            if ($request->newPass == $request->newPass_verified) {
                # code...
                $usuario = User::find($user->id);
                $Pass = Hash::make($request->newPass);
                $usuario->password = $Pass;
                $usuario->save();

                return redirect()->route('cambiarContrasena')->with('message', 'Contraseña actualizada correctamente.');
            }
            else{
                return redirect()->route('cambiarContrasena')->with('message', 'Contraseñas incorrectas.');
            }
        }

        else
        {
            return redirect()->route('cambiarContrasena')->with('message', 'Contraseña original incorrecta.');
        }
        
        
      
    }
}
