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
    {{-- <div class="container"> --}}
        
        <h1 class="text-center">Paquetes de Trabajo</h1>

        <div class="mb-3 d-flex justify-content-between align-items-end">
            <a href="{{ route('paquetes.create') }}" class="btn btn-dark me-3 rounded-pill">Nuevo Paquete de Trabajo</a>

            <div class="flex-grow-1">
                <label for="filtro-estado" class="form-label me-2">Filtrar por estado:</label>
                <select id="filtro-estado" class="form-select custom-select-width"> <!-- Añadimos la clase personalizada -->
                    <option value="todos">Todos</option>
                    <option value="detenido">Detenido</option>
                    <option value="en-progreso">En progreso</option>
                    <option value="completado">Completado</option>
                </select>
            </div>
        </div>
        
        
        <!-- Tabla de paquetes -->
        <table class="table" id="tabla-paquetes"> <!-- Añadimos el id a la tabla -->
            <!-- Encabezados de la tabla -->
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Paquete de Trabajo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Encargado</th>
                    <th scope="col">Proyecto</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            <tbody>
                @foreach ($paquetes as $paquete)
                    <tr class="
                        @if ($paquete->estado == 'Detenido') detenido 
                        @elseif ($paquete->estado == 'En progreso') en-progreso 
                        @elseif ($paquete->estado == 'Completado') completado 
                        @endif">
                        <td>{{ $paquete->id }}</td>
                        <td>{{ $paquete->titulo}}</td>
                        <td>{{ $paquete->descripcion}}</td>
                        <td>{{ $paquete->nombre_user }}</td>
                        <td>{{ $paquete->nombre_proyecto }}</td>
                        <td>{{ $paquete->tipo }}</td>
                        <td>{{ $paquete->estado }}</td>
                        <td>
                            <a href="{{ route('paquetes.edit', ['paquetes' => $paquete->id]) }}" class="btn btn-secondary">Editar</a>
                            <form action="{{ route('paquetes.destroy', $paquete->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="Idproyecto" value="{{ $paquete->Idproyecto }}">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este paquete de trabajo?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    {{-- </div> --}}
</body>
    <!-- Scripts JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Función para filtrar las filas de la tabla según el estado seleccionado
            $('#filtro-estado').change(function() {
                var estado = $(this).val();
                if (estado === 'todos') {
                    $('#tabla-paquetes tbody tr').show(); // Corregimos el selector
                } else {
                    $('#tabla-paquetes tbody tr').hide(); // Corregimos el selector
                    $('#tabla-paquetes tbody tr.' + estado).show(); // Corregimos el selector
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
        .custom-select-width {
            width: 200px; /* Cambia el valor según tus necesidades */
        }
    </style>
</x-app-layout>
