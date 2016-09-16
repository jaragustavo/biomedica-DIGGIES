<?php
 require '../../Conexion.php';
 $sql = "SELECT * FROM productos WHERE upper(nombre) like upper('%".$_POST['bnombre']."%')";

 
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
