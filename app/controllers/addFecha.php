<?php
	//require_once '../../config/conn.php';
	require_once '../controllers/fechasController.php';
	
	// Se crea un nuevo controllador
	$fechaCtrl = new FechasController();
	
	// Verifica si se ha enviado un formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Obtiene el username y el password del formulario
		
		$inputHInicio = $_POST["fInicio"];
		$inputHFin = $_POST["fFin"];
		
		if (!empty($inputHInicio) && !empty($inputHFin)) {
			$fechaCtrl->addFecha($inputHInicio, $inputHFin);
		} else {
			echo "Formulario incompleto";
		}
	}
?>