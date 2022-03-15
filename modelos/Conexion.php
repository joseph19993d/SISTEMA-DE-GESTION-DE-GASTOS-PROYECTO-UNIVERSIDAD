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
	public function consultarA ($sql) {
		//genera un areglo bidimencional con los datos o array 
		return $this->conexion->query($sql)->fetch_all();
	}
	public function consultarB ($sql) {
		//genera un areglo bidimencional con los datos o array  que puedes consultar segun el nombre y enfatizar una busqueda string, 
		//recordar utilizar el metodo trim() en los string para eliminar espacios 
		return $this->conexion->query($sql)->fetch_array();
	}

	public function consultarFile ($sql) {
		//genera un areglo bidimencional con los datos o array 
		$resultado= $this->conexion->query($sql)->fetch_all();
		
		if (!$resultado ) {
			// si la conexion  esta mala entonces se mandara el mensaje: 
			echo "Error en conexion a la base de datos:". $this->conexion->error."<p>";
			   return ( "Error en conexion a la base de datos:". $this->conexion->error."<p>");
		}else{
		return $resultado;
		}
	}

	public function consultarFileArray ($sql) {
		//genera un areglo bidimencional con los datos o array 
		$resultado= $this->conexion->query($sql)->fetch_all();
		
		if (!$resultado ) {
			// si la conexion  esta mala entonces se mandara el mensaje: 
			echo "Error en conexion a la base de datos:". $this->conexion->error."<p>";
			   return ( "Error en conexion a la base de datos:". $this->conexion->error."<p>");
		}else{
		return $resultado;
		}
	}

	public function actualizar ($sql) {
		$resultado= $this->conexion->query($sql);
		if (!$resultado ) {
			// si la conexion  esta mala entonces se mandara el mensaje: 
			  echo  "Error en conexion a la base de datos:", $this->conexion->error."<p>";
			}else{
		return $resultado;
		}
	}
	

	public function evaluar2 ($sql) {
		$resultado= $this->conexion->query($sql)->fetch_all();
		
		if (!$resultado ) {
			// si la conexion  esta mala entonces se mandara el mensaje: 
			echo "Error en conexion a la base de datos:". $this->conexion->error."<p>";
			return false;
		}else {
			return true;
		}
	}

	public function cerrar () {
		$this->conexion->close();
	}

	public function consultarSesionR ($sql) {
		$resultado= $this->conexion->query($sql);
		return $anumero=mysqli_num_rows($resultado);
	
	}
	
	public function consultarSesionA ($sql) {
		return $this->conexion->query($sql)->fetch_array();
	}
	
}

?>