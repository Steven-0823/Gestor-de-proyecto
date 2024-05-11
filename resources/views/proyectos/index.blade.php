<x-app-layout>

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Proyectos Activos</title>
  </head>
  <body>
    {{-- <div class = "container"> --}}
    <h1>Proyectos Creados</h1>
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
{{-- </div> --}}
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</x-app-layout>