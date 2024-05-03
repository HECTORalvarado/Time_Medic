<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>citas</title>
</head>

<body>
	<?php
	require_once '../controllers/citasController.php';
	require_once './views/menu.php';
	?>
	<main>
		<table>
			<tr>
				<th>fecha</th>
				<th>Hora</th>
				<th>Médico</th>
				<th>Estado</th>
			</tr>
			<?php
			$citasController = new citasController();
			$citas = $citasController->getCitasPaciente();
			foreach ($citas as $cita) {
			?>
				<tr>
					<td>
						<?php echo $cita['fecha_cita'] ?>
					</td>
					<td>
						<?php echo $cita['hora_cita'] ?>
					</td>
					<td>
						<?php echo $cita['doctor'] ?>
					</td>
					<td>
						<?php echo $cita['estado'] ?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</main>
</body>

</html>