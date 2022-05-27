<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
 
class LoginController extends Controller
{
    public function show (){
        if (Auth::check()){
            return redirect()->route('empleados.index');
        }
        return view('auth.login'); 
    }

    public function login(LoginRequest $request){

        $credentials = $request->validated();
        if (!Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return back()->withErrors([
                'email' => 'Las credenciales no coinciden con nuestros datos.',
            ])->onlyInput('email');
 
        }

        return redirect()->route('empleados.index')->with('success', "Bienvenido usuario");
 
    }

    public function logout(Request $request){

        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();
        return redirect()->route('empleados.index')->with('success', "Nos vemos a la próxima");;
    }
}
 