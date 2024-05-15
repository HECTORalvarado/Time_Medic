<?php
	require_once '../controllers/fechasController.php';
	
	// Se crea un nuevo controllador
	$fechastrl = new FechasController();
	
	// Verifica si se ha enviado un formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Obtiene datos del formulario
		
		$inputId = $_POST["fecha"];
		
		if (!empty($inputId)) {
			$fechastrl->addFechaDoc($inputId);
		} else {
			echo "Formulario incompleto";
		}
	}
?>