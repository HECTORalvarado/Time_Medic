<?php
	require_once '../controllers/especialidadesController.php';
	
	// Se crea un nuevo controllador
	$spcltCtrl = new SpecialitiesController();
	
	// Verifica si se ha enviado un formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Obtiene datos del formulario
		
		$inputEspecialidad = $_POST["especialidad"];
		$inputDescripcion = $_POST["descripcion"];
		
		if (!empty($inputEspecialidad) && !empty($inputDescripcion)) {
			$spcltCtrl->addEspecialidad($inputEspecialidad, $inputDescripcion);
		} else {
			echo "Formulario incompleto";
		}
	}
?>