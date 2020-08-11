<?php

include ($_SERVER['DOCUMENT_ROOT'].'/Asistencia/php/entities/Usuario.php');
include ($_SERVER['DOCUMENT_ROOT'].'/Asistencia/php/connection/Mysql.php');
include ($_SERVER['DOCUMENT_ROOT'].'/Asistencia/php/queryHandler/QueryHandler.php');
class UsuariosDAO{
	private $tabla;
	private $user;
	private $connection;
	private $query;
	function UsuariosDAO(){
		$this->tabla = 'Usuarios';
		$this -> user = new Usuarios();
		$this->connection = new Mysql();
		$action = $_GET['do'];	
		$this->query->exec($this->connection);
		$connection->dbDisconnect();
	}
	function insert(){
		$this->query = new QueryInsert();
	}
	function update(){
		$columna = $_GET['columna'];
		$newValue = $_GET['newvalue'];
		$identificador = $_GET['identificador'];
		$id = $_GET['id'];
		$this->query = new QueryUpdate($tabla,$columna,$newValue,$identificador,$id);

	}
	function selectAll(){
		$this->query = new QuerySelectAll($tabla);
	}
}
?>
