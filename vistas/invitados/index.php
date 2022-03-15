<?php

$nombre="invitado";
session_start();
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{
 
 $nombre2=$_SESSION['NOMBRE'];
 $correo=$_SESSION['CORREO'];
 $rol=$_SESSION['ROL'];
 $salaA=$_SESSION['SALA'];
 $X=1;

}else{ 
header('location:../sesion/bienvenida.php ');

  }
try {
	//code...


require_once '../../modelos/invitado.php'; 
require_once '../../modelos/Rol.php' ?>

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
</div>


<div id="contenedor1" >
	<?php 
    $nombre2= strtoupper($nombre);
	
	 ?> 
	<center>
	<a class="ui-btn" href="ingresar.php?nombre= <?=$nombre ?>" data-position="center"  width="60px" id="boton">INGRESAR NUEVO <?=$nombre2 ?></a>
    </center>

    <center>
	<table border="2" data-role="table" data-mode="columntoggle" class="ui-responsive ui-shadown"  width="100x" >
			<thead>
                <tr>
                    <th data-priority="2"> n°</th>
                    <th data-priority="3"> Correo  de creador</th>
                    <th data-priority="4"> Celular </th>
                    <th data-priority="5"> Responsable</th>
                    <th data-priority="6"> Nombre  </th>
                    <th data-priority="7"> Nombre creador</th>
                    <th data-priority="8"> Descripcion </th>

					<th colspan="2" data-priority="20">   Opciones </th>
                </tr>
            </thead>


			<?php foreach (Invitado::listarIndex($salaA) as $fila ) { ?> 
				
            <tbody>
                <tr>
                    <td><?= $X; ?></td> <?php $X= $X+1;?>
                    <td><?= $fila[2] ?></td>
                    <td><?= $fila[3] ?></td>
                    <td><?= $fila[4] ?></td>
                    <td><?= $fila[5] ?></td>
                    <td><?= $fila[6] ?></td>
                    <td><?= $fila[7] ?></td>


<!--------------------------------------------INICIO DE OPCIONES ---------------------------------------------------------------------->
                    <?php
                    if($rol == 'administrador'){  ?> 


                    <td  width="15px" >
						<a href="editar.php?nombre=<?=$nombre ?>&id=<?=base64_encode($fila[0]) ?> " class="ui-btn" id=boton >Editar</a>
					</td>

                	<td  width="15px" > 
						<a href="../../controladores/invitados.php?&a=eliminar&id=<?=$fila[0]?> " class="ui-btn" onclick="return confirm('¿Desea eliminar?')" id=boton >Eliminar</a>
                        <!--// la $fila[] que se meandara debe ser el id segun como lo hayamos pedidos en el modelo, mirar su posicion-->
					</td>


                    <?php }elseif($rol != 'administrador'){ 
                        /*?>
                        
                        <td  width="15px" >
                        <?= $rol ?>
						<a href="editar.php?nombre=<?=$nombre ?>&id=<?=base64_encode($fila[0])?>" class="ui-btn" >Editar</a>
					   </td>
                       

                    <?php */ }}?>
<!--------------------------------------------FIN DE OPCIONES ---------------------------------------------------------------------->


                

                	
                </tr>
				<?php  ?>
			</tbody>
	</table>
    </center>			
		
<?php
 // include '../mejoras/piesera.php'; //incluimos el pie de pagina
?>	
</body>
</html>
<?php
 } catch (Exception $e) {
	//throw $th;
   

} ?>