<?php
 require '../../Conexion.php';
 $id=$_POST['cod_usuario'];
 $nombre_usuario = $_REQUEST['nombre_usuario'];
 $login_usuario = $_REQUEST['login_usuario'];
 $pass_usuario = $_REQUEST['password_usuario'];
 
 $sql = "UPDATE usuarios SET nombre_usuario='".$nombre_usuario."'"
         .",login_usuario='".$login_usuario."'"
         .",pass_usuario='".$pass_usuario."'"
         ." WHERE codigo=".$id;
 $result = pg_query($conn, $sql);

  if (!$result) {
      $res = "Registro no modificado";
  }  else {
     $res="Usuario modificado satisfactoriamente!!";   
  }
  pg_close($conn);
  echo($res);
?>