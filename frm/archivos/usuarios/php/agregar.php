<?php
    require '../../Conexion.php';

    
    
    $nombre_usuario = $_REQUEST['nombre_usuario'];
    $login_usuario = $_REQUEST['login_usuario'];
    $pass_usuario = $_REQUEST['password_usuario'];
        $sql = "INSERT INTO usuarios (nombre_usuario,login_usuario,pass_usuario) VALUES ('"
                .$nombre_usuario."','".$login_usuario."','".$pass_usuario."')";
        $result = pg_query($conn, $sql);
        if (!$result) {
             $res = "Error de coneccion!!";
        }  else {
            $res="Usuario insertado satisfactoriamente!!";   
        }
        pg_close($conn);
        echo($res);
?>
