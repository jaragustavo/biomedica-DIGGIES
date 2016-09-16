<?php

    session_start();
    $mensaje="";
    if(isset($_SESSION['acceso'])){
        session_destroy();
        $mensaje="Sesion Cerrada";
        
    }
   // $pregunta=new stdClass();
   // $pregunta->mensaje=$mensaje;
   // $json= json_encode($pregunta);
   //error_log($mensaje);
   echo($mensaje);
   