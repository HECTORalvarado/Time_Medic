<?php
require_once '../models/userModel.php';

class AuthController {
	private $userModel;
	public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

	public function login($correo, $password) {
		$this->userModel->login($correo, $password);
		if ($_SESSION['role'] == 1) {
			header("Location: /app/public/getCitas.php");
			die();
		}
		if ($_SESSION['role'] == 2) {
			header("Location: /app/public/adminCitas.php");
			die();
		}
		if ($_SESSION['role'] == 3) {
			header("Location: /app/public/dashboard.php");
			die();
		}
	}

	public function register($username, $correo, $password, $nombre, $apellido) {
		$hashedPass = password_hash($password, PASSWORD_DEFAULT);
		$this->userModel->registerUser($username, $correo,$hashedPass,$nombre,$apellido,1, null);
		if ($_SESSION['role'] == 1) {
			header("Location: /app/public/getCitas.php");
			die();
		}
		if ($_SESSION['role'] == 2) {
			header("Location: /app/public/adminCitas.php");
			die();
		}
		if ($_SESSION['role'] == 3) {
			header("Location: /app/public/dashboard.php");
			die();
		}
	}
	public function addUser ($username, $correo, $password, $nombre, $apellido, $role, $specialidad) {
		$hashedPass = password_hash($password, PASSWORD_DEFAULT);
		$this->userModel->registerUser($username, $correo,$hashedPass,$nombre,$apellido,$role, $specialidad);
		header("Location: /app/public/adminUsers.php");
		die();
	}
}

class UserController {
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
	public function getAllUsers() {
		return $this->userModel->getAllUsers();
	}
}

?>