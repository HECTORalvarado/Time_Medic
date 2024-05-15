<?php
require_once '../controllers/horariosController.php';

if (!isset($_SESSION['username'])) {
	header("Location: index.html");
}

if ($_SESSION['role'] != 2) {
	header("Location: index.html");
}

$horariosCtrl = new HorariosController();

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>agregar fecha</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./css/main.css">
</head>

<body>
	<?php
	require_once './views/menu.php';
	?>
	<main>
		<div class="formContainer">
			<figure class="imgContainer">
				<img src="./img/undraw_time_management_re_tk5w.svg" alt="doctor image">
			</figure>
			<form action="../controllers/addHorarioDoc.php" method="post">
				<h3 class="titles">Agregar horario</h3>
				<div>
					<label for="hora">Fechas Disponibles</label>
					<select name="hora" id="hora">
						<?php
						$horarios = $horariosCtrl->getHorarios();
						foreach ($horarios as $horario) {
							echo '<option value="', $horario['id_horarios'], '">', $horario['hora_inicio'], ' - ', $horario['hora_fin'], '</option>';
						}
						?>
					</select>
				</div>
				<input type="submit" value="Agregar horario">
			</form>
		</div>
	</main>

	<script src="https://kit.fontawesome.com/783b8d7984.js" crossorigin="anonymous"></script>
	<script src="./js/main.js"></script>
</body>

</html>