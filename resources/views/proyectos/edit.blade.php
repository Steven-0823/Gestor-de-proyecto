    <x-app-layout>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
            <!-- Bootstrap Linki -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
            <title>Editar Proyecto</title>
        </head>
        <body>
            
        <div class="p-5 mb-4 text-bg-dark container-fluid">
            <div class="container">
            <h1 class="display-5 fw-bold">Editar Proyecto</h1>
            </div>
        </div>
            <div class="container">
            <div class="card">
                <div class="card-header">
                    <span>Datos del proyecto</span>
                </div>
                <div class="card-body">
                    <form method="POST" class="form-horizontal" action="{{ route( 'proyectos.update', ['proyecto' => $proyecto ->id]) }}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Nombre">Nombre del Proyecto:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese nombre de proyecto:"
                                value=" {{ $proyecto ->Nombre }} ">
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="IdLider">Seleccione el Líder:</label>
                            <div class="col-sm-10">
                            <select class="form-select" id="IdLider" name="IdLider" required>
                                <option  disabled value="">Seleccione uno...</option>
                                    @foreach ($users as $user)
                                    @if ($user ->id == $proyecto ->user_id)
                                    <option selected value="{{ $user ->id }}">{{ $user ->name }}</option>
                                    @else
                                    <option value="{{ $user ->id }}">{{ $user ->name }}</option>
                                    @endif
                                    @endforeach
                            </select>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Presupuesto">Presupuesto:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Presupuesto" name="Presupuesto" placeholder="Ejemplo: 756000"
                                value=" {{ $proyecto ->Presupuesto }} ">
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="PresupuestoUsado">Presupuesto usado:</label>
                            <div class="col-sm-10">
                                <input  type="text"class="form-control" id="PresupuestoUsado" name="PresupuestoUsado" placeholder="Ingrese presupuesto_usado"
                                value=" {{ $proyecto ->PresupuestoUsado }} ">
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="estado">Seleccione el Estado:</label>
                            <div class="col-sm-10">
                            <select class="form-select" id="estado" name="estado" required>
                                @if ($proyecto ->estado == $proyecto ->estado)
                                <option selected value="{{ $proyecto ->estado }}">{{ $proyecto ->estado }}</option>
                                @endif
                                    <option value="En progreso">En progreso</option>
                                    <option value="Detenido">Detenido</option>
                                    <option value="Completado">Completado</option>
                            </select>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="PorcentajeAvance">Porcentaje de avance:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="PorcentajeAvance" name="PorcentajeAvance" placeholder="Ingrese nombre"
                                value=" {{ $proyecto ->PorcentajeAvance }} ">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

        </x-app-layout>