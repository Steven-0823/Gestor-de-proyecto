
<x-app-layout>
    <!-- Encabezado de la página -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Proyectos') }}
        </h2>
    </x-slot>
    
    <div class="container mt-5">

        <a href="{{ route('proyectos.create') }}" class="btn btn-dark me-3 rounded-pill">Nuevo Proyecto</a>
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
                    <tr>
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
</x-app-layout>

