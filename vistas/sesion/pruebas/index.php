


<?php 

/*
include("conexion.php");
$solicitud = "CREATE TABLE datos (ID int NOT NULL AUTO_INCREMENT, Nombre varchar(15), Apellido varchar(15), Edad int, Celular int, PRIMARY KEY (ID))";

$resultado= mysqli_query($con,$solicitud);


/*
$hola = 123;		$perros = "holi"; $que = "cachon"; $miranx = "cachonsito "; $cares = "joseph"; $de = "matematicas"; $ano = 10.2e3 ;
echo "<p>------------------------------------------------------<p>";
*/
include_once "modelofoto.php";
?>



<!DOCTYPE html>
<html>

<head >
	<title>
	</title>



<p><p><p>
</head>
<body>
   

    <li >
	<a href="">Inicio</a>
	<a href="">Sobre esta app</a>
	<a href="">Servicios </a>
	<a href="">Nosotros</a>
    </li>

<?php   ?>

<!-- <img src= "insert the url">  -->
<!--  Utilizaremos los metodos en el modelo foto que requerimos anteriormente como si fuera un dato normal -->

<form action="controladordefoto.php" method="post" enctype="multipart/form-data" >
<br />
<label> ingrese la su foto de perfil  </label>
<input type="file" name="imagen" required >
<input type="submit" name="foto" Value="descargar" >


</form>



<form  method="POST" action="uno.php" >

	Nombre de usuario: <input type="txt" name="us">
	<p>
	Contraseña: <input type="txt" name="co" >
	<p>
	<input type="submit" name="enviar">	

</form>




<!-- <a href="/Practicando/dos.php"><input type="button" value="ir a dos 2"></a> -->
<form method="POST" action="/Practicando/dos.php">
	<input type="submit" name ="x" value="ir a dos 2 "></a>
</form>
 <h4> Datos para el tres  </h4>
 	<form  method="POST" action="tres.php">
	<p>
     Nombre: <input type="txt" name="nombre">
     <p>
     Apellido: <input type="txt" name="apellido">
     <p>
     Edad: <input type="txt" name="edad">
     <p>
     Celular: <input type="txt" name="celular">
     <p>
	<input type="submit" name="enviar">	
	
</form>

</body>

</html>



<?php
/*
echo "<p>------------------------------------------------------<p>";
echo "<p>------------------------------------------------------<p>";

echo $hola." ". $perros." ". $que ." ".$miranx ." ".$cares ." ".$de ."  ". $ano;

echo "<p> ---------------------------------------------------- <p>";

if ($hola==123 && $que== "cachon") {
	# code... Y, todos dos
	echo " y <p>";
	echo $hola." ".$que."<p>" ; 
}if ($hola== 123 || $que == "cachon"  )  {
	# code... uno de los dos o los dos
	echo " o <p>"; 
	echo $hola." ".$que."<p>" ;
}if ( $hola==123 xor $que== "ca") {
	# code... uno de los dos pero no los dos
	echo " zor <p>"; 
	echo $hola." ".$que."<p>";
}

echo "----------------------------------------------------------<p>";

if (isset($hola) ) {
	# code...
	echo " Si existe ";

    if (empty($hola)) {
    	# code...
    	echo "Esta vacion";
    } else {

    	echo "No esta vacio";
    }

}else {
	# code...

	echo "no existe ";
}


echo "<p>------------------------------------------------------<p>";

$hola="";
if (isset($hola) ) {
	# code...
	echo " Si existe ";

    if (empty($hola)) {
    	# code...
    	echo "Esta vacion";
    } else {

    	echo "No esta vacio";
    }

}else {
	# code...

	echo "no existe ";
}

$hola=123;
echo "<p>-----------------------------------------------------<p>";

if (is_integer($hola)) {
	# code...
 echo "Es int-";
 echo $hola;
}else{ 
echo "No es int-";
 echo $hola;
}

echo "<p>-----------------------------------------------------<p>";

switch ( $hola) {
	case 123:
		# code...
	echo $hola;
		break;
	
	default:
		# code...
	echo "no es 123 ni ningun caso ";
		break;
}
 echo "<p>----------------------------------------------------<p>";
 $a= 3;
 while ( $a<= 5) {
 	# code...
 	echo "".$a;
 	echo "<p>";
 	$a=$a+1;

 }
 echo "<p>----------------------------------------------------<p>";
 do{

 	echo "".$a."<p>";
 	$a++;
 }while ( $a<= 7);

echo "<p>-----------------------------------------------------<p>";
 $ar = array("1","2","3","4","5");
 echo $ar[0];
 echo "<p>------------------<p>";
foreach ($ar as $in =>  $nu) {
	# code...
	echo $in."<-indice-"."nueva->".$nu."<br>";

}

foreach ($ar as $value) {
	# code...
	echo $value;
	echo "<p>";
}

echo "<p>----------------------------------------------------<p>";
*/
echo "--------------------------Fin de pagina-------------------------- <p>";
echo " fin 2 <p>";
$hola= 2;
foreach (  Fotos::optenerDatosTotal() as $fila ) {
	# code...
}

if ( isset($fila[0])== true ){

if (empty($fila[0])== false ){



} else{ echo "hola putos 1";}

}else{ echo "hola putos 2"; $hola=1;}

?>


<h1>  Fin html </h1>
