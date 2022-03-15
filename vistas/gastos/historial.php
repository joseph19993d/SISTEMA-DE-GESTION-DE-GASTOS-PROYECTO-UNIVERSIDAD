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
require_once '../../modelos/Rol.php' ?>

<!DOCTYPE html>
<html lang="en">
<?php

?>
<head>
	<title>Historial de gasto</title>
	<?php //  include '../mejoras/mobil.php';  ?>
  <link rel="stylesheet" type="text/css" href="../estilos/inicios.css">

</head>
<body>

<ul>
  <li>
  <a  class="ui-btn ui-icon-home ui-btn-icon-top ui-corner-all"  href=" ../sesion/bienvenida.php " id=boton> Inicio</a>
  <a  class="ui-btn ui-icon-lock ui-btn-icon-top ui-corner-all" href = "../sesion/cerrar.php" id=boton >Cerra sesion</a>
  </li>
</ul>
<div id="contenedor1">
<div data-role="header" >
<center>
	<a href="index.php" id=botonC> Regresar </a>
</center>
  <h1 > HISTORIAL DE GASTOS </h1>
<div data-role="controlgroup" data-type="horizontal">

</div>
  </div>
<center>
	<table border="2"   >
			<thead>

                <tr>
<?php 

/*
DATOS A TENER EN CUANTA 

			INSERT INTO `gasto` 
			(`id`, `sala`, `correo_creador`, `fecha_creacion`, `nombre_responsable`, `total`, `nombre_gasto`, `tipo_gasto`, `decripcion`) 
			VALUES ('1', '23', 'dasd', '2021-05-05', 'asdasd', '3234', 'sadasd', '23asdasd', '');
			`correo_creador`, `fecha_creacion`, `nombre_responsable`, `total`, `nombre_gasto`, `tipo_gasto`, `decripcion`"

 */?>

        
                    <th data-priority="1">  Fecha </th>
                    <th data-priority="2">  total </th>
                    <th data-priority="3">  Responsable</th>
                    <th data-priority="4">  </th>
                </tr>
            </thead>


			<?php foreach (Gasto::listarD($salaA) as $fila ) {   // correo_creador,fecha_creacion,nombre_responsable,total,nombre_gasto,tipo_gasto,decripcion,id ?> 
				
            <tbody>
                <tr>
					<td><?= $fila[1] ?></td>
					<td><?= $fila [3] ?></td>
                    <td><?= $fila[2] ?></td>
                    <td> 	<a href="ver.php?nombre=<?=$nombre ?> &id=<?=base64_encode($fila[7])?>" class="ui-btn" data-position="center"   width="60px" id= boton2 >Ver</a>
                   </td>
                    <?}?>


                

                </tr>
				<?php } ?>

               
			</tbody>
	</table>
</center>
      </div>
<?php
 //include '../mejoras/piesera.php'; //incluimos el pie de pagina
?>	
</body>
</html>
<?php
 } catch (Exception $e) {
	//throw $th;
   

} ?>