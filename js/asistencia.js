class Asistencia {
    constructor( fecha, control, estudiante, seccion ) {
        this.fecha = fecha;
        this.control = control;   // BOOLEANO TRUE SI ASISTIO FALSE SI NO ASISTIO
        this.estudiante = new Estudiante( estudiante.nombre, estudiante.apellido, estudiante.correo );
    }

    setFecha( fecha ) {
        this.fecha = fecha;
    }

    setAsistencia( control ) {
        this.control = control;
    }

    setEstudiante( estudiante ) {
        this.estudiante.setNombre( estudiante.nombre );
        this.estudiante.setApellido( estudiante.apellido );
        this.estudiante.setCorreo( estudiante.correo );
    }

    getFecha() {
        return this.fecha;
    }

    getAsistencia() {
        return this.control;
    }

    getEstudiante() {
        return this.estudiante;
    }
};