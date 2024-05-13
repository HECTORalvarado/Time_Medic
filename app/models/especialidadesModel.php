<?php
class SpecialitiesModel {
	private $db;
	
	public function __construct()
	{
		require_once '../../config/conn.php';
		$this->db = $conn;
	}

	public function getAllSpecialities () {
		$especialidades = array();
		$query = "Select * from especialidades";
		$results = mysqli_query($this->db, $query);
		if (mysqli_num_rows($results) > 0) {
			while($data = mysqli_fetch_assoc($results)) {
				$especialidades[] = $data;
			}
		} else {
			$especialidades[0] = 'nothing is hea';
		}
		return $especialidades;
	}

	public function addSpecialities ($especialidad, $descripcion) {
		$query = "INSERT INTO especialidades (especialidad, descripcion) VALUES ('$especialidad', '$descripcion')";
		$results = mysqli_query($this->db, $query);
	}

	public function deleteSpecialities ($id) {
		$query = "DELETE FROM especialidades WHERE id_especialidad = $id";
		$results = mysqli_query($this->db, $query);

	}

}
?>