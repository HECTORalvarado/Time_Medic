<?php
	require_once '../controllers/horariosController.php';
	
	// Se crea un nuevo controllador
	$horarioCtrl = new HorariosController();
	
	// Verifica si se ha enviado un formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Obtiene datos del formulario

		$inputHInicio = $_POST["hInicio"];
		$inputHFin = $_POST["hFin"];

		if (!empty($inputHInicio) && !empty($inputHFin)) {
			$horarioCtrl->addHorario($inputHInicio, $inputHFin);
		} else {
			echo "Formulario incompleto";
		}
	}
?>