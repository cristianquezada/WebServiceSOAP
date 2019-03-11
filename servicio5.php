<?php

include_once 'lib/nusoap.php';


$servicio = new soap_server();

$ns = "urn:servicio5";
$servicio->configureWSDL("ServicioRescatarBD5",$ns);
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

$servicio->register("RescatarDatosBDV5",array(), array('return' => 'xsd:string'), $ns );

function RescatarDatosBDV5(){
////////
	$json=array();


require_once 'config/conexion.php';
$queryBusqueda="SELECT * from user";

$resultadoBusqueda=$conexion->query($queryBusqueda);

if ($resultadoBusqueda>0) {
	
	while($fila=$resultadoBusqueda->fetch_assoc()){
$json['usuarioBuscado'][]=$fila;
}
}else{

$RegistroNoEncontrado['idUser']="no hay datos";

$RegistroNoEncontrado['nombre']="no hay datos";

$RegistroNoEncontrado['edad']="no hay datos";

$RegistroNoEncontrado['email']="no hay datos";
$json['usuarioBuscado'][]=$RegistroNoEncontrado;
}



return json_encode($json);
//	return array("json" =>$json);

 
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service(file_get_contents("php://input"));﻿


?>