            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <form method= "post" action="../inicios.php" class="form-inline position-relative my-2 d-inline-block">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar" name="busca">
                        <button class="btn btn-search position-absolute" type="submit"><i class="icon ion-md-search mr-2 lead"></i></button>
                    </form>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $email?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" style="background: red;">

                                        <?php
                                            $consulta="SELECT * FROM personas WHERE email='$email'";
                                            $resultado=  mysqli_query($conexion, $consulta);
                                            while($row = mysqli_fetch_array($resultado)){
                                                echo $row['nombre']; echo $row['app'];
                                        } ?>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../CerrarSesion.php"><i class="icon ion-md-power mr-2 lead"></i>Cerrar Sesi&oacute;n</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>