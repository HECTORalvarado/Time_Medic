<?php
session_start();
class UserModel
{
	private $db;
	
	public function __construct($bd)
	{
		$this->db = $bd;
	}

	private function verifyUserName($username)
	{
		$query = "SELECT * FROM usuario WHERE username = '$username'";
		$results = mysqli_query($this->db, $query);
		if (mysqli_num_rows($results) == 1) {
			return false;
		} else {
			return true;
		}
	}

	public function login($userEmail, $password)
	{
		// Nombre de usuario válido, verificar contraseña
		$query = "SELECT * FROM usuario WHERE correo = '$userEmail'";
		$results = mysqli_query($this->db, $query);
		if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_assoc($results);
			if (password_verify($password, $row['password'])) {
				// Inicio de sesión válido
				$_SESSION['username'] = $row['username'];
				$_SESSION['role'] = $row['role'];
				exit;
			} else{
				echo "Credenciales incorrectas, intentelo de nuevo";
			}
		} else {
			echo "Credenciales incorrectas, intentelo de nuevo";
		}
	}

	public function registerUser($username, $correo, $password, $nombre, $apellido, $role)
	{

		if ($this->verifyUserName($username)) {
			$query = "INSERT INTO usuario (nombre, apellido, correo, role, username, password) VALUES('$nombre', '$apellido', '$correo', $role, '$username', '$password')";
			$results = mysqli_query($this->db, $query);
			$_SESSION['username'] = $username;
			$_SESSION['role'] = $role;
			exit;
		} else {
			?>
				<p>El usuario ya existe pruebe un usuario diferente</p>
				<a href="/app/public/register.html">regresar</a>
			<?php
		}
	}

	public function getUserInfo ($username)
	{
		if ($username == null){
			$username = $_SESSION['username'];
		}
		$query = "SELECT * FROM usuario WHERE username = '$username'";
		$results = mysqli_query($this->db, $query);
		if (mysqli_num_rows($results) > 0) {
			$user = mysqli_fetch_assoc($results);
			return $user;
		}
	}
	public function editUser($nombre, $apellido, $correo, $username, $password, $img){
		$query = "";
		$results = mysqli_query($this->db, $query);
	}
}
