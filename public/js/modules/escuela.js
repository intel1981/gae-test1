function deleteItem(urlDelete) {

    Swal.fire({
        title: '¿Realmente desea eliminar esta escuela?',
        text: "Si hizo clic por equivocación, presione Cancelar",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, deseo eliminarla'
    }).then((result) => {

        if (result.value) {

            axios.delete(urlDelete)
                .then(function (response) {
                    //La eliminación se realizo correctamente
                    Swal.fire({
                        title: 'Escuela eliminada',
                        text: 'La escuela se elimino correctamente. Presione Continuar',
                        type: 'success',
                        allowOutsideClick: false,
                        showConfirmButton: true,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Continuar'
                    }).then((result) => {
                        if(result.value){ location.reload(); }
                    })

                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });

        }

    })
}
