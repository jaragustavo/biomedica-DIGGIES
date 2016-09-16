<?php
 require '../../Conexion.php';
 $id=$_POST['id'];
 
 $sql = "SELECT * FROM productos WHERE id=".$id;
 $result = pg_query($conn, $sql);
 $row = pg_fetch_row($result);
 $imagen = pg_unescape_bytea($row[3]);
 
 $objeto = new stdClass();
 $objeto->mensajes ="Registro encontrado";

 
 $objeto->nombre = $row[1];
 $objeto->descripcion = $row[2];
 $objeto->precio = $row[3];

 //$objeto->imagen = $row[3];
 
 $json = json_encode($objeto);
 pg_close($conn);
 echo($json);
?>