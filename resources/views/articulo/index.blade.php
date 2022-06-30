@extends('adminlte::page')

@section('title', 'CRUD con laravel 9')

@section('content_header')
    <h1>Listado de productos</h1>
@stop

@section('content')
    <!--Ventana modal de crear-->
    <div class='modal fade' id='modalCrear'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h4 class='modal-title'>Crear Producto</h4>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                </div>
                <div class='modal-body'>
                    <form action='/articulos' method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Código</label>
                            <input id="codigo" name="codigo" type="text" class="form-control" tabindex=1 required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="" class="form-label">Descripción</label>
                            <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex=2 required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Cantidad</label>
                            <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex=3 required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Precio</label>
                            <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control" tabindex=4 required>
                        </div>
                        <a href="/articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <a href='#modalCrear' class='btn btn-primary mb-3' data-toggle='modal'>Crear</a>

    <table id='tablaarticulo' class='table table-striped table-bordered shadow-lg mt-4' style='width:100%'>
        
    <thead class='bg-primary text-white'>
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Código</th>
                <th scope='col'>Descripción</th>
                <th scope='col'>Cantidad</th>
                <th scope='col'>Precio</th>
                <th scope='col'>Acciones</th>
            </tr>
        </thead>
    </table>
@stop


@section('css')
<!-- Para iconos -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

@stop

@section('js')
    <script src='https://code.jquery.com/jquery-3.5.1.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>

    <script src='https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js'></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        let rutaTabla = "{{route('tablas.tablaarticulo')}}";
            
        $(document).ready(function(){
            var table=$('#tablaarticulo').DataTable({
        "ajax": rutaTabla,
        "columns":[
            {data:'id'},  
            {data:'codigo'},  
            {data:'descripcion'},  
            {data:'cantidad'},  
            {data:'precio'}, 
            {data: 'btn'}, 
        ],
    });
});

    $('.eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
      }
    })
});

/* Modal movible */
$("#modalCrear").draggable({
    handle: ".modal-header"
});

    </script>
@stop

