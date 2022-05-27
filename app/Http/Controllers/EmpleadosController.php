<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
Use App\Models\Empleado;
use Illuminate\Support\Facades\Auth;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {   
        $empleados = Empleado::all();
        return view('empleados.index', ['empleados' => $empleados]);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if (!Auth::check()){
            return back()->withErrors('No tienes permiso para realizar esta accion.');
        }
        $request->validate([
            'nombre' => 'required',
            'cedula' => 'required|unique:empleados',
            'movil' => 'required',
            'direccion' => 'required',
            'foto_perfil' => 'required'
        ]);

        $Empleado = new Empleado;
 
        $Empleado->nombre = $request->nombre;
        $Empleado->cedula = $request->cedula;
        $Empleado->movil = $request->movil;
        $Empleado->direccion = $request->direccion;
        $Empleado->foto_perfil = $request->foto_perfil;

        $Empleado->save();

        return redirect()->route('empleados.index')->with('success','Empleado exitosamente creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
 
        return view('empleados.edit', ['empleado' => $empleado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {       
        if (!Auth::check()){
            return back()->withErrors('No tienes permiso para realizar esta accion.');
        }
         $request->validate([
            'nombre' => 'required',
            'cedula' => 'required',
            'movil' => 'required',
            'direccion' => 'required',
            'foto_perfil' => 'required'
        ]);

        $Empleado = Empleado::find($id);

        $Empleado->nombre = $request->nombre;
        $Empleado->cedula = $request->cedula;
        $Empleado->movil = $request->movil;
        $Empleado->direccion = $request->direccion;
        $Empleado->foto_perfil = $request->foto_perfil;
        $Empleado->update();

        return redirect()->route('empleados.index')->with('success','Empleado exitosamente actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if (!Auth::check()){
            return back()->withErrors('No tienes permiso para realizar esta accion.');
        }
        Empleado::destroy($id);
        return redirect()->route('empleados.index')->with('success','Empleado exitosamente eliminado');
    }
}
