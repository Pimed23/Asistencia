<?php

include ($_SERVER['DOCUMENT_ROOT'].'/Asistencia/php/connection/Dbconfig.php');

class Mysql extends Dbconfig{
	
	public $connectionString;	
		
	function Mysql(){
		$this->connectionString = NULL;
		
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
	function dbDisconnect(){
		$this->connectionString = NULL;
		$this->dbName = NULL;
		$this->serverName = NULL;
		$this->userName = NULL;
		$this->passCode = NULL;		
	}
	function getConnectionString(){
		return $this->connectionString;
	}
}
?>
