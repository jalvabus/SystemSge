<?php
// $mysqli = new mysqli('localhost', 'id15352111_root', 'K+uO}85gKi{+e6gt', 'id15352111_systemsge');
$mysqli = mysqli_connect('localhost', 'root', '', 'systemsge');
// $mysqli = mysqli_connect('sql304.epizy.com', 'epiz_27206948', 'SJBfdx8LbmTyxlm', 'epiz_27206948_systemsge');

$mysqli->query("SET NAMES 'utf8'");
if ($mysqli->connect_error) {
  $connection_status = 'console.error(' . $mysqli->connect_error . ');';
  die('Error de Conexión');
} else {
  $connection_status = "console.debug('Conectado a la base de datos');";
}
$js_code = '<h1 style="display: none;">' . $connection_status . '</h1>';
echo $js_code;
