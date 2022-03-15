
<?php
class Conexion {
	private $conexion;
	private $servidor="localhost";
	private $usuario="root";
	private $contraseña="";
	private $bd="base";
	
	public function __construct () {
		try {

			$this->conexion = new mysqli($this->servidor, $this->usuario, $this->contraseña, $this->bd);
		    $this->conexion->set_charset('utf8');
            // $this->conexion->set_charset('utf8');
			if (!$this->conexion) {
				// si la conexion  esta mala entonces se mandara el mensaje: 
				echo "Error en conexion a la base de datos:". mysqli_connect_error()."<p>";
			}
		} catch (Exception $e) {
			echo "Error en conexion <p>";
			echo "".$e;
		}

	}
	public function consultar ($sql) {
		//genera un areglo bidimencional con los datos o array 
		return $this->conexion->query($sql)->fetch_all();
	}

	public function actualizar ($sql) {
		return $this->conexion->query($sql);
	}



	public function consultarSesionA ($sql) {
        	//genera un areglo bidimencional con los datos o array 
		return $this->conexion->query($sql)->fetch_array();
	}

	public function consultarSesionR ($sql) {
		$resultado= $this->conexion->query($sql);
		return $anumero=mysqli_num_rows($resultado);
	
	}
	//------------------------Metodos para la foto ----------------------------<

    public function consultarFoto ($sql) {
		
		return $this->conexion->query($sql);
	}

	public function actualizarFoto ($sql){
		
		return $this->conexion->query ($sql);
	}

	public function consultarExistenciaDedatos($value='')
	{
		# code...
	}

	public function cargarDatos (){
		// genera un arreglo bidimencional con lso respectivos datos en otras plabras, gener un array.
		// "fetch_array" This create a array whit the data
		return $this->conexion->query ($sql)-> fetch_array(); 
	}

	//------------------------------------------------------------------------->
	public function cerrar () {
		$this->conexion->close();
	}
	

}