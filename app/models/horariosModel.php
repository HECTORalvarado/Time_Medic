<?php
session_start();

class HorariosModel {

	private $db;
	
	public function __construct()
	{
		require_once '../../config/conn.php';
		$this->db = $conn;
	}

	public function addHorario($horaInicio, $horaFin) {
		$query = "INSERT INTO horarios (hora_inicio, hora_fin) VALUES ('$horaInicio', '$horaFin')";
		$results = mysqli_query($this->db, $query);
	}

	public function addFecha($fechaI, $fechaF) {
		$query = "INSERT INTO fechas (fecha_inicio, fecha_fin) VALUES ('$fechaI', '$fechaF')";
		$results = mysqli_query($this->db, $query);
	}

	public function deletHorario($id) {
		$query = "DELETE FROM horarios WHERE idhorarios= $id";
		$results = mysqli_query($this->db, $query);
	}

	public function deletFecha($id) {
		$query = "DELETE FROM fechas WHERE idfechas= $id";
		$results = mysqli_query($this->db, $query);
	}

	public function getDates() {
		$dates = array();
		$query = "SELECT * FROM fechas";
		$results = mysqli_query($this->db, $query);
		if (mysqli_num_rows($results) > 0) {
			while($data = mysqli_fetch_assoc($results)) {
				$dates[] = $data;
			}
		} else {
			$dates[0] = 'nothing is hea';
		}
		return $dates;
	}
	public function getHorarios() {
		$horarios = array();
		$query = "SELECT * FROM horarios";
		$results = mysqli_query($this->db, $query);
		if (mysqli_num_rows($results) > 0) {
			while($data = mysqli_fetch_assoc($results)) {
				$horarios[] = $data;
			}
		} else {
			$horarios[0] = 'nothing is hea';
		}
		return $horarios;
	}

	public function getHorariosDoc() {
		$horarios = array();
		$idUser = $this->getUser();
		$query = "SELECT h.* FROM horarios h inner join doctor_horario dh on h.id_horarios = dh.id_horario inner join usuario d on dh.id_doctor = d.idusuario where d.idusuario = $idUser";
		$results = mysqli_query($this->db, $query);
		if (mysqli_num_rows($results) > 0) {
			while($data = mysqli_fetch_assoc($results)) {
				$horarios[] = $data;
			}
		} else {
			$horarios[0] = 'nothing is hea';
		}
		return $horarios;
	}

	public function getDatesDoc() {
		$fechas = array();
		$idUser = $this->getUser();
		$query = "SELECT f.* FROM fechas f inner join doctor_fechas df on f.idfechas = df.id_fechas inner join usuario d on df.id_doctor = d.idusuario where d.idusuario = $idUser";
		$results = mysqli_query($this->db, $query);
		if (mysqli_num_rows($results) > 0) {
			while($data = mysqli_fetch_assoc($results)) {
				$fechas[] = $data;
			}
		} else {
			$fechas[0] = 'nothing is hea';
		}
		return $fechas;
	}

	public function addHorarioDoc($horaId) {
		$idUser = $this->getUser();
		$query = "INSERT INTO doctor_horario (id_doctor, id_horario) VALUES ($idUser, $horaId)";
		$results = mysqli_query($this->db, $query);
	}

	public function addFechasDoc($fechaId) {
		$idUser = $this->getUser();
		$query = "INSERT INTO doctor_fechas (id_doctor, id_fechas) VALUES ($idUser, $fechaId)";
		$results = mysqli_query($this->db, $query);
	}

	private function getUser(){
		$username = $_SESSION['username'];
		$user = null;
		$queryUser = "select * from usuario where username = '$username'";
		$resultsUser = mysqli_query($this->db, $queryUser);
		if (mysqli_num_rows($resultsUser) > 0) {
			$user = mysqli_fetch_assoc($resultsUser);
		}
		$idUser = $user['idusuario'];
		return $idUser;
	}

}
?>