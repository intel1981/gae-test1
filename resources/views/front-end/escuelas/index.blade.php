@extends('layouts.app-main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-1 border-bottom">
    <h1 class="h2" style="color: #607D8B">Escuelas</h1>
    <div class="btn-toolbar mb-1 mb-md-0">
        @can('escuelas.create')
            <a href="{{ route('escuelas.create') }}" class="btn text-white" role="button" aria-pressed="true" style="background-color: #4CAF50">
                <i class="fas fa-plus"></i>
                Nueva Escuela
            </a>
        @endcan
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-12 my-3 p-3 rounded bg-white shadow-sm border">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">CCT</th>
                    <th scope="col">Escuela</th>
                    <th scope="col">Nivel</th>
                    <th scope="col">Turno</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($escuelas as $escuela)
                    <tr>
                        <th scope="row">{{ $escuela->cct }}</th>
                        <td>{{ mb_strtoupper($escuela->nombre) }}</td>
                        <td>{{ mb_strtoupper($escuela->nivel->nombre) }}</td>
                        <td>{{ mb_strtoupper($escuela->turno) }}</td>
                        <td>
                            @if($escuela->status)
                                <i class="fas fa-check text-success"></i>
                            @else
                                <i class="fas fa-times text-danger"></i>
                            @endif
                        </td>
                        <td>
                            @can('escuelas.show')
                                <a href="{{ route('escuelas.show', ['id' => $escuela->id]) }}" class="btn bg-transparent btn-sm" role="button" title="Ver" aria-pressed="true">
                                    <i class="far fa-eye text-secondary"></i>
                                </a>
                            @endcan
                            @can('escuelas.edit')
                                <a href="{{ route('escuelas.edit', ['id' => $escuela->id]) }}" class="btn bg-transparent btn-sm" role="button" title="Editar" aria-pressed="true">
                                    <i class="fas fa-pencil-alt text-primary"></i>
                                </a>
                            @endcan
                            @can('escuelas.destroy')
                                <button type="button" class="btn bg-transparent btn-sm" onclick="deleteItem('{{ route('escuelas.destroy', $escuela->id) }}')" title="Eliminar">
                                    <i class="far fa-trash-alt text-danger"></i>
                                </button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('module_javascript')
<!-- Archivo(s) javascript del modulo -->
<script src="{{ asset('js/axios.js') }}" ></script>
<script>
//Inicia funcion para eliminar la escuela
function deleteItem(urlDelete) {

Swal.fire({
    title: '¿Realmente desea eliminar esta escuela?',
    text: "Si hizo clic por equivocación, presione Cancelar",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, deseo eliminarla'
}).then((result) => {

    if (result.value) {

        axios.delete(urlDelete)
            .then(function (response) {
                //La eliminación se realizo correctamente
                Swal.fire({
                    title: 'Escuela eliminada',
                    text: 'La escuela se elimino correctamente. Presione Continuar',
                    type: 'success',
                    allowOutsideClick: false,
                    showConfirmButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Continuar'
                }).then((result) => {
                    if(result.value){ location.reload(); }
                })

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });

    }

})
}
//Termina funcion para eliminar la escuela
</script>
@endsection
