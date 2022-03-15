<?php
	require_once '../../modelos/invitado.php';
   
	$g = Invitado::obtenerPorId(base64_decode($_GET['id']));
    // id debe ser el dato de id veniente de el <a href></>
	$nombre= $_GET['nombre'];
//VALIDACION DE SESION--------------------------------------------------------------------------------------------------------------->
session_start();
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{
 
 $nombre2=$_SESSION['NOMBRE'];
 $correo=$_SESSION['CORREO'];
 $rol=$_SESSION['ROL'];
 
}else{ 
header('location:../sesion/bienvenida.php ');
}

//FIN DE VALIDACION-------------------------------------------------------------------------------------------------------------------->

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php  // include '../mejoras/mobil.php';  ?>
	
	<link rel="stylesheet" type="text/css" href="../estilos/formularios.css">
	<title>INVITADOS</title>
</head>

<body>
<!---------------------------------------------INICIO DE CAMPOS------------------------------------------------------------------------>

	<form action="../../controladores/Invitados.php" method="post">

	<center>
	<a href="index.php" id=boton> Regresar </a>
	</center>
	<label> <h1>EDITAR_<?= strtoupper($nombre); ?> </h1> </label>

        <input type="hidden" name="id" value="<?= $_GET['id'] ?>"  />
		<label for="numeroC"> Celular*:</label>
		<input type="text" name="numeroc" placeholder="Descripcion" value="<?= $g[3] ?>" required autofocus />
		<p>
	    <label for="nombre"> Nombre*:</label>
		<input type="text" name="nombre" placeholder="Descripcion" value="<?= $g[5] ?>" required autofocus />
         <!--// value debe se iguala  la posicion de el dato en la base de datos -->

		<input name="a" type="submit" value="Editar" id="boton" />
	</form>
<!------------------------------------------------FIN DE CAMPOS------------------------------------------------------------------------>

</body>
</html>