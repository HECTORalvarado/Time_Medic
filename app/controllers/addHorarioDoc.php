<?php
	require_once '../controllers/horariosController.php';
	
	// Se crea un nuevo controllador
	$fechastrl = new HorariosController();
	
	// Verifica si se ha enviado un formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Obtiene datos del formulario
		
		$inputId = $_POST["hora"];
		
		if (!empty($inputId)) {
			$fechastrl->addHorarioDoc($inputId);
		} else {
			echo "Formulario incompleto";
		}
	}
?>