<?php
    require '../../Conexion.php';
    $titulo = $_REQUEST['titulo'];
    $contenido = $_REQUEST['contenido'];
    $fecha = date("d/m/Y");
    
    $data = file_get_contents($_FILES['imagen']['tmp_name']);
    //$nombre_archivo = file_get_contents($_FILES['imagen']['size']);
   

    
    //// Los posibles valores que puedas obtener de la imagen son :
    //// $_FILES['imagen']['name'] //nombre del archivo
    //// $_FILES['imagen']['type'] //tipo de archivo
    //// $_FILES['imagen']['tmp_name'] //nombre del archivo de la imagen temporal
   //// $_FILES['imagen']['size'] //tamaño
    
    $imagen = pg_escape_bytea($data);
    
        $sql = "INSERT INTO publicaciones (titulo,contenido,fecha,imagen) VALUES ('"
                .$titulo."','".$contenido."','".$fecha."','".$imagen."')";
        $result = pg_query($conn, $sql);
        if (!$result) {
             $res = "Error de coneccion!!";
        }  else {
            $res="Publicacion insertado satisfactoriamente!!";   
        }
        pg_close($conn);
        echo($res);
     
?>
