<?php
	//require_once '../../config/conn.php';
	require_once '../controllers/citasController.php';
	
	// Se crea un nuevo controllador
	$citastrl = new CitasController();
	
	// Verifica si se ha enviado un formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Obtiene el username y el password del formulario
		
		$inputFecha = $_POST["fecha"];
		$inputHora = $_POST["hora"];
		$inputDoctor = $_POST["doctor"];
		
		if (!empty($inputDoctor) && !empty($inputFecha) && !empty($inputHora)) {
			$citastrl->addCita($inputDoctor, $inputFecha, $inputHora);
		} else {
			echo "Formulario incompleto";
		}
	}
?>