<?php
	require_once '../../modelos/gasto.php';
   
	$g = Gasto::obtenerPorId(base64_decode($_GET['id']));
    // id debe ser el dato de id veniente de el <a href></>
	$nombre= $_GET['nombre'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<?php  // include '../mejoras/mobil.php';  ?>
	
	<link rel="stylesheet" type="text/css" href="../estilos/formularios.css">
	<title>Roles</title>
</head>
<body>
	
	<div data-role="header">
		
	</div> 
	
<!---------------------------------------------INICIO DE CAMPOS------------------------------------------------------------------------>
	<form action="../../controladores/Gastos.php" method="post">
	<center>
	<a href="index.php" id=boton> Regresar </a>
	</center>
	<label> <h1>EDITAR_<?= $nombre; ?> </h1> </label>
	
        <input type="hidden" name="id" value="<?= base64_decode($_GET['id'] )?>"  />
		<input type="text" name="descripcion" placeholder="Descripcion" value="<?= $g[8] ?>" required autofocus />
         <!--// value debe se iguala  la posicion de el dato en la base de datos -->

		<input name="a" type="submit" value="Editar" id="boton" />
	</form>
<!------------------------------------------------FIN DE CAMPOS------------------------------------------------------------------------>
 
</body>
</html>