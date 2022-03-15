<?php 
	  session_start();
if ( isset($_SESSION['nombre'])== true && empty($_SESSION['nombre'])== false 
	&& 
	isset($_SESSION['pais'])== true && empty($_SESSION['pais']) == false 
	&&
	isset($_SESSION['nombre'])== true && empty($_SESSION['apellido']) == false  )
{
	# code...

   $nombredos= $_SESSION['nombre'];
   $paisdos= $_SESSION['pais'];
   $nombdos=  $_SESSION['apellido'];

  echo 'Bienvenido '.$nombredos .'<p> Tu pais es: '.$paisdos. '<p> Tu apellido es: '.$nombdos.'<p>';


 ?>
     <a href="index.php"> 
	 <input type="button" name="h"  value=" ir a inicio" ></a>
     <form  method="POST" action="exit.php">
	 <input type="submit" name='ds'  value="cerrar sesion" >
	 </form>
<?php  
} else { 
    if (isset($_POST['x'])) {

    	echo "No ha iniciado sesion...<p>";
    	?>
    	 <a href="index.php"> <input type="button" name="h"  value=" ir a inicio" ></a>

    	<?php

	
    }else{ header('location: index.php');}

	 }
?>
