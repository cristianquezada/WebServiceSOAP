<?php

include_once 'lib/nusoap.php';


$servicio = new soap_server();

$ns = "urn:servicio3";
$servicio->configureWSDL("ServicioRescatarBD3",$ns);
$servicio->schemaTargetNamespace = $ns;

$servicio->register("RescatarDatosBDV1",array('id' => 'xsd:integer'), array('return' => 'xsd:string'), $ns );

function RescatarDatosBDV1($id){
////////
if ($id!=null) {
	$datos="entra";
//////////
require_once 'config/conexion.php';
$queryBusqueda="SELECT * from user where idUser='".$id."'";

$resultadoBusqueda=$conexion->query($queryBusqueda);

if ($registroBuscado=$resultadoBusqueda->fetch_assoc()) {
	$nombre=$registroBuscado['nombre'];
	$edad=$registroBuscado['edad'];
		$email=$registroBuscado['email'];

}else{
$nombre="nada";
$edad="nada";
$email="nada";

}



///////////
}else {
	$datos="no entra";
}
/////////7
$datos="Nombre: ".$nombre." Edad: ".$edad." Email: ".$email;
	return $datos;
	/*
$nombre="Cristian";
$edad=27;
$email="crisquezada38@gmail.com";

 $datos = "Nombre: ".$nombre."\nEdad".$edad." \nEmail: ".$email ;	
 */

 
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service(file_get_contents("php://input"));﻿


?>