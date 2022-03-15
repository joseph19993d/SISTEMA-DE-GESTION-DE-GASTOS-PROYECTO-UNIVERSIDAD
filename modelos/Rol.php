<?php
//______clase para crud de rol___
require_once 'Conexion.php';
require_once 'Sala.php';
class Rol extends Sala {
	private $id;
	private $nombre;
	private $conexion;

	public function __construct () {
		$this->id = 0;
		$this->nombre = '';
		$this->conexion = new Conexion();
	}


 public function setId($id)
 {
	 # code... ingresar o cambiar  dato
	 $this->id=$id;

 }
 public function getId()
 {
	 # code... Mostrar dato 
	 return $this->id;

 }
 public function setNombre($nombre)
 {
	 # code... Ingresar o cambiar dato
	 $this->nombre=$nombre;

 }
 public function getNombre()
 {
	 # code...  Mostrar dato
	 return $this->nombre;

 }



 //____________________Metodos para la conexion con la base de datos roles___________________________

//Mostrar los datos en la base de datos roles
 public static function listar () {
		$conexion = new Conexion ();
		$listado = $conexion->consultar('SELECT * FROM roles');
		$conexion->cerrar();
		return $listado;
	}

//Consultar la base de datos segun el id
public static function obtenerPorIdSala ($id) {
	$sala= new Rol();
	$sala= $sala->getIdSala();
	echo $sala;
	// NO TERMINADO
	$conexion = new Conexion ();
	$listado = $conexion->consultar("SELECT * FROM roles
	WHERE Id = $id
	AND Sala = $sala ");
	$conexion->cerrar();
	return $listado[0];
}
	public static function obtenerPorId ($id) {
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM roles WHERE Id = $id");
		$conexion->cerrar();
		return $listado[0];
	}
//ingresar nuevos datos 
	public function ingresar () {
		$s = "INSERT INTO roles (Nombre) VALUES ('$this->nombre')";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}
//eliminar datos por id 
	public function eliminar () {
		$s = "DELETE FROM roles WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}
//editar datos segin donde la id sea 
	public function editar () {
		$s = "UPDATE roles SET Nombre = '$this->nombre' WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}
}