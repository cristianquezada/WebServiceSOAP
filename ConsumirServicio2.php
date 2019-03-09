<?php

require_once 'lib/nusoap.php';

$cliente=new nusoap_client("http://localhost/Quezada/WebServices/servicio2.php",false);


$respuesta=$cliente->call("MiInfo");


print($respuesta);
?>