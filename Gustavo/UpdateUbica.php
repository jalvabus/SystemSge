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
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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
            <h1 class="display-6 mb-0">Actualiza tu Información</h1>
          </div>
          <hr>
          <center>


            <div id="Layer1" style="width:800px; height:450px; overflow: scroll;">
              <form method="post" action="UpdateU.php" name="frmRAfiliados">
                <div class="form-group">

                  <?php
                  include "../Conexion.php";
                  $ema = $_SESSION['email'];
                  $query = "SELECT * FROM personas inner join direcciones on personas.id_persona=direcciones.person_id inner join colonia on colonia.id_colonia=direcciones.colonia_id inner join municipios on municipios.id_municipio = direcciones.municipio_id  WHERE personas.email='$ema'";
                  $resultado =  mysqli_query($conexion, $query);
                  while ($row = mysqli_fetch_array($resultado)) {
                  ?>
                    <input type="text" required class="form-control" name="txtemail" value="<?php echo $row['person_id']; ?>" hidden><br>
                    <label>Dirección: </label>
                    <input type="text" required class="form-control" name="txtdireccion" value="<?php echo $row['direccion']; ?>"><br>
                    <label>No_Interior: </label>
                    <input type="text" required class="form-control" name="txtnumeroIN" value="<?php echo $row['no_int']; ?>"><br>
                    <label>No_Exterior: </label>
                    <input type="text" required class="form-control" name="txtnumeroEX" value="<?php echo $row['no_ext']; ?>"><br>
                    <label>Localidad: </label>
                    <input type="text" required class="form-control" name="txtlocalidad" value="<?php echo $row['localidad']; ?>"><br>
                    <label>CP: </label>
                    <input type="text" required class="form-control cat" name="txtcp" value="<?php echo $row['cp']; ?>"><br>
                    <LABEL>Colonia:</LABEL>
                    <select class="custom-select custom-select-lg mb-3" name="txtcoloniaID">
                      <option value="<?php echo $row['colonia_id']; ?>"><?php echo $row['colonia']; ?></option>
                      <?php
                      $consultacolonia = "SELECT * from colonia";
                      $result =  mysqli_query($conexion, $consultacolonia);
                      while ($busca = mysqli_fetch_array($result)) {
                      ?>

                        <option value="<?php echo $busca['id_colonia']; ?>"><?php echo $busca['colonia']; ?></option>
                      <?php } ?>

                    </select><br>
                    <LABEL>Municipio:</LABEL>
                    <select class="custom-select custom-select-lg mb-3" name="txtmunicipioID">
                      <option value="<?php echo $row['municipio_id']; ?>"><?php echo $row['clv_municipio']; ?> <?php echo $row['nombre_municipio']; ?></option>
                      <?php
                      $consultamunicioio = "SELECT * from municipios";
                      $result =  mysqli_query($conexion, $consultamunicioio);
                      while ($busca = mysqli_fetch_array($result)) {
                      ?>
                        <option value="<?php echo $busca['id_municipio']; ?>"><?php echo $busca['clv_municipio']; ?> <?php echo $busca['nombre_municipio']; ?></option>
                      <?php } ?>

                    </select><br>

                    <label hidden>Latitud: </label>
                    <input type="text" required class="form-control cat" name="txtlatitud" placeholder="Ingrese latitud" hidden value="NA">
                    <label hidden>Longitud: </label>
                    <input type="text" required class="form-control cat" name="txtlongitud" placeholder="Ingrese longitud" hidden value="NA">


                  <?php } ?>
                </div>
                <button class="btn btn-info">Actualizar</button>
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