<?php
include ($_SERVER['DOCUMENT_ROOT'].'/Asistencia/php/entities/EntityPreInsertion.php');
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
?>
