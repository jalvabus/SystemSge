<?php
$consultatodo = "SELECT afiliados.persona_id as persona_id, personas.id_persona as id_persona, personas.nombre as nom, personas.app as app, personas.apm as apm, afiliados.fecha_afi as fecha, personas.email as correo FROM personas inner join afiliados on personas.id_persona = afiliados.persona_id WHERE personas.email != 'pri@gmail.com' and personas.email != 'inega@gmail.com' order by persona_id DESC LIMIT $start_from, $record_per_page";
$result =  mysqli_query($conexion, $consultatodo);
$number = 0;
while ($busca = mysqli_fetch_array($result)) {
    $number++;
    if ($busca == 0) {
?>
        <ul class="list-group">
            <li class="list-group-item border-0 mb-3 shadow-sm list-group-item-danger">
                <a class="text-secondary d-flex justify-content-between align-items-center" href="#">
                    <span class="font-weight-bold">
                        NO hay Afiliados en el Sistema.
                    </span>
                </a>
            </li>
        </ul>
    <?php
    } else {
    ?>

        <div class="col-xl-12 mb-2">
            <div class="card border-left-danger shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-lg-4">
                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">
                                Usuario: </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $busca['nom'] . ' ' . $busca['app'] . ' ' . $busca['apm']; ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Con correo Electrónico: </div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?php echo $busca['correo']; ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <i class="fas fa-calendar text-gray-300"></i>
                            <span class="text-black-50">
                                Fecha de Afiliación: <?php echo $busca['fecha']; ?>
                                <form action="Gustavo/MuestraUsuario.php" method="post">
                                    <input type="text" name="id" value="<?php echo $busca['id_persona']; ?>" hidden>
                                    <button href="#" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                        <span class="text">Ver los detalles del afiliado</span>
                                    </button>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php }
} ?>
<nav aria-label="Page navigation example pt-5">
    <ul class="pagination pagination-md justify-content-center pt-3">
        <?php
        $page_query = "SELECT afiliados.persona_id as persona_id, personas.nombre as nom, personas.app as app, personas.apm as apm, afiliados.fecha_afi as fecha, personas.email as correo FROM personas inner join afiliados on personas.id_persona = afiliados.persona_id WHERE personas.email != 'pri@gmail.com' and personas.email != 'inega@gmail.com' order by persona_id ASC";
        $page_result = mysqli_query($conexion, $page_query);
        $total_records = mysqli_num_rows($page_result);

        $total_pages = ceil($total_records / $record_per_page);

        $start_loop = $pagina;

        $diferencia = $total_pages - $pagina;

        if ($diferencia <= 4) {
            $start_loop = $total_pages - 4;
        }
        $end_loop = $start_loop + 3;


        if ($pagina > 1) {
            echo "<li class='page-item'><a class='page-link' href='inicio.php?pagina=1'>Principio</a></li>";
            echo "<li class='page-item'><a class='page-link' href='inicio.php?pagina=" . ($pagina - 1) . "'>Anterior</a></li>";
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($pagina == $i) {
                echo "<li class='page-item active'><a class='page-link' href='inicio.php?pagina=" . $i . "'>" . $i . "</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='inicio.php?pagina=" . $i . "'>" . $i . "</a></li>";
            }
        }

        if ($pagina <= $end_loop) {
            echo "<li class='page-item'><a class='page-link' href='inicio.php?pagina=" . ($pagina + 1) . "'>Siguiente</a></li>";
            echo "<li class='page-item'><a class='page-link' href='inicio.php?pagina=" . $total_pages . "'>Fin</a></li>";
        }
        ?>
    </ul>
</nav>