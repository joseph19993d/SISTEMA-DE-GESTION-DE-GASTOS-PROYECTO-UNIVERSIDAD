<?php 
include('conexion.php');


$solicitud= "SELECT * FROM datos ORDER BY Edad ASC ";//DESC
$resultado= mysqli_query($con, $solicitud);
echo "<table border=1> <tr> <td>Nombre y apellido</td> <td>Edad</td> <td>Celular</td> <td colspan=2 > ACCIONES </td> </tr> ";
while ( $fila = mysqli_fetch_array($resultado) ) {
	
    echo "<tr>";
	echo "<td>". $fila['Nombre']." ". $fila['Apellido']."</td>"; 
	echo "<td>". $fila['Edad']."</td>";
	echo "<td>". $fila['Celular']."</td>";
	echo "<td> <a href='seis.php?id=".$fila['ID']."'> Eliminar </a> </td>" ;
	echo "<td> <a href='siete.php?id=".$fila['ID']."'> Editar </a> </td>" ;

	echo "</tr>";

}
echo "</table>";
 ?>