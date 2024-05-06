<?php
require_once '../controllers/dasboard.php';

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
	<title>Dashboard</title>
	<link rel="stylesheet" href="./css/main.css">
	<script src="./js/main.js"></script>
	<script src="https://kit.fontawesome.com/783b8d7984.js" crossorigin="anonymous"></script>
</head>

<body>
	<?php
	require_once './views/menu.php';
	$dasboardCtrl = new DasboardCtrl();
	$pacientes = $dasboardCtrl->getPacientes();
	$doctores = $dasboardCtrl->getDoctores();
	$citas = $dasboardCtrl->getNCitas();
	?>

	<main>
		<h2 class="titles">Dasboard</h2>

		<section class="dasboardGrid3">
			<div class="dasboardCard">
				<div class="dasboardCardImg">
					<i class="fa-solid fa-user fa-7x"></i>
				</div>
				<div>
					<h3 class="titles">Pacientes</h3>
					<p><?php echo $pacientes['nPacientes']; ?></p>
				</div>
			</div>
			<div class="dasboardCard">
				<div class="dasboardCardImg">
					<i class="fa-solid fa-user-doctor fa-7x"></i>
				</div>
				<div>
					<h3 class="titles">Doctores</h3>
					<p><?php echo $doctores['nDoctores'] ;?></p>
				</div>
			</div>
			<div class="dasboardCard">
				<div class="dasboardCardImg">
					<i class="fa-solid fa-calendar-days fa-7x"></i>
				</div>
				<div>
					<h3 class="titles">Citas</h3>
					<p><?php echo $citas['nCitas'] ;?></p>
				</div>
			</div>
		</section>
	</main>

</body>

</html>