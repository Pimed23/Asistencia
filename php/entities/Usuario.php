<?php
class Usuarios{
	protected $id_usuario;
	protected $nombre;
	protected $apellido;
	protected $correo;
	function Usuarios(){
	}
	function getIdUsuario(){
		return $this->id_usuario;
	}
	function setIdUsuario($id){
		$this->id_usuario = $id;
	}
	function getNombre(){
		return $this->nombre;	
	}
	function setNombre($nombre){
		$this->nombre = $nombre;
	}
	function getApellido(){
		return $this->apellido;
	}
	function setApellido($apellido){
		$this->apellido = $apellido;
	}
	function getCorreo(){
		return $this->correo;
	}
	function setCorreo($correo){
		$this->correo = $correo;
	}
	
}
?>
