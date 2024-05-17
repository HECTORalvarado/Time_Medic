<?php
require_once '../controllers/user.php';

if (!isset($_SESSION['username'])) {
	header("Location: index.html");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administra Perfil</title>
	<link rel="stylesheet" href="./css/main.css">
	<script src="https://kit.fontawesome.com/783b8d7984.js" crossorigin="anonymous"></script>
	<script src="./js/main.js"></script>
</head>

<?php
require_once './views/menu.php';
$userCtrl = new UserController();
$user = $userCtrl->getUserInfor();
?>

<body>
	<main>
		<form action="../controllers/editUser.php" method="post" class="grid3">
			<input type="hidden" name="id" value=<?php $user['idusuario'] ?>>
			<section>
				<figure class="imgContainer imgAdminProfile">
					<input type="file" name="img" id="img" accept="image/*">
					<label for="img" class="lblImg" onclick="changeImg()">
						<i class="fa-solid fa-pencil fa-2x btnPencil"></i>
					</label>
					<img src="./img/userDefault.png" alt="" id="previewImgPP">
					<?php
					if ($user['img'] != null) {
						echo '<img src="data:image/jpg;base64,', base64_encode($user['img']), '" alt="" id="imgPP">';
					} else {
						echo '<img src="./img/userDefault.png" alt="" id="imgPP">';
					}
					?>
				</figure>
			</section>
			<hr>
			<section>
				<h4><?php echo $_SESSION['username']; ?></h4>
				<div class="grid2Form">
					<div>
						<div class="grid2Input">
							<input type="text" name="name" id="name" value=<?php echo $user['nombre']; ?> placeholder="nombre" disabled required class="profileInput">
							<button type="button" class="btnInput" onclick="activateInput(1)"><i class="fa-solid fa-pencil btnPencil"></i></button>
						</div>
						<div class="grid2Input">
							<input type="text" name="lastname" id="lastname" value=<?php echo $user['apellido']; ?> placeholder="apellido" disabled required class="profileInput">
							<button type="button" class="btnInput" onclick="activateInput(2)"><i class="fa-solid fa-pencil btnPencil"></i></button>
						</div>
					</div>
					<div>
						<div class="grid2Input">
							<input type="text" name="username" id="username" value=<?php echo $user['username']; ?> placeholder="username" disabled required class="profileInput">
							<button type="button" class="btnInput" onclick="activateInput(3)"><i class="fa-solid fa-pencil btnPencil"></i></button>
						</div>
						<div class="grid2Input">
							<input type="email" name="email" id="email" value=<?php echo $user['correo']; ?> placeholder="email@example.com" disabled required class="profileInput">
							<button type="button" class="btnInput" onclick="activateInput(4)"><i class="fa-solid fa-pencil btnPencil"></i></button>
						</div>
						<div class="grid2Input">
							<input type="password" name="password" id="password" placeholder="contraseña" disabled required class="profileInput">
							<button type="button" class="btnInput" onclick="activateInput(5)"><i class="fa-solid fa-pencil btnPencil"></i></button>
						</div>
					</div>
				</div>
				<div class="grid2Form">
					<div>
						<button type="submit" name="edit" class="btnProfile">
							Guardar Cambios &nbsp; <i class="fa-solid fa-floppy-disk"></i>
						</button>
					</div>
					<div>
						<button type="submit" name="delete" class="canceLink btnCancel">
							Eliminar Cuenta &nbsp; <i class="fa-solid fa-trash"></i>
						</button>
					</div>
				</div>
			</section>
		</form>
	</main>
</body>

</html>