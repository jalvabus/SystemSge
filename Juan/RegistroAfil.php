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
			            <h1 class="display-6 mb-0">Información de Afiliados</h1>
	 	            </div><hr>

                    <center>

<?php
include "../ConexionRegister.php";
include "../Conexion.php";

if(isset($_POST['txtfolioA'], $_POST['txtclaveE'], $_POST['txtfolioINE'], $_POST['txtfechaA'], $_POST['txtdistroF'], $_POST['txtseccionID'], $_POST['txtpersonaID']) && !empty($_POST['txtjerarquiaID']) && !empty($_POST['txtfolioA']) && !empty($_POST['txtclaveE']) && !empty($_POST['txtfolioINE']) && !empty($_POST['txtfechaA']) && !empty($_POST['txtdistroF']) && !empty($_POST['txtseccionID']) && !empty($_POST['txtpersonaID']) && !empty($_POST['txtjerarquiaID'] )) {

$folioA = $_POST["txtfolioA"];
$clave = $_POST["txtclaveE"];
$folioINE = $_POST["txtfolioINE"];
$fechaAfi = $_POST["txtfechaA"];
$distroFed = $_POST["txtdistroF"];
$seccionID = $_POST["txtseccionID"];
$personaID = $_POST["txtpersonaID"];
$jerarquiaID = $_POST["txtjerarquiaID"];

$qry = "INSERT INTO afiliados (id_afiliado,fol_afil,clv_elector,folio_ine,fecha_afi,distro_fed,seccion_id,persona_id,jerarquia_id)
VALUES(null,'$folioA','$clave','$folioINE','$fechaAfi','$distroFed','$seccionID','$personaID','$jerarquiaID')";

if ($mysqli->query($qry)){
    echo "<script>
window.location.replace('RegistroUbica.php');
</script>";
} else {
    echo "<div class='alert alert-danger' id='success-alert'> <button type='button' class='close' data-dismiss='alert'>x</button> <strong>El Afiliado !Ya Existente¡</strong> </div> ";
}
}

?>
<div id="Layer1" style="width:800px; height:500px; overflow: scroll;">
                       <form method="post" action="RegistroAfil.php" name="frmRAfiliados">
    <div class="form-group">
  <label>Folio del Afiliado:</label>
    <input type="number" required class="form-control" name="txtfolioA" placeholder="Ingresa el folio"><br>
    <label>Clave de elector: </label>
    <input type="text" required class="form-control" name="txtclaveE" placeholder="Ingrese su cleve de elector"><br>
 <label>Folio del INE: </label>
    <input type="text" required class="form-control" name="txtfolioINE" placeholder="Ingrese folio del INE"><br>
 <label>Fecha de afiliación: </label>
    <input type="date" required class="form-control" name="txtfechaA" placeholder=""><br>
    <label>Distro_fed: </label>
   <input type="text" required class="form-control" name="txtdistroF" placeholder="Ingrese distro_fed"><br>

    <select class="custom-select custom-select-lg mb-3" name="txtseccionID">
        <option selected>----Selecciona Tu Sección-----</option>
<?php
    $consultaseccion="SELECT * from secciones";
    $result=  mysqli_query($conexion, $consultaseccion);
    while($busca = mysqli_fetch_array($result)){
    ?>
        <option value="<?php echo $busca['id_seccion']; ?>"><?php echo $busca['seccion']; ?></option>
<?php } ?>
    </select>


<?php
    $consultapersona="SELECT max(id_persona) as id from personas";
    $result=  mysqli_query($conexion, $consultapersona);
    while($busca = mysqli_fetch_array($result)){
    ?>

    <input type="number" required class="form-control cat" name="txtpersonaID" placeholder="Ingrese el ID de la persona" value="<?php echo $busca['id']; ?>" hidden>
<?php } ?>


    <select class="custom-select custom-select-lg mb-3" name="txtjerarquiaID">
        <option selected>----Selecciona Tu Cargo-----</option>
<?php
    $consultajerarquia="SELECT * from jerarquias";
    $result=  mysqli_query($conexion, $consultajerarquia);
    while($busca = mysqli_fetch_array($result)){
    ?>
        <option value="<?php echo $busca['id_jerarquia']; ?>"><?php echo $busca['cargo']; ?></option>
<?php } ?>

  </select><br>

    </div>
<button class="btn btn-info" >Siguiente</button>
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
