<?php
	require_once '../../modelos/Administrador.php';
	$A = Administrador::obtenerPorId(base64_decode($_GET['id']));
	$nombre= $_GET['nombre'];  
// INICIO DE SESION----------------------------------------------------------------------------------------
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
// FIN DE SESION----------------------------------------------------------------------------------------

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php  // include '../mejoras/mobil.php';  ?>
	
	<link rel="stylesheet" type="text/css" href="../estilos/formularios.css">
	<title>Roles</title>
</head>
<body>

<!---------------------------------------------INICIO DE CAMPOS------------------------------------------------------------------------>

	<form action="../../controladores/Administradores.php" method="post">
	<center>
	<a href="index.php" id=boton> Regresar </a>
	</center>
	<label> <h1>EDITAR_<?= $nombre; ?> </h1> </label>

		<input type="hidden" name="id" value="<?= $_GET['id'] ?>" />

<label for="Nombre">Nombre : <span>*</span></label>
<input type="text" name="nombre" id="Nombre" placeholder="persona" minlength="4"  maxlength="25"  value="<?=$A[1]?>"  class="required" />
<p>

<label for="celular">celular: <span>*</span></label>
<input type="number" id="celular" name="celular"  maxlength="25" placeholder="307112564"  value="<?=$A[2]?>" class="required" />
<p>

<label for="contraseña" > Contraseña: <span>*</span> </label>
<input type="password" id="d" name="contraseña"   placeholder="*******" minlength="7" maxlength="25" required/>


		<input name="a" type="submit" value="Editar" id=boton />
	</form>
<!---------------------------------------------FIN DE CAMPOS------------------------------------------------------------------------>

</body>
</html>