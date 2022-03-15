<?php 

include("conexion.php");
$id= $_GET['id'];
$solicitud= "DELETE  FROM datos WHERE ID= $id ";
$resultado= mysqli_query($con, $solicitud);

header("location: cuatro.php ");

 ?>