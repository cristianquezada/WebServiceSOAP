<!DOCTYPE html>
<html>
<head>
	<title>Servicio Prueba 1 Consulta BD</title>
</head>
<body>
<h1>Prueba de servicio 3 búsqueda BD</h1>


<form method="POST">
<input type="text" name="textBox1" placeholder="Ingrese un id">
<input type="submit" name="button1" value="Buscar en BD">
</form>



<br>
<br>

<?php 
if (isset($_POST['button1'])) {
	require_once 'lib/nusoap.php';

$cliente=new nusoap_client("http://localhost/Quezada/WebServices/servicio3.php",false);

$num1=$_POST['textBox1'];
$id=array('id' =>$num1);
$respuesta=$cliente->call("RescatarDatosBDV1",$id);


print($respuesta);
}

?>



</body>
</html>



