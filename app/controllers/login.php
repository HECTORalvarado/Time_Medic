<?php
	require_once '../../config/conn.php';
	require_once '../controllers/user.php';
	
	// Se crea un nuevo controllador
	$userController = new AuthController($conn);
	
	// Verifica si se ha enviado un formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Obtiene el username y el password del formulario
		$inputEmail = mysqli_real_escape_string($conn, $_POST["email"]);
		$inputPassword = mysqli_real_escape_string($conn, $_POST["password"]);
		if (!empty($inputEmail) && !empty($inputPassword)) {
			$userController->login($inputEmail, $inputPassword);		
		} else {
			echo "Formulario incompleto";
		}
	}
?>