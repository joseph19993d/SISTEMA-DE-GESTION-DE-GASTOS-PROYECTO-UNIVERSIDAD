<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../estilos/formularios.css">
    <title>Foto</title>
    
</head>
<body>
<center>
    <form action="../../../../controladores/Foto.php" method="POST" enctype="multipart/form-data" target="_blank" >
    <a href="../../../sesion/bienvenida.php" id="botonC" > Regresar   </a> 
  
    <h1> FOTO DE PERFIL </h1>
    <p>
    <lebel for="file"> Inserte imagen : </label>
    <input type="file" name="imagen"   id="imagen">

    <p>
    <input type="submit" name="a" value="Ingresar" id= boton > 
    
    <p>
    <a href='mostrar.php' id= boton> </h2> GALERIA DE PERFIL </h2> </a>
    </form>
</center>

</body>
</html>