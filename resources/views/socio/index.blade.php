@extends('adminlte::page')

@section('title', 'CRUD con laravel 9')

@section('content_header')
    <h1>Gestion de socios</h1>
@stop

@section('content')
    <!-- Pestañas -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#socio" role="tab">Socio</a>
        </li>
    
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#ing_socio" role="tab">Agregar socio</a>
        </li>
    </ul>
    <!-- Fin pestañas -->

    <div class="tab-content" id="myTabContent">
        <!-- Contenido 1ra pestaña -->
        <div class="tab-pane fade show active" id="socio" role="tabpanel" >
            <table id='id_socio' class='table table-striped table-bordered shadow-lg mt-4' style='width:100%'>
                <thead class='bg-primary text-white'>
                    <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Nombre</th>
                        <th scope='col'>Apellido</th>
                        <th scope='col'>D.N.I</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Fin contenido 1ra pestaña -->   
        
        <!-- Contenido 2da pestaña -->    
        <div class="tab-pane fade" id="ing_socio" role="tabpanel">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" >
                    </div>

                    <div class="form-group col-md-5">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label for="">Documento de identidad</label>
                            <div class="input-group">
                                <input name="doc" id="doc" type="number" class="form-control">
                                <select id="tipo">
                                    <option value="le">L.E.</option>
                                    <option value="lc">L.C.</option>
                                    <option value="dni">D.N.I</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label for="nac">Lugar / Fecha de nacimiento</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nac">
                                <input type="date" class="form-control" id="nac">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text" class="form-control" id="nacionalidad">
                    </div>

                    <div class="form-group col-md-5">
                        <label for="profesion">Profesión</label>
                        <input type="text" class="form-control" id="profesion">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="domicilio">Domicilio</label>
                        <input type="text" class="form-control" id="domicilio">
                    </div>

                    <div class="form-group col-md-5">
                        <label for="email">E-MAIL</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="localidad">Localidad</label>
                        <input type="text" class="form-control" id="localidad">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="postal">C.Postal</label>
                        <input type="text" class="form-control" id="postal">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tel">Teléfono</label>
                        <input type="text" class="form-control" id="tel1">
                        <input type="text" class="form-control" id="tel2">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="observacion">Observación</label>
                        <p><textarea name="observacion" rows="3" cols="50"></textarea></p>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label for="">Estado Civil</label>
                            <div class="input-group">
                                <select id="estado">
                                    <option value="casado">Casado</option>
                                    <option value="viudo">Viudo</option>
                                    <option value="divorciado">Divorciado</option>
                                    <option value="soltero">soltero</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
        <!-- Fin 2da pestaña -->
    </div>
@stop


@section('css')
    <!-- Se encuentra en: resourses/view/vendor/adminlte/master.blade.php linea 30-->

@stop

@section('js')
    <!-- Se encuentra en: resourses/view/vendor/adminlte/master.blade.php linea 88-94 -->
    
    <script>
        let rutaTabla = "{{route('socioAJAX.socio')}}";
            
        $(document).ready(function(){
            var table=$('#id_socio').DataTable({
        "ajax": rutaTabla,
        "dom": 'frtip', //Para permitir la barra de busqueda, y desactivar la busqueda por longitud
        
        "columns":[
            {data:'id'},  
            {data:'nombre'},  
            {data:'apellido'},  
            {data:'doc'},  
        ],
    });
});

    </script>
@stop

