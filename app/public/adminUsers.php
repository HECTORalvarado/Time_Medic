<?php
require_once '../controllers/user.php';

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
	<title>Administrar usuarios</title>
	<link rel="stylesheet" href="./css/main.css">
	<script src="https://kit.fontawesome.com/783b8d7984.js" crossorigin="anonymous"></script>
	<script src="./js/main.js"></script>
</head>

<body>
	<?php
	require_once './views/menu.php';
	?>
	<main>
		<div class="btn-add">
			<a href="addUser.php" class="liniks"><i class="fa-solid fa-plus fa-2x"></i></a>
		</div>
		<table>
			<tr>
				<th>id</th>
				<th>nombre</th>
				<th>Apellido</th>
				<th>Correo</th>
				<th>Username</th>
				<th>Rol</th>
				<th>Estado</th>
			</tr>
			<?php
			$userCtrl = new UserController();
			$users = $userCtrl->getAllUsers();
			if (!is_null($users) && is_array($users)) {
				foreach ($users as $user) {
					echo "
						<tr>
							<td>
								", $user['idusuario'], "
							</td>
							<td>
								", $user['nombre'], "
							</td>
							<td>
								", $user['apellido'], "
							</td>
							<td>
								", $user['correo'], "
							</td>
							<td>
								", $user['username'], "
							</td>
							<td>
								", $user['role'], "
							</td>
							<td>";
								
								if ($user['estado'] == 1) {
									echo 'activo';
								} else {
									echo 'inactivo';
								}
								echo"
							</td>
						</tr>";
					 }
			} else {
				print("The given variable is not an array and contains a null value.");
			}
			?>
		</table>
	</main>

</body>

</html>