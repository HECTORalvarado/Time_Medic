<?php
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
}
?>