<?php
//______clase para crud de invitado___
require_once 'Conexion.php';


class Invitado  {

	private $id;
    private $sala;
    private $correo_creador;
    private $numero_celular;
	private $nombre_responsable ;
    private $nombre;
    private $nombre_creador;
    private $Descripcion;
    private $conexion;
    

	public function __construct () {
       
		$this->id = 0;
        $this->sala=0;
		$this->correo_creador = "";
        $this->numero_celular=0;
        $this->nombre_responsable ="";
        $this->nombre=0;
        $this->nombre_creador="";
        $this->Descripcion="";
        $this->conexion = new Conexion();
       

		
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
 public function setnombre_responsable ($nombre_responsable )
 {
	 # code... Ingresar o cambiar dato
	 $this->nombre_responsable =$nombre_responsable ;

 }
 public function getnombre_responsable ()
 {
	 # code...  Mostrar dato
	 return $this->nombre_responsable ;

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

 public function setnumero_celular($numero_celular)
 {
	 # code... Ingresar o cambiar dato
	 $this->numero_celular=$numero_celular;

 }
 public function getnumero_celular()
 {
	 # code...  Mostrar dato
	 return $this->numero_celular;

 }
 public function setlibre($libre)
 {
	 # code... Ingresar o cambiar dato
	 $this->libre=$libre;

 }
 public function getlibre()
 {
	 # code...  Mostrar dato
	 return $this->libre;

 }

 public function getSala()
 {
	 # code...  Mostrar dato
     
	 return $this->sala;

 }
 public function setSala($sala)
 {
	 # code...  Mostrar dato
	 return $this->sala=$sala;

 }

 
 public function setnombre($nombre)
 {
	 # code... Ingresar o cambiar dato
	 $this->nombre=$nombre;

 }
 public function getnombre()
 {
	 # code...  Mostrar dato
	 return $this->nombre;

 }

 
 public function setnombre_creador($nombre_creador)
 {
	 # code... Ingresar o cambiar dato
	 $this->nombre_creador=$nombre_creador;

 }
 public function getnombre_creador()
 {
	 # code...  Mostrar dato
	 return $this->nombre_creador;

 }


 public function setDescripcion($Descripcion)
 {
	 # code... Ingresar o cambiar dato
	 $this->Descripcion=$Descripcion;

 }
 public function getDescripcion()
 {
	 # code...  Mostrar dato
	 return $this->Descripcion;

 }



 //____________________Metodos para la conexion con la base de datos invitado___________________________

//Mostrar los datos en la base de datos invitado  
/*
		case 'Ingresar':

            $invitado->setsala($_POST['sala']);
            $invitado->setcorreo_creador($_POST['correo']);
            $invitado->setnombre_responsable ($_POST['correor']);
            $invitado->setnombre($_POST['nombre']);
            $invitado->setnombre_creador($_POST['nombrer']);
			$invitado->setnumero_celular($_POST['numero']);
            $invitado->setDescripcion('invitado');

			$invitado->ingresar();

			id	sala	correo_creador	numero_celular	nombre_responsable 	nombre	nombre_creador	Descripcion	

*/

 public static function listar () {

		$conexion = new Conexion ();
		$listado = $conexion->consultar('SELECT id,sala,correo_creador,numero_celular,nombre_responsable,nombre,nombre_creador,Descripcion	 FROM invitado ');
		$conexion->cerrar();
		return $listado;
	}
	public static function listarCorrespondiente ($salaA, $nombre_responsable ) {

		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT id,sala,correo_creador,numero_celular,nombre_responsable,nombre,nombre_creador,Descripcion FROM invitado WHERE sala=$salaA " );
		$conexion->cerrar();
		return $listado;
	}
//Mostrar datos de el invitado actual
    public static function listarActual ($id) {
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT id,sala,correo_creador,numero_celular,nombre_responsable,nombre,nombre_creador,Descripcion FROM invitado WHERE Id= '$id'");
		$conexion->cerrar();
		return $listado;
	}
	public static function listarEnSala ($sala) {
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT id,nombre,nombre_creador,Descripcion,sala,correo_creador,numero_celular,nombre_responsable FROM invitado WHERE sala= '$sala'");
		$conexion->cerrar();
		return $listado; 
	}
	public static function listarIndex ($sala) {
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT id,sala,correo_creador,numero_celular,nombre_responsable,nombre,nombre_creador,descripcion FROM invitado WHERE sala= '$sala'");
		$conexion->cerrar();
		return $listado; 
	}

//Consultar la base de datos segun el id y la sala 
/*
	public static function obtenerPorIdSala ($id) {
        $sala= new invitado();
        $sala= $sala->getSala();
        echo $sala;
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT Descripcion FROM invitado
        WHERE Id = $id
        AND Sala = $sala ");
		$conexion->cerrar();
		return $listado[0];
        
	}
*/
    

	public static function obtenerPorId ($id) {
		$conexion = new Conexion ();
		$listado = $conexion->consultar("SELECT * FROM invitado WHERE Id = $id");
		$conexion->cerrar();
		return $listado[0];




	}
//ingresar nuevos datos 


	public function ingresar () {
		$s = "INSERT INTO invitado (sala,correo_creador,numero_celular,nombre_responsable,nombre,nombre_creador,Descripcion	)
         VALUES ('$this->sala', '$this->correo_creador','$this->numero_celular','$this->nombre_responsable ', '$this->nombre','$this->nombre_creador', '$this->Descripcion')";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;
	}
//eliminar datos por id 
	public function eliminar () {
     

		$s = "DELETE FROM invitado WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);
		$this->conexion->cerrar();
		return $resultado;


	}
//editar datos segin donde la id sea 
/*
			$invitado->setId(base64_decode($_POST['id']));
            $invitado->setnumero_celular($_POST['numeroc']); 
            $invitado->setnombre($_POST['nombre']);
			$invitado->editar();

			id`, `sala`, `correo_creador`, `numero_celular`, `nombre_responsable `, `nombre`, `nombre_creador`, `Descripcion`

*/
	public function editar () {

		$s = "UPDATE invitado SET numero_celular = '$this->numero_celular', nombre = '$this->nombre' WHERE Id = $this->id";
		$resultado = $this->conexion->actualizar($s);

		$this->conexion->cerrar();
		return $resultado;
	}
}
// invitado::obtenerPorIdSala("sdasd");
// invitado::listar("sdasd");