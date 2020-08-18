<?php

include ($_SERVER['DOCUMENT_ROOT'].'/Asistencia/php/connection/Mysql.php');
include ($_SERVER['DOCUMENT_ROOT'].'/Asistencia/php/queryHandler/QueryHandler.php');
include ($_SERVER['DOCUMENT_ROOT'].'/Asistencia/php/entities/SetEntity.php');
include ($_SERVER['DOCUMENT_ROOT'].'/Asistencia/php/queryHander/SetAction.php');
class EntityDAO{
	private $tabla;
	private $connection;
	private $query;
	function EntityDAO($tablaIn,$actionIn){
		$this -> tabla = $tablaIn;
		$this -> connection = new Mysql();
		$factoryQ = new FactoryQuery();
		$this -> query = $factoryQ -> createQuery($this -> tabla, $actionIn);
	}	
	function ejecutarQuery(){
		$this -> query -> exec( $this -> connection );
	}	
}

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
?>
