<?php
	//require_once '../../config/conn.php';
	require_once '../controllers/citasController.php';
	
	// Se crea un nuevo controllador
	$fcitastrl = new CitasController();
	
	// Verifica si se ha enviado un formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Obtiene el username y el password del formulario
		
		$inputId = $_POST["id"];
		
		if (!empty($inputId)) {
			$fcitastrl->cancelCita($inputId);
		} else {
			echo "Formulario incompleto";
		}
	}
?>