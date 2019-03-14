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
    <div class="col-md-6 my-3 p-3 rounded bg-white shadow-sm border">
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

        <form method="POST" action="{{ route('ciclos.store') }}" id="form_create" name="form_create">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Periodo del ciclo escolar </label>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="20XX" id="inicio" name="inicio" required>
                        </div>
                        -
                        <div class="col">
                            <input type="text" class="form-control" placeholder="20XX" id="fin" name="fin" required>
                        </div>

                    </div>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3" >
                    <label for="status">Disponible </label>
                    <select id="status" name="status" class="form-control" required>
                        <option selected value=""></option>
                        <option value="1" {{ old('status') == "1" ? "selected" : "" }}>Si</option>
                        <option value="0" {{ old('status') == "0" ? "selected" : "" }}>No</option>
                    </select>
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
                <button type="button" class="btn text-white" style="background-color: #0D47A1" id="btn_guardar" name="btn_guardar">
                    <i class="fas fa-check"></i>
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection()
@section('module_javascript')
<script>
    $( document ).ready(function() {
        $( "#btn_guardar" ).on( "click", function() {
            console.log( "Boton guardar was clicked" );
            $( "#form_create" ).submit(function ( event ) {
                event.preventDefault();
            });
        });
    });
</script>
@endsection
