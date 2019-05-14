@extends('layouts.app-main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-1 border-bottom">
        <h1 class="h2" style="color: #607D8B">Detalles del Ciclo Escolar</h1>
        <div class="btn-toolbar mb-1 mb-md-0">
            <a href="{{ route('ciclos.index') }}" class="btn text-white" role="button" aria-pressed="true" style="background-color: #4CAF50">
                <i class="fas fa-arrow-left"></i>
                Regresar
            </a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 my-3 p-3 rounded bg-white shadow-sm border">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Periodo del ciclo escolar</label>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $ciclo->inicio }}" placeholder="20XX" id="inicio" name="inicio"  disabled>
                        </div>
                        -
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $ciclo->fin }}" placeholder="20XX" id="fin" name="fin" disabled>
                        </div>
                    </div>
                </div>
            </div>
            @can('ciclos.edit')
            <div class="float-right">
                <a class="btn text-white" style="background-color: #0D47A1" href="{{ route('ciclos.edit', ['id' => $ciclo->id]) }}" id="btn_edit" name="btn_edit" role="button">
                    <i class="fas fa-pencil-alt"></i>
                    Editar
                </a>
            </div>
            @endcan
        </div>
    </div>
@endsection()
