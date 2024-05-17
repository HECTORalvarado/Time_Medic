<?php
require_once '../../config/conn.php';
require_once '../controllers/user.php';

// Se crea un nuevo controllador
$userController = new AuthController($conn);

// Verifica si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$inputId = mysqli_real_escape_string($conn, $_POST["id"]);

	$inputEmail = mysqli_real_escape_string($conn, $_POST["email"]);
	$inputUsername = mysqli_real_escape_string($conn, $_POST["username"]);
	$inputName = mysqli_real_escape_string($conn, $_POST["name"]);
	$inputLastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
	$inputPassword = mysqli_real_escape_string($conn, $_POST["password"]);
	$inputImg = addslashes(file_get_contents($_FILES['img']['tmp_name']));

	if (isset($_POST['edit'])) {

		if (!empty($inputUsername) && !empty($inputName) && !empty($inputLastname) && !empty($inputEmail)) {

			if (!empty($inputPassword)) {
				
				if (!empty($inputImg)) {
					$userController->editUser($inputUsername, $inputEmail, $inputPassword, $inputName, $inputLastname, $inputRole, $inputSpeciality, $inputImg);
				} else {
					$userController->editUser($inputUsername, $inputEmail, $inputPassword, $inputName, $inputLastname, $inputRole, $inputSpeciality, null);
				}

			} else {
				
				if (!empty($inputImg)) {
					$userController->editUser($inputUsername, $inputEmail, null, $inputName, $inputLastname, $inputRole, $inputSpeciality, $inputImg);
				} else {
					$userController->editUser($inputUsername, $inputEmail, null, $inputName, $inputLastname, $inputRole, $inputSpeciality, null);
				}

			}
		} else {
			echo "Formulario incompleto";
		}

	} else if (isset($_POST['delete'])) {
				
		if (!empty($inputId)) {
			$userController->deleteUser($inputId);
		} else {
			echo "Formulario incompleto";
		}

	} else {
		echo "Action is missing!";
	}
}
