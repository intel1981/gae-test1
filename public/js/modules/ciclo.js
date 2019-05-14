$(document).ready(function() {

    //are greater then cero
    jQuery.validator.addMethod("agtcero", function(value, element, params) {
        //Allows only positive integers that are greater then 0.
        //http://regexlib.com/REDetails.aspx?regexp_id=2647
        return this.optional( element ) || /^[1-9]+[0-9]*$/.test( value );
    }, jQuery.validator.format("El período es incorrecto"));

    //Inicia código de validacion del formulario
    $("#form_ciclo").validate({
        debug: false,
        errorElement: "div",
        rules: {
            inicio: { required: true, agtcero:true, digits:true,  minlength:4, maxlength:4 },
            fin:    { required: true, agtcero:true, digits:true, minlength:4, maxlength:4 }
        },
        messages: {
            inicio: {
                required: "Falta el período inicial",
                digits: "Solo se permiten números",
                minlength:"Min. 4 dígitos",
                maxlength:"Max. 4 dígitos"
            },
            fin: {
                required: "Falta el período final",
                digits: "Solo se permiten números",
                minlength:"Min. 4 dígitos",
                maxlength:"Max. 4 dígitos"
            }

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
});

function saveUpdate(){
    $("#btn_guardar").prop('disabled', 'disabled');
    $.ajax({
        method: "POST",
        url: $("#form_ciclo").attr('action'),
        data: $("#form_ciclo").serialize()
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
