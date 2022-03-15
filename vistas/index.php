
<?php
session_start();
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{
 

 if ($_SESSION['ROL']= 'administrador' || $_SESSION['ROL']= 'compañero' ||$_SESSION['ROL']= 'usuario') {
   # code...
   header('location:sesion/bienvenida.php ');


 }
 

}
 ?>


<!DOCTYPE html>
<html>

<head>
<title> Logeo </title>
<link rel="stylesheet" type="text/css" href="estilos/indexPrincipal.css">

<!--
  FIN DE ESTILOS
-->  

</head>
<body >

<!-------------- inicio de pagina "page" ----------->

<div data-role="page" >
<!-------------- Pagina header ----------->
<center> <h1 id="MWelcome"> Home </h1>  </center>
<div data-role="header" id="Opciones">

<h1>  </h1>


<div id="">
<!--------------  Pagina main content ----------->

<div data-role="main" class="ui-content" class="clse-sonico" >

<div id="Opciones" > <h2 >Iniciar sesion como:  </h2> 


<!-- OPCIONES --------------------------- -->

      <p> 
      <a href="sesion/iniciar.php" class="ui-btn ui-icon-arraw-r ui-btn-icon-top " id="boton2">Administrador</a>
      <p>
      <a href="sesion/iniciar2.php" class="ui-btn ui-icon-arraw-r ui-btn-icon-top" id="boton2">Usuario</a>
</div>
<p></p>
<div id="Opciones"> <h2 > Crear:  </h2> 

      <p> </p>
      <a href="../vistas/sala/ingresar.php" class="ui-btn ui-icon-arraw-r ui-btn-icon-top"  class="buton"id="boton"> Sala</a>

</div>
<!--FIN OPCIONES ------------------------ -->



</form>
</div>
</div>


</body>
</html>
