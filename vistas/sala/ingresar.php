<?php 


if (isset(   $_GET['nombre']) ){
$nombre= $_GET['nombre'];
}


?>

<!DOCTYPE html>
<html lang="en"  styles="font-zise:0.2%;">
<head>
<body>
<ul>
<li>
<a  class="ui-btn ui-icon-home ui-btn-icon-top ui-corner-all"   href="../../vistas/sesion/bienvenida.php" id="boton2"> Inicio</a>
<span class="material-icons" href="../index.php"  >
keyboard_return
</span>
</li>
</ul>
<?php  // include '../mejoras/mobil.php';  ?>
	<meta charset="UTF-8" />
	<title>INGRESAR CORREO</title>
	<link rel="stylesheet" type="text/css" href="../estilos/formularios.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

</head>

<center> <h1>INGRESAR CORREO </h1> </center>
<center>
	<form action="../../controladores/Salas.php" method="post" style="width:70vw; padding-top: 3vh; padding-left:3vh; display:block" >
		<input type="Email" name="correo" placeholder="correo"  style="width:60vw;    " minlength="5" maxlength="30" class="email" autofocus required  />
		
		<input name="a" type="submit" value="Evaluar"  style="width:60vw; margin-left:0%"id="boton" class= "btn-evaluar" />

	</form>
</center>
<script src="ingresar.js">
</script>
</body>
</html>