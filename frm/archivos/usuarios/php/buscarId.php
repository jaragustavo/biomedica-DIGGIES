<?php
 require '../../Conexion.php';
 $id=$_POST['cod_usuario'];
 
 $sql = "SELECT * FROM usuarios WHERE codigo=".$id;
 $result = pg_query($conn, $sql);
 $row = pg_fetch_row($result);
 $objeto = new stdClass();
 $objeto->mensajes ="Registro encontrado";
 $objeto->nombre_usuario = $row[1];
 $objeto->login_usuario = $row[2];
 $objeto->password_usuario = $row[3];
 $objeto->repetir_password = $row[3];
 
 $json = json_encode($objeto);
 pg_close($conn);
 echo($json);
?>