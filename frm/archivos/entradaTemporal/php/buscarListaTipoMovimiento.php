<?php
    require '../../Conexion.php';
    $sql = "SELECT * FROM tipo_movimiento";
    $result = pg_query($conn, $sql);
    $opciones="<option value='-1'></option>";
    while($row = pg_fetch_row($result)){
        $opciones = $opciones."<option class='form-control input-sm' value='".$row[0]."'>".$row[1]."</option>";

    }
    $cadena="<select id='lista_tipo_movimiento'>"
                   .$opciones. 
             "</select>";
    pg_close($conn);
    $consumidor = new stdClass();
    $consumidor->contenido = $cadena;
    $json = json_encode($consumidor);
    echo($json);
?>