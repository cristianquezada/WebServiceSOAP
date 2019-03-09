<?php
require_once 'lib/nusoap.php';

$cliente=new nusoap_client("http://localhost/Quezada/WebServices/servicio.php",false);


$num1=2;
$num2=10;

$parametros=array('num1' =>$num1,
  'num2'=>$num2
);
//var_dump($parametros);

$respuesta=$cliente->call("MiFuncion",$parametros);


print_r($respuesta);
?>