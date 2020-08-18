<?php
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
?>
