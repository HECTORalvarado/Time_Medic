<?php
	//require_once '../../config/conn.php';
	require_once '../controllers/citasController.php';
	
	// Se crea un nuevo controllador
	$citasCtrl = new CitasController();
	
	// Verifica si se ha enviado un formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Obtiene datos del formulario
		
		$inputId = $_POST["id"];
		
		if (!empty($inputId)) {
			$citasCtrl->completeCita($inputId);
		} else {
			echo "Formulario incompleto";
		}
	}
?>