
<!DOCTYPE html>
<html>
<head>
<title>Crear Usuario sala </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- INICIO Estilos necesarios (que se vea bonito :v ) -->
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">
<link rel="stylesheet" href="jquery-mobile.css">
<script src="jquery-mobile.js"></script>
<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" />
<!-- FIN Estilos necesarios (que se vea bonito :v ) -->
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
<script type="text/javascript" src="js/livevalidation_standalone.compressed.js"></script>
<!-- archivos necesarios para la validacion  -->
<link rel="stylesheet" href="css/screen.css" /> 
<script src="http://code.jquery.com/jquery-2.0.3.js"></script>
<script src="jquery.validate.js"></script>
<!-- pagina para entender la validacion:
http://jquery-manual.blogspot.com/2014/05/validar-formularios-con-jquery-validate.html
 -->
<!-- fin de archivos necesarios para validacion -->
</head>
<body>
<!-------------- inicio de pagina "page" ----------->
<div data-role="page"  data-theme="a">
<!-------------- Pagina header ----------->
<div data-role="header">
<h1> Crear sala </h1>
<h1> . </h1>
<a  class="ui-btn ui-icon-home ui-btn-icon-top ui-corner-all"  href="../index.php"> Inicio</a>
</div>

<!--------------  Pagina main content ----------->
<div data-role="main" class="ui-content"   >
<h2>llenar datos:  </h2> </div>

<!-- ---------------------------------------INICIO DE CAMPOS label & input ------------------------------------->

<form action="../../controladores/AdministradorSala.php" method="post">
<label for="Nombre">Nombre : <span>*</span></label>
<input type="text" name="nombre" id="Nombre" placeholder="persona" minlength="4"  maxlength="25"    class="required"  >
<label for="celular">celular: <span>*</span></label>
<input type="number" id="celular" name="celular"  maxlength="25" placeholder="rode@gmail.com"  class="required" />
<label for="correo">correo: <span>*</span></label>
<input type="Email" id="correo" name="correo"  maxlength="25" placeholder="rode@gmail.com"  class="required" />
<label for="contraseña" > Contraseña: <span>*</span> </label>
<input type="password" id="d" name="contraseña"   placeholder="*******" minlength="7" maxlength="25" required/>

<input name="a" type="submit" value="Crear" />
</form>
<!-- ---------------------------------------FIN DE CAMPOS label & input ------------------------------------->
<!-------------- fin Pagina main content ----------->

<div data-role="footer" data-position="fixed" style="text-decoration: inet_ntop;"  > 
<th width ="15px"> <form action="https://www.facebook.com/joseph.rodelosuarez" method="post"> <input  width="15px"   type="submit" value=" @josph_Rodelo " />
</div>

</body>
</html>