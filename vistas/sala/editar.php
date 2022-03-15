<?php


    $nombre= $_GET['nombre']; //nombre de usuario
	require_once '../../modelos/Sala.php';
	$rol = Sala::obtenerPorId(base64_decode($_GET['id']));
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php  include '../mejoras/mobil.php';  ?>
	<title>titulo</title>
</head>
<body>

	<header>
		
		<h1>EDITAR <?= $nombre; ?> </h1>
		
		
	</header>
	<form action="../../controladores/Salas.php" method="post">

		<input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
		<input name="correo" placeholder="correo" value="<?= $rol[1] ?>" required autofocus />
		<input name="a" type="submit" value="Editar" />
	</form>
</body>
</html>