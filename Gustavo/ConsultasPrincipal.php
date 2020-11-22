<?php

$fullname = $_POST["busca"];

    $consultatodo="SELECT afiliados.persona_id as persona_id, personas.id_persona as id_persona, personas.nombre as nom, personas.app as app, personas.apm as apm, afiliados.fecha_afi as fecha, personas.email as correo FROM personas inner join afiliados on personas.id_persona = afiliados.persona_id WHERE concat_ws(' ' ,nombre, app, apm)='$fullname' order by persona_id DESC LIMIT $start_from, $record_per_page";
    $result=  mysqli_query($conexion, $consultatodo);
    $number =0;
    while($busca = mysqli_fetch_array($result)){
        $number ++;
        if($busca == 0){
    ?>
    <ul class="list-group">
        <li class="list-group-item border-0 mb-3 shadow-sm list-group-item-danger">
            <a class="text-secondary d-flex justify-content-between align-items-center" href="#">
                <span class="font-weight-bold">
                    No se encontraron Coincidencias o no escribio el nombre.
                </span>
            </a>
        </li>
    </ul>
    <?php
        } else {
    ?>
	<ul class="list-group">
	    <li class="list-group-item border-0 mb-3 shadow-sm list-group-item-danger">
	    <a class="text-secondary d-flex justify-content-between align-items-center">
	        <span class="font-weight-bold">
			    Usuarios:  <?php echo $busca['nom']; echo $busca['app']; echo $busca['apm']; ?><br>
			    Con correo Electrónicos: <?php echo $busca['correo']; ?> <br>
			</span>
			<span class="text-black-50">
				Fecha de Afiliación: <?php echo $busca['fecha']; ?>
                <form action="Gustavo/MuestraUsuario.php" method="post">
                    <input type="text" name="id" value="<?php echo $busca['id_persona']; ?>" hidden>
                <button class="btn btn-danger">
                    Ver Info.
                </button>
                </form>
			</span>
        </a>
        </li>
        <?php
                }
            }
        ?>
	</ul>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
                $page_query = "SELECT afiliados.persona_id as persona_id, personas.nombre as nom, personas.app as app, personas.apm as apm, afiliados.fecha_afi as fecha, personas.email as correo FROM personas inner join afiliados on personas.id_persona = afiliados.persona_id WHERE personas.email != 'pri@gmail.com' and personas.email != 'inega@gmail.com' order by persona_id ASC";
                $page_result = mysqli_query($conexion, $page_query);
                $total_records = mysqli_num_rows($page_result);
                $total_pages = ceil($total_records/$record_per_page);
                $start_loop = $pagina;
                $diferencia = $total_pages - $pagina;
                if($diferencia <= 4){
                    $start_loop = $total_pages - 4;
                }
                $end_loop = $start_loop + 3;
                if($pagina > 1){
                    echo "<li class='page-item'><a class='page-link' href='inicio.php?pagina=1'>Principio</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='inicio.php?pagina=".($pagina - 1)."'>Anterior</a></li>";
                }
                if($pagina <= $end_loop){
                    echo "<li class='page-item'><a class='page-link' href='inicio.php?pagina=".($pagina + 1)."'>Siguiente</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='inicio.php?pagina=".$total_pages."'>Fin</a></li>";
                }
            ?>
        </ul>
    </nav>