<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show (){
        if (Auth::check()){
            return redirect()->route('empleados.index');
        }
        return view('auth.register');
    } 
 
    public function register (RegisterRequest $request){
        //Crea el registro si el request lo permite
        $user = User::create($request->validated());

        //route() solo funciona con rutas nombradas
        return redirect()->route('login')->with('success', 'Usuario registrado con éxito');
    }
}
