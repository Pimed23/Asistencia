
# Asistencia

## PROPOSITO
El proposito del poryecto es crear un sistema de asistencia el cual servira para crear listas de asistencias de manera sencilla y funcional para disminuir el tiempo  y formalizar la manera en que los profesores toman asistencia, mediante uso de historial de modificaciones del historial podemos evitar que se haga uso incorrecto de nuestro software, todo esto usando estilos de programacion,practicas de codigo legible, principos SOLID y DDD.

## FUNCIONALIDADES 

El software tendra las siguientes Funcionalidades:
- Login: Al ingresar el usuario a la aplicación aparecerá un formulario en el cual se solicita su correo institucional para habilitar el uso de la misma. De esta manera se validará al usuario.
- Inicio de control de asistencia: El profesor al llegar al salón accederá al sistema pudiendo visualizar los cursos que enseña seleccionando el curso en el que desea habilitar la asistencia de los estudiantes.
- Mostrar Cursos: Se mostrara la lista de cursos a la que el usurio pertences para que pueda acceder a las funcionalidades especificas.
 -Registro de asistencia: El alumno al desear registrar su asistencia accederá al sistema pudiendo visualizar todos los cursos en los que se encuentra matriculado, seleccionando uno,  en el cual registrará su asistencia , el sistema le brindara la opción para realizar esta acción mientras este habilitado el control de asistencia.
- Registro asistido: En caso de que un alumno no pueda registrar su asistencia, el profesor tendrá la posibilidad de modificarla, accediendo a la lista del respectivo curso, seleccionara al alumno y cambiara el estado de la asistencia.
- Modificación de asistencia: En caso existiera algún error por parte del docente, este podrá agregar o quitar asistencias a cualquier alumno, esto quedara registrado en la aplicación y tanto él como todos los alumnos podrán visualizarlo.
- Fin de control de asistencia: El profesor al desear deshabilitar la asistencia del curso,tendrá la opción de dar fin al tiempo del registro de asistencia, una vez cancelada la asistencia el profesor visualizará la cantidad total de alumnos que asistieron. 
- Historial de asistencia: Se permitira a los usuarios ver el historial de modificaciones de una lista de asistencia a la que pertenescan. 
- Generando Reportes de asistencia:  El sistema permite al profesor la descarga de la lista de asistencias de sus cursos.

## PRACTICAS DE CODIGO LEGIBLE

Estamos usando una sangria de estilo 1, donde el  { se encuentra en la misma linea

```javacript
class Profesor extends Usuario {
    constructor( nombre, apellido, correo ) {
        super(nombre, apellido, correo );
    }
}
```

Usamos sintaxis alterna para las estructuras de control 

```php
<h2>Lista de Asistencia</h2>
                <?php $mysql = new Mysql(); $mysql->dbConnect(); ?>
                <?php $data = $mysql->selectAll('Asistencia'); ?>
                <?php $asistencias = $data ?>
                <table style="width:100%">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Asistencia</th>
                    </tr>
                    <?php foreach($asistencias as $asistencia): ?>
                    <tr>
                        <td><?php echo $asistencia->getEstudiante()->getNombre(); ?></td>
                        <td><?php echo $asistencia->getEstudiante()->getApellido(); ?></td>
                        <td><?php echo $asistencia->getEstudiante()->getCorreo(); ?></td>
                        <td><?php echo $asistencia->getControl(); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
```

Usamos objetos para representar datos en la base de datos.

```javascript
class Usuario {

    constructor( nombre, apellido, correo, tipo ) {
         // ...
    }
    
    setNombre( nombre ) {
         // ...
    }

    setApellido( apellido ) {
         // ...
    }

    setCorreo( correo ) {
         // ...
    }

    getNombre() {
         // ...
    }

    getApellido() {
         // ...
    }

    getCorreo() {
         // ...
    }

    verificarDatos( correo ) {
        // ...
    }
}
```

Usamos Camelcase como esquema de nomenclatura consistente

```javascript
class checkValues{
    contructor(validador){
        this.validador = validador; 
    }
    
    valueCorrecto(){
        return validador.comprobar();
    }
}
```

Usamos la capitalizacion de palabras especiales de SQL

```
SELECT * FROM Asistencia
WHERE fecha =  CURDATE();
```

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
