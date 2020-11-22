<?php

session_start();
error_reporting(0);

if(isset($_SESSION['email'])){
  if($_SESSION['email']['nombre'] == "Administrador"){
    header('location: Gustavo/login.php');
 die();
    exit();
}}
$email = isset($_SESSION['email'])? $_SESSION['email'] : '';
include "Conexion.php";

?>