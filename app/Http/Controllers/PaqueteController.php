<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;
use Illuminate\Support\Facades\DB;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $proyecto_id = $request->input('proyecto_id');

    $paquetes = DB::table('_paquetes')
        ->join('users', '_paquetes.IdEncargado', '=', 'users.id')
        ->join('_proyectos', '_paquetes.Idproyecto', '=', '_proyectos.id')
        ->where('_paquetes.Idproyecto', '=', $proyecto_id)
        ->select('_paquetes.*', 'users.name as nombre_user', '_proyectos.Nombre as nombre_proyecto')
        ->get();

    return view('paquetes.index', ['paquetes' => $paquetes]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
