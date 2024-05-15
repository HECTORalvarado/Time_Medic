<?php
require_once '../controllers/citasController.php';

if (!isset($_SESSION['username'])) {
	header("Location: index.html");
}

if ($_SESSION['role'] != 2) {
	header("Location: index.html");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>citas</title>
	<link rel="stylesheet" href="./css/main.css">
	<script src="https://kit.fontawesome.com/783b8d7984.js" crossorigin="anonymous"></script>
	<script src="./js/main.js"></script>

</head>

<body>
	<?php
	require_once './views/menu.php';
	?>
	<main>
		<table>
			<tr>
				<th>fecha</th>
				<th>Hora</th>
				<th>Paciente</th>
				<th>Estado</th>
				<th>Acción</th>
			</tr>
			<?php
			$citasController = new citasController();
			$citas = $citasController->getCitasDoctor();
			if (!is_null($citas) && is_array($citas)) {
				foreach ($citas as $cita) {
					echo "
					<tr>
						<td>
							 ", $cita['fecha_cita'], "
						</td>
						<td>
							", $cita['hora_cita'], "
						</td>
						<td>
							
							", $cita['nombre'], ' ', $cita['apellido'], "
							
						</td>
						<td>";

					if ($cita['estado'] == 0) {
						echo 'pendiente';
						echo '
						<td class="formEdtContainer">
							<form action="../controllers/completeCita.php" class="formEdt">
								<input type="hidden" name="id" value=', $cita['idcitas'], ' >
								<button type="submit" class="formBtnEdt">Realizada</button>
							</form>
							<form action="../controllers/cancelCita.php" class="formEdt">
								<input type="hidden" name="id" value=', $cita['idcitas'], '>
								<button type="submit" class="formBtnDlt">Cancelar</button>
							</form>
						</td>
					</tr>';
					} else if ($cita['estado'] == 1) {
						echo 'realizada';
						echo '
						<td class="formEdtContainer">
							<form action="../controllers/completeCita.php" class="formEdt">
								<input type="hidden" name="id" value=', $cita['idcitas'], ' >
								<button type="submit" class="formBtnEdt" disabled >Realizada</button>
							</form>
							<form action="../controllers/cancelCita.php" class="formEdt">
								<input type="hidden" name="id" value=', $cita['idcitas'], '>
								<button type="submit" class="formBtnDlt" disabled >Cancelar</button>
							</form>
						</td>
					</tr>';
					} else {
						echo 'cancelada';
						echo '
						<td class="formEdtContainer">
							<form action="../controllers/completeCita.php" class="formEdt">
								<input type="hidden" name="id" value=', $cita['idcitas'], ' >
								<button type="submit" class="formBtnEdt" disabled >Realizada</button>
							</form>
							<form action="../controllers/cancelCita.php" class="formEdt">
								<input type="hidden" name="id" value=', $cita['idcitas'], '>
								<button type="submit" class="formBtnDlt" disabled >Cancelar</button>
							</form>
						</td>
					</tr>';
					}
				}
			} else {
				print("The given variable is not an array and contains a null value.");
			} ?>
		</table>
	</main>
</body>

</html>