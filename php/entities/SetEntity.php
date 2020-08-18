<?php

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
?>
