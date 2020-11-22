<?php require  "Logueado.php"; ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Syste-SGE</title>
    <script src="Juan/Js/jquery-3.2.1.min.js"></script>
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="d-flex">

        <?php include "MenuLateral.php"; ?>

        <div class="w-100">
            <?php include "MenuSuperior.php"; ?>
<br><br><br>
            <div class="row" >
	            <div class="col-12 col-sm-10 col-lg-10 mx-auto">
		            <div class="d-flex justify-content-between align-items-center mb-3">
			            <h1 class="display-6 mb-0">Actualiza tu Información</h1>
	 	            </div><hr>
                    <center>


<?php
include "../ConexionRegister.php";

$dir = $_POST["txtdireccion"];
$in = $_POST["txtnumeroIN"];
$ex = $_POST["txtnumeroEX"];
$loca = $_POST["txtlocalidad"];
$cp = $_POST["txtcp"];
$col = $_POST["txtcoloniaID"];
$mun = $_POST["txtmunicipioID"];
$lat = $_POST["txtlatitud"];;
$lon = $_POST["txtlongitud"];
$corre = $_POST['txtemail'];

$qry = "UPDATE direcciones set direccion='$dir', no_int='$in', no_ext='$ex', localidad='$loca', cp='$cp', latitud='$lat', longitud='$lon', colonia_id='$col', municipio_id='$mun'  WHERE person_id='$corre'";

if ($mysqli->query($qry)){
echo "<div class='alert alert-success' id='success-alert'> <button type='button' class='close' data-dismiss='alert'>x</button> <strong>Datos Actualizados con !ÉXITO¡.</strong><br><strong><a href='UpdateUbica.php'>Regresar</a></strong> </div> ";
} else {
echo "<div class='alert alert-danger' id='success-alert'> <button type='button' class='close' data-dismiss='alert'>x</button> <strong>Ocurrio un Error al Actualizar intenta mas tarde. </strong>' </div> ";
}


?>

  </center>
	            </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>