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
    // Obtener el valor del proyecto_id de la solicitud
    $proyecto_id = $request->input('proyecto_id');

    // Si no se proporciona ningún valor, establecer un valor predeterminado para mostrar todos los paquetes
    
        $paquetes = DB::table('_paquetes')
            ->join('users', '_paquetes.IdEncargado', '=', 'users.id')
            ->join('_proyectos', '_paquetes.Idproyecto', '=', '_proyectos.id')
            ->select('_paquetes.*', 'users.name as nombre_user', '_proyectos.Nombre as nombre_proyecto')
            ->get();
   

    return view('paquetes.index', ['paquetes' => $paquetes]);
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = DB::table('users')
        ->orderBy('name')
        ->get();

        $proyectos = DB::table('_proyectos')
        ->orderBy('nombre')
        ->get();

        return view('paquetes.new', ['users' => $users, 'proyectos' => $proyectos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validación y almacenamiento de otros campos del paquete

    $paquete = new Paquete();
    $paquete->titulo = $request->titulo;
    $paquete->IdEncargado = $request->IdLider;
    $paquete->Idproyecto = $request->Idproyecto; // Corregir aquí
    $paquete->descripcion = $request->descripcion;
    $paquete->estado = $request->estado;
    $paquete->tipo = $request->tipo;
    $paquete->save();

    return redirect()->route('paquetes.index'); // Redirige al índice de paquetes después de guardar el nuevo paquete
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
        $paquete = Paquete::find($id);

        $users = DB::table('users')
        ->orderBy('name')
        ->get();

        $proyectos = DB::table('_proyectos')
        ->orderBy('nombre')
        ->get();

        return view('paquetes.edit', ['paquete'=>$paquete,'users' => $users, 'proyectos' => $proyectos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Buscar el paquete existente por su ID
    $paquete = Paquete::findOrFail($id);

    // Actualizar los atributos del paquete con los valores del formulario
    $paquete->titulo = $request->titulo;
    $paquete->IdEncargado = $request->IdLider;
    $paquete->Idproyecto = $request->id_proyecto; // Corregir aquí el nombre del campo
    $paquete->descripcion = $request->descripcion;
    $paquete->estado = $request->estado;
    $paquete->tipo = $request->tipo;
    $paquete->save();

    // Obtener los paquetes del proyecto y devolver al índice de paquetes
    $paquetes = DB::table('_paquetes')
        ->join('users', '_paquetes.IdEncargado', '=', 'users.id')
        ->join('_proyectos', '_paquetes.Idproyecto', '=', '_proyectos.id')
        ->where('_paquetes.Idproyecto', '=', $request->id_proyecto) // Corregir aquí
        ->select('_paquetes.*', 'users.name as nombre_user', '_proyectos.Nombre as nombre_proyecto')
        ->get();

    return view('paquetes.index', ['paquetes' => $paquetes]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $paquete = Paquete::findOrFail($id);
        $paquete->delete();

        // Obtener las tareas del proyecto seleccionado
        $paquetes = DB::table('_paquetes')
        ->join('users', '_paquetes.IdEncargado', '=', 'users.id')
        ->join('_proyectos', '_paquetes.Idproyecto', '=', '_proyectos.id')
        ->where('_paquetes.Idproyecto', '=', $request->Idproyecto) // Corregir aquí
        ->select('_paquetes.*', 'users.name as nombre_user', '_proyectos.Nombre as nombre_proyecto')
        ->get();

    return view('paquetes.index', ['paquetes' => $paquetes]);
    }
}
