<?php include "Logueado.php"; ?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/style.css">
	<title>Syste-SGE</title>
	<script src="Gustavo/Js/jquery-3.2.1.min.js"></script>
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</head>

<body>
	<div class="d-flex">

		<?php include "MenuLateral.php"; ?>

		<div class="w-100">
			<?php include "MenuSuperior.php"; ?>
			<br><br>
			<div class="container">
				<div class="bg-white p-5 shadow rounded">

					<?php
					include "../Conexion.php";
					$id = $_POST["id"];
					$consultatodo = "SELECT * from personas where id_persona='" . $_POST['id'] . "'";
					$result =  mysqli_query($conexion, $consultatodo);
					while ($busca = mysqli_fetch_array($result)) {

					?>
						Información del Afiliado: <?php echo $busca['nombre']; ?> <?php echo $busca['app']; ?> <?php echo $busca['apm']; ?>

					<?php } ?>
					</h2>
					<table class="table table-sm table-bordered">
						<thead style="text-align: center;">
							<tr class="table-danger">
								<th scope="col">Folio de afiliado</th>
								<th scope="col">Clave Elector</th>
								<th scope="col">Folio Ine</th>
								<th scope="col">Afiliado el Día</th>
								<th scope="col">Distrito Federal</th>
								<th scope="col">Sección</th>
								<th scope="col">Cargo</th>
							</tr>
						</thead>
						<tbody>
							<tr class="table-info" style="text-align: center;">

								<?php

								$consultatodo = "SELECT afiliados.fol_afil as fol_afil, afiliados.clv_elector as clv_elector, afiliados.folio_ine, afiliados.fecha_afi as fecha_afi, afiliados.distro_fed as distro_fed, secciones.seccion as seccion, jerarquias.cargo as cargo, afiliados.persona_id as persona_id from afiliados inner join secciones on  secciones.id_seccion = afiliados.seccion_id inner join jerarquias on jerarquias.id_jerarquia = afiliados.jerarquia_id where afiliados.persona_id='$id'";
								$result =  mysqli_query($conexion, $consultatodo);
								while ($busca = mysqli_fetch_array($result)) {

								?>

									<th scope="row"><?php echo $busca['fol_afil']; ?></th>
									<td><?php echo $busca['clv_elector']; ?></td>
									<td><?php echo $busca['folio_ine']; ?></td>
									<td><?php echo $busca['fecha_afi']; ?></td>
									<td><?php echo $busca['distro_fed']; ?></td>
									<td><?php echo $busca['seccion']; ?></td>
									<td><?php echo $busca['cargo']; ?></td>
								<?php } ?>
							</tr>
						</tbody>
					</table>

					<div class="d-flex justify-content-between align-items-center">
						<div class="btn-group btn-group-sm">
							<a class="btn btn-primary" href="">
								Ver Ubicación
							</a>
						</div>
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
										<div class="btn-group btn-group-sm">
											<input type="text" value="<?php echo $buscaid['id_persona']; ?>" name="idd" hidden>
											<button class="btn btn-danger">
												<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
												</svg>Depurar Afiliado
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

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>