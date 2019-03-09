<?php 
//Parametros para la conexión a la base de datos
	
	$host="localhost";
	$usuario="root";
	$passbd="cristian";
	$bd="usuarios";
	
	//Lista de tabla
	//$tabla="nombretabla";

	error_reporting(0);

$conexion=new mysqli($host,$usuario,$passbd,$bd);

if($conexion->connect_errno){
	echo "Error de conexión";
	exit();
	}


?>