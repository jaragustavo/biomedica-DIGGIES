<?php
 require '../../Conexion.php';
 
 
 $id=$_REQUEST['id'];
 $nombre = $_REQUEST['nombre'];
 $descripcion = $_REQUEST['descripcion'];
 $precio = $_REQUEST['precio'];
 $fecha = date("d/m/Y");
 $data = file_get_contents($_FILES['imagen']['tmp_name']);
 $imagen = pg_escape_bytea($data);   

 
 error_log("########".$nombre);
    
    //// Los posibles valores que puedas obtener de la imagen son :
    //// $_FILES['imagen']['name'] //nombre del archivo
    //// $_FILES['imagen']['type'] //tipo de archivo
    //// $_FILES['imagen']['tmp_name'] //nombre del archivo de la imagen temporal
   //// $_FILES['imagen']['size'] //tamaño
    
 
 $sql = "UPDATE productos SET nombre='".$nombre."'"
         .",descripcion='".$descripcion."'"
         .",precio='".$precio."'"
         .",imagen='".$imagen."'"
         ." WHERE id=".$id;
 $result = pg_query($conn, $sql);

  if (!$result) {
      $res = "Registro no modificado";
  }  else {
     $res="Producto modificada satisfactoriamente!!";   
  }
  pg_close($conn);
  echo($res);
?>