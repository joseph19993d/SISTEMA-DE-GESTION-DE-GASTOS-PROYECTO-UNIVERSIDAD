<?php
//______clase para crud de fotos___

require_once 'Conexion.php';


class Foto  {

	private $id;
    private $correo;
    private $imagen;
    private $sala;

	public function __construct () {
       
		$this->id = 0;
		$this->correo="";
        $this->imagen="";
        $this->Sala=0;

        $this->conexion = new Conexion();

	}
public function setSala($sala)
 {
	 # code... ingresar o cambiar  dato
	 $this->sala=$sala;
 }

 public function getSala()
 {
	 # code... Mostrar dato 
	 return $this->sala;

 }

 public function setId($ifd)
 {
	 # code... ingresar o cambiar  dato
	 $this->id=$ifd;
 }

 public function getId()
 {
	 # code... Mostrar dato 
	 return $this->id;

 }
 public function setImagen($imagen)
 {
	 # code... Ingresar o cambiar dato
	 $this->imagen=$imagen;

 }
 public function getImagen()
 {
	 # code...  Mostrar dato
	 return $this->imagen;
 }
 
 public function setCorreo($correo)
 {
	 # code... Ingresar o cambiar dato
	 $this->correo=$correo;
 }

 public function getCorreo()
 {
	 # code...  Mostrar dato
	 return $this->correo;
 }

 //____________________Metodos para la conexion con la base de datos fotos___________________________

//Mostrar los datos en la base de datos gasto  
    public static function listar ($sala) {

		$conexion = new Conexion ();
		$resultado = $conexion->consultarFile("SELECT correo,imagen FROM fotos WHERE sala= $sala");
        
        if(!$resultado){
            $mensaje= "error ====".$resultado;
            echo $mensaje; 
            return $mensaje;
        }else{
        $conexion->cerrar();
		return $resultado;
        }
        
		
	}
//Mostrar datos de el Gasto actual
    public static function listarActual ($correo,$sala) {
		$conexion = new Conexion ();
		$resultado = $conexion->consultarFileArray("SELECT imagen FROM fotos WHERE sala='$sala' AND correo= '$correo' ORDER BY id DESC ");
		
        if(!$resultado){
            $mensaje= "error ====".$resultado;
            echo $mensaje; 
            return $mensaje;
        }else{
        $conexion->cerrar();
		return $resultado;
        }
	}

//Consultar la base de datos segun el id y la sala 


	public static function obtenerPorId ($id) {
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM fotos WHERE Id = $id");
		$conexion->cerrar();
		return $listado[0];
	}
//ingresar nuevos datos 

	public function ingresar () {
		$s = "INSERT INTO fotos (correo,sala,imagen)
         VALUES ('$this->correo',
		 '$this->sala',
         '$this->imagen')";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}

//eliminar datos por id 
	public function eliminar () {
		$s = "DELETE FROM fotos WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}

//editar datos segun donde la id sea 
	public function editar () {
		$s ="UPDATE fotos 
		SET imagen = '$this->descripcion'  
		WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
		
	}
}
// fotos::obtenerPorIdSala("sdasd");
// fotos::listar("sdasd");