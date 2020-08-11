class Curso {

    constructor( nombre, codigo ) {
        this.nombre = nombre;
        this.codigo = codigo;
    }

    setNombre( nombre ) {
        this.nombre = nombre;
    }

    setCodigo( codigo ) {
        this.codigo = codigo;
    }

    getNombre() {
        return this.nombre;
    }

    getCodigo() {
        return this.codigo;
    }

    verificarDatos( cursos ) {
        if( cursos == '-1' ) {
            alert("Usuario no encontrado...");
        } else {
            location.href="mostrarCursos.html";
        }
    }


    
};