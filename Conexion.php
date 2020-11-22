<?php
// $conexion = mysqli_connect('localhost','id15352111_root', 'K+uO}85gKi{+e6gt','id15352111_systemsge');
$conexion = mysqli_connect('localhost', 'root', '', 'systemsge');
// $conexion = mysqli_connect('sql304.epizy.com', 'epiz_27206948', 'SJBfdx8LbmTyxlm', 'epiz_27206948_systemsge');

$conexion->query("SET NAMES 'utf8'");
if ($conexion->connect_error) {
	$connection_status = 'console.error(' . $mysqli->connect_error . ');';
	die('Error de(' . $conexion->connect_errno . ')' . $conexion->connect_error);
} else {
	$connection_status = "console.debug('Conectado a la base de datos');";
}
$js_code = '<h1 style="display: none;">' . $connection_status . '</h1>';
echo $js_code;
//Contador paginador

// IMPORTANTE SOLO USAR DIVISORES DE 2
$record_per_page = 4;
$pagina = '';
if (isset($_GET["pagina"])) {
	$pagina = $_GET["pagina"];
} else {
	$pagina = 1;
}

$start_from = ($pagina - 1) * $record_per_page;
