<?php include "Logueado.php"; ?>
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
        <?php include(dirname(__DIR__) . '/component/inicio/SideBar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include(dirname(__DIR__) . '/component/inicio/TopBar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Información del Afiliado</h1>
                    </div>

                    <!-- Row -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-sm-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Afiliado</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <?php
                                    include "../Conexion.php";
                                    $id = $_POST["id"];
                                    $consultatodo = "SELECT * from personas where id_persona='" . $_POST['id'] . "'";
                                    $result =  mysqli_query($conexion, $consultatodo);
                                    while ($busca = mysqli_fetch_array($result)) {

                                    ?>

                                        <div class="p-2">
                                            <strong>
                                                Información del Afiliado: <?php echo $busca['nombre']; ?> <?php echo $busca['app']; ?> <?php echo $busca['apm']; ?>
                                            </strong>
                                        </div>


                                    <?php } ?>


                                    <?php

                                    $consultatodo = "SELECT afiliados.fol_afil as fol_afil, afiliados.clv_elector as clv_elector, afiliados.folio_ine, afiliados.fecha_afi as fecha_afi, afiliados.distro_fed as distro_fed, secciones.seccion as seccion, jerarquias.cargo as cargo, afiliados.persona_id as persona_id from afiliados inner join secciones on  secciones.id_seccion = afiliados.seccion_id inner join jerarquias on jerarquias.id_jerarquia = afiliados.jerarquia_id where afiliados.persona_id='$id'";
                                    $result =  mysqli_query($conexion, $consultatodo);
                                    while ($busca = mysqli_fetch_array($result)) {

                                    ?>

                                        <div class="col-xl-12 mb-4">
                                            <div class="card border-left-danger shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">

                                                        <div class="col-lg-1 col-sm-12">
                                                            <div class="col mr-2">
                                                                <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                                                    Folio:
                                                                </div>
                                                                <div class="h7 mb-0 font-weight-bold text-gray-800">
                                                                    <?php echo $busca['fol_afil']; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-sm-12">
                                                            <div class="col mr-2">
                                                                <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                                                    Clave Elector:
                                                                </div>
                                                                <div class="h7 mb-0 font-weight-bold text-gray-800">
                                                                    <?php echo $busca['clv_elector']; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-sm-12">
                                                            <div class="col mr-2">
                                                                <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                                                    Folio INE:
                                                                </div>
                                                                <div class="h7 mb-0 font-weight-bold text-gray-800">
                                                                    <?php echo $busca['folio_ine']; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-sm-12">
                                                            <div class="col mr-2">
                                                                <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                                                    Afiliado el Día:
                                                                </div>
                                                                <div class="h7 mb-0 font-weight-bold text-gray-800">
                                                                    <?php echo $busca['fecha_afi']; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-sm-12">
                                                            <div class="col mr-2">
                                                                <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                                                    Distrito Federal:
                                                                </div>
                                                                <div class="h7 mb-0 font-weight-bold text-gray-800">
                                                                    <?php echo $busca['distro_fed']; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-sm-12">
                                                            <div class="col mr-2">
                                                                <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                                                    Seccion:
                                                                </div>
                                                                <div class="h7 mb-0 font-weight-bold text-gray-800">
                                                                    <?php echo $busca['seccion']; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-sm-12">
                                                            <div class="col mr-2">
                                                                <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                                                    Cargo:
                                                                </div>
                                                                <div class="h7 mb-0 font-weight-bold text-gray-800">
                                                                    <?php echo $busca['cargo']; ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>


                                    <div class="d-flex justify-content-between align-items-center">
                                        <button class="btn btn-primary btn-md btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-map"></i>
                                            </span>
                                            <span class="text">Ver Ubicación</span>
                                        </button>
                                        <?php
                                        $query = "SELECT * FROM personas WHERE email='$email'";
                                        $resultado =  mysqli_query($conexion, $query);
                                        while ($row = mysqli_fetch_array($resultado)) {
                                            $llamaemail = $row['email'];
                                            if ($_SESSION['email'] == "pri@gmail.com" || $_SESSION['email'] == "inega@gmail.com") {
                                        ?>

                                                <?php

                                                $restoreid = "SELECT * from personas where id_persona='$id'";
                                                $resultid =  mysqli_query($conexion, $restoreid);
                                                while ($buscaid = mysqli_fetch_array($resultid)) {

                                                ?>

                                                    <form action="DeleteAfil.php" method="post">
                                                        <div>
                                                            <input type="text" value="<?php echo $buscaid['id_persona']; ?>" name="idd" hidden>
                                                            <button class="btn btn-danger btn-md btn-icon-split">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-trash"></i>
                                                                </span>
                                                                <span class="text">Depurar Afiliado</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                <?php } ?>

                                        <?php }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Area Chart End -->

                    </div>
                    <!-- Row End -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include(dirname(__DIR__) . '/component/global/Footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php include(dirname(__DIR__) . '/component/global/ScrollTopButton.php'); ?>

    <!-- Logout Modal-->
    <?php include(dirname(__DIR__) . '/component/global/LogoutModal.php'); ?>

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