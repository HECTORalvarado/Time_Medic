<?php

session_start();

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
	<title>agregar horario</title>
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
			<form action="../controllers/addHorario.php" method="post">
				<h3 class="titles">Agregar Horario</h3>
				<div>
					<label for="hInicio">Hora Inicio</label>
					<input type="time" name="hInicio" id="hInicio">
				</div>
				<div>
					<label for="hFin">Hora Fin</label>
					<input type="time" name="hFin" id="hFin">
				</div>
				<input type="submit" value="Agregar Horario">
			</form>
		</div>
	</main>

	<script src="https://kit.fontawesome.com/783b8d7984.js" crossorigin="anonymous"></script>
	<script src="./js/main.js"></script>
</body>

</html>