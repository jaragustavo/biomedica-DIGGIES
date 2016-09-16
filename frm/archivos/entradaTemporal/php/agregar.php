<?php
    require '../../Conexion.php';
        
        $sql;
        
        $entradaDetalle = json_decode($_POST['entrada']);
        
        $sql= "SELECT agregar_entrada AS codigo_mensaje FROM ";
        $sql .= "agregar_entrada ( '$entradaDetalle->orden_compra',";
        $sql .= "'$entradaDetalle->codigo_tipo_entrada',";
        $sql .= "'$entradaDetalle->tipo_licitacion',";
        $sql .= "'$entradaDetalle->codigo_proveedor',";
        $sql .= "'$entradaDetalle->numero_licitacion',";
        $sql .= "'$entradaDetalle->anio_licitacion',";
        $sql .= "'$entradaDetalle->numero_factura',";
        $sql .= "'$entradaDetalle->numero_remision',";
        $sql .= "'$entradaDetalle->fecha_factura',";
        $sql .= "'$entradaDetalle->fecha_remision',";
         
 
        $codigo_producto="";
        $precio="";
        $cantidad="";
        $serie="";
        $fecha_fabricacion ="";
        $plazo_garantia="";
        
        foreach($entradaDetalle->detalles as $detalle)
        {
           
              $codigo_producto.= "$detalle->codigo_producto" . ',';
              $precio.= "$detalle->precio" . ',';
              $cantidad.="$detalle->cantidad" . ',';
              $serie.="$detalle->serie" . ',';
              $fecha_fabricacion.="$detalle->fecha_fabricacion".',';
              $plazo_garantia="$detalle->plazo_garantia".'.';
              
        }
        $codigo_producto = substr($codigo_producto, 0, -1);
        $precio= substr($precio, 0, -1);
        $cantidad = substr($cantidad, 0, -1);
        $serie = substr($serie, 0, -1);
        $fecha_fabricacion = substr($fecha_fabricacion, 0, -1);
        $plazo_garantia = substr($plazo_garantia, 0, -1);
        
        $sql .= " '$codigo_producto', '$precio', '$cantidad','$serie','$fecha_fabricacion','$plazo_garantia'); ";
        //error_log("#######".$sql);
        
        $result = pg_exec ($conn,$sql);
       // $result = pg_query($conn, $sql);
        if (!$result) {
             $res = "Error de coneccion!!";
        }  else {
           $res="Registro guardados satisfactoriamente!!";   
        }
        pg_close($conn);
        echo($res);
?>
