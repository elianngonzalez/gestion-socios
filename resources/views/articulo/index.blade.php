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

    <table id='articulo' class='table table-striped table-bordered shadow-lg mt-4' style='width:100%'>
        
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
    <!-- Se encuentra en: resourses/view/vendor/adminlte/master.blade.php linea 30-->

@stop

@section('js')
    <!-- Se encuentra en: resourses/view/vendor/adminlte/master.blade.php linea 88-94 -->
    
    <script>
        let rutaTabla = "{{route('articulos.articuloAJAX')}}";
            
        $(document).ready(function(){
            var table=$('#articulo').DataTable({
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

