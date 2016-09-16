<?php

$user = 'admin';
$passwd = 'admin';
$db = 'orden_db';
$port = 5432;
$host = 'localhost';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$conn = pg_connect($strCnx) or die ("Error de conexion. ".pg_last_error());

?>