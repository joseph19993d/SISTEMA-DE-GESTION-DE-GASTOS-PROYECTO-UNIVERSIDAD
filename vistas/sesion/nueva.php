<?$lista= Compañero::OptenerDatosSesion2($correo); ?>

<!DOCTYPE html>
	<html lang="en">
	<head>
 
    <meta charset="utf-8">
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

		<title>Bienvenida</title>

        </div>

	</head>
	<body>


       
<div data-role="main" class="ui-conthem">
<div data-role="header"><h1 >Bienvenido <?=$nombre?> </h1>
.
<!--inicio opciones verticales -->
<div data-role="controlgroup" data-type="horizontal">
    
      <a href="../administrador/index.php" class="ui-btn ui-icon-search ui-btn-icon-top">Administrador</a>
      <a href="../compañero/index.php" class="ui-btn ui-icon-search ui-btn-icon-top">Usuario</a> <!---->
      <a href="../invitados/index.php" class="ui-btn ui-icon-search ui-btn-icon-top">Invitado</a>
      <a href="../gastos/index.php" class="ui-btn ui-icon-search ui-btn-icon-top">Gasto</a>
      <a href="../roles/index.php" class="ui-btn ui-icon-search ui-btn-icon-top">Rol</a> 
      <a href="../sala/index.php" class="ui-btn ui-icon-search ui-btn-icon-top">sala</a>

    </div>

<!--FIN OPCIONES verticales -->
<!--INICIO OPCIONES principales -->
<a  class="ui-btn ui-icon-home ui-btn-icon-top ui-corner-all"  href=" ../../index.php "> Inicio</a>
<a  class="ui-btn ui-icon-lock ui-btn-icon-top ui-corner-all" href = "cerrar.php" >Cerra sesion</a>
<!--FIN OPCIONES principales-->


</div>


<? if($rol='administrador'){ ?>
    <div data-role="main" class="ui-content">
    <div data-role="collapsible">
    <h1>Mis datos:</h1>
   

         <div data-role="collapsible">
         <h1>Nombre </h1>
         <p><?= $nombre; ?></p>
         </div>
         <div data-role="collapsible">
         <h1>Numero de celular </h1>
         <p><?= $lista['numero_celular'] ?></p>
         </div>
         <div data-role="collapsible">
         <h1>Correo </h1>
         <p><?=$correo ?></p>
         </div>
         <div data-role="collapsible">
         <h1>Rol </h1>
         <p><?=$rol; ?></p>
         </div>
     
    </div>
</div>

<?}elseif($rol='compañero'){?>
    <div data-role="main" class="ui-content">
    <div data-role="collapsible">
    <h1>Mis datos:</h1>
   

         <div data-role="collapsible">
         <h1>Nombre </h1>
         <p><?= $nombre; ?></p>
         </div>
         <div data-role="collapsible">
         <h1>Numero de celular </h1>
         <p><?= $lista['numero_celular'] ?></p>
         </div>
         <div data-role="collapsible">
         <h1>Correo </h1>
         <p><?=$correo ?></p>
         </div>
         <div data-role="collapsible">
         <h1>Rol </h1>
         <p><?=$rol; ?></p>
         </div>
<?}?>   

       



</div>
		
	</body>
	</html>