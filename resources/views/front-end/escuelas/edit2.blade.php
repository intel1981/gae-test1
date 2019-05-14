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

            <form method="POST" action="{{ route('escuelas.update',$escuela->id) }}" id="form_escuela" name="form_escuela">
                @method('PATCH')
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cct">C.C.T. <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="cct" name="cct" placeholder="C.C.T." value="{{ $escuela->cct }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cct">Núm. de Incorporación</label>
                        <input type="text" class="form-control" id="incorporacion" name="incorporacion" placeholder="Núm. de Incorporación" value="{{ $escuela->incorporacion }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $escuela->nombre }}" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="tipo_id">Tipo de escuela <span class="text-danger">*</span></label>
                        <select id="tipo_id" name="tipo_id" class="form-control" required>
                            @foreach($tipos as $tipo)
                                @if($loop->first)
                                <option value=""></option>
                                @endif
                                <option value="{{ $tipo->id }}" {{ $escuela->tipo_id === $tipo->id ? "selected" : "" }}>{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nivel_id">Nivel de la escuela <span class="text-danger">*</span></label>
                        <select id="nivel_id" name="nivel_id" class="form-control" required>
                            @foreach($niveles as $nivel)
                                @if($loop->first)
                                <option value=""></option>
                                @endif
                                <option value="{{ $nivel->id }}" {{ $escuela->nivel_id === $nivel->id ? "selected" : "" }}>{{ $nivel->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4" >
                        <label for="servicio_id">Tipo de servicio <span class="text-danger">*</span></label>
                        <select id="servicio_id" name="servicio_id" class="form-control" required>
                            @foreach($servicios as $servicio)
                                @if($loop->first)
                                    <option value=""></option>
                                @endif
                                <option value="{{ $servicio->id }}" {{ $escuela->servicio_id === $servicio->id ? "selected" : "" }}>{{ $servicio->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="turno">Turno <span class="text-danger">*</span></label>
                        <select id="turno" name="turno" class="form-control" required>
                            <option value=""></option>
                            <option value="No Aplica" {{ $escuela->turno === "No Aplica" ? "selected" : "" }}>No Aplica</option>
                            <option value="Matutino" {{ $escuela->turno === "Matutino" ? "selected" : "" }}>Matutino</option>
                            <option value="Vespertino" {{ $escuela->turno === "Vespertino" ? "selected" : "" }}>Vespertino</option>
                            <option value="Nocturno" {{ $escuela->turno === "Nocturno" ? "selected" : "" }}>Nocturno</option>
                            <option value="Discontinuo" {{ $escuela->turno === "Discontinuo" ? "selected" : "" }} >Discontinuo</option>
                            <option value="Continuo" {{ $escuela->turno === "Continuo" ? "selected" : "" }}>Continuo</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="sostenimiento">Sostenimiento <span class="text-danger">*</span></label>
                        <select id="sostenimiento" name="sostenimiento" class="form-control" required>
                            <option selected value=""></option>
                            <option value="Público" {{ $escuela->sostenimiento === "Público" ? "selected" : "" }}>Público</option>
                            <option value="Privado" {{ $escuela->sostenimiento === "Privado" ? "selected" : "" }}>Privado</option>
                        </select>
                    </div>
                </div>
                <hr class="mt-0 mb-0">
                <h4 class="text-center mb-1">Domicilio</h4>
                <hr class="mt-0">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="calle">Calle</label>
                        <input type="text" class="form-control" id="calle" name="calle" value="{{ $escuela->calle }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="colonia">Colonia</label>
                        <input type="text" class="form-control" id="colonia" name="colonia" value="{{ $escuela->colonia }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="exterior">Número exterior</label>
                        <input type="text" class="form-control" id="exterior" name="exterior" value="{{ $escuela->exterior }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="interior">Número interior</label>
                        <input type="text" class="form-control" id="interior" name="interior" value="{{ $escuela->interior }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="codpost">Código postal</label>
                        <input type="text" class="form-control" id="codpost" name="codpost" value="{{ $escuela->codpost }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="entrecalles">Entre calles</label>
                        <input type="text" class="form-control" id="entrecalles" name="entrecalles" value="{{ $escuela->entrecalles }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="entidad">Entidad</label>
                        <input type="text" class="form-control" id="entidad" name="entidad" value="{{ $escuela->entidad }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="municipio">Municipio</label>
                        <input type="text" class="form-control" id="municipio" name="municipio" value="{{ $escuela->municipio }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="localidad">Localidad</label>
                        <input type="text" class="form-control" id="localidad" name="localidad" value="{{ $escuela->localidad }}">
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
                    <button type="submit" id="btn_guardar" name="btn_guardar" class="btn text-white" style="background-color: #0D47A1">
                        <i class="fas fa-check"></i>
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('module_javascript')
<!-- Archivo(s) javascript del modulo -->
<script src="{{ asset('js/jquery.validate.js') }}" ></script>
<script src="{{ asset('js/additional-methods.js') }}"></script>
<script src="{{ asset('js/modules/escuela.js') }}"></script>
<script>
//Variables globales
var urlRoot = "{{Request::root()}}";
</script>
@endsection

