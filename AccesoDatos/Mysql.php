<?php

include ($_SERVER['DOCUMENT_ROOT'].'/Asistencia/php/connection/Dbconfig.php');

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
	function dbDisconnect(){
		$this->connectionString = NULL;
		$this->dataSet = NULL;
		$this->sqlQuery = NULL;
		$this->dbName = NULL;
		$this->serverName = NULL;
		$this->userName = NULL;
		$this->passCode = NULL;		
	}
	function selectAll($tableName){
		$this -> sqlQuery = 'SELECT * FROM '.$this -> databaseName.'.'.$tableName;
		$this -> dataSet = mysqli_query($this-> connectionString, $this->sqlQuery);
		$json_array = array();
		while( $row = mysqli_fetch_assoc($this->dataSet)){
			$json_array = $row;
		}
		echo (json_encode($json_array));
	}
	function insertInto($tableName, $values){
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
		echo $this->sqlQuery;	
		if(mysqli_query($this->connectionString, $this->sqlQuery) == false){
			echo mysqli_error($this->connectionString);
		}
	}
	function update($tableName, $columnName,$newValue, $identificador,$id){
		$this -> sqlQuery = 'UPDATE '.$tableName.' SET '.$columnName." = '" .$newValue. "' WHERE ".$identificador.' ='.$id;
		echo $this->sqlQuery;
		if(mysqli_query($this->connectionString, $this->sqlQuery) == false){
			echo mysqli_error($this->connectionString);
		}
	}
}
?>
