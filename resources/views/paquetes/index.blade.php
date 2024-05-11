<x-app-layout>
    
    <div class="container">
        @if (Auth::user()->name != '')
            <div style="background-color: #f0f0f0; padding: 20px; border-radius: 10px; margin-bottom: 20px;">
                <h1 style="color: #333; font-size: 24px; text-align: center;">¡Hola {{ Auth::user()->name }}, estas son los paquetes de trabajo!</h1>
            </div>
        @endif

        <a href="{{ route('paquetes.create') }}" class="btn btn-dark" style="margin-bottom: 1%">Nuevo paquete de trabajo</a>

        <!-- Controles de filtro -->
        <div class="mb-3">
            <label for="filtro-estado" class="form-label">Filtrar por estado:</label>
            <select id="filtro-estado" class="form-select">
                <option value="todos">Todos</option>
                <option value="detenido">Detenido</option>
                <option value="en-progreso">En progreso</option>
                <option value="completado">Completado</option>
            </select>
        </div>
        
        <!-- Tabla de paquetes -->
        <div class="table-responsive mt-4">
            <table class="table table-striped">
                <!-- Encabezados de la tabla -->
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Paquete de trabajo</th>
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
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">Eliminar</button>
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
