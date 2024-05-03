<?php
class Horarios {
	private $db;
	
	public function __construct()
	{
		require_once '../../config/conn.php';
		$this->db = $conn;
	}

	public function addHorario($horaInicio, $horaFin) {
		$query = "INSERT INTO horarios (hora_inicio, hora_fin) VALUES ($horaInicio, $horaFin)";
		$results = mysqli_query($this->db, $query);
	}

	public function addFecha($fecha) {
		$query = "INSERT INTO fechas (fechas_disponibles) VALUES ('$fecha')";
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
}
?>