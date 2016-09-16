<?php
    require '../../Conexion.php';
    $nombre = $_REQUEST['nombre'];
    $contacto = $_REQUEST['contacto'];
    $email = $_REQUEST['email'];
    $telefono = $_REQUEST['telefono'];
    $direccion = $_REQUEST['direccion'];
    $ruc = $_REQUEST['ruc'];
    
    $fecha = date('d/m/Y');
    $hora = date('H:i:s');
        $sql = "INSERT INTO proveedor (nombre,contacto,correo,telefono,direccion,ruc) VALUES ('"
                .$nombre."','".$contacto."','".$email."','".$telefono."','".$direccion."','".$ruc."')";
        $result = pg_query($conn, $sql);
        if (!$result) {
             $res = "Error de coneccion!!";
        }  else {
            $res="Proveedor insertado satisfactoriamente!!";   
        }
        pg_close($conn);
        echo($res);
?>
