<?php

include_once 'lib/nusoap.php';


$servicio = new soap_server();

$ns = "urn:servicio4";
$servicio->configureWSDL("ServicioRescatarBD4",$ns);
$servicio->schemaTargetNamespace = $ns;

$servicio->wsdl->addComplexType(
'json',
'complexType',
'array',
'all',
'',
array(
 'eventId'=>array('name'=>'eventId','type'=>'xsd:int'),
 'eventName'=>array('name'=>'eventName','type'=>'xsd:string'))
);

$servicio->register("RescatarDatosBDV2",array('id' => 'xsd:integer'), array('return' => 'xsd:string'), $ns );

function RescatarDatosBDV2($id){
////////
	$json=array();

if ($id!=null) {
	$datos="entra";
//////////
require_once 'config/conexion.php';
$queryBusqueda="SELECT * from user where idUser='".$id."'";

$resultadoBusqueda=$conexion->query($queryBusqueda);

if ($registroBuscado=$resultadoBusqueda->fetch_assoc()) {
	
$json['usuarioBuscado'][]=$registroBuscado;

}else{

$RegistroNoEncontrado['idUser']=0;

$RegistroNoEncontrado['nombre']="nada";

$RegistroNoEncontrado['edad']="nada";

$RegistroNoEncontrado['email']="nada";
$json['usuarioBuscado'][]=$RegistroNoEncontrado;
}

 json_encode($json);


///////////
}else {
	$datos="no entra";
	$json['usuarioBuscado'][]="No entra";
 json_encode($json);
}
/////////7

	return array("json" =>$json);

 
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service(file_get_contents("php://input"));﻿


?>