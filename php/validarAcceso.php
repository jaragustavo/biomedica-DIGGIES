<?php
    require 'Conexion.php'; 
    $login_usuario = $_REQUEST['login_usuario'];
    $password_usuario = $_REQUEST['password_usuario'];
   
        $sql = "SELECT * FROM usuarios where login_usuario='"
                .$login_usuario."' and pass_usuario='".$password_usuario."'";
        $result = pg_query($conn, $sql);
        $row = pg_fetch_row($result);
        session_start();
        $_SESSION['acceso']='false';
        if ($row > 0) {
           $_SESSION['acceso']='true';
           $_SESSION['login_usuario']=$login_usuario;
        }
        
        $pregunta = new stdClass();
        $pregunta->acceso = $_SESSION["acceso"];
       // $pregunta->login_usuario = $_SESSION["login_usuario"];
        $json = json_encode($pregunta);
        pg_close($conn);
        echo($json);
  ?>
