<?php
 require '../../Conexion.php';
 $id=$_POST['codigo_entrada'];
 
 $sql = "SELECT a.codigo,a.orden_compra,a.numero_licitacion,a.numero_licitacion,"
         . "a.anio_licitacion,a.codigo_tipo_licitacion,a.fecha_recepcion,"
         . "a.numero_factura,a.numero_remision,a.fecha_factura,a.fecha_remision,"
         . "a.codigo_establecimiento,a.codigo_tipo_movimiento,a.codigo_tipo_estado,"
         . "b.nombre"
         . " FROM entrada a,proveedor b "
         . "WHERE a.codigo_proveedor = b.codigo AND a.codigo=".$id;
 
 $result = pg_query($conn, $sql);
 $row = pg_fetch_row($result);
 
 $objeto = new stdClass();
 $objeto->mensajes ="Registro encontrado";
 $objeto->codigo_proveedor = $row[1];
 $objeto->orden_compra = $row[2];
 $objeto->numero_licitacion = $row[3];
 $objeto->anio_licitacion = $row[4];
 $objeto->codigo_tipo_licitacion = $row[5];
 
 $objeto->fecha_recepcion = $row[6];
 $objeto->numero_factura = $row[7];
 $objeto->numero_remision = $row[8];
 $objeto->fecha_factura = $row[9];
 $objeto->fecha_remision = $row[10];
 $objeto->codigo_establecimiento = $row[11];
 $objeto->codigo_tipo_movimiento = $row[12];
 $objeto->codigo_tipo_estado = $row[13];
 $objeto->nombre_proveedor = $row[14];

 
 
 $sql = "SELECT a.codigo_producto, b.descripcion,a.numero_serie,a.fecha_fabricacion,a.plazo_garantia,a.precio_unitario,a.cantidad FROM entrada_detalle a, producto b WHERE a.codigo_producto = b.codigo AND a.codigo_entrada=".$id;
 $result = pg_query($conn, $sql);
 $tabla="";
  
 while($row = pg_fetch_row($result)){
     
     $tabla = $tabla."<tr>"
                            ."<td><input type='checkbox' id='elegir' name='elegir'></input></td>"
                            ."<td id='codigo_producto' name='codigo_produto'>".$row[0]."</td>"
                            ."<td id='descripcion_producto' name='descripcion_producto'>".$row[1]."</td>"
                            ."<td><input name='serie' id='serie' size='15' type='text' value=".$row[2]." ></input></td>"
                            ."<td><input name='fecha_fabricacion' id='fecha_fabricacion' class='form-control datepicker' size='15' type='text' value=".$row[3]." ></input></td>"
                            ."<td><input name='plazo_garantia' id='plazo_garantia' class='form-control datepicker' size='15' type='text' value=".$row[4]." ></input></td>"
                            ."<td><input name='precio' id='precio' size='15' type='text' style='text-align:right;' value=".$row[5]." ></input></td>"
                            ."<td><input name='cantidad' id='cantidad' size='15' type='text'style='text-align:right;' value=".$row[6]." ></input></td>"
                             ."<td><input name='total_precio' id='total_precio' size='15' type='text' disabled='true' style='text-align:right;'></input></td>"
                            ."</tr>";
    
 }
 
 
 
 $objeto->contenido = $tabla;
 $json = json_encode($objeto);
 pg_close($conn);
 echo($json);
?>

