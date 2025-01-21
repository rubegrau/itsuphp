<?php

require_once "ConexionBD.php";

class MateriasM extends ConexionBD{

	static public function CrearMateriaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_carrera, codigo, nombre, grado, tipo, programa) VALUES (:id_carrera, :codigo, :nombre, :grado, :tipo, :programa)");

		$pdo -> bindParam("id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
		$pdo -> bindParam("codigo", $datosC["codigo"], PDO::PARAM_STR);
		$pdo -> bindParam("nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam("grado", $datosC["grado"], PDO::PARAM_STR);
		$pdo -> bindParam("tipo", $datosC["tipo"], PDO::PARAM_STR);
		$pdo -> bindParam("programa", $datosC["programa"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		
		$pdo = null;

	}



	static public function VerMateriasM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY grado, codigo ASC");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}



	static public function VerMaterias2M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}


	static public function EliminarMateriaM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		
		$pdo = null;

	}




	static public function CrearComisionM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_materia, c_maxima, numero, dias, horario) VALUES (:id_materia, :c_maxima, :numero, :dias, :horario)");

		$pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
		$pdo -> bindParam(":c_maxima", $datosC["c_maxima"], PDO::PARAM_INT);
		$pdo -> bindParam(":numero", $datosC["numero"], PDO::PARAM_INT);
		$pdo -> bindParam(":dias", $datosC["dias"], PDO::PARAM_STR);
		$pdo -> bindParam(":horario", $datosC["horario"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		
		$pdo = null;

	} 




	static public function VerComisionesM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY numero ASC");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}


	static public function VerComisiones2M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}



	static public function BorrarComisionM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		
		$pdo = null;

	}




	static public function ColocarNotaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, libreta, id_materia, fecha, profesor, nota_final, estado) VALUES (:id_alumno, :libreta, :id_materia, :fecha, :profesor, :nota_final, :estado)");

		$pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
		$pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
		$pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
		$pdo -> bindParam(":nota_final", $datosC["nota_final"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		
		$pdo = null;

	}



	static public function VerNotasM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}


	static public function VerNotas2M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}



	static public function CambiarNotaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET fecha = :fecha, profesor = :profesor, estado = :estado, nota_final = :nota_final WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
		$pdo -> bindParam(":nota_final", $datosC["nota_final"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		
		$pdo = null;

	}



	static public function InscribirMateriaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, id_materia, id_comision) VALUES (:id_alumno, :id_materia, :id_comision)");

		$pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_comision", $datosC["id_comision"], PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

	
		$pdo = null;

	}




	static public function VerInscMateriasM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo->close();
		$pdo = null;

	}


	static public function VerInscMaterias2M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo->close();
		$pdo = null;

	}



	static public function BorrarInscMM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$
		$pdo = null;


	}



	static public function VaciarRegistrosMateriasM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD");

		if($pdo -> execute()){
			return true;
		}

	
		$pdo = null;


	}
	

		// Método para asignar correlativas a una materia agregado por GPT
		static public function AsignarCorrelativasM($tablaBD, $id_materia, $materia_correlativa){
	
			// Primero eliminamos las correlativas existentes para esa materia
			$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id_materia = :id_materia");
			$pdo->bindParam(":id_materia", $id_materia, PDO::PARAM_INT);
			$pdo->execute();
	
			// Ahora insertamos las nuevas correlativas
			foreach($materia_correlativa as $id_correlativa){
				$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_materia, id_correlativa) VALUES (:id_materia, :id_correlativa)");
				$pdo->bindParam(":id_materia", $id_materia, PDO::PARAM_INT);
				$pdo->bindParam(":id_correlativa", $id_correlativa, PDO::PARAM_INT);
				$pdo->execute();
			}
	
			return true;
		}
	
		// Método para obtener las correlativas de una materia
		static public function ObtenerCorrelativasM($tablaBD, $id_materia){
	
			$pdo = ConexionBD::cBD()->prepare("SELECT id_correlativa FROM $tablaBD WHERE id_materia = :id_materia");
			$pdo->bindParam(":id_materia", $id_materia, PDO::PARAM_INT);
			$pdo->execute();
	
			return $pdo->fetchAll(PDO::FETCH_COLUMN);
		}
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
		static public function ObtenerCorrelativasPendientesM($id_materia, $id_alumno){
			$pdo = ConexionBD::cBD()->prepare("
				SELECT mc.id_correlativa, m.nombre
				FROM materia_correlativa AS mc
				INNER JOIN materias AS m ON mc.id_correlativa = m.id
				WHERE mc.id_materia = :id_materia
				AND mc.id_correlativa NOT IN (
					SELECT id_materia
					FROM notas
					WHERE id_alumno = :id_alumno
				)");
		
			$pdo->bindParam(":id_materia", $id_materia, PDO::PARAM_INT);
			$pdo->bindParam(":id_alumno", $id_alumno, PDO::PARAM_INT);
			$pdo->execute();
		
			return $pdo->fetchAll();
		}
		public static function VerMateriaPorIDM($tablaBD, $id_materia){
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");
		
			$pdo->bindParam(":id", $id_materia, PDO::PARAM_INT);
		
			$pdo->execute();
		
			return $pdo->fetch();
		}
		public static function VerMateriasPorCarreraM($tablaBD, $id_carrera){
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id_carrera = :id_carrera");
		
			$pdo->bindParam(":id_carrera", $id_carrera, PDO::PARAM_INT);
		
			$pdo->execute();
		
			return $pdo->fetchAll();
		}
		
		
		
		
	}
	
	
	
	
	


