<?php  require_once '../../modelos/Administrador.php';
       require_once '../../modelos/compañero.php';
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$G = $_POST['a'];

echo "".$G."si funciona ? F";
/*
$host2= "localhost";
$user2="root";
$passw="";
$databd="administradores";
$conn = mysqli_connect('localhost','root','','base');

$query= mysqli_query($conn,"SELECT * FROM administradores WHERE correo= '".$correo."'  AND contraseña= '".$contraseña."'" );
$confirmacion=mysqli_num_rows($query);
$lista=mysqli_fetch_array($query);
*/
if($G=='iniciar_A'){
$confirmacion2= Administrador::OptenerConfimacionSesion($correo, $contraseña);

$lista2= Administrador:: OptenerDatosSesion($correo, $contraseña);

if($confirmacion2==1){
	
 if($lista2['contraseña'] && $lista2['correo'] ){
	echo "<p>".$lista2['nombre']."<br>".$lista2['correo'];
  
	session_start();
	$_SESSION['NOMBRE']=$lista2['nombre'];
	$_SESSION['CORREO']= $lista2['correo'];
	$_SESSION['ROL']= 'administrador';
	$_SESSION['NOMBRE2']=$lista2['nombre'];
	$_SESSION['CORREO2']= $lista2['correo'];
	$_SESSION['ROL2']='administrador';
	$_SESSION['SALA']=$lista2['sala'];
	$_SESSION['ROL3']=$lista2['rol'];
	$_SESSION['ID']=$lista2['id'];
	
	header('location:bienvenida.php');

	} 

}else{ header('location:error.php'); }
} elseif($G=='iniciar_U'){

	$confirmacion2= Compañero::OptenerConfimacionSesion($correo, $contraseña);

	$lista2= Compañero:: OptenerDatosSesion($correo, $contraseña);
	
	if($confirmacion2==1){
		
	if($lista2['contraseña'] && $lista2['correo'] ){
		echo "<p>".$lista2['nombre']."<br>".$lista2['correo'];
	
		session_start();
		$_SESSION['NOMBRE']=$lista2['nombre'];
		$_SESSION['CORREO']= $lista2['correo'];
		$_SESSION['ROL']= 'compañero';
		$_SESSION['NOMBRE2']=$lista2['nombre'];
		$_SESSION['CORREO2']= $lista2['correo'];
		$_SESSION['ROL2']='compañero';
		$_SESSION['SALA']=$lista2['sala'];
		header('location:bienvenida.php'); 
	}	
    }else{ header('location:error.php'); }


}else{ header('location:error.php'); }



/*
include ('../../modelos/Administrador.php');


if ( isset($_POST['correo']) & isset($_POST['contraseña']) ) {
	$correo= $_POST['correo'];
	$contraseña= $_POST['contraseña'];
	$A= new Administrador();
	$A->setCorreo($correo);
	$A->setContraseña($contraseña);
	try{
	$Resultado = $A->obtenerPorCorreo($correo);
	if ($Resulatdo !== 'error'){
	//mandara el resultado de la sesion y la contraseña 
	$fila=$Resultado;
	if ($Resultado){
	echo "";
	session_start();
	$_SESSION['nombre']= $correo;
	$_SESSION[ 'correo']= $contraseña;
	$_SESSION['rol']= 'Administrador';
	header('location:bienvenida.php');

	}
    }else{
     header('location: error.php');
	}
	}catch (Exception $e) { echo 'Error :'.'--'.$e;}
}

*/
// segun "a" sea una opcion, se ejecutara lo correspondiente pasandole los datos desde aqui a el modelo roles
/* DATOS:
		$this->nombre = '';
        $this->correo ="";
        $this->contraseña="";
        $this->numero_celular="";
        $this->sala="";
*/
/*
$accion = $_POST['a'] ?? $_GET['a'] ?? '';



if ($accion != '') {
	$A = new  Administrador();  // A es administrador 
    $sala = new Sala(); 
    //$A es ADMINISTRADOR

	switch ($accion) {
		case 'Ingresar':
			$A->setNombre( $_POST['nombre']) ;
            $A->setCorreo($_POST['correo']);
            $A->setContraseña($_POST['contraseña']);
            $A->setNumero_celular($_POST['celular']);
           // $sala->setIdSala($_POST['sala']); //sala se setea por sesion 
			$A->ingresar();
            
 
			break;
		case 'Editar':
			$A->setId(base64_decode($_POST['id']));
			$A->setNombre( $_POST['nombre']);
           // $sala->setCorreo($_POST['correo']); //por sesion
            $A->setNumero_celular($_POST['celular']);
            $A->setContraseña($_POST['contraseña']);
			$A->editar();
            

			break;
		case 'eliminar': 
			$A->setId($_GET['id']);
            // $sala->setIdSala(base64_decode($_GET['IdSala'])); //por sesion
			$A->eliminar();

			break;
            
        case 'iniciar': 

        

$nombre = $_POST['nombre'];

echo $nombre;
            break;
        
        
	}
}
*/
//header('location: ../vistas/administrador/index.php');

?>
