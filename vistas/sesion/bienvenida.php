<?php
include_once '../../modelos/Administrador.php';
include_once '../../modelos/compañero.php';
include_once '../../modelos/foto.php';
//INICIO DE ->SESION 
session_start();//Datos desde comprobacion
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{


 $nombre=$_SESSION['NOMBRE'];
 $correo=$_SESSION['CORREO'];
 $rol=$_SESSION['ROL'];
 $sala=$_SESSION['SALA'];
 $salaA=$_SESSION['SALA'];
}else{ header('location:../index.php');  }
if($rol=='administrador'){ 
    $lista= Administrador::OptenerDatosSesion2($correo); 
}elseif($rol=='compañero'){
    $lista= Compañero::OptenerDatosSesion2($correo); 
}
//$nombre1=$lista['nombre'];
//FIN DE ->SESION 
?>



<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" type="text/css" href="../estilos/inicios.css"  > 
<title>Bienvenida</title>
</div>
</head>

<body  id="body" onload=" loadWindowsZise();" onresize="loadWindowsZise();"> <!--  Metodos para main.css metodos para pasar tamaño de ventana-->
<div data-role="main" class="ui-conthem">
<div data-role="header"  > <div id="MWelcome"> <h1 >Bienvenid@ <?=$nombre?></h1></div> 

<!--inicio opciones verticales -->
<div data-role="controlgroup" data-type="horizontal" id="options">
</div>
<!--FIN OPCIONES verticales -->

<!--INICIO OPCIONES principales -->
<ul> 
    <li id="smallOrBig">
   </li>
</ul>
<!--FIN OPCIONES principales-->

</div> 
<div id="contenedor1" >
<!-- INICIO IMAGEN-->
<?php if (Foto::listarActual($correo,$salaA )) {  $imagen= Foto::listarActual($correo,$salaA); $imagen2= $imagen[0];  
}if ($imagen2[0] !="E") {
    # code...
?>

<center> 

<img width="300px"  id="img1" src="data:image/jpg;base64,<?= base64_encode($imagen2[0]) ?>"  alt="foto perfil"> 

</center>
<center>
<input type="range" class="rangoEtario" value="34" id="Rango"/> 
<script src= "main.js"> </script>

</center>

<?php
} else {
   ?>
<center>
   <h2>¡No hay fotos de prfil! </h2>
   <img width="340px"  id=img2 src="https://us.123rf.com/450wm/afe207/afe2071307/afe207130700242/20944560-foto-de-perfil-masculino.jpg?"  alt="Foto perfil predeterminada" > 
   <p>   </p>
   
   <input type="range" id="Rango2" class="rangoEtario" value="34" />
</center>
   <?php
}
?>
<!-- FIN IMAGEN-->

<center>
<a href="../sesion/pruebas/fotos/index.php" class="ui-btn" id="boton"   > Cambiar Foto de perfil  </a>
</center>
</div>


<!-- INICIO DE DATOS INFO-->
<div id="contenedor">

<?php if($rol=='administrador'){ ?>
    <div data-role="main" class="ui-content" style="color:aliceblue">
    <div data-role="collapsible">
    <h1>Mis datos:</h1>
         <div data-role="collapsible">
         <h3>Nombre </h3>
         <p><?= $nombre; ?></p>
         </div>
         <div data-role="collapsible">
         <h3>Numero de celular </h3>
         <p><?= $lista['numero_celular'] ?></p>
         </div>
         <div data-role="collapsible">
         <h3>Correo </h3>
         <p><?=$correo ?></p>
         </div>
         <div data-role="collapsible">
         <h3>Rol </h3>
         <?php   if(isset($_SESSION['ROL3']) && $_SESSION['ROL3']== "principal" ){ ?> <p> <?=$rol; ?> -principal </p> <?php  }else{ ?> <p><?=$rol ?> </p> <?php } ?>
     
         </div>
         <div data-role="collapsible">
         <h3>Sala </h3>
         <p><?= $sala; ?></p>
         </div>
    </div>
</div>
</div>
<?php }elseif($rol=='compañero'){?>

    <div data-role="main" class="ui-content" style="color:aliceblue">
    <div data-role="collapsible">
    <h1>Mis datos:</h1>
         <div data-role="collapsible">
         <h3>Nombre </h3>
         <p><?= $nombre; ?></p>
         </div>
         <div data-role="collapsible">
         <h3>Correo </h3>
         <p><?=$correo ?></p>
         </div>

         

         <div data-role="collapsible">
         <h3>Numero celular </h3>
         <p><?= $lista['numero_celular'] ?></p>
         </div>


         <div data-role="collapsible">
         <h3>Rol </h3>
         <p><?=$rol; ?> / usuario</p>
         </div>
         <div data-role="collapsible">
         <h3>Sala </h3>
         <p><?= $sala; ?></p>
         </div>
    </div>
</div>
</div>

<?php }?>   
<!-- FIN DE DATOS INFO-->

</div>	
	</body>
	</html>

