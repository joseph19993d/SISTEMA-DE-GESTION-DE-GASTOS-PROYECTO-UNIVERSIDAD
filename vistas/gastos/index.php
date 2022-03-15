<?php
$total=0;
session_start();
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{
 
 $nombre2=$_SESSION['NOMBRE'];
 $correo=$_SESSION['CORREO'];
 $rol=$_SESSION['ROL']; 
 $salaA=$_SESSION['SALA'];
}else{ 
header('location:../sesion/bienvenida.php ');

  }

$nombre="GASTO";
try {
	//code...


require_once '../../modelos/Gasto.php';
require_once '../../modelos/Administrador.php';
require_once '../../modelos/compañero.php';
require_once '../../modelos/invitado.php';
//require_once '../../modelos/Rol.php' ?>

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
<div id="contenedor1">
<h1  ><?=$nombre ?>S </h1>

<div id="opciones3">
    <center>
	<a class="ui-btn" href="ingresar.php?nombre= <?=$nombre ?>" data-position="center"   width="60px"  id="boton"  >INGRESAR NUEVO <?=$nombre ?></a>
    <a class="ui-btn" href="historial.php?nombre= <?=$nombre ?>" data-position="center"  width="60px"  id="boton"  >IR A HISTORIAL </a>
    </center>

</div>

<div id="c2">
 <form action="cuentas.php" method="post" >
<label for="Nombre"  > Selecione persona </label>
<input type="hidden" name="s" id="">
<select name="nombre"  style="color: black">

<?php foreach (Administrador::listar($salaA) as $fila ) { ?>	
<option value="<?= $fila[1]?>">  <?= $fila[1] ?></option>
<?php }?>

<?php foreach (compañero::listar($salaA) as $fila ) { ?>
<option value="<?= $fila[1]?>">  <?= $fila[1] ?></option>
<?php }?>

    <?php foreach (Invitado::listarEnSala($salaA) as $fila )
	{   
	?>
	<option   value="<?=$fila[1]?>"><?=$fila[1]?></option>
	<?php
	}
	?> 


</select>
 <input type="submit"  value="Buscar"     >
 </form> 
</div>
<!-- ------------------------------------------------------------------ INICIO DE TABLA ---------------------------------------------------- -->
<div id="contenerdor1">
<center>
<table border="1"  >
			<thead>
                <tr>
<?php 
$T=0;
/*
DATOS A TENER EN CUANTA 

			INSERT INTO `gasto` 
			(`id`, `sala`, `correo_creador`, `fecha_creacion`, `nombre_responsable`, `total`, `nombre_gasto`, `tipo_gasto`, `decripcion`) 
			VALUES ('1', '23', 'dasd', '2021-05-05', 'asdasd', '3234', 'sadasd', '23asdasd', '');
			`correo_creador`, `fecha_creacion`, `nombre_responsable`, `total`, `nombre_gasto`, `tipo_gasto`, `decripcion`"

 */?>

        
                    <th data-priority="1"> Correo de creador </th>
                    <th data-priority="2"> Fecha de gasto </th>
                    <th data-priority="3"> nombre_responsable</th>
                    <th data-priority="4"> Total</th>
                    <th data-priority="5"> Nombre de el gasto</th>
                    <th data-priority="6"> Estado de gasto</th>
                    <th data-priority="7"> Descripcion</th>
                    <th data-priority="8"> ID</th>
					<th colspan="1" data-priority="20"> Opciones </th>
                    <th data-priority="21"> Total</th>
                </tr>
            </thead>
            <tbody>
 

			<?php foreach (Gasto::listar($salaA) as $fila ) {  ?> 
				
            
                <tr>
				
					<td><?= $fila[0] ?></td>
					<td><?= $fila[1] ?></td>
                    <td><?= $fila[2] ?></td>
                    <td><?= $fila[3] ?></td> <?php if($fila[2] == $nombre2 ){    $T= $T+$fila[3]; }?>
                    <td><?= $fila[4] ?></td>
                    <td><?= $fila[5] ?></td>
                    <td><?= $fila[6] ?></td>
                    <td><?=  $fila[7]; ?></td> 
                        

                    <?php if($rol=='administrador'){ ?>
                    
                	<td  width="15px" >
						<a href="editar.php?nombre=<?=$nombre ?>&id=<?=base64_encode($fila[7])?>" class="ui-btn"  id="botonTable">Editar</a>
					 <p></p>
						<a href="../../controladores/Gastos.php?&a=eliminar&id=<?=$fila[7]?> " class="ui-btn" 
                        onclick="return confirm('¿Desea eliminar?')"  id="botonTable" >Eliminar</a>
                        <!--// la $fila[] que se meandara debe ser el id segun como lo hayamos pedidos en el modelo, mirar su posicion-->
					</td>
                    <?php if($fila[2] == $nombre2 ) { ?>
                        
                        <td> <?=$T ?> </td>


                    <?php }}elseif($rol== 'compañero'){ if($correo==  $fila[0]){?>

                    <td  width="15px" >
						<a href="editar.php?nombre=<?=$nombre ?>&id=<?=base64_encode($fila[7])?>" class="ui-btn"  id="botonTable">Editar</a>
					 <p></p>
						<a href="../../controladores/Gastos.php?&a=eliminar&id=<?=$fila[7]?> " class="ui-btn" 
                        onclick="return confirm('¿Desea eliminar?')"  id="botonTable" >Eliminar</a>
                        <!--// la $fila[] que se meandara debe ser el id segun como lo hayamos pedidos en el modelo, mirar su posicion-->
					</td>
                    <td><?= $T?></td>

                    <?php }else {?>
                        <td></td> 
                        <?php if($fila[2] == $nombre2 ) { ?>
                        
                        <td> <?=$T ?> </td>
                    <?php
                    }
                    }}
                    ?>
                    


                

                </tr>
				<?php } ?>

               
			</tbody>
</table>
</center>

<!-- ---------------------------------------------------------------------FIN DE TABLA ------------------------------------------------------->

</div>
                    </div>		
		
<?php
 // include '../mejoras/piesera.php'; //incluimos el pie de pagina
?>

</body>

</html>
<?php
 } catch (Exception $e) {
	//throw $th;
   

} ?>