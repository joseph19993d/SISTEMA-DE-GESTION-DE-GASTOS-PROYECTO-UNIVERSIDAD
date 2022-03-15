<?php
//------------------------------------------INICIO DE SESSION---------------------------------
session_start();
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{
 
 $nombre2=$_SESSION['NOMBRE'];
 $correo=$_SESSION['CORREO'];
 $rol=$_SESSION['ROL'];
 if(isset($_SESSION['ROL3'])){ $rol2=$_SESSION['ROL3'];}else{ $rol2="normal";}
 $salaA=$_SESSION['SALA'];

}else{ 
header('location:../sesion/bienvenida.php ');

  }
if($rol=='administrador'){}elseif($rol=='compañero'){  }
//------------------------------------------FIN DE SESSION---------------------------------
$nombre="ADMINISTRADOR";
try {
	//code...


require_once '../../modelos/Administrador.php'; 
require_once '../../modelos/Rol.php' ?>

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
<div id=contenedor1>
    <center>
	<?php
    if($rol=='administrador' && $rol2=="principal"){?> 
    
    <a class="ui-btn" href="ingresar.php?nombre= <?=$nombre ?>" data-position="center"  width="60px" id=boton>INGRESAR NUEVO <?=$nombre ?></a>
    
	<?php }elseif($rol=='compañero'){?>
    
    <label for=""> </label>
    <?php }?>
	<center>



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
                    <th data-priority="4">  Numero celular</th>
                    <th data-priority="3">  Correo</th>
                   <!-- <th data-priority="3">  Contraseña</th> -->
                    
                    <th data-priority="5">  Sala </th>
					<th colspan="2" data-priority="6">   Opciones </th>
					
					
         
                </tr>
            </thead>

			<?php foreach (Administrador::listar($salaA) as $fila ) { ?>
				
            <tbody>
                <tr>
             
				
					<td><?= $fila[0] ?></td>
					<td><?= $fila[1] ?></td>
                    <td><?= $fila[2] ?></td>
                    <td><?= $fila[3] ?></td>
                    <td><?= $fila[5] ?></td>
<!----------------------------------------------INICIO DE OPCIONES--------------------------------------------------------------------->  

                    <?php if($rol=='administrador' && $fila[3]== $correo){ ?>

                    <td  width="15px" >
                    <a href="editar.php?nombre=<?=$nombre ?>&id=<?=base64_encode($fila[0])?>" class="ui-btn" id="boton" >Editar</a> 
				   </td>

                    <?php }elseif($rol2=="principal" && $rol=='administrador'){?>

                    <td  width="15px" >
                    <a href="editar.php?nombre=<?=$nombre ?>&id=<?=base64_encode($fila[0])?>" class="ui-btn" id="boton" >Editar</a> 
				   </td>

                    
                	<td  width="15px" > 
					<a href="../../controladores/Administradores.php?&a=eliminar&id=<?= $fila[0] ?> "  class="ui-btn" onclick="return confirm('¿Desea eliminar?')"  id= boton>Eliminar</a> 
					</td>

                    <?php }?>
<!----------------------------------------------FIN DE OPCIONES--------------------------------------------------------------------->

  
                </tr>
        
				<?php } ?>
			</tbody>
	</table>
			
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