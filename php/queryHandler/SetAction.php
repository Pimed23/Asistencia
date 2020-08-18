<?php
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

?>
