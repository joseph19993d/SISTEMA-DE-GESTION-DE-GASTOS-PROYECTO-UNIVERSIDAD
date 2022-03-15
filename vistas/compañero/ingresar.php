<?php 


session_start();
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{
 
 $nombre2=$_SESSION['NOMBRE'];
 $correo=$_SESSION['CORREO'];
 $rol=$_SESSION['ROL'];
 $salaA=$_SESSION['SALA']?? '4';
}else{ 
header('location:../sesion/bienvenida.php ');

  }

$salaA=$_SESSION['SALA'];
$nombre= $_GET['nombre'];
require_once '../../modelos/Administrador.php';
require_once '../../modelos/compañero.php';
require_once '../../modelos/invitado.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php // include '../mejoras/mobil.php';  ?>
<link rel="stylesheet" type="text/css" href="../estilos/formularios.css">
<!-- archivos necesarios para la validacion  -->
<link rel="stylesheet" href="css/screen.css" /> 
<script src="http://code.jquery.com/jquery-2.0.3.js"></script>
<script src="jquery.validate.js"></script>
<!-- pagina para entender la validacion:
http://jquery-manual.blogspot.com/2014/05/validar-formularios-con-jquery-validate.html
 -->
<!-- fin de archivos necesarios para validacion -->
	<title>USUARIO</title>
</head>
<body>
	<header>
	</header>

<!--------------------------------------------INICIO  DE CAMPOS label & input  -------------------------------------------------------->
	<form action="../../controladores/compañeros.php"  method="post" target="_blank">
	<center>
	<a href="index.php" id=boton> Regresar </a> 
	<h2 aling="center">INGRESAR  <?= $nombre; ?> </h2>
	</center>


<label for="Nombre">Nombre : <span>*</span></label>
<input type="text" name="nombre" id="Nombre" placeholder="persona" minlength="4"  maxlength="25"    class="required" >
<P>

<label for="celular">celular: <span>*</span></label>
<input type="number" id="celular" name="celular"  maxlength="25" placeholder="rode@gmail.com"  class="required" />
<P>

<label for="correo">correo: <span>*</span></label>
<input type="Email" id="correo" name="correo"  maxlength="25" placeholder="rode@gmail.com"  class="required" />
<P>

<label for="contraseña" > Contraseña: <span>*</span> </label>
<input type="password" id="d" name="contraseña"   placeholder="*******" minlength="7" maxlength="25" required/>
<input name="a" type="submit" value="Ingresar" id="boton" />
	</form>
<!--------------------------------------------- FIN  DE CAMPOS label & input  ---------------------------------------------------------->
		
	
</body>
</html>