function saveUpdate(){
    $("#btn_guardar").prop('disabled', 'disabled');
    $.ajax({
        method: "POST",
        url: $("#form_escuela").attr('action'),
        data: $("#form_escuela").serialize()
    })
    .done(function(data, textStatus, jqXHR){
        showAlert(textStatus, jqXHR.statusText, data.message, data.location);
    })
    .fail(function( jqXHR, textStatus, errorThrown){
        var errors = Object.keys(jqXHR.responseJSON.errors).length;
        var message = errors === 1
            ? 'Verifica el campo marcado en rojo'
            : 'Verifica los ' + errors + ' campos marcados en rojo';

        showAlert(textStatus, jqXHR.statusText, message, '');

        $.each(jqXHR.responseJSON.errors, function(key,value){
            $( "#"+key ).addClass( "is-invalid" ).removeClass( "is-valid" );
            $('<div id="'+key+'-error" class="error invalid-feedback">'+value+'</div>').insertAfter( $( "#"+key ) );
        });
        $("#btn_guardar").removeAttr('disabled');
    });
}

//Inicia funcion para agregar datos a los select dinamicos
$.fn.populateSelect = function (values) {
    var options = '';
    $.each(values, function (key, row) {
        options += '<option value="' + row.value + '">' + row.text + '</option>';
    });
    $(this).html(options);
};
//Termina funcion para agregar datos a los select dinamicos

//Inicia funcion para activar/desactivar y limpiar los select dinamicos
function enableDisable(content,element,action){
    if(content==="empty") { $("#"+element).empty(); }

    if(action==='enabled'){ $("#"+element).removeAttr('disabled'); }
    else{ $("#"+element).prop('disabled', 'disabled');}
}
//Termina funcion para activar/desactivar y limpiar los select dinamicos

//Informacion de exito/error al guardar/actualizar los datos
function showAlert(_textStatus, _statusText, _message, _location){
    Swal.fire({
        type:  _textStatus,
        title: _statusText === 'OK' ? 'OK' : 'ERROR',
        text:  _message,
        allowOutsideClick:  false,
        showCancelButton:   _statusText !== 'OK',
        showConfirmButton:  _statusText === 'OK',
        confirmButtonColor: '#3085d6',
        cancelButtonColor:  '#d33',
        cancelButtonText:   'Corregir',
        confirmButtonText:  'Continuar'
    }).then((result) => {
        if (result.value) {
            window.location.replace(_location);
        }
    });
}

$(document).ready(function() {
//Inicia código de validacion del formulario
    $("#form_escuela").validate({
        debug: false,
        errorElement: "div",
        rules: {
            //cct: { required: true, minlength:10, maxlength:10 },
            cct: "required",
            nombre:  "required",
            tipo_id: "required",
            nivel_id: "required",
            servicio_id: "required",
            turno: 'required',
            sostenimiento: 'required'
        },
        messages: {
            //cct: { required: "Falta la clave", minlength:"Min. 10 caracteres", maxlength:"Max. 10 caracteres" },
            cct: "Falta la clave",
            nombre: "Falta el nombre",
            tipo_id: "Elija el tipo",
            nivel_id: "Elija el nivel",
            servicio_id: "Elija el tipo de servicio",
            turno: 'Elija el turno',
            sostenimiento: 'Elija público o privado'

        },
        invalidHandler: function(event, validator) {
            // 'this' refers to the form
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = errors === 1
                    ? 'Verifica el campo marcado en rojo'
                    : 'Verifica los ' + errors + ' campos marcados en rojo';
                showAlert('error','ERROR',message,'');
            } else {
                // informar que se procedera a guardar el formulario
            }
        },
        submitHandler: function() { saveUpdate(); },
        errorPlacement: function ( error, element ) {
            //Add: <div id="element-error" class="error invalid-feedback">message</div>
            error.addClass( "invalid-feedback" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        success: function(element){
            //Remove: <div id="element-error" class="error invalid-feedback">message</div>
            $( element ).remove();
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });
//Termina código de validacion del formulario

//Inicia código para los controles del formulario

    /*Evento change. Select: Tipo de Escuela*/
    $("#tipo_id").change( function (){
        if($(this).val()!==''){
            enableDisable('empty','nivel_id','enabled');
            enableDisable('empty','servicio_id','');
            $.getJSON(urlRoot+'/niveltipo/'+$(this).val(), null, function (values) {
                $('#nivel_id').populateSelect(values);
            });
        }else{
            $(this).removeClass('is_valid');
            enableDisable('empty','nivel_id','');
            enableDisable('empty','servicio_id','');
        }
    });

    /* Evento change. Select: Nivel de Escuela*/
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
//Termina código para los controles del formulario

});
