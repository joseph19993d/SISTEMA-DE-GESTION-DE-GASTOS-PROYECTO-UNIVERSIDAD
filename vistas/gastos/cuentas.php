<?php
$total=0;
// INICIO COMPROBACION DE SESSION
session_start();
if ( 
	isset($_SESSION['CORREO'])== true && empty($_SESSION['CORREO']) == false )
{
 
 $nombre2=$_SESSION['NOMBRE'];
 $correo=$_SESSION['CORREO'];
 $rol=$_SESSION['ROL'];
 $salaA=$_SESSION['SALA'];
}else{ 
header('location:../sesion/bienvenida.php ');

  }
// FIN COMPROBACION DE SESSION

$nombre="GASTO";

	//code...


require_once '../../modelos/Gasto.php';
require_once '../../modelos/invitado.php'; 
//require_once '../../modelos/Rol.php' 
?>

<!DOCTYPE html>
<html lang="en">
<?php
?>
<head>
	<title>Cuentas</title>
	<?php // include '../mejoras/mobil.php';  ?>
    <link rel="stylesheet" type="text/css" href="../estilos/cuentas.css">
    

</head>
<body>
<?php
 // ________________________________________________COMIENZO DE TABLA DE GATOS PROPIOS ___________________________________________
$personaNombre= $_GET['nombre']?? $_POST['nombre']?? '' ;


$CDG=0;//cantidad de gastos
$T=0;  //total $ de gasto
$C=""; //correo
$NDG="";//Nombre de gasto
$X=1; //contador
$TP=0;   //total pagado
$TPP=0;   //Total Por Pagar
$GP=""; //gastos pagados
$GSP=""; //gastos sin pagar 
$TPPI=0;   //Total Por pagar de invitados 
foreach (Gasto::listar($salaA) as $fila ) {
                   /* En caso d que algo falle ejecutar esto para comprobaciones
                   echo count($fila);
                   $X++;
                   echo $X;
                   echo$fila[2];
                   echo $personaNombre."<p>";
                   */
                    if ($fila[2]==$personaNombre  || $fila[2]==$personaNombre." " ) { // si el nombre de la persona  corresponde con el nombre de la persona hace: 
                        //echo$fila[2];
                        if ($C == "") {
                            # code...
                            $C = $fila[0];   //guarda el correo principal
                        }
                    $CDG= $CDG+1; 
                    $T= $T+$fila[3]; 
                    $NDG= $NDG."\n".$fila[4].",\n "; //Nombre de gasto
                        if ($fila[5]=="Pagado") {
                        $TP=$TP+$fila[3];
                        $GP=$GP."\n".$fila[4].",\n"; 
                        }else{ 
                        $TPP=$TPP+$fila[3]; 
                        $GSP=$GSP."\n".$fila[4].",\n";
                        }
                        
                        
//Posicion de datos = correo_creador,fecha_creacion,nombre_responsable,total,nombre_gasto,tipo_gasto,decripcion,id
                    }
            }

            
 ?> 
<div>

<div id="contenedor1">
<center><a class="ui-btn" href="index.php" data-position="center"  width="60px"  id="botonC"  >REGRESAR </a> <center>
<h1  > <?=$nombre ?>S DE (<?= $personaNombre  ?>) </h1>

<div id="opciones3">

	<a class="ui-btn" href="ingresar.php?nombre= <?=$nombre ?>" data-position="center"   width="60px"  id="boton"  >INGRESAR NUEVO <?=$nombre ?></a>
    <a class="ui-btn" href="historial.php?nombre= <?=$nombre ?>" data-position="center"  width="60px"  id="boton"  >IR A HISTORIAL </a>
    
</div>

<table border="2"  >
			<thead>
                <tr>


                    <th data-priority="0">  n°  </th>
                    <th data-priority="1">  Correo  </th>
                    <th data-priority="2">  Nombre </th>
                    <th data-priority="3">  Cantidad de Gastos</th>
                    <th data-priority="4">  Total.$</th>
                    <th data-priority="5">  Pagado.$ </th>
                    <th data-priority="6">  Por pagar.$ </th>
                    <th data-priority="7">  Gastos </th>
                    <th data-priority="8">  Gastos Pagados </th>
                    <th data-priority="9">  Gastos sin pagar </th>

                    
                </tr>
            </thead>

			
            <tbody>
                <tr>
                    <td><?= $X;?> </td> <? $X= $X+1; ?>
					<td><?= $C; ?></td>
                    <td><?= $personaNombre; ?></td>
					<td><?= $CDG; ?></td>
                    <td><?= $T; ?></td>
                    <td><?= $TP;?></td>
                    <td><?= $TPP;?></td>

                    <td><?= $NDG; ?></td>
                    <td><?= $GP; ?></td>
                    <td><?= $GSP; ?></td>
                   
                    
                </tr>
			</tbody>
            
	</table>
    <?php

 // ________________________________________________FIN DE TABLA DE GATOS PROPIOS ___________________________________________

 // ________________________________________________INICIO DE LINK DE GASTOS PROPIOS ___________________________________________

?>
    <center>

    <h3>Ver gastos: </h3>
    <?php foreach (Gasto::listar($salaA) as $fila ) {
     if ($fila[2]== $personaNombre ) {  $fila4= $fila[4]; ?> 
      

      <a href="ver.php?nombre=<?=$nombre ?>&id=<?=base64_encode($fila[7])?>"   class="ui-btn" width="60px"  id="boton" > <?= $fila4; ?></a>
    <?php }} ?>
    </center>
<?php
// ________________________________________________FIN DE LINKS DE GASTOS PROPIOS ___________________________________________

// ________________________________INICIO DE TABLA DE GATOS DE INVITADOS BAJO RESPONSABILIDAD _______________________________



?>
     </p>
    <label> Invitados bajo su resonsabilidad  </label>


<?php
// inicio variables para segunda tabla 
// añadiremos los gastos de los invitados que esten igualmente registrados con el nombre del responsable ?   

$CDG=0;//cantidad de gastos
$T=0;  //total $ de gastos
$C=""; //correo
$NDG="";//Nombre de gasto
$X=1; //contador
$TP=0;   //total pagado
$TPP=0;   //Total Por Pagar
$GP=""; //gastos pagados
$GSP=""; //gastos sin pagar 
//listar invitados donde nombre_responsable sea iguala  personaNombre=nombre de la persona que estamos buscando 
//fin variables para segunda tabla 
?>
<?php

// INICIO DE PROCEDIMIENTOS PARA CALCULAR DATOS DE INVITADOS 

//metodo de busueda de invitados a los que la persona se hace responsable 
foreach  (Invitado::listarCorrespondiente($salaA,"nombrePersona" ) as $filaI ){
    
    if($filaI[4]== $personaNombre || $filaI[4]== $personaNombre." " ){

    
    
    
    ?>
    <script type="text/javascript">
    console.log( "<?php echo "Id = ". $filaI[0]; ?>" );
    console.log( "<?php echo "Sala = ". $filaI[1]; ?>" );
    console.log( "<?php echo "Nombre responsable = ". $filaI[4]; ?>" );
    console.log( "<?php echo "Nombre = ". $filaI[5]; ?>" );
    console.log( "<?php echo "Nombre creador = ". $filaI[6]; ?>" );
    </script>

    

<?php 

$NombreInvitado =$filaI[5];
                        ?>
                        <script>
                            console.log(  "<?php echo "Recolectando datos de ". $NombreInvitado; ?>");
                        </script>
                        <?php

//buca en los gastos los invitados que el metodo anterior le pasa ("metodo de busueda de invitados a los que la persona se hace responsable")
foreach (Gasto::listar($salaA) as $fila ) { 
                   /* En caso d que algo falle ejecutar esto para comprobaciones
                   echo count($fila);
                   $X++;
                   echo $X;
                   echo$fila[2];
                   echo $personaNombre."<p>";
                   */
                    if ($fila[2]==$NombreInvitado ) { // si el el nombre de la persona  corresponde con el nombre de la persona hace: 
                        //echo$fila[2];
                       
                            
                        if ($C == "") {
                            # code...
                            $C = $fila[0];   //guarda el correo principal
                        }
                    $CDG= $CDG+1; 
                    $T= $T+$fila[3]; 
                    $NDG= $NDG."\n".$fila[4].",\n "; //Nombre de gasto
                        if ($fila[5]=="Pagado") {
                        $TP=$TP+$fila[3];
                        $GP=$GP."\n".$fila[4].",\n"; 
                        }else{ 
                        $TPP=$TPP+$fila[3]; 
                        $GSP=$GSP."\n".$fila[4].",\n";
                        $TPPI= $TPPI+$TPP;
                    }}}
                    ?>
                    <script>
                        console.log( $TPPI);
                    </script>
                    <?php
                        
                        
//Posicion de datos = correo_creador,fecha_creacion,nombre_responsable,total,nombre_gasto,tipo_gasto,decripcion,id
                    
// FIN DE PROCEDIMIENTOS PARA CALCULAR DATOS DE INVITADOS 

//INICIO DE ESTRUCTURA DE TABLA 
?>



<table border="2"  >
			<thead>
                <tr>


                    <th data-priority="0">  n°  </th>
                    <th data-priority="1">  Correo  </th>
                    <th data-priority="2">  Nombre </th>
                    <th data-priority="3">  Cantidad de Gastos</th>
                    <th data-priority="4">  Total.$</th>
                    <th data-priority="5">  Pagado.$ </th>
                    <th data-priority="6">  Por pagar.$ </th>
                    <th data-priority="7">  Gastos </th>
                    <th data-priority="8">  Gastos Pagados </th>
                    <th data-priority="9">  Gastos sin pagar </th>

                    
                </tr>
            </thead>

			
            <tbody>
                <tr>
                    <td><?= $X;?> </td> <? $X= $X+1; ?>
					<td><?= $C; ?></td>
                    <td><?= $NombreInvitado; ?></td>
					<td><?= $CDG; ?></td>
                    <td><?= $T; ?></td>
                    <td><?= $TP;?></td>
                    <td><?= $TPP;?></td> 

                    <td><?= $NDG; ?></td>
                    <td><?= $GP; ?></td>
                    <td><?= $GSP; ?></td>
                   
                    
                </tr>
			</tbody>
            
	</table>


    


<?php

// FIN DE ESTRUCTURA DE TABLA 
// ________________________________INICIO DE LINKS DE GASTOS DE INVITADO BAJO RESPONSABILIDAD _______________________________ 

?>

<center>

<h3>Ver gastos: </h3>
<?php foreach (Gasto::listar($salaA) as $fila ) {
 if ($fila[2]== $NombreInvitado ) {  $gastoN= $fila[4]; ?> 
  <a href="ver.php?nombre=<?=$nombre ?>&id=<?=base64_encode($fila[7])?>"   class="ui-btn" width="60px"  id="boton" > <?= $gastoN; ?></a>
<?php }} ?>
</center>	
<?php

// ________________________________FIN DE LINKS DE GASTOS DE INVITADO BAJO RESPONSABILIDAD _______________________________ 



$CDG=0;//cantidad de gastos
$T=0;  //total $ de gastos
$C=""; //correo
$NDG="";//Nombre de gasto
$X=1; //contador
$TP=0;   //total pagado
$TPP=0;   //Total Por Pagar
$GP=""; //gastos pagados
$GSP=""; //gastos sin pagar 




}
}



// ________________________________FIN DE TABLA DE GATOS INVITADOS BAJO RESPONSABILIDAD _______________________________ 


 // include '../mejoras/piesera.php'; //incluimos el pie de pagina


?>

<label> Gastos totales por pagar de invitados: <?=$TPPI ?></label>
</body>
</html>

