<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de sesion</title>
    <link rel="stylesheet" type="text/css" href="../estilos/mostrar.css">

</head>
<body>
<center>
<a  class="ui-btn ui-icon-home ui-btn-icon-top ui-corner-all"  href="../index.php" id="boton"> Regresar <a>


<contenedor0>
<h3>
    Si su usuario es inecxistente seguramente se deba a que el admitrador no ha crado un usuario para usted con el correo ingresado o que la contraseña no sea corecta 
    por favor contacte a el administrador 
</h>
</center>
<?php
echo '<script language="javascript">alert("USUARIO INEXISTENTE");</script>';
?>
</body>
</html>