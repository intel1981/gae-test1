@extends('layouts.app-main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-1 border-bottom">
    <h1 class="h2" style="color: #607D8B">Nuevo Ciclo Escolar</h1>
    <div class="btn-toolbar mb-1 mb-md-0">
        <a href="{{ route('ciclos.index') }}" class="btn text-white" role="button" aria-pressed="true" style="background-color: #4CAF50">
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

        <form method="POST" action="{{ route('ciclos.store') }}" id="form_ciclo" name="form_ciclo">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="row">
                        <div class="col">
                            <label for="inicio">Per&iacute;odo Inicial <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="20XX" id="inicio" name="inicio" required>
                        </div>
                        <div class="col">
                            <label for="inicio">Per&iacute;odo Final <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="20XX" id="fin" name="fin" required>
                        </div>

                    </div>

                </div>
            </div>
            <hr>
            <div class="float-left">
                <a class="btn btn-danger" href="{{ route('ciclos.index') }}" id="btn_cancelar" name="btn_cancelar" role="button">
                    <i class="fas fa-times-circle"></i>
                    Cancelar
                </a>
            </div>
            <div class="float-right">
                <button type="submit" class="btn text-white" style="background-color: #0D47A1" id="btn_guardar" name="btn_guardar">
                    <i class="fas fa-check"></i>
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection()
@section('module_javascript')
<!-- Archivo(s) javascript del modulo -->
<script src="{{ asset('js/jquery.validate.js') }}" ></script>
<script src="{{ asset('js/modules/ciclo.js') }}"></script>
<script>
//Variables globales
var urlRoot = "{{Request::root()}}";
</script>
@endsection
