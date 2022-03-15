<?php
	require_once '../../modelos/Rol.php';
	$rol = Rol::obtenerPorId(base64_decode($_GET['id']));
	$nombre= $_GET['nombre'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php  include '../mejoras/mobil.php';  ?>
	<title>Roles</title>
</head>
<body>

	<header>
		
		<h1>EDITAR <?= $nombre; ?> </h1>
		
		
	</header>
	<form action="../../controladores/Roles.php" method="post">

		<input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
		<input name="nombre" placeholder="Nombre" value="<?= $rol[1] ?>" required autofocus />
		<input name="a" type="submit" value="Editar" />
	</form>
</body>
</html>