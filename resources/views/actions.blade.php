<form action='{{ route("articulos.destroy", $id )}}' method='POST'>
    <a href="{{ route('articulos.edit', $id)}}" type='button' class='editar btn btn-primary'><i class='fa fa-pencil-square-o'></i></a>
    @csrf
    @method('DELETE')
    <button type='submit' class='eliminar btn btn-danger' data-toggle='modal'><i class='fa fa-trash-o'></i></button>
</form>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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
</script>
@stop



