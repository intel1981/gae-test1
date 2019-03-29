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

        <form method="POST" action="" id="form_create" name="form_create" class="needs-validation" novalidate>
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cct">C.C.T. <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="cct" name="cct" placeholder="C.C.T." required>
                </div>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="tipo_id">Tipo de Escuela <span class="text-danger">*</span></label>
                    <select id="tipo_id" name="tipo_id" class="form-control" required>
                        <option selected value=""></option>
                    </select>
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
<!-- Archivo(s) javascript del modulo -->
<script src="{{ asset('js/jquery.validate.js') }}" ></script>
<script src="{{ asset('js/additional-methods.js') }}"></script>
<script>

$.validator.setDefaults( {
    submitHandler: function () {
        alert( "submitted!" );
    }
} );

$(document).ready(function() {
    //https://laravel.com/api/5.8/Illuminate/Http/Request.html#method_root
    var urlRoot = "{{Request::root()}}";

    $("#form_create").validate({
        debug: true,
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "em",
        rules: {
            cct:     "required",
            nombre:  "required",
            tipo_id: "required",
            nivel_id: "required",
            servicio_id: "required"
        },
        messages: {
            cct: "Falta la clave",
            nombre: "Falta el nombre",
            tipo_id: "Falta el tipo",
            nivel_id: "Falta el nivel",
            servicio_id: "Falta el tipo de servicio"
        },
        invalidHandler: function(event, validator) {
            // 'this' refers to the form
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = errors === 1
                    ? 'Verifica el campo marcado en rojo'
                    : 'Verifica los ' + errors + ' campos marcados en rojo';
                Swal.fire({
                    type: 'error',
                    title: 'Formulario incorrecto',
                    text: message,
                    allowOutsideClick: false,
                    showCancelButton: true,
                    showConfirmButton: false,
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Corregir'
                });
            } else {
                // el fomulario se ha validado correctamente, informar que se procedera a guardaer el formulario
            }
        },
        errorPlacement: function ( error, element ) {
            error.addClass( "invalid-feedback" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( errorClass ).removeClass( validClass );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( validClass ).removeClass( errorClass );
        }
    });

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
