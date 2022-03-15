<?php
//______clase para crud de gasto___

require_once 'Conexion.php';
require_once 'Sala.php';

class Gasto  {

	private $id;
    private $correo_creador;
    private $fecha_creacion;
	private $nombre_responsable;
    private $sala ;
    private $total;
    private $nombre_gasto;
    private $tipo_gasto;
    private $conexion;
    private $descripcion;



	public function __construct () {
       
		$this->id = 0;
		$this->nombre_responsable = '';
        $this->fecha_creacion="";
        $this->total=0;
        $this->sala= 0;
        $this->conexion = new Conexion();
        $this->descripcion="";
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
 public function setnombre_responsable($nombre_responsable)
 {
	 # code... Ingresar o cambiar dato
	 $this->nombre_responsable=$nombre_responsable;

 }
 public function getnombre_responsable()
 {
	 # code...  Mostrar dato
	 return $this->nombre_responsable;
 }
 
 public function setcorreo_creador($correo_creador)
 {
	 # code... Ingresar o cambiar dato
	 $this->correo_creador=$correo_creador;
 }

 public function getcorreo_creador()
 {
	 # code...  Mostrar dato
	 return $this->correo_creador;
 }

 public function setfecha_creacion($fecha_creacion)
 {
	 # code... Ingresar o cambiar dato
	 $this->fecha_creacion=$fecha_creacion;
 }

 public function getfecha_creacion()
 {
	 # code...  Mostrar dato
	 return $this->fecha_creacion;
 }

 public function settotal($total)
 {
	 # code... Ingresar o cambiar dato
	 $this->total=$total;
 }

 public function gettotal()
 {
	 # code...  Mostrar dato
	 return $this->total;
 }

 public function getsala()
 {
	 # code...  Mostrar dato
	 return $this->sala;
 }

 public function setSala($sala)
 {
	 # code...  Mostrar dato
	 return $this->sala=$sala;
 }

 
 public function setnombre_gasto($nombre_gasto)
 {
	 # code... Ingresar o cambiar dato
	 $this->nombre_gasto=$nombre_gasto;
 }

 public function getnombre_gasto()
 {
	 # code...  Mostrar dato
	 return $this->nombre_gasto;
 }

 public function settipo_gasto($tipo_gasto)
 {
	 # code... Ingresar o cambiar dato
	 $this->tipo_gasto=$tipo_gasto;
 }

 public function gettipo_gasto()
 {
	 # code...  Mostrar dato
	 return $this->tipo_gasto;
 }

 public function setdescripcion($descripcion)
 {
	 # code... Ingresar o cambiar dato
	 $this->descripcion=$descripcion;
 }
 public function getdescripcion()
 {
	 # code...  Mostrar dato
	 return $this->descripcion;
 }

 //____________________Metodos para la conexion con la base de datos gasto___________________________

//Mostrar los datos en la base de datos gasto  

    public static function listar ($sala) {
	   
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT correo_creador,fecha_creacion,nombre_responsable,total,nombre_gasto,tipo_gasto,decripcion,id FROM gasto WHERE sala= $sala ");
		$conexion->cerrar();
		return $listado;
	}
//Mostrar los datos en la base de datos gasto  

    public static function listarD ($sala) {
	   
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT correo_creador,fecha_creacion,nombre_responsable,total,nombre_gasto,tipo_gasto,decripcion,id FROM gasto WHERE sala= $sala ORDER BY id  DESC");
		$conexion->cerrar();
		return $listado;
	}

//Mostrar datos de el Gasto actual
    public static function listarActual ($id) {
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM gasto WHERE Id= $id");
		$conexion->cerrar();
		return $listado;
	}

//Consultar la base de datos segun el id
/* y la sala 
	public static function obtenerPorIdSala ($id) {
        $sala= new Gasto();
        $sala= $sala->getIdSala();
        echo $sala;
        
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT descripcion FROM gasto
        WHERE Id = $id
        AND Sala = $sala ");
		$conexion->cerrar();
		return $listado[0];
	}
*/
	public static function obtenerPorId ($id) {
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM gasto WHERE Id = $id");
		$conexion->cerrar();
		return $listado[0];
	}
//ingresar nuevos datos 

	public function ingresar () {
		$s = "INSERT INTO gasto (correo_creador,fecha_creacion,nombre_responsable,total,nombre_gasto,tipo_gasto,decripcion,sala)
         VALUES ('$this->correo_creador', 
		 '$this->fecha_creacion','$this->nombre_responsable',
		 '$this->total', 
		 '$this->nombre_gasto',
		 '$this->tipo_gasto',
		 '$this->descripcion',
		 '$this->sala')";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}

//eliminar datos por id 
	public function eliminar () {
		$s = "DELETE FROM gasto WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}

//editar datos segun donde la id sea 
	public function editar () {
		$s ="UPDATE gasto 
		SET decripcion = '$this->descripcion'  
		WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
		
	}
}
// Gasto::obtenerPorIdSala("sdasd");
// Gasto::listar("sdasd");