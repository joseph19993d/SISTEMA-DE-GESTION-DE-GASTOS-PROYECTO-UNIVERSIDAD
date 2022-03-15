<?php

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

$nombre="SALA";
try {

	//code...


require_once '../../modelos/sala.php' ?>
<!DOCTYPE html>
<html lang="en">
<?php

?>
<head>
	<title><?=$nombre?>S</title>
	<?php // include '../mejoras/mobil.php'; ?>
    <link  rel="stylesheet" type="text/css" href="../estilos/inicios.css">
    

</head>
<body  id="body" onload=" loadWindowsZise();" onresize="loadWindowsZise();" >
 
<div data-role="header"  >
<!-------------------------------------------------------- INICIO DE OPCIONES ------------------------------------------------------------->
<!--INICIO OPCIONES verticales -->
<div  id="options">
</div>
<!--FIN OPCIONES verticales -->

<!--INICIO OPCIONES principales -->
<ul> 
    <li id="smallOrBig">
   </li>
</ul>
<div  id="contenedor1"> </div>
<!-- FIN OPCIONES principales -->

<script src="main.js"> </script> <!-- Script para agregar las opciones segun tamaño sea -->

<!----------------------------------------------------------FIN DE OPCIONES--------------------------------------------------------------->
  </div>
<?php 
	if($rol== "administrador" ){
?>

<div id= contenedor1>
	
	<center>
 	<a class="ui-btn" href="ingresar.php?nombre= <?=$nombre ?>" data-position="center" id=boton >INGRESAR NUEVA <?=$nombre ?></a>
	</center>

	<center>
	<table border="2" data-role="table" data-mode="columntoggle" class="ui-responsive ui-shadown" border="100" width="100x" >
			<thead>
                <tr>
                    <th data-priority="1"> Id </th>
                    <th data-priority="2"> Correo</th>
					
					<th colspan="2" data-priority="3">   Opciones </th>
					<!--
					<th width ="15px" data-priority="5" > <form action="../../controladores/actualizar.php" method="post">
		            <input  width="15px"  name="a" type="submit" value="Refrescar" />
					</form></a></th>
					-->

					
         
                </tr>
            </thead>

			<?php foreach (Sala::listar() as $fila) { ?>
				
            <tbody>
                <tr>
				
					<td><?= $fila[0] ?></td>
					<td><?= $fila[1] ?></td>
					
<!--------------------------------------------INICIO DE OPCIONES ---------------------------------------------------------------------->

					<?php if($rol=='administrador' && $correo == $fila[1]){ ?> 
					<!--
					<td  width="15px" >
						<a href="editar.php?nombre=<?//=$nombre ?>&id=<?//=base64_encode($fila[0])?>" class="ui-btn" >Editar</a>
					</td>
					-->
                	<td  width="15px" > 
						<a href="../../controladores/Salas.php?&a=eliminar&id=<?=base64_encode($fila[0])?> " class="ui-btn" onclick="return confirm('¿Desea eliminar?')" id=boton>Eliminar</a>
					</td>

                    <?php }elseif($rol=='compañero'){?>


                    <?php }?>

<!--------------------------------------------FIN DE OPCIONES ---------------------------------------------------------------------->


			
                </tr>
				<?php } ?>
			</tbody>
	</table>
					</center>

	
</div>
<?php // include '../mejoras/piesera.php'; ?>	
</body>
</html>
<?php
 }elseif($rol != "administrador") {
	 # code...
	 ?>
	 <center id=contenedor1>
	
	 <label for=""> Solo el administrador puede ver esta seccion</label>
	 </center>
	 <?php
 }
} catch (Exception $e) {
	//throw $th;
	$ActualizarDespuesDe = 10;
	header('Refresh: '.$ActualizarDespuesDe);

} ?>