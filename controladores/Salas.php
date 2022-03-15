<?php
// echo "estoy aqui";
require_once '../modelos/Sala.php';
require_once '../modelos/Administrador.php';

// segun "a" sea una opcion, se ejecutara lo correspondiente pasandole los datos desde aqui a el modelo roles
session_start();


$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	echo 'evaluar a : ',$accion.".";
	$sala = new Sala();
	$a= new Administrador();


	switch ($accion) {
		case 'Ingresar':
			$sala->setCorreo( $_POST['correo']) ;
			$sala->ingresar();
			header('location: ../vistas/sala/index.php');
			break;
		case 'Editar':
			$sala->setIdSala(base64_decode($_POST['id']));
			$sala->setCorreo( $_POST['correo']);
			$sala->editar();
			header('location: ../vistas/sala/index.php');
			break;
		case 'eliminar':
			
			
			echo "<p> la sala es ".$sala->setIdSala(base64_decode($_GET['id']));
			echo $sala->eliminar();

			$a->setId($_SESSION['ID']);

			echo $a->eliminar();
			
			session_start();
			session_unset();
			session_destroy();

			header('location: ../vistas/sala/index.php');


			break;
		case 'Evaluar':
			$correo=$_POST["correo"];
			echo $correo;
			if (Sala::evaluar($correo)) {  $imagen= Sala::evaluar($correo); $imagen2= $imagen[0];  
			}if ($imagen2[0] !="E") {
				echo "SI";
				header ('location: ../vistas/sala/ingresar.php');
			} else {
			  echo "NO";
			  header("Location: ../vistas/sala/crear.php?varCorreo=$correo");

			}
			
		
            break;
	} 
}else { echo '<p>no paso por a';}


?>