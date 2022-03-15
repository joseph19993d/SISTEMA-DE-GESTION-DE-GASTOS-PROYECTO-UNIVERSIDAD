<?php require_once '../modelos/compañero.php';
require_once '../modelos/Historial.php';


session_start();
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )

{
 $sala=$_SESSION['SALA'];
}else{ header('location:../index.php');  }     
echo "\n sesion procesada, sala = $sala ".",";


$accion = $_POST['a'] ?? $_GET['a'] ?? '';
echo "accion = $accion".",";
echo "\n aPost= ".$_POST['a'].",";
if ($accion != '') {
	$compañero = new  Compañero();  // compañero 
	$Historial= new Historial();

	
    
    //$compañero es compañero
	switch ($accion) {
		case 'Ingresar':
			//nombre, numero_celular,	correo,	contraseña, rol 
			echo "\n Opcion Ingresar,";
			$compañero->setNombre( $_POST['nombre']) ;
            $compañero->setNumero_celular($_POST['celular']);
			$compañero->setCorreo($_POST['correo']);
			$compañero->setSala($sala);
			$compañero->setContraseña($_POST['contraseña']);
		    $compañero->setRol('compañero'); 
			$compañero->ingresar();
			echo "\n datos setiados, ";
			echo "\n funcion ingresar funcionando, ";

			//generando registro en el historial
			$Historial->setInforme(  'Nuevo Usuario '.$_POST['nombre'].'('.$_POST['correo'].')'.'/Agregado por'.$_SESSION['NOMBRE'].'('.$_SESSION['CORREO'].')'.'') ;
			$Historial->ingresar($_SESSION['SALA']);


			break;
		case 'Editar':
		
			$compañero->setId(base64_decode($_POST['id']));
			$compañero->setNombre( $_POST['nombre']) ;
            $compañero->setNumero_celular($_POST['celular']);
			$compañero->setContraseña($_POST['contraseña']);
			$compañero->editar();

			//generando registro en historial
			$Historial->setInforme(  'Administrador ('.$_POST['id'].') editado, nuevo nombre '.$_POST['nombre'].'/Editado por'.$_SESSION['NOMBRE'].'('.$_SESSION['CORREO'].')'.'') ;
			$Historial->ingresar($_SESSION['SALA']);

			break;
		case 'eliminar':
			$compañero->setId($_GET['id']);
			$compañero->eliminar();

			//generando registro en historial
			$Historial->setInforme(  'Administrador '.$_GET['id'].'/Editado por'.$_SESSION['NOMBRE'].'('.$_SESSION['CORREO'].')'.'') ;
			$Historial->ingresar($_SESSION['SALA']);

			break;
	}
}

//header('location: ../vistas/compañero/index.php');


?>