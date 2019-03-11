<!DOCTYPE html>
<html>
<head>
	<title>Servicio Prueba 1 insert en BD</title>
</head>
<body>
<h1>Prueba de servicio 7 insert BD</h1>


<form method="POST">
<input type="text" name="textBox1" placeholder="Ingrese un nombre"><br>
<input type="text" name="textBox2" placeholder="Ingrese un edad"><br>
<input type="text" name="textBox3" placeholder="Ingrese un email"><br>

<input type="submit" name="button1" value="Insertar">
</form>



<br>
<br>

<?php 
if (isset($_POST['button1'])) {
	require_once 'lib/nusoap.php';

$cliente=new nusoap_client("http://localhost/Quezada/WebServices/servicio6.php",false);

$nombre=$_POST['textBox1'];
$edad=$_POST['textBox2'];
$email=$_POST['textBox3'];

$parametros=array('nombre' =>$nombre,'edad' =>$edad,'email'=>$email);
$respuesta=$cliente->call("InsertarBD",$parametros);


print($respuesta);
}

?>



</body>
</html>



