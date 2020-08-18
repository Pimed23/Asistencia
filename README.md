
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

### THINGS

Utilizamos objetos para acceder a los datos, por lo que no la accedemos directamente

```javacript
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
    
};
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
Módulo Conexión a Datos
Primero tenemos la clase Mysql que se encarga sólo de conectar a la base de datos.
```php
class Mysql extends Dbconfig{
	
	public $connectionString;
	public $dataSet;
	
	private $sqlQuery;
		
	function Mysql(){
		$this->connectionString = NULL;
		$this->dataSet = NULL;
		$this->sqlQuery = NULL;
		
		$dbConnection =  new Dbconfig();
		$this->dbName = $dbConnection->dbName;
		$this->serverName = $dbConnection->serverName ;
		$this->userName = $dbConnection->userName ;
		$this->passCode = $dbConnection->passCode ;
		$dbConnection = NULL;	
	}

	function dbConnect(){
		$this->connectionString = mysqli_connect($this->serverName, $this->userName, $this->passCode);
		if( mysqli_connect_errno()){
			echo mysqli_error($this->connectionString);
			exit();
		}
		mysqli_select_db($this-> connectionString, $this->dbName) or die ("No se encuentra la base de datos");
		mysqli_set_charset($this-> connectionString, "utf8");
		return $this-> connectionString;
	}
}
```
Tenemos Clases que se encargan sólo de cambiar la configuración de variables que usaremos continuamente
```php
class entitySetter{
	private $entity;
	function entitySetter($entityIn){
		$this -> entity = setEntity($entityIn);
	}
	function setEntity($entityIn){
		switch($entityIn){
			case 'usuario':
				$this -> entity = 'Usuarios';
				break;
			case 'curso':
				$this -> entity = 'Cursos';
				break;
			case 'asistencia':
				$this -> entity = 'Asistencias';
				break;
			case 'estudiante':
				$this -> entity = 'Estudiantes';
				break;
			case 'profesor':
				$this -> entity = 'Profesores';
				break;
			default :
				$this -> entity = 'Desconocido';
				break;		
		}
	}
	function getEntity(){
		return $this -> entity;	
	}
}

class actionSetter{
	private $action;
	function actionSetter($actionIn){
		$this -> action = setAction($actionIn);
	}
	function setAction($actionIn){
		switch($actionIn){
			case 'create':
				$this -> action = 'QueryInsert';
				break;
			case 'update':
				$this -> action = 'QueryUpdate';
				break;
			case 'read':
				$this -> action = 'QuerySelectAll';
				break;
			case 'delete':
				$this -> action = 'QueryDelete';
				break;
			default :
				$this -> action = 'Desconocido';
				break;
		}
	}
	function getAction(){
		return $this -> action;
	}
}
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
Módulo Conexión a datos
La clase Query puede ser extendible a para tener más Queries personalizadas
```php
abstract class Query{
	protected $sqlQuery;
	abstract function exec($connection);
	function getQuery(){
		return $this->sqlQuery;
	}
}

class QueryUpdate extends Query{
	//tabla, culumna, nuevo valor, encontrar por, value para encontrar
	function QueryUpdate($tableName, $columnName,$newValue, $identificador,$id){
		$this -> sqlQuery = 'UPDATE '.$tableName.' SET '.$columnName." = '" .$newValue. "' WHERE ".$identificador.' ='.$id;
	}

	function exec($connection){
		if(mysqli_query($connection, $this->sqlQuery) == false){
			echo mysqli_error($this->connectionString);
		}
	}
}

class QuerySelectAll extends Query{
	function QuerySelectAll($tableName){
		$this -> sqlQuery = 'SELECT * FROM '.$this -> databaseName.'.'.$tableName;

	}
	function exec($connection){
		$dataSet = mysqli_query($connection, $this->sqlQuery);
		$json_array = array();
		while( $row = mysqli_fetch_assoc($this->dataSet)){
			$json_array = $row;
		}
		echo (json_encode($json_array));
	}
}

class QueryInsert extends Query{
	function QueryInsert($tableName, $values){
		$i = NULL;
		$size = sizeof($values);
		$this -> sqlQuery = 'INSERT INTO '.$tableName.' VALUES(';
		$i = 0;
		while($i < $size){
			$this -> sqlQuery .= "'";
			$this -> sqlQuery .= $values[$i];
			$this -> sqlQuery .= "'";
			$i++;
			if($i != $size)
				$this -> sqlQuery .= ',';
		}
		$this -> sqlQuery .= ')';
	}
	function exec($connection){
		if(mysqli_query($connection, $this->sqlQuery) == false){
			echo mysqli_error($this->connectionString);
		}
	}
}
```
Se puede agregar nuevos valores que extienden de EntityPreinsertion, esto nos sirve para preparar queries para la inserción
```php
abstract class EntityPreInsertion{
	private $lista;
	function EntityPreInsertion(){
		$this -> lista = array();
	}
	function getLista(){
		return $this -> lista;
	}
	abstract function preparar();
}
class UsuariosPreInsertion extends EntityPreInsertion{
	function preparar(){
		$this -> lista [] = $_GET['idUsuario'];
		$this -> lista [] = $_GET['nombreUsuario'];
		$this -> lista [] = $_GET['apellidoUsuario'];
		$this -> lista [] = $_GET['correoUsuario'];
	}
}
```
### DIP

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
Módulo de Conexión
Se han usado varias interfaces, estas no son dependientes de clases pero si de abstracciones por ejemplo se puede tener una entidad cualquiera y hacer que esta pueda realizar cualquier query.
```php
class FactoryDAO{
	private $action;
	private $entity;
	function factoryDAO(){}
	function createDAO($entityGET, $actionGET){
		$tempEntity = new entitySetter($entityGET);
		$tempAction = new actionSetter($actionGET);
		$this -> entity = $tempEntity -> getEntity();
		$this -> action	= $tempAction -> getAction();
		$newEntity = new EntityDAO($this -> entity, $this -> action);
		return $newEntity;
	}
}

```

## Conceptos DDD
El diseño guiado por el dominio, en inglés: domain-driven design (DDD), es un enfoque para el desarrollo de software con necesidades complejas mediante una profunda conexión entre la implementación y los conceptos del modelo y núcleo del negocio.
El DDD no es una tecnología ni una metodología, este provee una estructura de prácticas y terminologías para tomar decisiones de diseño que enfoquen y aceleren el manejo de dominios complejos en los proyectos de software.
### Lenguaje Ubicuo
```php
function createQuery($tabla,$actionIn);
function QuerySelectAll($tableName);
function QueryInsert($tableName, $values);
function createDAO($entityGET, $actionGET);
function prepararEntityParaPreInsertion();
```
### Entities
Las entidades son objetos del modelo que se caracterizan por tener identidad en el sistema, los atributos que contienen no son su principal característica. Representan conceptos con una identidad que se mantienen en el tiempo, y que con frecuencia también se mantienen bajo distintas representaciones de la entidad. Deben poder ser distinguidas de otros objetos aunque tengan los mismos atributos. Tienen que poder ser consideradas iguales a otros objetos aún cuando sus atributos difieren.

Por ejemplo, imaginemos un objeto Alumno con nombre y apellidos como atributos de una clase en un sistema donde dos objetos que representan a dos alumnos diferentes con los mismos nombres y apellidos deberían ser considerados diferentes. Como vemos, en este caso no podemos describir el objeto persona primariamente por sus atributos, si no que debemos de asignarle una identidad que se mantenga para cualquier representación de esa persona. Si nuestro sistema trabaja únicamente con personas de nacionalidad peruana podríamos considerar como identidad el DNI, en cambio si manejamos personas de cualquier nacionalidad quizás debamos de autogenerar este ID dentro de nuestro sistema. Cabe destacar que en nuestro sistema, Alumno es considerado una entidad.

La identidad tiene que ser declarada de tal manera que podemos rastrear la entidad de manera eficaz. Los atributos, responsabilidades y relaciones deben ser definidas en relación a la identidad que representa la entidad más que en los atributos que la componen.

Como podemos observar, el hecho de que necesitemos identificar y distinguir distintos objetos a lo largo de su ciclo de vida hace que la complejidad para manejarlos y diseñarlos sea bastante mayor que la de los que no la necesitan. Por este motivo debemos usar entidades únicamente para objetos que realmente lo requieran, lo cual tiene dos ventajas importantes. Por un lado, no incluiremos complejidad innecesaria en objetos que no requieran ser identificados, por otro lado al reducir el número de entidades en el sistema seremos capaces de identificarlas rápidamente.
### Factorías
Factory para crear una entidad para ser insertada.
```php
class FactoryPreInsertion{
	function FactoryPreInsertion(){}
	function createPreInsertion($entityIn){
		$tempEntityPreInsertion;
		switch($entityIn){
			case 'Usuarios':
				$tempEntityPreInsertion = new UsuariosPreInsertion();
				break;
			case 'Cursos':
				break;
			case 'Asistencias':
				break;
			case 'Estudiantes':
				break;
			case 'Profesores':
				break;
			case 'Desconocido':
				break;
		}
		return $tempEntityPreInsertion;		
	}
}
```

Factory para crear una nueva query.
```php
class FactoryQuery{
	function FactoryQuery(){}
	function createQuery($tabla,$actionIn){
		$query;
		switch($actionIn){
			case 'QueryUpdate':
				$tempColumna = $_GET['columna'];
				$tempNewValue = $_GET['newvalue'];
				$tempIdentificador = $_GET['identificador'];
				$tempIdValue = $_GET['identificadorvalue'];
				$query = new QueryUpdate($tabla, $tempColumna, $tempNewValue, $tempIdentificador, $tempIdValue);
				break;		
			case 'QuerySelectAll':
				$query = new QuerySelectAll($tabla);
				break;
			case 'QueryInsert':
				$factoryPI = new FactoryPreInsertion();
				$newPreInsertion = $factoryPI -> createPreInsertion($tabla);
				$newPreinsertion -> preparar();
				$lista = $newPreinsertion -> getLista();
				$query = new QueryInsert($tabla, $lista);
				break;
			case 'QueryDelete'://TODO
				break;
			case 'Desconocido':				
				break;
			default :
				break;
		}
		return $query;	
	}
}
```
Factory para crear un nuevo objeto DAO
```php
class FactoryDAO{
	private $action;
	private $entity;
	function factoryDAO(){}
	function createDAO($entityGET, $actionGET){
		$tempEntity = new entitySetter($entityGET);
		$tempAction = new actionSetter($actionGET);
		$this -> entity = $tempEntity -> getEntity();
		$this -> action	= $tempAction -> getAction();
		$newEntity = new EntityDAO($this -> entity, $this -> action);
		return $newEntity;
	}
}
```
### Value objects
Al contrario que las entidades los value objects representan conceptos que no tienen identidad. Simplemente describen características. Por lo tanto solo nos interesan sus atributos.

Los value object representan elementos del modelo que se describen por el QUÉ son, y no por QUIÉN o CUÁL son.

Pongamos por ejemplo, un objeto Curso representado por su composición ID, nombre y código. Si tuviéramos dos objetos representando el mismo curso podríamos usar cualquiera de ellos, ya que nos interesa qué curso es por sus atributos, no por cuál instancia estamos usando. Otros ejemplos de value objects podrían ser String o Integer, ya que no nos importa que ¨C¨ o que ¨3¨ estamos usando. Aunque estos ejemplos son simples los value objects no tienen porque serlo.

Esto conlleva una serie de diferencias a la hora de modelar value objects respecto a las entidades. Los value objects suelen ser modelados como inmutables y son menos complejos de diseñar, ya que podremos usarlos y descartarlos según nos interese, pues no tenemos que preocuparnos por la instancia que estemos utilizando (siempre y cuando sus atributos sean los correctos).

### Services
Los servicios representan operaciones, acciones o actividades que no pertenecen conceptualmente a ningún objeto de dominio concreto. Los servicios no tienen ni estado propio ni un significado más allá que la acción que los definen.

Al contrario que las entidades y los value objects, los servicios son definidos en términos de lo que pueden hacer por un cliente, y por tanto tienden a ser nombrados como verbos. Los verbos utilizados para nombrar a los servicios deben pertenecer al ubiquitous language, o ser introducidos en el en caso de que aún no lo sean. A la hora de implementarlos tanto sus parámetros como resultados deben ser objetos pertenecientes al dominio.

Un servicio debe de cumplir tres características principales:

* La operación que lo define está relacionada con un concepto de dominio, pero no es natural modelarlo como una entidad o un value object.
* Su interfaz se especifica usando otros elementos del modelo de dominio.
* La operación no tiene estado, por lo que cualquier cliente podría usar cualquier instancia del servicio sin tener en cuenta las operaciones que se han realizado con anterioridad en esa instancia.

Podemos dividir los servicios en tres tipos diferentes según su relación con el núcleo del dominio.

> Domain services
Son responsables del comportamiento más específico del dominio, es decir, realizan acciones que no dependen de la aplicación concreta que estemos desarrollando, sino que pertenecen a la parte más interna del dominio y que podrían tener sentido en otras aplicaciones pertenecientes al mismo dominio.Por ejemplo, crear un nuevo curso.
> Application services
Son responsables del flujo principal de la aplicación, es decir, son los casos de uso de nuestra aplicación. Son la parte visible al exterior del dominio de nuestro sistema, por lo que son el punto de entrada-salida para interactuar con la funcionalidad interna del dominio. Su función es coordinar entidades, value objects, domain services e infrastructure services para llevar a cabo una acción.
Por ejemplo, añadir un nuevo alumno al registro para tomarle la asitencia.

> Infrastructure services
Declaran comportamiento que no pertenece realmente al dominio de la aplicación pero que debemos ser capaces de realizar como parte de este. Por ejemplo, enviar el registro de asistencia de cada alumno a su correo. 

Estamos manejando estos con solo un servicio, este nos permite realizar cualquier tipo de consulta.
```php
$factory = new factoryDAO();
$do = $_GET['do'];
$entity = $_GET['entity'];

$entityDAO = $factory -> createDAO($entity,$do);
$entityDAO -> ejecutarQuery();
```

