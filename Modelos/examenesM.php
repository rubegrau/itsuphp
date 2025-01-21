<?php

require_once "ConexionBD.php";

class ExamenesM extends ConexionBD{

	static public function CrearExamenM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_carrera, id_materia, estado, aula, profesor, hora, fecha)
		 VALUES (:id_carrera, :id_materia, :estado, :aula, :profesor, :hora, :fecha)");

		$pdo -> bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_INT);
		$pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
		$pdo -> bindParam(":aula", $datosC["aula"], PDO::PARAM_STR);
		$pdo -> bindParam(":hora", $datosC["hora"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		
		$pdo = null;

	}




	static public function VerExamenesM($tablaBD, $columna, $valor){

		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}

		$pdo -> close();
		$pdo = null;

	}
	




	static public function InscribirseExamenM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, id_examen, libreta) VALUES (:id_alumno, :id_examen, :libreta)");

		$pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_examen", $datosC["id_examen"], PDO::PARAM_INT);
		$pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		
		$pdo = null;

	}




	static public function VerInscExamenM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}
// Método para obtener las correlativas de una materia AGREGADO POR GPT
static public function VerificarCorrelativasM($id_materia, $id_alumno) {
	// Primero obtenemos las correlativas de la materia que se quiere inscribir
	$pdo = ConexionBD::cBD()->prepare("SELECT id_correlativa FROM materia_correlativa WHERE id_materia = :id_materia");
	$pdo -> bindParam(":id_materia", $id_materia, PDO::PARAM_INT);
	$pdo -> execute();
	$correlativas = $pdo -> fetchAll();

	foreach ($correlativas as $correlativa) {
		// Verificamos si el alumno ya aprobó la correlativa
		$pdo2 = ConexionBD::cBD()->prepare("SELECT * FROM notas WHERE id_materia = :id_correlativa AND id_alumno = :id_alumno AND estado = 'Aprobado'");
		$pdo2 -> bindParam(":id_correlativa", $correlativa['id_correlativa'], PDO::PARAM_INT);
		$pdo2 -> bindParam(":id_alumno", $id_alumno, PDO::PARAM_INT);
		$pdo2 -> execute();

		if ($pdo2 -> rowCount() == 0) {
			// Si no ha aprobado la correlativa, retornamos false
			return false;
		}
	}

	// Si ha aprobado todas las correlativas
	return true;
}


}