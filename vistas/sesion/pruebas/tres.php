<?php 

include("conexion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$celular = $_POST['celular'];

$solicitud = "INSERT INTO datos (Nombre, Apellido, Edad, Celular) VALUES ('$nombre', '$apellido', '$edad', '$celular')";

$resultado = mysqli_query($con, $solicitud);
header ("location: index.php");

 ?>