@extends('layouts.app-main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-1 border-bottom">
    <h1 class="h2" style="color: #607D8B">Nueva Escuela</h1>
    <div class="btn-toolbar mb-1 mb-md-0">
        <a href="{{ route('escuelas.index') }}" class="btn text-white" role="button" aria-pressed="true" style="background-color: #4CAF50">
            <i class="fas fa-arrow-left"></i>
            Regresar
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8 my-3 p-3 rounded bg-white shadow-sm border">
        <div class="border-bottom border-gray pb-2 mb-2">
            <span class="font-weight-bold">
                Complete los siguientes datos
            </span>
            <small class="text-danger"> (* campo obligatorio)</small>
        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6 class="alert-heading">Verifique los errores del formulario</h6>
            </div>
        @endif

        <form method="POST" action="{{ route('escuelas.store') }}" id="form_create" name="form_create">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cct">C.C.T. <span class="text-danger">*</span></label>
                    <input type="text" class="form-control{{ $errors->has('cct') ? ' is-invalid' : '' }}" value="{{ old('cct') }}" id="cct" name="cct" placeholder="C.C.T." required>
                    @if ($errors->has('cct'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cct') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre <span class="text-danger">*</span></label>
                <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}" id="nombre" name="nombre" placeholder="Nombre" required>
                @if ($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nivel">Nivel <span class="text-danger">*</span></label>
                    <select id="nivel" name="nivel" class="form-control" required>
                        <option selected value=""></option>
                        <option value="Inicial">Inicial</option>
                        <option value="Preescolar">Preescolar</option>
                        <option value="Primaria">Primaria</option>
                        <option value="Primaria">Secundaria</option>
                        <option value="Media Superior">Media Superior</option>
                        <option value="Superior">Superior</option>
                        <option value="Formación para el trabajo">Formación para el trabajo</option>
                        <option value="CAM">CAM</option>
                        <option value="Otro Nivel Educativo">Otro Nivel Educativo</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="turno">Turno <span class="text-danger">*</span></label>
                    <select id="turno" name="turno" class="form-control" required>
                        <option selected value=""></option>
                        <option value="No Aplica">No Aplica</option>
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                        <option value="Nocturno">Nocturno</option>
                        <option value="Discontinuo">Discontinuo</option>
                        <option value="Continuo">Continuo</option>
                    </select>
                </div>
                <div class="form-group col-md-4" >
                    <label for="sostenimiento">Sostenimiento <span class="text-danger">*</span></label>
                    <select id="sostenimiento" name="sostenimiento" class="form-control" required>
                        <option selected value=""></option>
                        <option value="Público">Público</option>
                        <option value="Privado">Privado</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="status" name="status" checked>
                    <label class="form-check-label" for="status">
                        Escuela disponible para su uso
                    </label>
                </div>
            </div>
            <hr>
            <div class="float-left">
                <a class="btn btn-danger" href="{{ url()->previous() }}" id="btn_cancelar" name="btn_cancelar" role="button">
                    <i class="fas fa-times-circle"></i>
                    Cancelar
                </a>
            </div>
            <div class="float-right">
                <button type="submit" class="btn text-white" style="background-color: #0D47A1">
                    <i class="fas fa-check"></i>
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
