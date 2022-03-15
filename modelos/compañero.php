<?php
//______clase para crud de Compañero___
require_once 'Conexion.php';
require_once 'Sala.php';

class Compañero  {
	private $id;
	private $nombre;
    private $numero_celular;
    private $correo;
    private $sala;   
    private $contraseña;
    private $rol;
    private $conexion;


	public function __construct () {
       
		$this->id = 0;
		$this->nombre = '';
        $this->correo="";
        $this->contraseña="";
        $this->sala=0;
        $this->rol=0;
        $this->numero_celular=0;
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
 

 public function setCorreo($Correo)
 {
	 # code... Ingresar o cambiar dato
	 $this->correo=$Correo;

 }
 public function getCorreo()
 {
	 # code...  Mostrar dato
	 return $this->correo;

 }

 public function setContraseña($Contraseña)
 {
	 # code... Ingresar o cambiar dato
	 $this->Contraseña=$Contraseña;

 }
 public function getContraseña()
 {
	 # code...  Mostrar dato
	 return $this->Contraseña;

 }
 public function setNumero_celular($Numero_celular)
 {
	 # code... Ingresar o cambiar dato
	 $this->numero_celular=$Numero_celular;

 }
 public function getNumero_celular()
 {
	 # code...  Mostrar dato
	 return $this->numero_celular;

 }

 public function getSala()
 {
	 # code...  Mostrar dato
     
	 return $this->sala;

 }
 public function setSala($sala)
 {
	 # code...  Mostrar dato
	  $this->sala= $sala;

 }
 
 public function getRol()
 {
	 # code...  Mostrar dato
     
	 return $this->rol;

 }
 public function setRol($rol)
 {
	 # code...  setiar dato
	  $this->rol=$rol;

 }



 //____________________Metodos para la conexion con la base de datos Compañeroes___________________________

//Mostrar los datos en la base de datos Compañeroes
 public static function listar ($sala) {
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM compañero WHERE sala= $sala");
		$conexion->cerrar();
		return $listado;
	}
//Mostrar datos de el Compañero actual
    public static function listarActual ($id) {
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM compañeros WHERE Id= $id");
		$conexion->cerrar();
		return $listado;
	}

//Consultar la base de datos segun el id y la sala 
	public static function obtenerPorIdSala ($id) {
        $sala= new Compañero();
        $sala= $sala->getIdSala();
        echo $sala;
        
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM compañero
        WHERE Id = $id
        AND Sala = $sala ");
		$conexion->cerrar();
		return $listado[0];
        
	}
	public static function obtenerPorId ($id) {
        //instrucionn sql para el editar 
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM compañero WHERE Id = $id");
		$conexion->cerrar();
		return $listado[0];
	}
//ingresar nuevos datos 
	public function ingresar () {
		$s = "INSERT INTO compañero (nombre,numero_celular,correo,sala,contraseña,rol)
		 VALUES ('$this->nombre',
		 '$this->numero_celular',
		 '$this->correo',
		  $this->sala,
		 '$this->contraseña',
		 '$this->rol')";
        //INSERT INTO `compañero` (`id`, `nombre`, `numero_celular`, `correo`, `sala`, `contraseña`, `rol`) 
        //VALUES ('1', 'josepheee', '1341324233', 'josepheqeqw@gmail.com', '255', '21312242asa', 'compañero');
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}
//eliminar datos por id 
	public function eliminar () {

		$s = "DELETE FROM compañero WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;

	}
//editar datos segin donde la id sea 
	public function editar () {
        //UPDATE `compañero` SET `id`=[value-1],`nombre`=[value-2],
        //`numero_celular`=[value-3],`correo`=[value-4],`sala`=[value-5],`contraseña`=[value-6],`rol`=[value-7] WHERE 1
        //nombre numero_celular contraseña id

		$s = "UPDATE compañero SET nombre = '$this->nombre', numero_celular = '$this->numero_celular', contraseña = '$this->contraseña'  WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);

		$this->conexion->cerrar();
		return $resultado;
	}

	public static function OptenerConfimacionSesion($correo, $contraseña) {

		$conexion= new Conexion();
	    $numera= $conexion->consultarSesionR("SELECT * FROM compañero WHERE correo= '".$correo."'  AND contraseña= '".$contraseña."'");
		$conexion->cerrar();
		return $numera; 
	}

	public static  function OptenerDatosSesion($correo, $contraseña) {
		$conexion= new Conexion();
	    $lista= $conexion->consultarSesionA("SELECT * FROM compañero WHERE correo= '".$correo."'  AND contraseña= '".$contraseña."'");
		$conexion->cerrar();
		return $lista; 
	}
	public static  function OptenerDatosSesionBasicos($correo) {
		$conexion= new Conexion();
	    $lista= $conexion->consultarSesionA("SELECT nombre, numero_celular, correo FROM compañero WHERE correo= $correo");
		$conexion->cerrar();
		return $lista; 
	}
	public static  function OptenerDatosSesion2($correo) {
		$conexion= new Conexion();
	    $lista= $conexion->consultarSesionA("SELECT nombre, numero_celular,correo FROM compañero WHERE correo= '".$correo."'");
		$conexion->cerrar();
		return $lista; 
	}

	

}
// Compañero::obtenerPorIdSala("sdasd");
// Compañero::listar("sdasd");