<?php

require_once "ConexionBD.php";

class CarrerasM extends ConexionBD{

	//Crear Carrera
	static public function CrearCarreraM($tablaBD, $carrera){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre) VALUES (:nombre)");

		$pdo -> bindParam(":nombre", $carrera, PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}

		
		$pdo = null;

	}



	//Ver Carreras
	static public function VerCarrerasM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;  

	}

	static public function VerCarreras2M($tablaBD,$columna,$valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindparam(":".$columna, $valor, PDO::PARAM_INT); 

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;  

	}

	static public function CarreraM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
			$pdo -> bindparam(":".$columna, $valor, PDO::PARAM_STR);
		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;
	}



	//Editar Carreras
	static public function EditarCarreraM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}



	//Actualizar Carreras
	static public function ActualizarCarrerasM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":nombre", $datosC["carrera"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		
		$pdo = null;

	}



	//Borrar Carreras
	static public function BorrarCarrerasM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		
		$pdo = null;

	}



}