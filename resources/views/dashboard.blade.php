{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-app-layout>
    <!-- Encabezado de la página -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Proyectos') }}
        </h2>
    </x-slot>
    
    <div class="container mt-5">
        <div style="background-color: #f0f0f0; padding: 20px; border-radius: 10px; margin-bottom: 20px;">
            <h1 style="color: #333; font-size: 24px; text-align: center;">¡Hola {{ Auth::user()->name }}, estos son los proyectos!</h1>
        </div>

        <a href="{{ route('proyectos.create') }}" class="btn btn-dark" style="margin-bottom: 1%">Nuevo Proyecto</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Encargado</th>
            <th scope="col">Presupuesto</th>
            <th scope="col">Presupuesto Usado</th>
            <th scope="col">Estado</th>
            <th scope="col">Porcentaje de Avance</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($proyectos as $proyecto)
                    <tr class="
                        @if ($proyecto->estado == 'Detenido') detenido 
                        @elseif ($proyecto->estado == 'En progreso') en-progreso 
                        @elseif ($proyecto->estado == 'Completado') completado 
                        @endif">
                        <td>{{ $proyecto->id }}</td>
                        <td>{{ $proyecto->Nombre}}</td>
                        <td>{{ $proyecto->nombre_user}}</td>
                        <td>${{ $proyecto->Presupuesto }}</td>
                        @if($proyecto->PresupuestoUsado == 0)
                            <td>$0</td>
                        @else
                            <td>${{ $proyecto->PresupuestoUsado }}</td>
                        @endif

                        <td>{{ $proyecto->estado }}</td>
                        @if($proyecto->PorcentajeAvance == 0)
                            <td>0%</td>
                            @else
                            <td>${{ $proyecto->PorcentajeAvance }}%</td>
                        @endif
                        <td>
                            {{-- <a href="{{ route('tareas.index', ['proyecto_id' => $proyecto->id]) }}" class="btn btn-primary">Ver Tareas</a> --}}

                            
                            <a href="{{ route('proyectos.edit', ['proyectos' => $proyecto->id]) }}" class="btn btn-secondary">Editar</a>

                                <form action="{{ route('proyectos.destroy', ['proyectos' => $proyecto->id]) }}" method="POST" style="display:inline-block">
                                    @method('delete')
                                    @csrf
                                    <input class="btn btn-danger" type="submit" value="Eliminar">
                                </form>
                        </td>
                        
                    </tr>
                 @endforeach
        </tbody>
      </table>
        </div>
    </div>

    <!-- Scripts JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Función para filtrar las filas de la tabla según el estado seleccionado
            $('#filtro-estado').change(function() {
                var estado = $(this).val();
                if (estado === 'todos') {
                    $('#tabla-proyectos tbody tr').show();
                } else {
                    $('#tabla-proyectos tbody tr').hide();
                    $('#tabla-proyectos tbody tr.' + estado).show();
                }
            });
        });
    </script>

    <!-- Estilos CSS -->
    <style>
        /* Estilos para las filas de la tabla según el estado */
        .detenido {
            background-color: #ffcccc; /* Rojo claro */
        }
        .en-progreso {
            background-color: #ffffcc; /* Amarillo claro */
        }
        .completado {
            background-color: #ccffcc; /* Verde claro */
        }
    </style>
</x-app-layout>

