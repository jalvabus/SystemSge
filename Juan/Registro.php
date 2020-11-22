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
                        <h1 class="h3 mb-0 text-gray-800">Personas</h1>
                    </div>

                    <?php

                    include "../ConexionRegister.php";

                    if (isset($_POST)) {

                        if (isset($_POST['create'])) {

                            $correo_cr = $_POST["txtcorreo"];
                            $nombre_cr = $_POST["txtnombre"];
                            $apellidoP_cr = $_POST["txtapp"];
                            $apellidoM_cr = $_POST["txtapm"];
                            $tel_cr = $_POST["txttel"];
                            $fecha_cr = $_POST["txtfecha"];
                            $contra_cr = $_POST["txtpassword"];

                            $qry = "INSERT INTO personas (id_persona,email,nombre,app,apm,celular,birthday,password) VALUES(null,'$correo_cr','$nombre_cr','$apellidoP_cr','$apellidoM_cr','$tel_cr','$fecha_cr','$contra_cr')";

                            if ($mysqli->query($qry)) {
                                // echo "<script>window.location.replace('/SystemSge/Juan/Registro.php');</script>";
                                echo "<div class='alert alert-success' id='success-alert'> <button type='button' class='close' data-dismiss='alert'>x</button> <strong>Afiliado Registrado exitosamente. </strong> </div> ";
                                header('location: Registro.php');
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

                        if (isset($_POST['delete'])) {

                            $id_persona_del = $_POST["id_persona"];

                            $queryDelete = "DELETE from personas WHERE id_persona = $id_persona_del; ";
                            $sqlQuery = $mysqli->query($queryDelete);
                            echo "<div class='alert alert-success' id='success-alert'> <button type='button' class='close' data-dismiss='alert'>x</button> <strong>Afiliado Eliminado exitosamente. </strong> </div> ";
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
                                $password = $row['password'];
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
                                    <?php if (isset($_GET['action']) && ($_GET['action'] === 'edit')) { ?>
                                        <h6 class="m-0 font-weight-bold text-secondary">Editar Persona</h6>
                                    <?php } else if (isset($_GET['action']) && ($_GET['action'] === 'delete')) { ?>
                                        <h6 class="m-0 font-weight-bold text-secondary">Eliminar Persona</h6>
                                    <?php } else { ?>
                                        <h6 class="m-0 font-weight-bold text-secondary">Registrar Nueva Persona</h6>
                                    <?php } ?>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form class="user" method="post" action="Registro.php" name="frmRPersonas">
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0" style="display: none;">
                                                <input type="text" class="form-control form-control-user" name="id_persona" value="<?php echo $id_persona ?>">
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <label for="exampleFirstName">Nombre(s)</label>
                                                <input type="text" class="form-control form-control-user" name="txtnombre" placeholder="Nombre(s)" required value="<?php echo $nombre ?>">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="">Apellido Paterno</label>
                                                <input type="text" class="form-control form-control-user" name="txtapp" placeholder="Apellido Paterno" required value="<?php echo $app ?>">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="">Apellido Materno</label>
                                                <input type="text" class="form-control form-control-user" name="txtapm" placeholder="Apellido Materno" required value="<?php echo $apm ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <label for="">Correo Electronico</label>
                                                <input type="email" class="form-control form-control-user" name="txtcorreo" placeholder="ejemplo@gmail.com" required value="<?php echo $correo ?>">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="">Telefono</label>
                                                <input type="tel" class="form-control form-control-user" name="txttel" placeholder="55555555" required value="<?php echo $celular ?>">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="">Fecha de nacimiento</label>
                                                <input type="date" class="form-control form-control-user" name="txtfecha" placeholder="Fecha de nacimiento" required value="<?php echo $birthday ?>">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="">Contraseña</label>
                                                <input type="password" class="form-control form-control-user" name="txtpassword" placeholder="Password" required value="<?php echo $password ?>">
                                            </div>
                                        </div>
                                        <?php if (isset($_GET['action']) && ($_GET['action'] === 'edit')) { ?>
                                            <button type="submit" class="btn btn-success btn-user btn-block" name="update">
                                                Actualizar Persona
                                            </button>
                                            <a class="btn btn-warning btn-user btn-block" href="Registro.php">
                                                Cancelar
                                            </a>
                                        <?php } else if (isset($_GET['action']) && ($_GET['action'] === 'delete')) { ?>
                                            <button type="submit" class="btn btn-danger btn-user btn-block" name="delete">
                                                Eliminar Persona
                                            </button>
                                            <a class="btn btn-warning btn-user btn-block" href="Registro.php">
                                                Cancelar
                                            </a>
                                        <?php } else { ?>
                                            <button type="submit" class="btn btn-danger btn-user btn-block" name="create">
                                                Registrar Persona
                                            </button>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Area Chart End -->

                    </div>
                    <!-- Row End -->

                    <!-- Row -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-sm-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-secondary">Ver todos los Afiliados</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellido Paterno</th>
                                                <th>Apellido Materno</th>
                                                <th>Correo Electronico</th>
                                                <th>Telefono</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th>Opciones</th>
                                                <th>Afiliados</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $sql = "select * , (select id_afiliado from afiliados where afiliados.persona_id = personas.id_persona) as id_afiliado from personas; ";
                                            $result = $mysqli->query($sql);
                                            $number = 0;

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <tr>
                                                        <td> <?php echo ($row['nombre']) ?> </td>
                                                        <td> <?php echo ($row['app']) ?> </td>
                                                        <td> <?php echo ($row['apm']) ?> </td>
                                                        <td> <?php echo ($row['email']) ?> </td>
                                                        <td> <?php echo ($row['celular']) ?> </td>
                                                        <td> <?php echo ($row['birthday']) ?> </td>
                                                        <td>
                                                            <a class="btn btn-warning btn-icon-split" href="Registro.php?action=edit&personId=<?php echo $row['id_persona'] ?>">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-edit"></i>
                                                                </span>
                                                                <span class="text">Editar</span>
                                                            </a>
                                                            <a class="btn btn-danger btn-icon-split" href="Registro.php?action=delete&personId=<?php echo $row['id_persona'] ?>">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-trash"></i>
                                                                </span>
                                                                <span class="text">Eliminar</span>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php if ($row['id_afiliado']) { ?>

                                                                <a href="Afiliados.php?personId=<?php echo $row['id_persona'] ?>" class="btn btn-success btn-icon-split">
                                                                    <span class="icon text-white-50">
                                                                        <i class="fas fa-check"></i>
                                                                    </span>
                                                                    <span class="text">Persona Afiliada</span>
                                                                </a>

                                                            <?php } else {  ?>

                                                                <a class="btn btn-warning btn-icon-split" href="Afiliados.php?personId=<?php echo $row['id_persona'] ?>">
                                                                    <span class="icon text-white-50">
                                                                        <i class="fas fa-people-arrows"></i>
                                                                    </span>
                                                                    <span class="text">Click para afiliar</span>
                                                                </a>

                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
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