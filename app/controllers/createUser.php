<?php
require_once '../../config/conn.php';
require_once '../controllers/user.php';

// Se crea un nuevo controllador
$userController = new AuthController($conn);

// Verifica si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Obtiene datos del formulario
	$inputEmail = mysqli_real_escape_string($conn, $_POST["email"]);
	$inputUsername = mysqli_real_escape_string($conn, $_POST["username"]);
	$inputName = mysqli_real_escape_string($conn, $_POST["name"]);
	$inputRole = mysqli_real_escape_string($conn, $_POST["role"]);
	$inputSpeciality = mysqli_real_escape_string($conn, $_POST["especialidad"]);
	$inputLastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
	$inputPassword = mysqli_real_escape_string($conn, $_POST["password"]);

	if (
		!empty($inputUsername) && !empty($inputPassword) && !empty($inputName) && !empty($inputLastname) && !empty($inputEmail) && !empty($inputRole)
	) {
		$userController->addUser($inputUsername, $inputEmail, $inputPassword, $inputName, $inputLastname, $inputRole, $inputSpeciality);
	} else {
		echo "Formulario incompleto";
	}
}
