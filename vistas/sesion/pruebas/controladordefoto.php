<?php
include_once "modelofoto.php";
  if (isset($_REQUEST['foto'])== true) {
      echo 'Si llega como foto';
      # code...
      echo "<br>";
        echo "paso prueba 1 <br>";
      

  }else{ echo"no llega como foto"; echo "<p>";}
  $accion = $_POST['foto'] ?? $_GET['foto'] ??  $_REQUEST ['foto'] ??'';

    if ($accion== !NULL) {
        echo "<br>";
        echo "paso prueba 2 <br>";
        if($accion== !NULL){
        echo "<br>";
        echo "si  funciono 2.5 <br>";

        if (($_FILES["imagen"]["type"] == "image/gif")
        || ($_FILES["imagen"]["type"] == "image/jpeg")
        || ($_FILES["imagen"]["type"] == "image/jpg")
        || ($_FILES["imagen"]["type"] == "image/png"))
        { 
        echo "<br>";
        echo "paso prueba 3 <br>";  
            $archivo = $_FILES['imagen']['tmp_name'];
            echo "paso prueba 3.1 <br>";  
            $dataTime = date("Y-m-d H:i:s");
            echo "paso prueba 3.2 <br>";  
            $carreo= "hola@gmail.com";
            echo "paso prueba 3.3 <br>"; 
            $insert= new Foto(); 
            $insert-> cargarFoto($correo, $archivo, $dataTime);
            echo "paso prueba 3.4 <br>";  
            if($insert){
                echo "Finalizado.";
               // header('location: ../vistas/administrador/index.php');
                echo "<br>";
                echo "paso prueba 4 <br>";
                
            }else{
                
                echo "La carga de el archivo fallo, please try again.";
            } 
        }
     }else{ echo "su archivo esta malo";}
    }else{
        echo "Por favor, selecione una imagen para cargar";
        echo $_POST['foto'];
    }

?>