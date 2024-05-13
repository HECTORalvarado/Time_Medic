<?php
	//require_once '../../config/conn.php';
	require_once '../controllers/horariosController.php';
	
	// Se crea un nuevo controllador
	$horarioCtrl = new HorariosController();
	
	// Verifica si se ha enviado un formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Obtiene el username y el password del formulario
		//$inputHInicio = mysqli_real_escape_string($conn, $_POST["hInicio"]);
		$inputHInicio = $_POST["hInicio"];
		$inputHFin = $_POST["hFin"];
		//$inputHFin = mysqli_real_escape_string($conn, $_POST["hFin"]);
		if (!empty($inputHInicio) && !empty($inputHFin)) {
			$horarioCtrl->addHorario($inputHInicio, $inputHFin);
		} else {
			echo "Formulario incompleto";
		}
	}
?>