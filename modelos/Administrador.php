<?php
//______clase para crud de Administrador___
require_once 'Conexion.php';
require_once 'Sala.php';

class Administrador  {
	private $id;
	private $nombre;
    private $correo;
    private $contraseña;
    private $sala;
    private $numero_celular;
    private $conexion;
    private $rol;
   


	public function __construct () {
       
		$this->id = 0;
		$this->nombre = '';
        $this->correo="";
        $this->contraseña="";
        $this->sala= 0;
        $this->numero_celular=0;
        $this->conexion = new Conexion();
        $this->rol='';
        
		
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
	 $this->contraseña=$Contraseña;
	 echo "contraseña setiada <p>";

 }
 public function getContraseña()
 {
	 # code...  Mostrar dato
	 return $this->contraseña;

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

 public function setSala($sala)
 {
	 # code...  Mostrar dato
	  $this->sala=$sala;

 }

 public function getSala()
 {
	 # code...  Mostrar dato
     
	 return $this->sala;

 }


 public function setRol($rol)
 {
	 # code...  Mostrar dato
	  $this->rol=$rol;

 }

 public function getRol()
 {
	 # code...  Mostrar dato
     
	 return $this->rol;

 }




 //____________________Metodos para la conexion con la base de datos administradores___________________________

//Mostrar los datos en la base de datos administradores
 public static function listar ($sala) {
    

		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM administradores WHERE sala= $sala");
		$conexion->cerrar();
		return $listado;
	}
//Mostrar datos de el administrador actual
    public static function listarActual ($id) {
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM administradores WHERE Id= $id");
		$conexion->cerrar();
		return $listado;
	}

	public static function obtenerPorId ($id) {
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM administradores WHERE Id = $id");
		$conexion->cerrar();
		return $listado[0];
	}

    public static function obtenerPorCorreo ($correo) {
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM administradores WHERE correo = $correo");
		$conexion->cerrar();
		$error="error";
		if($listado){
			return $listado[0];
		}else{

			return $error;
		} 
		
	}

//ingresar nuevos datos 
public function crear () {
    $s = "INSERT INTO administradores (sala,rol,nombre,numero_celular,correo,contraseña) VALUES ('$this->sala','Administrador','$this->nombre','$this->numero_celular','$this->correo','$this->contraseña')";
    $resultado = $this->conexion->actualizar($s);
    $this->conexion->cerrar();
    return $resultado;
}
	public function ingresar () {
		$correo= ltrim($this->correo);
		$s = "INSERT INTO administradores (nombre,numero_celular,correo,contraseña,sala) 
		VALUES ('$this->nombre','$this->numero_celular',
		'$correo','$this->contraseña',
		'$this->sala')";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}
//ingresar nuevo adinitrador y configurar como principal
	public function ingresarPrincipal () {
		$correo= ltrim($this->correo);
		$s = "INSERT INTO administradores (nombre,numero_celular,correo,contraseña,sala,rol) 
		VALUES ('$this->nombre','$this->numero_celular',
		'$correo','$this->contraseña',
		'$this->sala','$this->rol')";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}
	
//eliminar datos por id 
	public function eliminar () {

		$s = "DELETE FROM administradores WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}
	
//editar datos segin donde la id sea 
	public function editar () {

		$s = "UPDATE administradores SET nombre = '$this->nombre', numero_celular = '$this->numero_celular', contraseña = '$this->contraseña'  WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}
    public function editarSala () {

		$s = "UPDATE administradores SET nombre = '$this->sala'  WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}

	public static function OptenerConfimacionSesion($correo, $contraseña) {

		$conexion= new Conexion();
	    $numera= $conexion->consultarSesionR("SELECT * FROM administradores WHERE correo= '".$correo."'  AND contraseña= '".$contraseña."'");
		$conexion->cerrar();
		return $numera; 
	}

	public static  function OptenerDatosSesion($correo, $contraseña) {
		$conexion= new Conexion();
	    $lista= $conexion->consultarSesionA("SELECT * FROM administradores WHERE correo= '".$correo."'  AND contraseña= '".$contraseña."'");
		$conexion->cerrar();
		return $lista; 
	}
	public static  function OptenerDatosSesionBasicos($correo) {
		$conexion= new Conexion();
	    $lista= $conexion->consultarSesionA("SELECT nombre, numero_celular, correo FROM administradores WHERE correo= $correo");
		$conexion->cerrar();
		return $lista; 
	}
	public static  function OptenerDatosSesion2($correo) {
		$conexion= new Conexion();
	    $lista= $conexion->consultarSesionA("SELECT nombre, numero_celular,correo,id FROM administradores WHERE correo= '".$correo."'");
		$conexion->cerrar();
		return $lista; 
	}



	
}
// Administrador::obtenerPorIdSala("sdasd");
// Administrador::listar("sdasd");