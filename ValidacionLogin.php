<?php
session_start();
error_reporting(0);
$email = $_POST["email"];
$_SESSION['email'] = $email;
$password = $_POST["password"];

include "Conexion.php";

$consulta="SELECT * FROM personas WHERE email='$email' and password='$password'";
$resultado=  mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas>0){
    header("location: inicio.php");
}
else{
	print(" <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'><div class='alert alert-warning' role='alert'>
 		Usuario y/o Contraseña Incorrecto o No encontrado.
	</div> <script>window.location='login.php'</script>");
}

mysqli_free_result($resultado);
mysqli_close($conexion);


?>