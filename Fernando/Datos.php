<?php
include "../Conexion.php";
$opcion = $_POST['opcion'];

if ($opcion === '1') {
  $sql = "SELECT id_seccion, seccion
		from secciones";
} elseif ($opcion === '2') {
  $sql = "SELECT *
		from jerarquias";
} elseif ($opcion === '3') {
  $sql = "SELECT id_municipio, nombre_municipio
		from municipios";
} elseif ($opcion === '4') {
  $sql = "SELECT id_colonia, colonia
		from colonia";
}

$result = mysqli_query($conexion, $sql);

$cadena = "<div class='input-group mb-3'>
  <div class='input-group-prepend'>
    <label class='input-group-text' for='inputGroupSelect01'>Elija</label>
  </div>
  <select class='custom-select' id='lista2' name='lista2'>";

while ($ver = mysqli_fetch_row($result)) {
  $cadena = $cadena . '<option value=' . $ver[0] . '>' . utf8_encode($ver[1]) . '</option>';
}

echo  $cadena . "</select></div>";
?>