<?php
require_once '../controllers/citasController.php';

if (!isset($_SESSION['username'])) {
	header("Location: index.html");
}

if ($_SESSION['role'] != 1) {
	header("Location: index.html");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Solicitar Cita</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./css/main.css">
</head>

<body>
	<?php
	require_once './views/menu.php';
	$citasCtrl = new CitasController();
	$docs = $citasCtrl->getDoctors();
	?>
	<main>
		<div class="formContainer">
			<figure class="imgContainer">
				<img src="./img/undraw_medical_research_qg4d.svg" alt="doctor image">
			</figure>
			<form action="../controllers/addCita.php" method="post">
				<h3 class="titles">Solicitar Cita</h3>
				<div>
					<label for="fecha">Fecha Cita</label>
					<input type="date" name="fecha" id="fecha">
				</div>
				<div>
					<label for="hora">Hora Cita</label>
					<input type="time" name="hora" id="hora">
				</div>
				<div>
				<label for="doctor">Doctor</label>
					<select name="doctor" id="doctor">
						<?php
						foreach($docs as $doc){
						echo '<option value="',$doc['idusuario'],'">',$doc['nombre'],' ', $doc['apellido'],'</option>';
						}
						?>
					</select>
				</div>
				<input type="submit" value="Solicitar Cita">
			</form>
		</div>
	</main>
	<script src="https://kit.fontawesome.com/783b8d7984.js" crossorigin="anonymous"></script>
	<script src="./js/main.js"></script>
</body>

</html>