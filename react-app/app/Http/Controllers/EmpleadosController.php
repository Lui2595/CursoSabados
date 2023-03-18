<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $e=Empleados::all();
        return Inertia::render('Empleados',["empleados"=>$e]);
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
    public function store(Request $r)
    {
        $e= new Empleados();
        $e->nombre=$r->nombre;
        $e->apellido=$r->apellido;
        $e->nss=$r->nss;
        $e->fecha_ingreso=$r->fecha_ingreso;
        $e->status=$r->status;
        $e->save();
        return response()->json(["status"=>'ok',"data"=>$e,"message"=>'Insersión realizada con exito'], 200, []);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleados $empleados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $e = Empleados::find($id);
        $e->nombre=$r->nombre;
        $e->apellido=$r->apellido;
        $e->nss=$r->nss;
        $e->fecha_ingreso=$r->fecha_ingreso;
        $e->status=$r->status;
        $e->save();
        return response()->json(["status"=>'ok',"data"=>$e,"message"=>'Actualización realizada con exito'], 200, []);;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleados $empleados)
    {
        //
    }
}
