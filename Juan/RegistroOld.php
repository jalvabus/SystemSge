<?php include "Logueado.php"; ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

      <div class="row">
        <div class="col-12 col-sm-10 col-lg-10 mx-auto">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-6 mb-0">Registro de Afiliados</h1>
          </div>
          <hr>
          <center>

            <?php
            include "../ConexionRegister.php";

            if (isset($_POST['txtcorreo'], $_POST['txtnombre'], $_POST['txtapp'], $_POST['txtapm'], $_POST['txttel'], $_POST['txtfecha'], $_POST['txtpassword']) && !empty($_POST['txtcorreo']) && !empty($_POST['txtnombre']) && !empty($_POST['txtapp']) && !empty($_POST['txtapm']) && !empty($_POST['txttel']) && !empty($_POST['txtfecha']) && !empty($_POST['txtpassword'])) {

              $correo = $_POST["txtcorreo"];
              $nombre = $_POST["txtnombre"];
              $apellidoP = $_POST["txtapp"];
              $apellidoM = $_POST["txtapm"];
              $tel = $_POST["txttel"];
              $fecha = $_POST["txtfecha"];
              $contra = $_POST["txtpassword"];

              $qry = "INSERT INTO personas (id_persona,email,nombre,app,apm,celular,birthday,password)
VALUES(null,'$correo','$nombre','$apellidoP','$apellidoM','$tel','$fecha','$contra')";

              if ($mysqli->query($qry)) {
                echo "<script>
window.location.replace('RegistroAfil.php');
</script>";
              } else {
                echo "<div class='alert alert-danger' id='success-alert'> <button type='button' class='close' data-dismiss='alert'>x</button> <strong>Afiliado !Ya Existente¡ </strong> </div> ";
              }
            }

            ?>
            <div id="Layer1" style="width:800px; height:480px; overflow: scroll;">
              <form method="post" action="Registro.php" name="frmRPersonas">
                <div class="form-group">
                  <label>Correo electrónico</label>
                  <input type="email" required class="form-control" name="txtcorreo" placeholder="ejemplo@gmail.com"><br>
                  <label>Nombre: </label>
                  <input type="text" required class="form-control" name="txtnombre" placeholder="Ingrese su nombre"><br>
                  <label>Apellido Paterno: </label>
                  <input type="text" required class="form-control" name="txtapp" placeholder="Ingrese su apellido paterno"><br>
                  <label>Apellido Materno: </label>
                  <input type="text" required class="form-control" name="txtapm" placeholder="Ingrese su apellido materno"><br>
                  <label>Teléfono: </label>
                  <input type="number" required class="form-control" name="txttel" placeholder="Ingrese su telefono"><br>
                  <label>fecha de nacimiento: </label>
                  <input type="date" required class="form-control" name="txtfecha" placeholder=""><br>
                  <label>Password: </label>
                  <input type="password" required class="form-control cat" name="txtpassword" placeholder=""><br>

                </div>
                <button class="btn btn-info">Siguiente</button>
              </form>
            </div>
          </center>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>