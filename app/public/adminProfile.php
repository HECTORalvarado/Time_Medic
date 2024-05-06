<?php
require_once '../controllers/user.php';
?>

<!DOCTYPE html>
<html lang="en">

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
		<form action="" class="grid3">
			<section>
				<figure class="imgContainer imgAdminProfile">
					<input type="file" name="img" id="img" accept="image/*">
					<label for="img" class="lblImg" onclick="changeImg()">
						<i class="fa-solid fa-pencil fa-2x btnPencil"></i>
					</label>
					<img src="./img/userDefault.png" alt="" id="previewImgPP">
					<?php 
						if($user['img'] != null){
							echo'<img src="./img/userDefault.png" alt="" id="imgPP">';
						} else{
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
						<div>
							<input type="text" name="name" value=<?php echo $user['nombre'];?> placeholder="nombre" disabled required class="profileInput">
							<button onclick="activateInput(1)"><i class="fa-solid fa-pencil btnPencil"></i></button>
						</div>
						<div>
							<input type="text" name="lastname" value=<?php echo $user['apellido'];?> placeholder="apellido" disabled required class="profileInput">
							<button onclick="activateInput(2)"><i class="fa-solid fa-pencil btnPencil"></i></button>
						</div>
					</div>
					<div>
						<div>
							<input type="text" name="username" value=<?php echo $user['username'];?> placeholder="username" disabled required class="profileInput">
							<button onclick="activateInput(3)"><i class="fa-solid fa-pencil btnPencil"></i></button>
						</div>
						<div>
							<input type="email" name="email" value=<?php echo $user['correo'];?> placeholder="email@example.com" disabled required class="profileInput">
							<button onclick="activateInput(4)"><i class="fa-solid fa-pencil btnPencil"></i></button>
						</div>
						<div>
							<input type="password" name="password" placeholder="contraseña" disabled required class="profileInput">
							<button onclick="activateInput(5)"><i class="fa-solid fa-pencil btnPencil"></i></button>
						</div>
					</div>
				</div>
				<div class="grid2Form">
					<button type="submit">
						Guardar Cambios
						<i class="fa-solid fa-floppy-disk"></i>
					</button>
					<?php
					if ($_SESSION['role'] == 1) {
						echo '<a href="/app/public/getCitas.php" class="canceLink">Cancelar
							<i class="fa-solid fa-trash"></i>
							</a>';
					}
					if ($_SESSION['role'] == 2) {
						echo '<a href="/app/public/getCitas.php" class="canceLink">Cancelar
							<i class="fa-solid fa-trash"></i>
							</a>';
					}
					if ($_SESSION['role'] == 3) {
						echo '<a href="/app/public/getCitas.php" class="canceLink">
							Cancelar
							<i class="fa-solid fa-trash"></i>
							</a>';
					}
					?>
				</div>
			</section>
		</form>
	</main>
</body>

</html>