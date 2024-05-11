<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        <!-- Bootstrap Linki -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
        <title>Nueva Tarea</title>
    </head>
    <body>
        
      <div class="p-5 mb-4 text-bg-dark container-fluid">
        <div class="container">
          <h1 class="display-5 fw-bold">Agregar paquete</h1>
        </div>
      </div>
        <div class="container">
          <div class="card">
              <div class="card-header">
                  <span>Datos del paquete</span>
              </div>
              <div class="card-body">
                <form method="POST" class="form-horizontal" action="{{ route('paquetes.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="titulo">Nombre del paquete:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese titulo de proyecto:">
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="IdLider">Seleccione el Encargado:</label>
                        <div class="col-sm-10">
                          <select class="form-select" id="IdLider" name="IdLider" required>
                              <option selected disabled value="">Seleccione encargado...</option>
                              @foreach ($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="Idproyecto">Seleccione el Proyecto:</label>
                        <div class="col-sm-10">
                          <select class="form-select" id="Idproyecto" name="Idproyecto" required>
                              <option selected disabled value="">Seleccione proyecto...</option>
                              @foreach ($proyectos as $proyecto)
                                  <option value="{{ $proyecto->id }}">{{ $proyecto->Nombre }}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="descripcion">Descripcion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
                        </div>
                    </div>
    
                    
    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="estado">Seleccione el Estado:</label>
                        <div class="col-sm-10">
                          <select class="form-select" id="estado" name="estado" required>
                              <option selected disabled value="">Seleccione estado</option>
                                  <option value="En progreso">En progreso</option>
                                  <option value="Detenido">Detenido</option>
                          </select>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="tipo">Seleccione el tipo:</label>
                        <div class="col-sm-10">
                          <select class="form-select" id="tipo" name="tipo" required>
                              <option selected disabled value="">Seleccione el tipo</option>
                                  <option value="En progreso">Low</option>
                                  <option value="Detenido">Normal</option>
                                  <option value="Detenido">High</option>
                          </select>
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
      
    
    </body>
</x-app-layout>
