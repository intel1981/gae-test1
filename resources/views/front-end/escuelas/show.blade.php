@extends('layouts.app-main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-1 border-bottom">
    <h1 class="h2" style="color: #607D8B">Detalles de escuela</h1>
    <div class="btn-toolbar mb-1 mb-md-0">
        <a href="{{ route('escuelas.index') }}" class="btn text-white" role="button" aria-pressed="true" style="background-color: #4CAF50">
            <i class="fas fa-th-list"></i>
            Escuelas
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8 my-3 p-3 rounded bg-white shadow-sm border">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cct">C.C.T.</label>
                <input type="text" class="form-control" value="{{ $escuela->cct }}" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="cct">Núm. de Incorporación</label>
                <input type="text" class="form-control" value="{{ $escuela->incorporacion }}" disabled>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" value="{{ $escuela->nombre }}" disabled>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="tipo_id">Tipo de escuela</label>
                <input type="text" class="form-control" value="{{ $escuela->tipo->nombre }}" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="nivel_id">Nivel de la escuela</label>
                <input type="text" class="form-control" value="{{ $escuela->nivel->nombre }}" disabled>
            </div>
            <div class="form-group col-md-4" >
                <label for="servicio_id">Tipo de servicio</label>
                <input type="text" class="form-control" value="{{ $escuela->servicio->nombre }}" disabled>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="turno">Turno</label>
                <input type="text" class="form-control" value="{{ $escuela->turno }}" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="sostenimiento">Sostenimiento</label>
                <input type="text" class="form-control" value="{{ $escuela->sostenimiento }}" disabled>
            </div>
        </div>

        <hr class="mt-0 mb-0">
        <h4 class="text-center mb-1">Domicilio</h4>
        <hr class="mt-0">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="calle">Calle</label>
                <input type="text" class="form-control" value="{{$escuela->calle}}" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="colonia">Colonia</label>
                <input type="text" class="form-control" value="{{$escuela->colonia}}" disabled>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="exterior">Número exterior</label>
                <input type="text" class="form-control" value="{{$escuela->exterior}}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label for="interior">Número interior</label>
                <input type="text" class="form-control" value="{{$escuela->interior}}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label for="codpost">Código postal</label>
                <input type="text" class="form-control" value="{{$escuela->codpost}}" disabled>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="referencia">Entre calles</label>
                <input type="text" class="form-control" value="{{$escuela->entrecalles}}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label for="entidad">Entidad</label>
                <input type="text" class="form-control" value="{{$escuela->entidad}}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label for="municipio">Municipio</label>
                <input type="text" class="form-control" value="{{$escuela->municipio}}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label for="localidad">Localidad</label>
                <input type="text" class="form-control" value="{{$escuela->localidad}}" disabled>
            </div>
        </div>
        @can('escuelas.edit')
        <div class="float-right">
            <a class="btn text-white" style="background-color: #0D47A1" href="{{ route('escuelas.edit', ['id' => $escuela->id]) }}" id="btn_edit" name="btn_edit" role="button">
                <i class="fas fa-pencil-alt"></i>
                Editar
            </a>
        </div>
        @endcan
    </div>
</div>
@endsection
