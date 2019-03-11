<?php

include_once 'lib/nusoap.php';
$servicio = new soap_server();

$ns = "urn:servicio6";
$servicio->configureWSDL("ServicioInsertarBD1",$ns);
$servicio->schemaTargetNamespace = $ns;

$servicio->register("InsertarBD", array('nombre' => 'xsd:string', 'edad' => 'xsd:integer', 'email' =>'xsd:string'), array('return' => 'xsd:string'), $ns );

function InsertarBD($nombre, $edad,$email){

//$consultaInsert="INSERT into user values (NULL,'$nombre',$edad,'$email')";
require_once 'config/conexion.php';
$conexion->query("INSERT into user values (NULL,'$nombre',$edad,'$email')");
 //validar si dato se repite, se inserta o no
 return "Insertado";
 
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service(file_get_contents("php://input"));﻿


?>