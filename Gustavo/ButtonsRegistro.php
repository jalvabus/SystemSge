<div>
    <?php
        $query="SELECT * FROM personas WHERE email='$email'";
            $resultado=  mysqli_query($conexion, $query);
            while($row = mysqli_fetch_array($resultado)){
                $llamaemail = $row['email'];
                if($_SESSION['email'] == "pri@gmail.com" || $_SESSION['email'] == "inega@gmail.com"){
    ?>
	<a href="Gustavo/CreateSection.php"> <button class="btn btn-success">Agregar Sección</button></a>
	<a href="Gustavo/CreateColonias.php"><button class="btn btn-success">Agregar Colonia</button></a>
	<a href="Gustavo/CreateMunicipio.php"><button class="btn btn-success">Agregar Municipio</button></a><hr>
    <?php
                }
            }
    ?>
</div>