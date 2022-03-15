<?php
require_once("Conexion.php");
class Chat {
    Private $nombre=""; //nombre 
    private $correo="";//correo
    Private $mensaje="";//mensaje
    Private $hora = 0;//time 
    Private $dia = 0;// day 
    private $mes = 0;
    private $year= 0; // año
    private $color= "white";
    private $sala=0; //
    private $id=0;

    //contruct
    public function __construct($nombre, $correo, $mensaje, $hora, $dia, $mes, $year, $color, $sala)
    {
        $this->nombre= $nombre;
        $this->correo= $correo;
        $this->mensaje=$mensaje; 
        $this->hora=$hora; 
        $this->dia= $dia;
        $this->mes= $mes;
        $this->year= $year;
        $this->color= $color; 
        $this->sala=$sala;
        
    }
    // Encapsulamiento 
    public function setNombre ($nombre){
        $this->nombre= $nombre; 
    }
    public function getnombre (){
       return $this->nombre;
    }
    //
     
    public function setCorreo ($Correo){
        $this->correo= $Correo; 
    }
    public function getCorreo (){
       return $this->correo;
    }
    //
     
    public function setMensaje ($Mensaje){
        $this->mensaje= $Mensaje; 
    }
    public function getMensaje (){
       return $this->mensaje;
    }
    //
     
     
    public function setHora ($Hora){
        $this->hora= $Hora; 
    }
    public function getHora (){
       return $this->hora;
    }
    //

     
    public function setDia ($Dia){
        $this->dia= $Dia; 
    }
    public function getDia (){
       return $this->dia;
    }
    //
     
    public function setMes ($Mes){
        $this->mes= $Mes; 
    }
    public function getMes (){
       return $this->mes;
    }
    //
     
    public function setYear ($Year){
        $this->year= $Year; 
    }
    public function getYear (){
       return $this->year;
    }
    //
     
    public function setColor ($Color){
        $this->color= $Color; 
    }
    public function getColor (){
       return $this->color;
    }
    //

    public function setSala ($sala){
        $this->sala= $sala;
    }

    public function getSala ($sala){
        $this-> sala= $sala;
    }
    //
    public function setId ($Id){
        $this->id= $Id; 
    }
    public function getId (){
       return $this->id;
    }

    //FIN de seters y geters , end sets and gets

    //INICIO  DE METODOS, METODES.
    //Come on chat //ingresar al chat.
    public function Ingresar ($permiso){
        if ($permiso=  1234566) {
            # code...
            $conexion= new Conexion;
            $resultado= $conexion->actualizar("INSERT INTO Chat VALUES ('$this->nombre','$this->correo',
            '$this->mensaje','$this->hora','$this->dis','$this->mes','$this->año','$this->color')");
        }
    }
    //New sms in the chat.  //Nuevo mensaje en el chat.
    public function newMess ($permiso,$mensaje){
        if ($permiso=  1234566) {
            # code...
            $conexion= new Conexion;
            $resultado= $conexion->actualizar("INSERT INTO Chat (mensaje,hora,dia,mes,año) 
            VALUES ($mensaje,'$this->hora','$this->dia','$this->mes','$this->año', '$this->sala'");   
            if($resultado){
               ?>
               <script> console.log("NewMess funcionando"); </script>
                <?
            }else{
                ?>
               <script> console.log($resultado); </script>
                <?
            }   
        }
    }
    //Cargar mensajes en la sala// Get sms in the sala
    public static function loadChat ($sala){
        if(true){
            $conexion= new Conexion;
            $resultado= $conexion->consultar("SELECT * WHERE sala= $sala  ORDER BY id ASC ");
            if($resultado){
                ?>
                <script> console.log("loadChat funcionando"); </script>
                 <?
             }else{
                 ?>
                <script> console.log($resultado); </script>
                 <?
                 return $resultado;
             } 
        }
    } 
    // this sms is the end? 
    public static function comparacion ($mensaje, $correo, $hora, $sala){
        $conexion= new Conexion;
        $resultado= $conexion->consultar("SELECT correo,mensaje 
        WHERE sala='$sala'AND hora='$hora' AND correo='$correo' AND mensaje='$mensaje' ");
        if($resultado){
            ?>
            <script> console.log("comparacion funcionando"); </script>
             <?

         return $resultado;
         }else{
             ?>
            <script> console.log($resultado); </script>
             <?php 
             return $resultado;
         } 
    }



}





?>