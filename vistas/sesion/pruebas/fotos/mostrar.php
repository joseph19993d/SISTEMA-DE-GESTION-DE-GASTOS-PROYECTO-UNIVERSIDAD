<?php include ("../../../../modelos/Foto.php"); 
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

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Imagen</title>
    <link rel="stylesheet" type="text/css" href="../../../estilos/mostrar.css">
</head>
<body>

<ul>
    <li>
       
    </li>
</ul>
    <CENTER>
    <a href="index.php" id=boton> INSERTAR -</a>
    
    <a href="../../bienvenida.php" id=boton> - INICIO</a>
    <h1> FOTOS DE PERFIL EN LA SALA </h1>
   
<table border='1'>
        <thead>
            <tr>
                <th> CORREO </th>
                <th> FOTO </th>
                
            </tr>
        </thead>

<tbody>
    <?php 
     
     
    
     if (Foto::listar($salaA) ) {
         
         echo"Sala\n".$salaA;
         
    foreach (Foto::listar($salaA) as $i=> $array)
   {
    
    $correo= $array[0];
    $img= $array[1];
   
   // print_r($array);
    ?>
    <tr> 
    <td> <pr> <h3>  <?= $correo ?> <h3> </pr></td>
    <td>    <img style="width: 100px;" src="data:image/jpg;base64,<?= base64_encode($img) ?>"  alt="foto perfil"> </td>
    </CENTER>    
    <td>
    </td>

    <?php
    }} else{
    ?>

    <tr> 
        <td> <pr> <h3>Joseph Rodelo <h3>  </pr></td>
        <td> <img src="https://static.vecteezy.com/system/resources/previews/001/503/756/non_2x/boy-face-avatar-cartoon-free-vector.jpg"  alt="Foto de perfil predeterminada" width="30%">  
    </CENTER>
    </td>

    <td>
    </td>

    <?php
     }
    ?>
   

</tbody>
</table>
<p> 
<a href="../../bienvenida.php" id=boton>- INICIO -</a>
</body>
</html>