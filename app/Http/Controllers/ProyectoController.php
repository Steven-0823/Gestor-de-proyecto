<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = DB::table('_proyectos')
       ->join('users', '_proyectos.IdLider', '=', 'users.id')
       ->select('_proyectos.*', 'users.name as nombre_user')
       ->get();

       return view('proyectos.index', ['proyectos' => $proyectos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = DB::table('users')
        ->orderBy('name')
        ->get();

        return view('proyectos.new', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $proyecto = new Proyecto();
    $proyecto->Nombre = $request->Nombre;
    $proyecto->IdLider = $request->IdLider;
    $proyecto->Presupuesto = $request->Presupuesto;
    $proyecto->PresupuestoUsado = $request->PresupuestoUsado; // default 0
    $proyecto->estado = $request->estado; //default en progreso
    $proyecto->PorcentajeAvance = $request->PorcentajeAvance; // default 0

    $proyecto->save();

    $proyectos = DB::table('_proyectos')
        ->join('users', '_proyectos.IdLider', '=', 'users.id')
        ->select('_proyectos.*', 'users.name as nombre_user')
        ->get();

    return view('proyectos.index', ['proyectos' => $proyectos]);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $proyecto = Proyecto::find($id);

    $users = DB::table('users')
    ->orderBy('name')
    ->get();

    return view ('proyectos.edit', ['proyecto' => $proyecto, 'users' => $users]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);

        $proyecto -> Nombre = $request->Nombre;
        $proyecto -> IdLider = $request->IdLider;
        $proyecto -> Presupuesto = $request -> Presupuesto;
        $proyecto -> PresupuestoUsado = $request -> PresupuestoUsado; // default 0
        $proyecto -> estado = $request->estado; //default en progreso
        $proyecto -> PorcentajeAvance = $request->PorcentajeAvance; // default 0
        $proyecto->save();

        $proyectos = DB::table('_proyectos')
    ->join('users', '_proyectos.IdLider', '=', 'users.id')
    ->select('_proyectos.*', 'users.name as nombre_user')
    ->get();

       return view('proyectos.index', ['proyectos' => $proyectos]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($proyectos)
{
    $proyecto = Proyecto::find($proyectos);
    $proyecto->delete();

    $proyectos = DB::table('_proyectos')
    ->join('users', '_proyectos.IdLider', '=', 'users.id')
    ->select('_proyectos.*', 'users.name as nombre_user')
    ->get();

    return view('proyectos.index', ['proyectos' => $proyectos]);
}

}
