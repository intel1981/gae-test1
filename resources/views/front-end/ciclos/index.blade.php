@extends('layouts.app-main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-1 border-bottom">
    <h1 class="h2" style="color: #607D8B">Ciclos Escolares</h1>
    <div class="btn-toolbar mb-1 mb-md-0">
        <a href="{{ route('ciclos.create') }}" class="btn text-white" role="button" aria-pressed="true" style="background-color: #4CAF50">
            <i class="fas fa-plus"></i>
            Nuevo Ciclo
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8 my-3 p-3 rounded bg-white shadow-sm border">
        <div class="table-responsive">
            <table id="ciclos" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Periodo escolar</th>
                    <th scope="col" class="text-center">Estado</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ciclos as $ciclo)
                    <tr>
                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                        <td class="text-center">{{ $ciclo->periodo }}</td>
                        <td class="text-center">
                            @if($ciclo->status)
                                <i class="fas fa-check text-success"></i>
                            @else
                                <i class="fas fa-times text-danger"></i>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('ciclos.show', ['id' => $ciclo->id]) }}" class="btn bg-transparent btn-sm" role="button" title="Ver" aria-pressed="true">
                                <i class="far fa-eye text-secondary"></i>
                            </a>
                            <a href="{{ route('ciclos.edit', ['id' => $ciclo->id]) }}" class="btn bg-transparent btn-sm" role="button" title="Editar" aria-pressed="true">
                                <i class="fas fa-pencil-alt text-primary"></i>
                            </a>
                            <button type="button" class="btn bg-transparent btn-sm" onclick="deleteItem('{{ route('ciclos.destroy', $ciclo->id) }}')">
                                <i class="far fa-trash-alt text-danger"></i>
                            </button>
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
<script src="{{ asset('js/modules/ciclo.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#ciclos').DataTable();
    } );
</script>
@endsection
