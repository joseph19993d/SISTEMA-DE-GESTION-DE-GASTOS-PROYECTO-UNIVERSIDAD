<?php


session_start();
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{
 
 $nombre2=$_SESSION['NOMBRE'];
 $correo=$_SESSION['CORREO'];
 $rol=$_SESSION['ROL'];
 $salaA=$_SESSION['SALA']?? '4';
}else{ 
header('location:../sesion/bienvenida.php ');

  }

$nombre="COMPAÑERO";
try {
	//code...
require_once '../../modelos/compañero.php'; 
//require_once '../../modelos/Rol.php'
 ?>

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
</div>
<div id="contenedor1">
<h1  ><?=$nombre ?>S / USUARIOS </h1>
<center>
<div id="opciones3">
	<a class="ui-btn"  href="ingresar.php?nombre= <?=$nombre ?>" data-position="center"   width="60px"  id="boton">INGRESAR NUEVO </a>
</div>
</center>

<center>
    <div id="contenerdor1">
	<table border="2" data-role="table" data-mode="columntoggle" class="ui-responsive ui-shadown"  width="100x" >
			<thead>
                <tr>
                <?php 
        /* DATOS:
		$this->nombre = '';
        $this->correo ="";
        $this->contraseña="";
        $this->numero_celular="";
        $this->sala="";
        */  
        ?>
        
                    <th data-priority="1">  Id </th>
                    <th data-priority="2">  Nombre</th>
                    <th data-priority="3">  Numero celular</th>
                    <th data-priority="4">  Correo</th>
                   <!-- <th data-priority="3">  Contraseña</th> -->
                    <th data-priority="5">  Sala </th>
					<th colspan="2" data-priority="6">   Opciones </th>
					
					
         
                </tr>
            </thead>

			<?php foreach (compañero::listar($salaA) as $fila ) { ?>
				
            <tbody>
                <tr>
             
				
					<td><?= $fila[0] ?></td>
					<td><?= $fila[1] ?></td>
                    <td><?= $fila[2] ?></td>
                    <td><?= $fila[3] ?></td>
                    <td><?= $fila[4] ?></td>

<!---------------------------------------------------INICION DE OPCIONES---------------------------------------------------------------->
                    <?PHP if($rol=='administrador'){ ?> 
                        <td  width="15px" >
						<a href="editar.php?nombre=<?=$nombre ?>&id=<?=base64_encode($fila[0])?>" class="ui-btn" id="botonTable" >Editar</a>
					</td>

                	<td  width="15px" > 
						<a href="../../controladores/compañeros.php?&a=eliminar&id=<?=$fila[0]?> " class="ui-btn" id="botonTable" onclick="return confirm('¿Desea eliminar?')" >Eliminar</a>
					</td>
                    <?php }elseif($rol=='compañero'){?>


                    <?php }?>
<!-------------------------------------------------------FIN DE OPCIONES------------------------------------------------------------------->
               
                    


                	
                </tr>
				<?php }// id	nombre	numero_celular	correo	sala	contraseña	rol	 ?>
			</tbody>
	</table>
    </div>
    
</center>		
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