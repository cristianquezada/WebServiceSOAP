<!DOCTYPE html>
<html>
<head>
	<title>Servicio Prueba 2 Consulta BD</title>
</head>
<body>
<h1>Prueba de servicio 4 búsqueda BD json</h1>


<form method="POST">
<input type="text" name="textBox1" placeholder="Ingrese un id">
<input type="submit" name="button1" value="Buscar en BD">
</form>



<br>
<br>

<?php 
if (isset($_POST['button1'])) {
	require_once 'lib/nusoap.php';

$cliente=new nusoap_client("http://localhost/Quezada/WebServices/servicio4.php",false);

$num1=$_POST['textBox1'];
$id=array('id' =>$num1);
$respuesta=$cliente->call("RescatarDatosBDV2",$id);





//var_dump(json_decode($respuesta));
//$json=array();

$jsonRecibido=json_decode($respuesta,true);

//var_dump($json);
//print_r($jsonRecibido);
//echo "<br>";

//var_dump($json[0][0]['nombre']);

//for ($i=0; $i <count($json) ; $i++) { 
//	$nombre=$json[0][$i]['nombre'];
//}
$idUser=$jsonRecibido['usuarioBuscado'][0]['idUser'];
$nombre=$jsonRecibido['usuarioBuscado'][0]['nombre'];
$edad=$jsonRecibido['usuarioBuscado'][0]['edad'];
$email=$jsonRecibido['usuarioBuscado'][0]['email'];

echo "<br> id usuario: ".$idUser;
echo "<br> Nombre: ".$nombre;
echo "<br> Edad: ".$edad;
echo "<br> Email: ".$email;






}

?>



</body>
</html>


