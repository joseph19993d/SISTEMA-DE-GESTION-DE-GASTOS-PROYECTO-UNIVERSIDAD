<?php
session_start();
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{
 
 $nombre2=$_SESSION['NOMBRE'];
 $correo=$_SESSION['CORREO'];
 $rol=$_SESSION['ROL'];
 $sala=$_SESSION['SALA'];
}else{ 
header('location:../sesion/bienvenida.php ');

  }

$nombre="HISTORIAL";
try {
	//code...

require_once '../../modelos/historial.php' ?>
<!DOCTYPE html>
<html lang="en">
<?php

?>
<head>
	<title><?=$nombre ?>S</title>
	<?php // include '../mejoras/mobil.php';  ?>
    <link  rel="stylesheet" type="text/css" href="../estilos/inicios.css">
</head>
<body  id="body" onload=" loadWindowsZise();" onresize="loadWindowsZise();" >
<div data-role="header" >

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
	  // include '../mejoras/navegador2.php'; 
	 ?> 
     <center id= contenedor1>
	
 	<a class="ui-btn" href="ingresar.php?nombre= <?=$nombre ?>"  id=boton >INGRESAR NUEVO <?=$nombre ?></a>

    </center>
    <center id=contenedor1>
    <?php $hoy = getdate(); 
            $año= $hoy['year'];
            $mes= $hoy['mon'];
            $dia= $hoy['mday'];
            $fecha="";
            $fecha= "".$año."/".$mes."/".$dia;



            

            ?>
   <label style="font-size: medium;" >  Fecha: <?=   $fecha?> </label>
	<table border="2" data-role="table" data-mode="columntoggle" class="ui-responsive ui-shadown"  width="100x" >
			<thead>
                <tr>
                    
                    <th data-priority="2"> informe </th>
                    <th data-priority="3"> Fecha </th>
                    <th data-priority="4"> hora </th>

					<!--
					<th colspan="2" data-priority="3">   Opciones </th>
					<th width ="15px" data-priority="5" > <form action="../../controladores/actualizar.php" method="post">
		            <input  width="15px"  name="a" type="submit" value="Refrescar" />
					</form></a></th>
					-->
                </tr>
            </thead>

           
            
			<?php foreach (Historial::listar($fecha,$sala) as $fila) { ?>
				
            <tbody>
                <tr>
				
					<td><?= $fila[1] ?></td>
                    <td><?= $fila[2] ?></td>
                    <td><?= $fila[3] ?></td>

					
<!--
                	<td  width="15px" >
						<a href="editar.php?nombre=<?//=$nombre ?>&id=<?//=base64_encode($fila[0])?>" class="ui-btn" >Editar</a>
					</td>
                	<td  width="15px" > 
						<a href="../../controladores/Roles.php?&a=eliminar&id=<?//=base64_encode($fila[0])?> " class="ui-btn" onclick="return confirm('¿Desea eliminar?')" >Eliminar</a>
					</td>
-->					
                </tr>
				<?php } ?>
			</tbody>
	</table>
			
    </center>
<?php // include '../mejoras/piesera.php'; ?>	
</body>
</html>
<?php
 } catch (Exception $e) {
	//throw $th;
	$ActualizarDespuesDe = 0;
	//header('Refresh: '.$ActualizarDespuesDe);

} ?>