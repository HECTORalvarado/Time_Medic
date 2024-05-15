<?php

require_once '../controllers/fechasController.php';

$fechasCtrl = new FechasController();


if (!isset($_SESSION['username'])) {
	header("Location: index.html");
}

if ($_SESSION['role'] != 3) {
	header("Location: index.html");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fechas</title>
	<link rel="stylesheet" href="./css/main.css">
</head>

<body>
	<?php
	require_once './views/menu.php';
	?>
	<main>
		<div class="btn-add">
			<a href="addfecha.php" class="liniks"><i class="fa-solid fa-plus fa-2x"></i></a>
		</div>
		<table>
			<thead>
				<tr>
					<th>Fecha Inicio</th>
					<th>Fecha Fin</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$fechas = $fechasCtrl->getFechas();

				foreach ($fechas as $fecha) {
					echo "
				<tr>
					<td>", $fecha['fecha_inicio'], "</td>
					<td>", $fecha['fecha_fin'], "</td>", '
					<td class="formEdtContainer">
						<form action="editEspecialidad.php" class="formEdt">
							<input type="hidden" name="id">
							<button type="submit" class="formBtnEdt">Editar</button>
						</form>
						<form action="../controllers/deleteEspecialidad.php" class="formEdt">
							<input type="hidden" name="id">
							<button type="submit" class="formBtnDlt">Eliminar</button>
						</form>
					</td>
				</tr>';
				}
				?>
			</tbody>
		</table>


	</main>
	<script src="https://kit.fontawesome.com/783b8d7984.js" crossorigin="anonymous"></script>
	<script src="./js/main.js"></script>
</body>

</html>