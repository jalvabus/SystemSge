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
                        <h1 class="h3 mb-0 text-gray-800">Usuarios Afiliados</h1>
                    </div>


                    <!-- Obtener los datos de la persona -->
                    <?php

                    include "../ConexionRegister.php";

                    if (isset($_GET)) {
                        if ($_GET['personId']) {
                            $id_persona = $_GET['personId'];
                            $sqlGetPerson = "SELECT * from personas where id_persona = $id_persona;";
                            $sqlQuery = $mysqli->query($sqlGetPerson);

                            if ($sqlQuery->num_rows > 0) {
                                $row = $sqlQuery->fetch_array();
                                $nombre = $row['nombre'];
                                $app = $row['app'];
                                $apm = $row['apm'];
                                $correo = $row['email'];
                                $celular = $row['celular'];
                                $birthday = $row['birthday'];
                            }

                            $sqlGetAfiliado = "SELECT * from afiliados where persona_id = $id_persona;";
                            $sqlQueryAfiliado = $mysqli->query($sqlGetAfiliado);

                            if ($sqlQueryAfiliado->num_rows > 0) {
                                $rowAfiliado = $sqlQueryAfiliado->fetch_array();
                                $id_afiliado = $rowAfiliado['id_afiliado'];
                                $fol_afil = $rowAfiliado['fol_afil'];
                                $clv_elector = $rowAfiliado['clv_elector'];
                                $folio_ine = $rowAfiliado['folio_ine'];
                                $fecha_afi = $rowAfiliado['fecha_afi'];
                                $distro_fed = $rowAfiliado['distro_fed'];
                                $seccion_id = $rowAfiliado['seccion_id'];
                                $persona_id = $rowAfiliado['persona_id'];
                                $jerarquia_id = $rowAfiliado['jerar$jerarquia_id'];
                                $hasRelationship = true;
                            } else {
                                $hasRelationship = false;
                            }
                        }
                    }
                    ?>

                    <!-- Crud afiliados -->
                    <?php

                    include "../ConexionRegister.php";

                    if (isset($_POST)) {
                        if (isset($_POST['create'])) {

                            $fol_afil = $_POST['fol_afil'];
                            $clv_elector = $_POST['clv_elector'];
                            $folio_ine = $_POST['folio_ine'];
                            $distro_fed = $_POST['distro_fed'];
                            $seccion_id = $_POST['seccion_id'];
                            $persona_id = $_POST['id_persona'];
                            $jerarquia_id = $_POST['jerarquia_id'];

                            $sqlCreateAfiliado = "INSERT INTO afiliados (id_afiliado, fol_afil, clv_elector, folio_ine, fecha_afi, distro_fed, seccion_id, persona_id, jerarquia_id)" .
                                " VALUES(null,$fol_afil, '$clv_elector','$folio_ine', NOW(),'$distro_fed', $seccion_id, $persona_id, $jerarquia_id)";

                            if ($mysqli->query($sqlCreateAfiliado)) {
                                // echo "<script>window.location.replace('/SystemSge/Juan/Registro.php');</script>";
                                // echo "<div class='alert alert-success' id='success-alert'> <button type='button' class='close' data-dismiss='alert'>x</button> <strong>Afiliado Registrado exitosamente. </strong> </div> ";

                                echo "<div class='alert alert-success' id='success-alert'> <button type='button' class='close' data-dismiss='alert'>x</button> <strong>Afiliado Registrado exitosamente. Espere un momento mientras se cargan los datos.</strong> </div> ";
                                header('location: Registro.php?personId=' + $persona_id);
                                echo "<script>setTimeout(() => { location.replace('/SystemSge/Juan/Registro.php') }, 3000);</script>";
                            } else {
                                $mysqli->error;
                                echo "<div class='alert alert-danger' id='success-alert'> " .
                                    "<button type='button' class='close' data-dismiss='alert'>x</button>" .
                                    "<strong>" .
                                    "Parece que ocurrio un error al afiliar el usuario, comuniquese con un tecnico para saber mas detalles." .
                                    "</strong> " .
                                    "<small>" .
                                    $mysqli->error .
                                    "</small> " .
                                    "</div> ";
                                header('location: Registro.php?personId=' + $persona_id);
                            }
                        }

                        if (isset($_POST['update'])) {


                            $id_afiliado = $_POST['id_afiliado'];
                            $fol_afil = $_POST['fol_afil'];
                            $clv_elector = $_POST['clv_elector'];
                            $folio_ine = $_POST['folio_ine'];
                            $fecha_afi = $_POST['fecha_afi'];
                            $distro_fed = $_POST['distro_fed'];
                            $seccion_id = $_POST['seccion_id'];
                            $persona_id = $_POST['persona_id'];
                            $jerarquia_id = $_POST['jerar$jerarquia_id'];

                            /*
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
                            */
                            echo "<div class='alert alert-success' id='success-alert'> <button type='button' class='close' data-dismiss='alert'>x</button> <strong>Afiliado Actualizado exitosamente. </strong> </div> ";
                            header('location: Registro.php?personId=' + $persona_id);
                        }
                    }

                    ?>


                    <!-- Row -->

                    <div class="row">

                        <!-- Card con datos del Afiliado -->
                        <div class="col-xl-8 col-sm-12 mb-4">
                            <div class="card shadow mb-4">

                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <?php if ($hasRelationship) { ?>
                                        <?php if (isset($_GET['action']) && ($_GET['action'] === 'edit')) { ?>
                                            <h6 class="m-0 font-weight-bold text-secondary">Editar Afiliado</h6>
                                        <?php } else if (isset($_GET['action']) && ($_GET['action'] === 'delete')) { ?>
                                            <h6 class="m-0 font-weight-bold text-secondary">Eliminar Afiliado</h6>
                                        <?php } else { ?>
                                            <h6 class="m-0 font-weight-bold text-secondary">Datos del Afiliado</h6>
                                        <?php } ?>
                                    <?php  } else { ?>
                                        <h6 class="m-0 font-weight-bold text-secondary">Afiliar Persona</h6>
                                    <?php  } ?>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body">

                                    <!-- Card del usuario sin afiliar -->
                                    <?php if (!$hasRelationship) { ?>
                                        <div class='alert alert-warning' id='success-alert'>
                                            <button type='button' class='close' data-dismiss='alert'>x</button>
                                            <strong>
                                                La persona '<?php echo $nombre ?> <?php echo $app ?> <?php echo $apm ?> ' NO se encuentra afiliada.
                                                Llene los datos del formulario y afilie la persona.
                                            </strong>
                                        </div>
                                    <?php  } ?>

                                    <!-- Formulario de Afiliacion -->
                                    <form class="user" method="post" action="Afiliados.php?personId=<?php echo $id_persona ?>">

                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0" style="display: none;">
                                                <input type="text" class="form-control form-control-user" name="id_afiliado" value="<?php echo $id_afiliado ?>">
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <label for="exampleFirstName">Folio Afilifiado</label>
                                                <input type="text" class="form-control form-control-user" name="fol_afil" placeholder="123456" required value="<?php echo $fol_afil ?>">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="">Clave Elector</label>
                                                <input type="text" class="form-control form-control-user" name="clv_elector" placeholder="Clave Elector" required value="<?php echo $clv_elector ?>">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="">Folio INE</label>
                                                <input type="text" class="form-control form-control-user" name="folio_ine" placeholder="Folio INE" required value="<?php echo $folio_ine ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4" style="display: none;">
                                                <label for="">Person identifier</label>
                                                <input type="text" class="form-control form-control-user" name="id_persona" value="<?php echo $id_persona ?>">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="">Distrito Federal</label>
                                                <input type="text" class="form-control form-control-user" name="distro_fed" placeholder="Mexico" required value="<?php echo $distro_fed ?>">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="">Seccion</label>
                                                <select name="seccion_id" id="seccion" class="form-control form-control-user" value="<?php echo $seccion_id ?>" required>

                                                    <?php
                                                    $sqlGetSecciones = "SELECT * from secciones;";
                                                    $sqlSecciones = $mysqli->query($sqlGetSecciones);

                                                    if ($sqlSecciones->num_rows > 0) {
                                                        while ($rowSecciones = $sqlSecciones->fetch_array()) {
                                                    ?>
                                                            <option value="<?php echo $rowSecciones['id_seccion'] ?>"> <?php echo $rowSecciones['seccion'] ?> </option>

                                                        <?php } ?>

                                                    <?php } ?>

                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="">Jerarquia</label>

                                                <select name="jerarquia_id" id="" class="form-control form-control-user" value="<?php echo $jerarquia_id ?>">
                                                    <?php
                                                    $sqlGetJerarquias = "SELECT * from jerarquias;";
                                                    $sqlJerarquias = $mysqli->query($sqlGetJerarquias);

                                                    if ($sqlJerarquias->num_rows > 0) {
                                                        while ($rowJerarquia = $sqlJerarquias->fetch_array()) {
                                                    ?>
                                                            <option value="<?php echo $rowJerarquia['id_jerarquia'] ?>"> <?php echo $rowJerarquia['cargo'] ?> </option>

                                                        <?php } ?>

                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>

                                        <?php if (!$hasRelationship) { ?>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <button type="submit" class="btn btn-secondary btn-user btn-block" name="create">
                                                        Registrar Afiliado
                                                    </button>
                                                </div>
                                                <div class="col-lg-6">
                                                    <a class="btn btn-warning btn-user btn-block" href="Registro.php">
                                                        Cancelar
                                                    </a>
                                                </div>
                                            </div>
                                        <?php  } else { ?>

                                            <?php if (isset($_GET['action']) && ($_GET['action'] === 'delete')) { ?>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <button type="submit" class="btn btn-danger btn-user btn-block" name="delete">
                                                            Eliminar Afiliado
                                                        </button>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <a class="btn btn-warning btn-user btn-block" href="Registro.php">
                                                            Cancelar
                                                        </a>
                                                    </div>
                                                </div>

                                            <?php } else { ?>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <button type="submit" class="btn btn-success btn-user btn-block" name="update">
                                                            Actualizar Afiliado
                                                        </button>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a class="btn btn-warning btn-user btn-block" href="Registro.php">
                                                            Cancelar
                                                        </a>
                                                    </div>
                                                </div>

                                            <?php } ?>
                                        <?php } ?>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- Card con datos del Afiliado End -->

                        <!-- Card con datos de la persona -->
                        <?php if ($hasRelationship) { ?>

                            <div class="col-xl-4 mb-4">
                                <div class="card border-left-success shadow py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Informacion de la persona AFILIADA</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Nombre: <?php echo $nombre ?> <?php echo $app ?> <?php echo $apm ?>
                                                </div>
                                                <div class="h7 mb-0 font-weight-bold text-gray-800">
                                                    Correo: <?php echo $correo ?>
                                                </div>
                                                <div class="h7 mb-0 font-weight-bold text-gray-800">
                                                    Telefono: <?php echo $celular ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php  } ?>
                        <!-- Card con datos de la persona End -->

                    </div>
                    <!-- Row End -->
                    <!-- Crud afiliados -->

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