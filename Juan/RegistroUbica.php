<?php include "Logueado.php"; ?>

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
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="d-flex">

        <?php include "MenuLateral.php"; ?>

        <div class="w-100">
            <?php include "MenuSuperior.php"; ?>

            <div class="row" >
	            <div class="col-12 col-sm-10 col-lg-10 mx-auto">
		            <div class="d-flex justify-content-between align-items-center mb-3">
			            <h1 class="display-6 mb-0">Registrar Dirección</h1>
	 	            </div><hr>

                    <center>

<?php
include "../ConexionRegister.php";
include "../Conexion.php";

$personaID = $_POST["txtpersonaID"];
$direccion = $_POST["txtdireccion"];
$numeroIN = $_POST["txtnumeroIN"];
$numeroEX = $_POST["txtnumeroEX"];
$localidad = $_POST["txtlocalidad"];
$cp = $_POST["txtcp"];
$latitud = $_POST["txtlatitud"];
$longitud = $_POST["txtlongitud"];
$coloniaID = $_POST["txtcoloniaID"];
$municipioID = $_POST["txtmunicipioID"];

$qry = "INSERT INTO direcciones (id_direccion,person_id,direccion,no_int,no_ext,localidad,cp,latitud,longitud,colonia_id,municipio_id)
VALUES(null,'$personaID','$direccion','$numeroIN','$numeroEX','$localidad','$cp','$latitud','$longitud','$coloniaID','$municipioID')";

if ($mysqli->query($qry)){
    echo "<script>
window.location.replace('../inicio.php');
</script>";
    echo "<div class='alert alert-success' id='success-alert'> <button type='button' class='close' data-dismiss='alert'>x</button> <strong>Dirección agregada con !ÉXITO¡.</strong> </div> ";
}

?>
<div id="Layer1" style="width:800px; height:450px; overflow: scroll;">
                       <form method="post" action="RegistroUbica.php" name="frmRDirecciones">
    <div class="form-group">
<?php
    $consultapersona="SELECT max(id_persona) as id from personas";
    $result=  mysqli_query($conexion, $consultapersona);
    while($busca = mysqli_fetch_array($result)){
    ?>

    <input type="number" required class="form-control cat" name="txtpersonaID" placeholder="Ingrese el ID de la persona" value="<?php echo $busca['id']; ?>" hidden>
<?php } ?>
    <label>Dirección: </label>
    <input type="text" required class="form-control" name="txtdireccion" placeholder="Ingrese la dirección"><br>
 <label>No_Interior: </label>
    <input type="text" required class="form-control" name="txtnumeroIN" placeholder=""><br>
 <label>No_Exterior: </label>
    <input type="text" required class="form-control" name="txtnuumeroEX" placeholder=""><br>
    <label>Localidad: </label>
   <input type="text" required class="form-control" name="txtlocalidad" placeholder="Ingrese la localidad"><br>
<label>CP: </label>
   <input type="text" required class="form-control cat" name="txtcp" placeholder="Ingresa código postal"><br>

    <select class="custom-select custom-select-lg mb-3" name="txtcoloniaID">
        <option selected>----Selecciona Tu Colonia-----</option>
<?php
    $consultacolonia="SELECT * from colonia";
    $result=  mysqli_query($conexion, $consultacolonia);
    while($busca = mysqli_fetch_array($result)){
    ?>
        <option value="<?php echo $busca['id_colonia']; ?>"><?php echo $busca['colonia']; ?></option>
<?php } ?>

  </select><br>

    <select class="custom-select custom-select-lg mb-3" name="txtmunicipioID">
        <option selected>----Selecciona Tu Municipio-----</option>
<?php
    $consultamunicioio="SELECT * from municipios";
    $result=  mysqli_query($conexion, $consultamunicioio);
    while($busca = mysqli_fetch_array($result)){
    ?>
        <option value="<?php echo $busca['id_municipio']; ?>"><?php echo $busca['clv_municipio']; ?>    <?php echo $busca['nombre_municipio']; ?></option>
<?php } ?>

  </select><br>

    <label hidden>Latitud: </label>
    <input type="text" required class="form-control cat" name="txtlatitud" placeholder="Ingrese latitud" hidden value="NA">
     <label hidden>Longitud: </label>
    <input type="text" required class="form-control cat" name="txtlongitud" placeholder="Ingrese longitud" hidden value="NA">

    </div>
<button class="btn btn-info" >Terminar Registro</button>
    </form></div>
                    </center>
	            </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
