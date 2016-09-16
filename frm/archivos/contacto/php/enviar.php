<?php
    $mysqli= new mysqli("localhost","root","","proyecto1");

    if (mysqli_connect_errno()){
        die("Error al conectar: ".mysqli_connect_error());
    }
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $asunto = $_REQUEST['asunto'];
    $email = $_REQUEST['email'];
    $telefono = $_REQUEST['telefono'];
    $celular = $_REQUEST['celular'];
    $mensaje = $_REQUEST['mensaje'];
    $fecha = date('d/m/Y');
    $hora = date('H:i:s');
        $sql = "INSERT INTO mensajes (nombre,apellido,asunto,email,telefono,celular,mensaje,respondido,fecha,hora) VALUES ('"
                .$nombre."','".$apellido."','".$asunto."','".$email."','".$telefono."','".$celular."','".$mensaje."','pendiente','".$fecha."','".$hora."')";
        $ret=$mysqli->query($sql);
        $res="Mensaje No enviado";
        if($ret==1){
            $res="Mensaje enviado satisfactor. Gracias por escribimos ! En breve nos comunicaremos con usted";
        }
        $mysqli->close();
        echo($res);
?>
