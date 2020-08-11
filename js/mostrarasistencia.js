function CargarAsitencia( asistencia ) { 
    
    
}

function ObtenerCantidadFaltas() {
    
}


function MostrarFaltas() {
    var correo = document.getElementById('correo').value;
    var datos = 'correo='+correo;
    $.ajax({
        type: 'POST',
        url: "php/TotalFaltas.php",
        data: datos,
        success: function( response ) {
            if( response == "0") {
                alert("No se encontro persona");
            } else {
                var cursos = JSON.parse( response );
                cargarAsitencia( asistencia );
            }
        }, error: function( response, status, error ) {
            alert("No encontrado");
        }
    });
    return false;
}
