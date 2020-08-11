<?php
/*
Clase que nos permite tener la data de nuestra coneccion
Hacer cambios en Dbconfig para los datos correctos que nos permitira hacer la coneccion
*/
class Dbconfig{
	protected $serverName;
	protected $userName;
	protected $passCode;
	protected $dbName;

	//TODO hacer un constructor para que sea dinamico
	function Dbconfig(){
		$this->serverName= 'localhost';
		$this->userName= 'root';
		$this->passCode= 'root';
		$this->dbName= 'Asistencia';
	}
}

?>
