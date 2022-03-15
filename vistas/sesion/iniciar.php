
<?php // require_once '../../modelos/Administrador.php';

session_start();
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{
 

 if ($_SESSION['ROL']= 'administrador' || $_SESSION['ROL']= 'compañero') {
   # code...
   header('location:bienvenida.php ');
   //header('location:../sesio/bienvenida.php ');
 }
}

?>


<!DOCTYPE html>
<html>

<head>
<title>Administrador/iniciar sesion </title>
     
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../estilos/formularios.css">


</head>
<body>
<?// include '../mejoras/mobil.php'; ?>
<!-------------- inicio de pagina "page" ----------->
<ul>
<li>
<a  class="ui-btn ui-icon-home ui-btn-icon-top ui-corner-all"  href="../index.php" id="boton2"> Inicio</a>
</ul>
</li>

<!-------------- Pagina header ----------->




<!--------------  Pagina main content ----------->


<div> <h1 >Iniciar sesion  </h1> 


<form method="post" action="comprobacion.php" id="Opciones" >
<!-- INICIO  DE CAMPOS label & input   -->
<label for="email">Email: <span> </span></label>
<p>
<input type="email" id="email" name="correo"  maxlength="35" placeholder="Email@correo.com"  class="required" />
<p>
<label for="d" > Contraseña: <span> </span> </label>
<p>
<input type="password" id="d" name="contraseña"   placeholder="*********" minlength="7" maxlength="25" required/>

<!-- FIN  DE CAMPOS label & input   -->
<p>
<input type="submit" name="a" value="iniciar_A"  id="boton"  >
</form>

</div>


</body>
</html>