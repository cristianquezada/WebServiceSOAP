<!DOCTYPE html>
<html>
<head>
	<title>Servicio Prueba 3 Consulta BD</title>
</head>
<body>
<h1>Prueba de servicio 5 lista BD json</h1>





<br>
<br>

<?php 
	require_once 'lib/nusoap.php';

$cliente=new nusoap_client("http://localhost/Quezada/WebServices/servicio5.php",false);


$respuesta=$cliente->call("RescatarDatosBDV5");

$jsonRecibido=json_decode($respuesta,true);

echo "Cantidad Datos: ".count($jsonRecibido['usuarioBuscado']);

for ($i=0; $i <count($jsonRecibido['usuarioBuscado']) ; $i++) { 

$idUser=$jsonRecibido['usuarioBuscado'][$i]['idUser'];
$nombre=$jsonRecibido['usuarioBuscado'][$i]['nombre'];
$edad=$jsonRecibido['usuarioBuscado'][$i]['edad'];
$email=$jsonRecibido['usuarioBuscado'][$i]['email'];
echo "<br> id usuario: ".$idUser;
echo "<br> Nombre: ".$nombre;
echo "<br> Edad: ".$edad;
echo "<br> Email: ".$email;
echo "<br>";
}










?>



</body>
</html>


