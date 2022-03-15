<?php require_once '../modelos/invitado.php';
require_once '../modelos/Historial.php';


session_start();
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{
 $correo= $_SESSION['CORREO'];
 $sala=$_SESSION['SALA'];
 $nombre=$_SESSION['NOMBRE'];

}else{ header('location:../index.php');  }


$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$invitado = new  invitado();  // A es invitado 
	$Historial= new Historial();

    //$sala = new Sala(); 
    //$A es invitado
	switch ($accion) {
		case 'Ingresar':
           // $invitado->setsala($_POST['sala']);
            $invitado->setcorreo_creador($correo); 
			echo $_POST['nombrer'];
			echo $nombre;
			echo $correo;
			echo "numero= {".$_POST['numero']."}";
            $invitado->setnombre_responsable($_POST['nombrer']);
            $invitado->setnombre($_POST['nombre']);
            $invitado->setnombre_creador($nombre); 
            echo $invitado->setnumero_celular($_POST['numero']);
            $invitado->setDescripcion($_POST["descripcion"]);
			$invitado->setsala($sala);
			echo "Datos setiados corectamente";
			$invitado->ingresar();
			echo "Datos ingresados";

			//generando registro en el historial
			$Historial->setInforme(  'Nuevo Invitado '.$_POST['nombre'].'('.$_POST['correo'].')'.'/Agregado por'.$_SESSION['NOMBRE'].'('.$_SESSION['CORREO'].')'.'') ;
			$Historial->ingresar($_SESSION['SALA']);

			break;
		case 'Editar':
			$invitado->setId(base64_decode($_POST['id']));
            $invitado->setnumero_celular($_POST['numeroc']); 
            $invitado->setnombre($_POST['nombre']);
			$invitado->editar();

			//generando registro en el historial
			$Historial->setInforme(  'Administrador ('.$_POST['id'].') editado, nuevo nombre '.$_POST['nombre'].'/Editado por'.$_SESSION['NOMBRE'].'('.$_SESSION['CORREO'].')'.'') ;
			$Historial->ingresar($_SESSION['SALA']);

			break;
		case 'eliminar':
			$invitado->setId($_GET['id']);
            // $sala->setIdSala(base64_decode($_GET['IdSala'])); //por sesion
			$invitado->eliminar();

			//generando registro en historial
			$Historial->setInforme(  'Un administrados ha sido eliminado por'.$_SESSION['NOMBRE'].'('.$_SESSION['CORREO'].')'.'') ;
			$Historial->ingresar($_SESSION['SALA']);
			
			break;
			
	}
}

header('location: ../vistas/invitados/index.php');


?>