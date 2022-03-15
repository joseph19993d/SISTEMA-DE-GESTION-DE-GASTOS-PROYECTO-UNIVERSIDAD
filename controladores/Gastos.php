<?php require_once '../modelos/gasto.php';
require_once '../modelos/Historial.php';


session_start();
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{
 $correo= $_SESSION['CORREO'];
 $sala=$_SESSION['SALA'];
 
}else{ header('location:../index.php');  }




$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$gasto = new  Gasto();  // A es Gasto 
	$Historial= new Historial();

	
    //$A es Gasto
	switch ($accion) {
		case 'Ingresar':
			$gasto->setcorreo_creador($correo); //optenido de el metodo OptenerDatosSesion2
			$date = date('Y-m-d H:i:s'); //dice la fecha y hora actual con minutos y segundos.
			$gasto->setfecha_creacion($date);
			$gasto->setnombre_responsable($_POST['nombre_responsable']);
			$gasto->setsala($sala);
			
            $gasto->settotal($_POST['total']);
			$gasto->setnombre_gasto( $_POST['nombre']) ;
			$gasto->settipo_gasto( $_POST['tipo']) ;
			$gasto->setdescripcion($_POST['descripcion']);
			$gasto->ingresar();
			if ($gasto) {
				# code...
				echo "Ingresado";

			//generando registro en el historial
			$Historial->setInforme(  'Nuevo gasto '.$_POST['nombre'].
			'($'.$_POST['total'].')'.'/Agregado por'.$_SESSION['NOMBRE'].
			'('.$_SESSION['CORREO'].')'. 'A: '.$_POST['nombre_responsable']) ;
			$Historial->ingresar($_SESSION['SALA']);



			}else{ //header('location: ../vistas/error_DB.php');
				echo "error";
			}
			break;



		case 'Editar':
			$gasto->setId($_POST['id']);
			$gasto->setdescripcion($_POST['descripcion']);
           // $gasto->setcorreo_creador($lista['correo']); //por metodo
			$gasto->editar();
			if ($gasto) {
				# code...
				echo "Actualizado";

			//generando registro en el historial
			$Historial->setInforme(  'Gato (??) editado, nueva descripcion '.$_POST['descripcion'].'/Editado por'.$_SESSION['NOMBRE'].'('.$_SESSION['CORREO'].')'.'') ;
			$Historial->ingresar($_SESSION['SALA']);

			}else{ //header('location: ../vistas/error_DB.php');
				echo "error";
			}
	
			break;
		case 'eliminar':
			$gasto->setId($_GET['id']);
            
			$gasto->eliminar();
			if ($gasto) {
				# code...
				echo "Eliminado";

			$Historial->setInforme(  'Un gasto ha sido eliminado por'.$_SESSION['NOMBRE'].'('.$_SESSION['CORREO'].')'.'') ;
			$Historial->ingresar($_SESSION['SALA']);

			}else{ //header('location: ../vistas/error_DB.php');
				echo "error";
			}
			break;
	}
}

header('location: ../vistas/gastos/index.php');


?>