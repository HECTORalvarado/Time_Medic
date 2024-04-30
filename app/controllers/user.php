<?php
require_once '../models/userModel.php';

class AuthController {
	private $userModel;
	public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

	public function login($correo, $password) {
		$this->userModel->login($correo, $password);
	}

	public function register($username, $correo, $password, $nombre, $apellido) {
		$hashedPass = password_hash($password, PASSWORD_DEFAULT);
		$this->userModel->registerUser($username, $correo,$hashedPass,$nombre,$apellido,1);
	}

}

?>