<?php include "Gustavo/Logueado.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>System Sge v1.0</title>
    <link rel="shortcut icon" type="image/x-icon" href="/SystemSge/img/logo.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Custom fonts for this template-->
    <link href="/SystemSge/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/SystemSge/css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include(dirname(__DIR__) . '/SystemSge/component/inicio/SideBar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include(dirname(__DIR__) . '/SystemSge/component/inicio/TopBar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Usuarios Afiliados</h1>
                    </div>

                    <?php include "Gustavo/ButtonsRegistro.php"; ?>

                    <!-- Crud afiliados -->
                    <?php

                    include "../ConexionRegister.php";

                    if (isset($_POST)) {
                        if (isset($_POST['create'])) {

                            $correo = $_POST["txtcorreo"];
                            $nombre = $_POST["txtnombre"];
                            $apellidoP = $_POST["txtapp"];
                            $apellidoM = $_POST["txtapm"];
                            $tel = $_POST["txttel"];
                            $fecha = $_POST["txtfecha"];
                            $contra = $_POST["txtpassword"];

                            $qry = "INSERT INTO personas (id_persona,email,nombre,app,apm,celular,birthday,password) VALUES(null,'$correo','$nombre','$apellidoP','$apellidoM','$tel','$fecha','$contra')";

                            if ($mysqli->query($qry)) {
                                // echo "<script>window.location.replace('/SystemSge/Juan/Registro.php');</script>";
                                echo "<div class='alert alert-success' id='success-alert'> <button type='button' class='close' data-dismiss='alert'>x</button> <strong>Afiliado Registrado exitosamente. </strong> </div> ";
                            } else {
                                echo "<div class='alert alert-danger' id='success-alert'> <button type='button' class='close' data-dismiss='alert'>x</button> <strong>Afiliado !Ya Existente¡ </strong> </div> ";
                            }
                        }

                        if (isset($_POST['update'])) {

                            $id_persona_upd = $_POST["id_persona"];
                            $correo_upd = $_POST["txtcorreo"];
                            $nombre_upd = $_POST["txtnombre"];
                            $apellidoP_upd = $_POST["txtapp"];
                            $apellidoM_upd = $_POST["txtapm"];
                            $tel_upd = $_POST["txttel"];
                            $fecha_upd = $_POST["txtfecha"];
                            $contra_upd = $_POST["txtpassword"];

                            $queryUpdate = "UPDATE personas set email = '$correo_upd', nombre = '$nombre_upd', app = '$apellidoP_upd', apm = '$apellidoM_upd', celular = $tel_upd, birthday = '$fecha_upd', password = '$contra_upd' WHERE id_persona = $id_persona_upd ";
                            $sqlQuery = $mysqli->query($queryUpdate);
                            echo "<div class='alert alert-success' id='success-alert'> <button type='button' class='close' data-dismiss='alert'>x</button> <strong>Afiliado actualizado exitosamente. </strong> </div> ";
                            header('location: Registro.php');
                        }
                    }

                    ?>

                    <?php

                    if (isset($_GET['action'])) {
                        if ($_GET['action'] === 'edit' || $_GET['action'] === 'delete') {
                            $id_persona = $_GET['personId'];

                            $sqlGetPerson = "SELECT * from personas where id_persona = $id_persona;";
                            $sqlQuery = $mysqli->query($sqlGetPerson);

                            if (count($sqlQuery) == 1) {
                                $row = $sqlQuery->fetch_array();
                                $nombre = $row['nombre'];
                                $app = $row['app'];
                                $apm = $row['apm'];
                                $correo = $row['email'];
                                $celular = $row['celular'];
                                $birthday = $row['birthday'];
                            }
                        }
                    }
                    ?>

                    <!-- Row -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-sm-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Afiliados</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                    <?php include "Gustavo/ConsultaPrincipal.php"; ?>

                                </div>
                            </div>
                        </div>
                        <!-- Area Chart End -->

                    </div>
                    <!-- Row End -->
                    <!-- Crud afiliados -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include(dirname(__DIR__) . '/SystemSge/component/global/Footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php include(dirname(__DIR__) . '/SystemSge/component/global/ScrollTopButton.php'); ?>

    <!-- Logout Modal-->
    <?php include(dirname(__DIR__) . '/SystemSge/component/global/LogoutModal.php'); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="/SystemSge/vendor/jquery/jquery.min.js"></script>
    <script src="/SystemSge/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/SystemSge/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/SystemSge/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/SystemSge/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/SystemSge/js/demo/chart-area-demo.js"></script>
    <script src="/SystemSge/js/demo/chart-pie-demo.js"></script>

</body>

</html>