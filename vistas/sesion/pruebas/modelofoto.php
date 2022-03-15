<?php

require_once 'conexion.php';
class Foto 
{
    
    private $correo="";
    private $id=0;
    private $foto;
	private $fecha;

public function __construct($correo, $id, $foto, $fecha){
	// parent::__construct();

$this->correo="";
$this->id=0;
$this->foto="";
$this->$fecha= ""; 
 }

public function setCorreo($correo)
{
	# code...
	$this->correo=$correo;
}
public function getCorreo()
{
	# code... is used to get a data from model
	$salida=$this->correo;
	return $salida; 
}
// Muestra los datos donde el correo o ariable que le asignemos sea igual a la lista asignada.
// We are going to can see the data at the list whit the same name.
public static function mostrarFoto ($correo) {
		$conexion = new Conexion ();
		$Foto = $conexion->consultarFoto("SELECT foto FROM fotos WHERE correo= $correo");
		$conexion->cerrar();
		return $Foto;
}

//!!!!!!!!!!!!!!!!!FOTO¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡-------------------------------------------------------------------->
//!!!!!!!!!!!!!!!!!FOTO¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡-------------------------------------------------------------------->
//!!!!!!!!!!!!!!!!!FOTO¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡-------------------------------------------------------------------->
//!!!!!!!!!!!!!!!!!FOTO¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡-------------------------------------------------------------------->

// Inserta nuevos datos
// Insert new data at the data base "fotos"
public static function cargarFoto ($correo, $foto, $fecha) {
	$fallo= "No fallo"; return $fallo;
	/*

		$conexion = new Conexion ();

		
		if ($conexion){
		$Foto = $conexion->actualizarFoto("INSERT INTO fotos (correo,foto,fecha) VALUES ($correo,$foto,$fecha)");
		$conexion->cerrar();
		if($foto){return $Foto;}else{ echo'la conexion fallo';}
		} else{ $fallo= "fallo"; return $fallo;}
		*/
		
}
//Delete the foto from db where the $correo (variable) is same that the list correo at the db 
//elimina la foto de la base de datos donde se encuantre la lista con el nombre que le proporcinaremos.
public static function eliminarFoto ($correo){
	$conexion= new Conexion ();
	$foto= $conexion->actualizarFoto ("DELETE foto FROM fotos WHERE correo= $correo");
}

public static function optenerDatosPorCorreo($correo)
{
	// This metode use the object $conexion to the class Conexion to get his metodes to get all the data from the db 
	// consulta todos los datos de la lista fotos.
 $conexion= new Conexion(); 
 $datos= $conexion-> consultarFoto("SELECT * FROM fotos WHERE correo= $correo");
 $conexion-> cerrar();
 return $datos;

}

public static function optenerDatosTotales()
{
	// This metode use the object $conexion to the class Conexion to get his metodes to get all the data from the db 
	// consulta todos los datos de la lista fotos.
 $conexion= new Conexion(); 
 $datos= $conexion-> consultarFoto("SELECT * FROM fotos ");
 $conexion-> cerrar();
 return $datos;

}




}
?>
