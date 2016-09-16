<?php
    session_start();
    $mensaje='La sesion esta cerrada';
    $activo="false";
    if(isset($_SESSION['acceso'])){
       if(isset($_SESSION['acceso'])=="true"){
           $mensaje="Sesion Abierta";
           $login_usuario=$_SESSION['login_usuario'];
           $activo="true";
       }
    }
    $pregunta= new stdClass();
   // error_log($mensaje);
    $pregunta->mensaje = $mensaje;
    $pregunta->login_usuario = $login_usuario;
    $pregunta->activo = $activo;
    $json= json_encode($pregunta);
    echo($json);
    