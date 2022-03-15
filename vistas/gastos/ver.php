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
    <link rel="stylesheet" type="text/css" href="../estilos/mostrar.css" > 
  
	<title>Roles</title>
</head>
<body>
	<div data-role="header">
		
	</div>
<center>
<div id="datos" >
<h1>  <?= $nombre; ?> <?= $g[3] ?> </h1>
        <label>correo de creador: <?= $g[2] ?> <label>
        <p>
        <label>Fecha: <?= $g[3] ?> <label>
        <p>    
        <label>Responsable: <?= $g[4] ?> <label>
        <p>
        <label>Monto: <?= $g[5] ?> <label>
        <p>
        <label>Tipo de gasto: <?= $g[7] ?> <label>
        <p>
        <label>Nombre de gasto: <?= $g[6] ?> <label>
        <p>
        <label>Descripcion: <?= $g[8] ?> <label>
        <p>
        <td> 	<a href="historial.php" class="ui-btn" id="boton"  > Ir a historial</a> </td>
        <td> 	<a href="cuentas.php?nombre=<?=$g[4]?>" class="ui-btn" id="boton"  > Ir a cuenta</a> </td>
        <td> 	<a href="index.php?nombre=<?=$nombre?>" class="ui-btn" id="boton"  > Ir a gastos</a> </td>
        
</div>
</center>
</form>
</body>
</html>