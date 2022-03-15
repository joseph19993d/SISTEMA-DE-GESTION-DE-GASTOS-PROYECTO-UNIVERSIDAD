<?php 
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$edad= $_POST['edad'];
$celular= $_POST['celular'];
$id= $_POST['id'];

include("conexion.php");
$solicitud= "UPDATE datos SET Nombre='$nombre', Apellido='$apellido', 
Edad='$edad', Celular='$celular' WHERE id=$id";
$resultado=mysqli_query($con, $solicitud);
header("location: cuatro.php")

 ?>