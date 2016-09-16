<?php
    require '../../Conexion.php';
    $nombre = $_REQUEST['nombre'];
    $descripcion = $_REQUEST['descripcion'];
    $precio = $_REQUEST['precio'];
    $fecha = date("d/m/Y");
    
    $data = file_get_contents($_FILES['imagen']['tmp_name']);
    $imagen = pg_escape_bytea($data);
    //$nombre_archivo = file_get_contents($_FILES['imagen']['size']);
   

    
    //// Los posibles valores que puedas obtener de la imagen son :
    //// $_FILES['imagen']['name'] //nombre del archivo
    //// $_FILES['imagen']['type'] //tipo de archivo
    //// $_FILES['imagen']['tmp_name'] //nombre del archivo de la imagen temporal
   //// $_FILES['imagen']['size'] //tamaño
    
   
    
        $sql = "INSERT INTO productos (nombre,descripcion,precio,imagen) VALUES ('"
                .$nombre."','".$descripcion."','".$precio."','".$imagen."')";
        $result = pg_query($conn, $sql);
        if (!$result) {
             $res = "Error de coneccion!!";
        }  else {
            $res="Producto insertado satisfactoriamente!!";   
        }
        pg_close($conn);
        echo($res);
     
?>
