<?php require '../modelos/Administrador.php';
 require '../modelos/Historial.php';



session_start();
/*
	$_SESSION['NOMBRE']=$lista2['nombre'];
	$_SESSION['CORREO']= $lista2['correo'];
	$_SESSION['ROL']= 'administrador';
	$_SESSION['NOMBRE2']=$lista2['nombre'];
	$_SESSION['CORREO2']= $lista2['correo'];
	$_SESSION['ROL2']='administrador';
	$_SESSION['SALA']=$lista2['sala'];
	$_SESSION['ROL3']=$lista2['rol'];
	$_SESSION['ID']=$lista2['id'];
*/
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{
 $sala=$_SESSION['SALA'];
}else{ header('location:../index.php');  }

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$A = new  Administrador();  // A es administrador 
    
	$Historial= new Historial();
    //$A es ADMINISTRADOR

	switch ($accion) {
		case 'Ingresar':
			$A->setNombre( $_POST['nombre']) ;
            $A->setCorreo($_POST['correo']);
            $A->setContraseña($_POST['contraseña']);
            $A->setNumero_celular($_POST['celular']);
           // $sala->setIdSala($_POST['sala']); //sala se setea por sesion
		    $A->setSala($_SESSION['SALA']);
			$A->ingresar();


          //generando registro en historial
			$Historial->setInforme(  'Nuevo Administrador '.$_POST['nombre'].'('.$_POST['correo'].')'.'/Agregado por'.$_SESSION['NOMBRE'].'('.$_SESSION['CORREO'].')'.'') ;
			$Historial->ingresar($_SESSION['SALA']);
 
			break;

		case 'Editar':
			$A->setId(base64_decode($_POST['id']));

			$A->setNombre( $_POST['nombre']);

           // $sala->setCorreo($_POST['correo']); //por sesion

            $A->setNumero_celular($_POST['celular']);

			echo($_POST['contraseña']."<p>");

            $A->setContraseña($_POST['contraseña']);

			$contraseña= $A->getContraseña();
			echo("<p>".$contraseña);

			$A->editar();
			if($A){
				echo("<p> Datos ingresados correctamente <p>");
			}
            
			//generando registro en historial
			$Historial->setInforme(  'Administrador ('.$_POST['id'].') editado, nuevo nombre '.$_POST['nombre'].'/Editado por'.$_SESSION['NOMBRE'].'('.$_SESSION['CORREO'].')'.'') ;
			$Historial->ingresar($_SESSION['SALA']);


			break;
		case 'eliminar': 
			$A->setId($_GET['id']);
            // $sala->setIdSala(base64_decode($_GET['IdSala'])); //por sesion
			$A->eliminar();

			$Historial->setInforme(  'Administrador '.$_GET['id'].'/Editado por'.$_SESSION['NOMBRE'].'('.$_SESSION['CORREO'].')'.'') ;
			$Historial->ingresar($_SESSION['SALA']);



			break;
        
	}
}

header('location: ../vistas/administrador/index.php');

?>
