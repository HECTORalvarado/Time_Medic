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
				<img src="./img/undraw_online_calendar_re_wk3t.svg" alt="doctor image">
			</figure>
			<form action="../controllers/addFecha.php" method="post">
				<h3 class="titles">Agregar fecha</h3>
				<div>
					<label for="fInicio">Fecha Inicio</label>
					<select name="fInicio" id="fInicio">
						<option value="Lunes">Lunes</option>
						<option value="Martes">Martes</option>
						<option value="Miércoles">Miércoles</option>
						<option value="Jueves">Jueves</option>
						<option value="Viernes">Viernes</option>
						<option value="Sábado">Sábado</option>
						<option value="Domingo">Domingo</option>

					</select>
				</div>
				<div>
					<label for="fFin">Fecha Fin</label>
					<select name="fFin" id="fFin">
						<option value="Lunes">Lunes</option>
						<option value="Martes">Martes</option>
						<option value="Miércoles">Miércoles</option>
						<option value="Jueves">Jueves</option>
						<option value="Viernes">Viernes</option>
						<option value="Sábado">Sábado</option>
						<option value="Domingo">Domingo</option>

					</select>
				</div>
				<input type="submit" value="Agregar fecha">
			</form>
		</div>
	</main>

	<script src="https://kit.fontawesome.com/783b8d7984.js" crossorigin="anonymous"></script>
	<script src="./js/main.js"></script>
</body>

</html>