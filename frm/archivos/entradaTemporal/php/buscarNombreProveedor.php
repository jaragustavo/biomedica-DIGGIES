<?php
 require '../../Conexion.php';
 $sql = "SELECT a.codigo, a.fecha_recepcion, b.nombre, a.orden_compra FROM entrada a, proveedor b WHERE a.codigo_proveedor = b.codigo AND upper(b.nombre) like upper('%".$_POST['bnombre_proveedor']."%')";

 
 $result = pg_query($conn, $sql);
 $tabla="";
 while($row = pg_fetch_row($result)){
     $tabla = $tabla."<tr>"
                            ."<td>".$row[0]."</td>"
                            ."<td>".$row[1]."</td>"
                            ."<td>".$row[2]."</td>"
                            ."<td>".$row[3]."</td>"
                            ."</tr>";
 }
 $pregunta = new stdClass();
 $pregunta->mensajes ="Datos encontrados";
 $pregunta->contenido = $tabla;
 $json = json_encode($pregunta);
 pg_close($conn);
 echo($json);
?>
