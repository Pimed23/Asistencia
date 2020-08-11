class Usuario {

    constructor( nombre, apellido, correo ) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.correo = correo;
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



