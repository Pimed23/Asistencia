class Seccion {

    constructor( aula, hora, curso ) {
        this.aula = aula;
        this.hora = hora;
        this.curso = new Curso( curso.nombre, curso.codigo );
        this.asistencia = [];
    }

    setAula( nombre ) {
        this.nombre = nombre;
    }

    setHora( hora ) {
        this.hora = hora;
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

    getCurso() {
        return this.curso;
    }

    getAsistencia() {
        return this.asistencia;
    }
};