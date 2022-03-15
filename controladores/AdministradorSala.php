     
<?php 

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



require_once '../modelos/Administrador.php';
require_once '../modelos/Sala.php';
require_once '../modelos/Historial.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';
if ($accion != '') {
	$A = new  Administrador();  // A es administrador 
	$Historial= new Historial();
    $sala = new Sala();
	
    
	switch ($accion) {
		case 'Crear':
            
			$sala->setCorreo( $_POST['correo']) ;
			$sala->ingresar();
			$id= $sala->obtenerId($_POST['correo']);
        
			$A->setNombre($_POST['nombre']) ;
            $A->setCorreo($_POST['correo']);
            $A->setContraseña($_POST['contraseña']);
            echo "contraseña: ".$_POST['contraseña'];
            
            $A->setNumero_celular($_POST['celular']);
			$A->setRol('principal');
            $A->setSala($id);
			$A->ingresarPrincipal();

			          //generando registro en historial

					  if ( isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
					{
						
					
						$Historial->setInforme(  'Sala ('.$id.')'.'/creada por: '.$_SESSION['NOMBRE'].'('.$_SESSION['CORREO'].')'.' Para :'.$_POST['nombre']) ;
						$Historial->ingresar($_SESSION['SALA']);
						echo '<p>registrado 1, '. 'Sala ('.$id.')'.'/creada por: '.$_SESSION['NOMBRE'].'('.$_SESSION['CORREO'].')'.' Para :'.$_POST['nombre'];
					
						
					  $Historial= new Historial();
					  $Historial->setInforme(  'Sala ('.$id.')'.'/creada por: '.$_SESSION['NOMBRE'].'('.$_SESSION['CORREO'].')'.' Para :'.$_POST['nombre'] ) ;
					  echo 'Sala ('.$id.') /creada por: '.$_POST['nombre'];
					  $salas= intval($id);
					  $Historial->ingresar($salas);
					  echo '<p>registrado2';
						

					}else{  
					  $Historial->setInforme(  'Sala ('.$id.') /creada por: '.$_POST['nombre'] ) ;
					  echo 'Sala ('.$id.') /creada por: '.$_POST['nombre'];
					  $salas= intval($id);
					  $Historial->ingresar($salas);
					  echo '<p>registrado2';
					  
					}
			break;       

	}
}
header('location: ../vistas/sala/index.php');
?>