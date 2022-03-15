<?php 

$nombre= $_GET['nombre'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php  include '../mejoras/mobil.php';  ?>
	<meta charset="UTF-8" />
	<title>Roles</title>
</head>
<body>
	<header>
	
		<div>
		<h2 aling="center">INGRESAR  <?= $nombre; ?> </h2>
		</div>
	
	</header>

	<form action="../../controladores/Roles.php" method="post">
		<input name="nombre" placeholder="Nombre" required autofocus />
		
		<input name="a" type="submit" value="Ingresar" />
	</form>
</body>
</html>