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

        <form method="POST" action="" id="form_create" name="form_create" class="needs-validation" novalidate>
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cct">C.C.T. <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="cct" name="cct" placeholder="C.C.T." required>
                    <div class="invalid-feedback">Falta la clave.</div>
                </div>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                <div class="invalid-feedback">Falta el nombre.</div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="tipo_id">Tipo de Escuela <span class="text-danger">*</span></label>
                    <select id="tipo_id" name="tipo_id" class="form-control" required>
                        <option selected value=""></option>
                    </select>
                    <div class="invalid-feedback">Falta el tipo.</div>
                </div>
                <div class="form-group col-md-4">
                    <label for="nivel_id">Nivel de la escuela <span class="text-danger">*</span></label>
                    <select id="nivel_id" name="nivel_id" class="form-control" required disabled>
                    </select>
                </div>
                <div class="form-group col-md-4" >
                    <label for="servicio_id">Tipo de Servicio <span class="text-danger">*</span></label>
                    <select id="servicio_id" name="servicio_id" class="form-control" required disabled>
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
<script>
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        console.log(forms);
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    console.log(form);
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

$(document).ready(function() {
    //https://laravel.com/api/5.8/Illuminate/Http/Request.html#method_root
    var urlRoot = "{{Request::root()}}";

    $.getJSON("{{ route('tiposDeEscuela') }}", null, function (values) {
        $.each(values.tipos, function(key, value) {
            $('#tipo_id').append($('<option>', {
                value: value.id,
                text : value.nombre
            }));
        });
    });

    $.fn.populateSelect = function (values) {
        var options = '';
        $.each(values, function (key, row) {
            options += '<option value="' + row.value + '">' + row.text + '</option>';
        });
        $(this).html(options);
    };

    function enableDisable(content,element,action){

        if(content==="empty") { $("#"+element).empty(); }

        if(action==='enabled'){ $("#"+element).removeAttr('disabled'); }
        else{ $("#"+element).prop('disabled', 'disabled');}
    }

    $("#tipo_id").change( function (){
        if($(this).val()!==''){
            enableDisable('empty','nivel_id','enabled');
            enableDisable('empty','servicio_id','');
            $.getJSON(urlRoot+'/niveltipo/'+$(this).val(), null, function (values) {
                $('#nivel_id').populateSelect(values);
            });
        }else{
            enableDisable('empty','nivel_id','');
            enableDisable('empty','servicio_id','');
        }
    });

    $("#nivel_id").change( function() {
        if($(this).val()!==''){
            enableDisable('empty','servicio_id', 'enabled');
            $.getJSON(urlRoot+'/servnivel/'+$(this).val(), null, function (values) {
                $('#servicio_id').populateSelect(values);
            });
        }else{
            enableDisable('empty','servicio_id','');
        }
    });

});
</script>

@endsection
