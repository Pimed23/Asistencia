# Asistencia

## PROGRAMING STYLES

### MONOLITHIC

Se desarrolla como una secuencia de declaraciones y no como una secuencia de funciones.

```javascript
function obtenerCursos() {
    var correo = document.getElementById('correo').value;
    var datos = 'correo='+correo;
    $.ajax({
        type: 'POST',
        url: "php/mostrarCursos.php",
        data: datos,
        success: function( response ) {
            if( response == "0") {
                alert("No se encontro persona");
            } else {
                var cursos = JSON.parse( response );
                cargarCursos( cursos );
            }
        }, error: function( response, status, error ) {
            alert("No encontrado");
        }
    });
    return false;
}
```

### PIPELINE

Las funciones no se comunican usando datos globales y luego se llaman de forma secuencial.

```javascript
function revisarTexto( elemento ) {
/*
* Implementacion
*/
}

function revisarNumero( elemento ) {
/*
* Implementacion
*/
}

function revisarEmail( elemento ) {
/*
* Implementacion
*/
}

function validar() {
    var datosCorrectos=true;
    var error="";

    if(!(revisarTexto(document.getElementById("nombre")))){
        datosCorrectos=false;
        error="\nEl campo de Nombre esta vacio o incorrecto";
    }

    if(!(revisarEmail(document.getElementById("mail")))){
        datosCorrectos=false;
        error="\nEl campo de Email esta vacio o incorrecto";
    }

    if(!(revisarNumero(document.getElementById("telefono")))){
        datosCorrectos=false;
        error="\nEl campo telefono esta vacio o incorrecto";
    }

    var selec = n_form.grupo.selectedIndex;
    if( n_form.grupo.options[selec].value=="0") {
        datosCorrectos=false;
        error="\nFalta indicar el grupo del contacto";
    }

    if(!datosCorrectos){
        alert("Hay errores en el formulario" + error );
    } else {
        alert("Se ha agregado al usuario correctamente")
        location.href = "index.html";
        evt.preventDefault();
    }
}
```

## PRINCIPIOS SOLID

### SRP

Principio de responsabilidad Unica, las clases se encargan unicamente de funcionalidades de su tabla y no realiza funcionalidades que no son de ella
```javascript
class Historial {

    constructor( fecha, listaAsistencias ) {
        this.fecha = fecha;

        for( var i = 0; i < listaAsistencias.length(); ++i ) {
            temp = new Asistencia( listaAsistencias[i].fecha, listaAsistencias[i].control, listaAsistencias[i].estudiante, listaAsistencias[i].seccion );
            this.historial.push( temp );
        }
    }

    setFecha( fecha ) {
        this.fecha = fecha;
    }

    setHistorial( listaAsistencias ) {
        for( var i = 0; i < listaAsistencias.length(); ++i ) {
            temp = new Asistencia( listaAsistencias[i].fecha, listaAsistencias[i].control, listaAsistencias[i].estudiante, listaAsistencias[i].seccion );
            this.historial.push( temp );
        }
    }

    agregarAsistencia( asistencia ) {
        temp = new Asistencia( asistencia.fecha, asistencia.control, asistencia.estudiante, asistencia.seccion );
        this.historial.push( temp );
    }
};
```


### OCP

Utilizamos el principio abierto cerrado para que la clase CheckValues este abierta a extensiones, en nuestro caso formatos con expresiones regulares.

```javascript
class checkValues{
    contructor(validador){
        this.validador = validador; 
    }
    
    valueCorrecto(){
        return validador.comprobar();
    }
}

class Validador{
    contructor(value){
        this.value = value; 
    }
    comprobar();
}

class Number extends Validador { 
    comprobar(){
        return !isNaN(parseFloat(value)) && isFinite(value);
    }
}
class Telephone  extends Validador {
    comprobar(){
        if( !(/^\d{9}$/.test(value)) ) {
            return false;
        }
        return true;
    }
}
class DNI  extends Validador {
    comprobar(){
        if( !(/^\d{8}$/.test(value)) ) {
            return false;
        }
        return true;  
    }
}
class Email  extends Validador {
    comprobar(){
        if( !(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(valor)) ) {
            return false;
          }
        return true;  
    }
}
```
### ISP

Usamos el principio de Inversion de dependencias ya que no dependemos de clases concretas como Number, Telephone , en cambio dependemos de la clase Abstracta Validador

```javascript
class Validador{
    contructor(value){
        this.value = value; 
    }
    comprobar();
}

class Number extends Validador { 
    comprobar(){
        return !isNaN(parseFloat(value)) && isFinite(value);
    }
}
class Telephone  extends Validador {
    comprobar(){
        if( !(/^\d{9}$/.test(value)) ) {
            return false;
        }
        return true;
    }
}
```
