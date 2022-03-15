
<!DOCTYPE html>
<html>

<head>
<titl>Usuario iniciar sesion</title>



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
<h1> Usuario iniciar  </h1>
<a  class="ui-btn ui-icon-home ui-btn-icon-top ui-corner-all"  href="../index.php"> Inicio</a>

<!--------------  Pagina main content ----------->
<div data-role="main" class="ui-content"   >

<div> <h2 >Iniciar sesion  </h2> </div>
<form method="post" action="../sesion/iniciar.php" data-ajax="True">
<!-- INICIO  DE CAMPOS label & input   -->


<label for="email">Email: <span>*</span></label>
<input type="email" id="email" name="email"  maxlength="25" placeholder="Email"  class="required" />

<label for="d" > Contraseña: <span>*</span> </label>
<input type="password" id="d" name="password"   placeholder="contraseña" minlength="7" maxlength="25" required/>


<!-- FIN  DE CAMPOS label & input   -->


<input type="submit" value="Validar" data-theme="b"  >
</form>
</div>


</body>
</html>