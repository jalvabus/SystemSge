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
  <title>System-SGE</title>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="../Gustavo/Js/jquery-3.2.1.min.js"></script>
  <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</head>

<body>
  <div class="d-flex">

    <?php include "MenuLateral.php"; ?>

    <div class="w-100">
      <?php include "MenuSuperior.php"; ?>

      <div class="row">
        <div class="col-12 col-sm-10 col-lg-10 mx-auto">
          <br><br><br><br>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-6 mb-0">Buscar Colonia</h1>
            <a href="../inicio.php"><button class="btn btn-success">Regresar</button></a>

          </div>
          <hr>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Selecciona tipo de busqueda</label>
            </div>
            <select class="custom-select" id="lista1" name="lista1">
              <option value="1">Sección</option>
              <option value="2">Jeraquia</option>
              <option value="3">Municipio</option>
              <option value="4">Colonia</option>
            </select>
          </div>
          <br>
          <div id="select2lista"></div>

        </div>
      </div>
    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.3.1.min.js"" integrity=" sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#lista1').val(1);
      recargarLista();

      $('#lista1').change(function() {
        recargarLista();
      });
    })
  </script>
  <script type="text/javascript">
    function recargarLista() {
      $.ajax({
        type: "POST",
        url: "Datos.php",
        data: "opcion=" + $('#lista1').val(),
        success: function(r) {
          $('#select2lista').html(r);
        }
      });
    }
  </script>

</body>

</html>