class Usuario {

    constructor( nombre, apellido, correo, tipo ) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.correo = correo;
        this.tipo = tipo;
    }
    
    setNombre( nombre ) {
        this.nombre = nombre;
    }

    setApellido( apellido ) {
        this.apellido = apellido;
    }

    setCorreo( correo ) {
        this.correo = correo;
    }

    getNombre() {
        return this.nombre;
    }

    getApellido() {
        return this.apellido;
    }

    getCorreo() {
        return this.correo;
    }

    verificarDatos( correo ) {
        var datos = 'correo='+correo;
    
        $.ajax({
            type: 'POST',
            url: "php/login.php",
            data: datos,
            success: function( response ) {
                var datosUsuario = JSON.parse( response );
                
                if( datosUsuario == '-1' ) {
                    alert("Usuario no encontrado...");
                } else {
                    this.nombre = datosUsuario['nombre'];
                    this.apellido = datosUsuario['apellido'];
                    this.correo = datosUsuario['correo'];
                    this.tipo = datosUsuario['tipo'];
                    location.href="mostrarCursos.html";
                }

            }, error: function( response, status, error ) {
                alert("No encontrado");
            }
        });
    }
}

class Profesor extends Usuario {
    constructor( nombre, apellido, correo ) {
        super(nombre, apellido, correo );
    }
}

class Estudiante extends Usuario {
    constructor( nombre, apellido, correo ) {
        super(nombre, apellido, correo );
    }
}



