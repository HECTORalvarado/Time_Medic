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
	<title>Add User</title>
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
				<img src="./img/undraw_doctor_kw-5-l 1.svg" alt="doctor image">
			</figure>
			<form action="/app/controllers/createUser.php" method="post">
				<h3 class="titles">Agregar Usuario</h3>
				<div>
					<label for="email">Corrreo electronico</label>
					<input type="email" name="email" id="email" placeholder="email@example.com">
				</div>
				<div>
					<label for="username">nombre de usuario</label>
					<input type="text" name="username" id="username" placeholder="username">
				</div>
				<div>
					<label for="password">Contraseña</label>
					<input type="password" name="password" id="password" placeholder="* * * * * * * *">
				</div>
				<div>
					<label for="name">nombre</label>
					<input type="text" name="name" id="name" placeholder="username">
				</div>
				<div>
					<label for="lastname">apellido</label>
					<input type="text" name="lastname" id="lastname" placeholder="username">
				</div>
				<div>
					<label for="role">Rol</label>
					<select name="role" id="role">
						<option value="1">Paciente</option>
						<option value="2">Doctor</option>
						<option value="3">Administrador</option>
					</select>
				</div>
				<input type="submit" value="Agregar Usuario">
			</form>
		</div>
	</main>

	<script src="https://kit.fontawesome.com/783b8d7984.js" crossorigin="anonymous"></script>
	<script src="./js/main.js"></script>
</body>

</html>