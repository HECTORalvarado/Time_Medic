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
	public function addUser ($username, $correo, $password, $nombre, $apellido, $role) {
		$hashedPass = password_hash($password, PASSWORD_DEFAULT);
		$this->userModel->registerUser($username, $correo,$hashedPass,$nombre,$apellido,$role);
	}
}

class userController {
	private $userModel;
	public function __construct() {
		require_once '../../config/conn.php';
        $this->userModel = new UserModel($conn);
    }

	public function getUserInfor() {
		return $this->userModel->getUserInfo(null);
	}
	public function getUserInforByUsername($username) {
		return $this->userModel->getUserInfo($username);
	}
}

?>