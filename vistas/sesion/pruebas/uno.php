<?php
//  buscamos en la base de datos segun el usuario, luego si los encuntra , crea las variables us y pa
$usu ="jo";
$pasw= "pas";
$x= false;
/*
if ( isset($_POST['us'])  ) {
//	echo "existe <p>";
//	echo "-->".$_POST['us'] ;
	
}elseif (empty( $_POST['us']) == false) {
	# code...
//	echo " no esta vacia ";
//	echo "-->".$_POST['us'] ;
} else {
	echo "ninguno de los dos <p> ";
	header('location: index.php');
}
*/
if (isset($_POST['us'])  ) {
	# code...
} else{
echo "ninguno de los dos <p> "; 
header('location: index.php');
}
if ( $usu == $_POST['us']  &&  $_POST['co']==$pasw ) {
	# code...
	session_start(); 
	// optenemos los datb v{lpnb -' mos nombre y pais (con el mismo usuario) , y cramos las variavles corespondientes nom, pais de la db;
	$nom="joseph Blader";
	$pais="Colombia";
	$nomb="Rodelo Suarez";

	$_SESSION['nombre']= $nom ;
	$_SESSION['pais']=$pais;
    $_SESSION['apellido']=$nomb;

    header('location: dos.php');

}else{
//echo "<p> usted ingreso=> ". "<p> Usuario:".$_POST['us']."<p> Contraseña:".$_POST['co'] ;
if ($_POST['us'] == $usu) {	 //se supone que aqui miremos si el usuario existe 
	echo "Contraseña incorrecta para el usuario: ".$_POST['us']."<p>";
}elseif(($_POST['us'] ) !== "" ) {echo "Usuario  '".$_POST['us']."' no valido <p>";
}else{ echo("Usted no ingreso un usuario<p>"); }
?>
    <form  method="POST" action="uno.php">
	Nombre de usuario: <input type="txt" name="us">
	<p>
	Contraseña: <input type="txt" name="co" >
    <p>
	<input type="submit" name="enviar">
	<a href="index.php"> <input type="button" name="e"  value="ir inicio" ></a>
<?php  
}

?>



