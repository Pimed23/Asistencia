class Seccion {

    constructor( aula, hora, curso, profesor ) {
        this.aula = aula;
        this.hora = hora;
        this.profesor = new Profesor( profesor.nombre, profesor.apellido, profesor.correo );
        this.curso = new Curso( curso.nombre, curso.codigo );
        this.asistencia = [];
    }

    setAula( nombre ) {
        this.nombre = nombre;
    }

    setHora( hora ) {
        this.hora = hora;
    }

    setProfesor( profesor ) {
        this.profesor.setNombre( profesor.nombre );
        this.profesor.setApellido( profesor.apellido );
        this.profesor.setCorreo( profesor.correo );
    }

    setCurso( curso ) {
        this.curso.setNombre( curso.nombre );
        this.curso.setCodigo( curso.codigo );
    }

    setAsistencia( asistencia ) {
        temp = new Asistencia( asistencia.fecha, asistencia.control, asistencia.estudiante, asistencia.seccion );
        this.asistencia.push( temp );
    }
    
    getAula() {
        return this.nombre;
    }

    getHora() {
        return this.codigo;
    }

    getProfesor() {
        return this.profesor;
    }

    getCurso() {
        return this.curso;
    }

    getAsistencia() {
        return this.asistencia;
    }
};