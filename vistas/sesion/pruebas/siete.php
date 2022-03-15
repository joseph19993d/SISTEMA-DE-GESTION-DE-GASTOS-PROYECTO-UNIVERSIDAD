<?php 
include ('conexion.php');
$id = $_GET['id'];
$solicitud = "SELECT * FROM datos WHERE ID=$id ";
$resultado = mysqli_query($con, $solicitud);




 ?>
 <form method="POST" action="ocho.php">
 	<?php 
 	while ( $fila = mysqli_fetch_array($resultado)) {
 		
 		
 	
 	 ?>
 	 Nombre: <input type="text" name="nombre" 
 	 value= " <?php  echo($fila['Nombre']); ?>"> <br>
 	 Apellido: <input type="text" name="apellido" 
 	 value= " <?php  echo($fila['Apellido']); ?>"> <br>
 	 Edad: <input type="text" name="edad" 
 	 value= " <?php  echo($fila['Edad']); ?>"> <br>
 	 Celular: <input type="text" name="celular" 
 	 value= " <?php  echo($fila['Celular']); ?>"> <br>
 	 <input type="hidden" name="id" 
 	 value= " <?php  echo($id); ?>">

 	<?php } ?>
 	<input type="submit" name="ENVIAR" value="CAMBIAR">


 </form>


