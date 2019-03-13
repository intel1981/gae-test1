@extends('layouts.app-main')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-1 border-bottom">
        <h1 class="h2" style="color: #607D8B">Editar Escuela</h1>
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

            <form method="POST" action="{{ route('escuelas.update',$escuela->id) }}" id="form_edit" name="form_edit">
                @method('PATCH')
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cct">C.C.T. <span class="text-danger">*</span></label>
                        <input type="text" class="form-control{{ $errors->has('cct') ? ' is-invalid' : '' }}" value="{{ old('cct', $escuela->cct) }}" id="cct" name="cct" placeholder="C.C.T." required>
                        @if ($errors->has('cct'))
                            <div class="invalid-feedback">
                                {{ $errors->first('cct') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre',$escuela->nombre) }}" id="nombre" name="nombre" placeholder="Nombre" required>
                    @if ($errors->has('nombre'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nombre') }}
                        </div>
                    @endif
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nivel">Nivel <span class="text-danger">*</span></label>
                        <select id="nivel" name="nivel" class="form-control{{ $errors->has('nivel') ? ' is-invalid' : '' }}" required>
                            <option value=""></option>
                            <option value="Inicial" {{ $escuela->nivel == "Inicial" ? "selected" : "" }}>Inicial</option>
                            <option value="Preescolar" {{ $escuela->nivel == "Preescolar" ? "selected" : "" }}>Preescolar</option>
                            <option value="Primaria" {{ $escuela->nivel == "Primaria" ? "selected" : "" }}>Primaria</option>
                            <option value="Secundaria" {{ $escuela->nivel == "Secundaria" ? "selected" : "" }}>Secundaria</option>
                            <option value="Media Superior" {{ $escuela->nivel == "Media Superior" ? "selected" : "" }}>Media Superior</option>
                            <option value="Superior" {{ $escuela->nivel == "Superior" ? "selected" : "" }}>Superior</option>
                            <option value="Formación para el trabajo" {{ $escuela->nivel == "Formación para el trabajo" ? "selected" : "" }}>Formación para el trabajo</option>
                            <option value="CAM" {{ $escuela->nivel == "CAM" ? "selected" : "" }}>CAM</option>
                            <option value="Otro Nivel Educativo" {{ $escuela->nivel == "Otro Nivel Educativo" ? "selected" : "" }}>Otro Nivel Educativo</option>
                        </select>
                        @if ($errors->has('nivel'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nivel') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="turno">Turno <span class="text-danger">*</span></label>
                        <select id="turno" name="turno" class="form-control{{ $errors->has('turno') ? ' is-invalid' : '' }}" required>
                            <option value=""></option>
                            <option value="No Aplica" {{ $escuela->turno == "No Aplica" ? "selected" : "" }}>No Aplica</option>
                            <option value="Matutino" {{ $escuela->turno == "Matutino" ? "selected" : "" }}>Matutino</option>
                            <option value="Vespertino" {{ $escuela->turno == "Vespertino" ? "selected" : "" }}>Vespertino</option>
                            <option value="Nocturno" {{ $escuela->turno == "Nocturno" ? "selected" : "" }}>Nocturno</option>
                            <option value="Discontinuo" {{ $escuela->turno == "Discontinuo" ? "selected" : "" }} >Discontinuo</option>
                            <option value="Continuo" {{ $escuela->turno == "Continuo" ? "selected" : "" }}>Continuo</option>
                        </select>
                        @if ($errors->has('turno'))
                            <div class="invalid-feedback">
                                {{ $errors->first('turno') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-4" >
                        <label for="sostenimiento">Sostenimiento <span class="text-danger">*</span></label>
                        <select id="sostenimiento" name="sostenimiento" class="form-control{{ $errors->has('sostenimiento') ? ' is-invalid' : '' }}" required>
                            <option value=""></option>
                            <option value="Público" {{ $escuela->sostenimiento == "Público" ? "selected" : "" }}>Público</option>
                            <option value="Privado" {{ $escuela->sostenimiento == "Privado" ? "selected" : "" }}>Privado</option>
                        </select>
                        @if ($errors->has('sostenimiento'))
                            <div class="invalid-feedback">
                                {{ $errors->first('sostenimiento') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form row">
                    <div class="form-group col-md-3">
                        <label for="status">¿ Escuela disponible ? </label>
                        <select id="status" name="status" class="form-control" required>
                            <option value=""></option>
                            <option value="1" {{ $escuela->status == true ? "selected" : "" }}>Si</option>
                            <option value="0" {{ $escuela->status == false ? "selected" : "" }}>No</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="float-left">
                    <a class="btn btn-danger" href="{{ route('escuelas.index') }}" id="btn_cancelar" name="btn_cancelar" role="button">
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

