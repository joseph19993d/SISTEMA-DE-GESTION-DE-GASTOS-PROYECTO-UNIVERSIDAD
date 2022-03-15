<?php $correo = $_GET["varCorreo"]; ?>

<!DOCTYPE html>
<html>
<head>
<title>A & S </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../estilos/formularios.css" >

</head>
<body>
<!-------------- inicio de pagina "page" ----------->
<div data-role="page"  data-theme="a">
<!-------------- Pagina header ----------->
<div data-role="header">
</div>
<!--------------  Pagina main content ----------->
<div data-role="main" class="ui-content"   >

</div>
<form action="../../controladores/AdministradorSala.php" method="post">
<center>
<h1> CREAR SALA </h1>
</center>
<h2 style="color:aliceblue">llenar datos:  </h2> 

<label for="Nombre">Nombre : <span>*</span></label>
<input type="text" name="nombre" id="Nombre" placeholder="persona" minlength="4"  maxlength="25"    class="required"  >
<p>

<label for="celular">celular: <span>*</span></label>
<input type="number" id="celular" name="celular"  maxlength="25" placeholder="3007111576"  class="required" />
<p>

<!-- <label for="correo">correo: <span>*</span></label> -->
<input type="hidden" id="correo" name="correo"   value=" <?= $correo ?>"  />

<label for="contraseña" > Contraseña: <span>*</span> </label>
<input type="password" id="d" name="contraseña"   placeholder="*******" minlength="7" maxlength="25" required/>



<input name="a" type="submit" value="Crear" id=boton />
<!-- FIN  DE CAMPOS label & input   -->
<p>
<center><a  class="ui-btn ui-icon-home ui-btn-icon-top ui-corner-all"  href="../sesion/bienvenida.php" class="btn" id=boton> INICIO  </a></center>

</form>
<!-------------- fin Pagina main content ----------->

<div data-role="footer" data-position="fixed" style="text-decoration: inet_ntop;"  > 
<!--
<th width ="15px">  <form action="https://www.facebook.com/joseph.rodelosuarez? var= joseph" method="post"> <input  width="15px"   type="submit" value=" @josph_Rodelo " />
-->
</div>

</body>
</html>