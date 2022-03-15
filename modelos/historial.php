<?php
//______clase para crud de Historial___
require_once 'Conexion.php';

class Historial  {
	private $id;
	private $informe;
    private $fecha;
    private $hora;
	private $sala;

	private $conexion;

	public function __construct () {
		$this->id = 0;
		$this->informe = '';
        $this->fecha='';
		$this->hora='';
		$this->sala=0;

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
 public function setInforme($informe)
 {
	 # code... Ingresar o cambiar dato
	 $this->informe=$informe;

 }
 public function getInforme()
 {
	 # code...  Mostrar dato
	 return $this->informe;

 }

 public function setFecha($fecha)
 {
	 # code... Ingresar o cambiar dato
	 $this->fecha=$fecha;

 }
 public function getFecha()
 {
	 # code...  Mostrar dato
	 return $this->fecha;

 }


 
 public function setSala($sala)
 {
	 # code... Ingresar o cambiar dato
	 $this->sala=$sala;

 }
 public function getSala()
 {
	 # code...  Mostrar dato
	 return $this->sala;

 }





 //____________________Metodos para la conexion con la base de datos Historiales___________________________

//Mostrar los datos en la base de datos Historiales
    public static function listar ($fecha, $sala) {
		/* $fecha= strval( $fecha);
		echo 'la fecha es'. $fecha; */
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM historial WHERE fecha = '$fecha' AND sala= $sala");
		$conexion->cerrar();
		return $listado;
	}

//Consultar la base de datos segun el id

	public static function obtenerPorId ($id) {
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM Historial WHERE Id = $id");
        
		$conexion->cerrar();
		return $listado[0];
	}
//ingresar nuevos datos 
	public function ingresar ($sala) {
		
		$hoy = getdate(); 
		$año= $hoy['year'];
		$mes= $hoy['mon'];
		$dia= $hoy['mday'];
		$fecha="";
		$fecha= "".$año."/".$mes."/".$dia;
		$hora= $hoy['hours'].':'.$hoy['minutes'];
		$s = "INSERT INTO historial (informe, fecha, hora, sala) VALUES ('$this->informe', '$fecha' ,'$hora', $sala )";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}
//eliminar datos por id 
	public function eliminar () {
		$s = "DELETE FROM historial WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}
//editar datos segin donde la id sea 
	public function editar () {
		$s = "UPDATE historial SET informe = '$this->informe' WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}
}