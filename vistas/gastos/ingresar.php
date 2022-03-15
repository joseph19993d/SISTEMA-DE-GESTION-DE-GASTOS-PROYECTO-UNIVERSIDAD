<?php 
session_start();
$salaA=$_SESSION['SALA'];
$nombre= $_GET['nombre'];
require_once '../../modelos/Administrador.php';
require_once '../../modelos/compañero.php';
require_once '../../modelos/invitado.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php // include '../mejoras/mobil.php';  ?>
<link rel="stylesheet" type="text/css" href="../estilos/formularios.css">
<!-- archivos necesarios para la validacion  -->
<link rel="stylesheet" href="css/screen.css" /> 
<script src="http://code.jquery.com/jquery-2.0.3.js"></script>
<script src="jquery.validate.js"></script>
<!-- pagina para entender la validacion:
http://jquery-manual.blogspot.com/2014/05/validar-formularios-con-jquery-validate.html
 -->
<!-- fin de archivos necesarios para validacion -->
	<title>Roles</title>
</head>
<body>
	<header>
	</header>

<form action="../../controladores/Gastos.php" method="post">
	<center>
	<a href="index.php" id=boton> Regresar </a>
	<h2 aling="center">INGRESAR  <?= $nombre; ?> </h2>
	</center>
        <!-- INICIO  DE CAMPOS label & input   -->
<label for="Nombre">Nombre de responsable : <span>*</span></label>
<p>
<select name="nombre_responsable">

    <?php foreach (compañero::listar($salaA) as $fila ) 
	{ 
	?>
	<option value="<?= $fila[1]?>"><?= $fila[1] ?></option>
	<?php 
	}
	?>

    <?php foreach (Invitado::listarEnSala($salaA) as $fila )
	{   
	?>
	<option   value="<?=$fila[1]?>"><?=$fila[1]?></option>
	<?php
	}
	?> 


	<?php foreach (Administrador::listar($salaA) as $fila ) 
	{ 
	?>	
	<option value="<?= $fila[1]?>"><?= $fila[1] ?></option>
	<?php
	}
	?>





  
</select>
</p>

<label for="Total">Valor: <span>*</span></label>
<input type="number" id="total" name="total"   minlength="1" maxlength="25" placeholder="4848748"  class="required" />
</p>

<label for="Nombre">Nombre de gasto : <span>*</span></label>
<input type="text" name="nombre" id="Nombre" placeholder="gasto por comida" minlength="4"  maxlength="15"    class="required" >
</p>

<label for="Nombre">Tipo de gasto : <span>*</span></label>
<select name="tipo"> 
  <option value="Pagado"> Pagado</option>
  <option value="PorPagar"> Por Pagar</option>
</select>
</p>


<label for="tipo de gasto">Descripcion: <span>*</span></label>
<input type="text" id="tipo de gasto" name="descripcion"  maxlength="245" placeholder="Se termino el ++++"  minlength="6" class="required" />


<!-- FIN  DE CAMPOS label & input   -->
		
		<input name="a" type="submit" value="Ingresar"  id="boton"/>
	</form>
</body>
</html>