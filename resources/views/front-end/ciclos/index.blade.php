@extends('layouts.app-main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-1 border-bottom">
    <h1 class="h2" style="color: #607D8B">Ciclos Escolares</h1>
    @can('ciclos.create')
    <div class="btn-toolbar mb-1 mb-md-0">
        <a href="{{ route('ciclos.create') }}" class="btn text-white" role="button" aria-pressed="true" style="background-color: #4CAF50">
            <i class="fas fa-plus"></i>
            Nuevo Ciclo
        </a>
    </div>
    @endcan
</div>

<div class="row justify-content-center">
    <div class="col-md-8 my-3 p-3 rounded bg-white shadow-sm border">
        <div class="table-responsive">
            <table id="ciclos" class="table table-striped border-bottom" style="width:100%">
                <thead>
                <tr>
                    <th scope="row" class="text-center"></th>
                    <th scope="col" class="text-center">Periodo escolar</th>
                    <th scope="col" class="text-center">Estado</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ciclos as $ciclo)
                    <tr>
                        <td class="text-center"></td>
                        @if($ciclo->status)
                            <td class="text-center">{{ $ciclo->periodo }}</td>
                        @else
                            <td class="text-center text-danger"><del>{{ $ciclo->periodo }}</del></td>
                        @endif
                        <td class="text-center">
                            @if($ciclo->status)
                                <i class="fas fa-check text-success"></i>
                            @else
                                <i class="fas fa-times text-danger"></i>
                            @endif
                        </td>
                        <td class="text-center">
                            @can('ciclos.show')
                                <a href="{{ route('ciclos.show', ['id' => $ciclo->id]) }}" class="btn bg-transparent btn-sm" role="button" title="Ver" aria-pressed="true">
                                    <i class="far fa-eye text-secondary"></i>
                                </a>
                            @endcan
                            @can('ciclos.edit')
                                <a href="{{ route('ciclos.edit', ['id' => $ciclo->id]) }}" class="btn bg-transparent btn-sm" role="button" title="Editar" aria-pressed="true">
                                    <i class="fas fa-pencil-alt text-primary"></i>
                                </a>
                            @endcan
                            @can('ciclos.destroy')
                                <button type="button" class="btn bg-transparent btn-sm" onclick="deleteItem('{{ route('ciclos.destroy', $ciclo->id) }}')">
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
@endsection()

@section('module_javascript')
<!-- Archivo(s) javascript del modulo -->
<script src="{{ asset('js/axios.js') }}" ></script>
<script>
    $(document).ready(function() {
        /*
         DataTables - Options
         https://datatables.net/reference/option/order
         Options: DataTables - Columns
         https://datatables.net/reference/option/columnDefs
         */
        var dt_ciclos = $('#ciclos').DataTable({
            order: [[ 1, 'desc' ]],
            columnDefs: [
                { targets: 0, searchable: false, orderable: false},
                { targets: [2,3], searchable: false, orderable:false }
            ],
            language: {
                url: "{{ asset('dataTables/lang/Spanish.json') }}"
            }
        });
        /*
        Index column
        https://datatables.net/examples/api/counter_columns.html
         */
        dt_ciclos.on( 'order.dt search.dt', function () {
            dt_ciclos.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );

    //Inicia funcion para eliminar el ciclo escolar seleccionado
    function deleteItem(urlDelete) {

        Swal.fire({
            title: '¿Realmente desea eliminar este ciclo?',
            text: "Si hizo clic por equivocación, presione Cancelar",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, deseo eliminarlo'
        }).then((result) => {

            if (result.value) {

                axios.delete(urlDelete)
                    .then(function (response) {
                        //La eliminación se realizo correctamente
                        Swal.fire({
                            title: 'Ciclo escolar eliminado',
                            text: 'El ciclo se elimino correctamente. Presione Continuar',
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
</script>
@endsection
