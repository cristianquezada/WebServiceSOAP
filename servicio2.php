<?php

include_once 'lib/nusoap.php';
$servicio = new soap_server();

$ns = "urn:servicio1";
$servicio->configureWSDL("ServiciosDatosMios",$ns);
$servicio->schemaTargetNamespace = $ns;

$servicio->register("MiInfo",array(), array('return' => 'xsd:string'), $ns );

function MiInfo(){
$nombre="Cristian";
$edad=27;
$email="crisquezada38@gmail.com";

 $datos = "Nombre: ".$nombre."\nEdad".$edad." \nEmail: ".$email ;	
 return $datos;
 
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service(file_get_contents("php://input"));﻿


?>