<?php
require_once '../modelos/foto.php';
// segun "a" sea una opcion, se ejecutara lo correspondiente pasandole los datos desde aqui a el modelo roles
/* 
*/
session_start();
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{
    $correo= $_SESSION['CORREO'];
    $sala=$_SESSION['SALA'];
    echo"Sala=".$sala."\n,";
}else{ header('location:../index.php');  } 


$accion = $_POST['a'] ?? $_GET['a'] ?? '';

$foto = new  foto();  
echo "\n accion es igual a ".$accion."\n,";
if ($accion != '') {
   
    //$A es foto
	switch ($accion) {
		case 'Ingresar':
			# echo probando;
            
			$foto->setCorreo($correo); //optenido de el metodo OptenerDatosSesion2
			$foto->setSala($sala);
            $image= ( $_FILES['imagen']['tmp_name']);
            echo "Img en variable, ";

            if($image == ""){   echo "imagen vacia";} 

            else{

            if(isset($_FILES['imagen']['tmp_name'] )){
            $imagen= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

            }else{echo"imagen no recibida bien";}

			$foto->setImagen($imagen);
            echo "Datos setiados ";
			$foto->ingresar();
            if($foto){
                echo ",Imagen guardada " ;
				header('location:../../sistema/vistas/sesion/bienvenida.php');
                
               }else { echo",Imagen no guardada"; }
            
            }
			break;
		case 'Editar':
			$foto->setId($_POST['id']);
			//$foto->setdescripcion($_POST['descripcion']);
           // $foto->setcorreo_creador($lista['correo']); //por metodo
			$foto->editar();
            # code...
			if ($foto =='Actualizacion ejecutada,\n' ) {
				echo "no dvuelve nada";
			}else{ //header('location: ../vistas/error_DB.php');
				echo "error";
			}
	
			break;
		case 'eliminar':
			$foto->setId($_GET['id']);
            // $sala->setIdSala(base64_decode($_GET['IdSala'])); //por sesion
			$foto->eliminar();
			break;
	}
}

//header('location: ../vistas/fotos/index.php');


?>









