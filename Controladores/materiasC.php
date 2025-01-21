<?php

class MateriasC{

	public function CrearMateriaC(){

		if(isset($_POST["Cid"])){

			$rutaPrograma = "";

			if($_FILES["programa"]["type"] == "application/pdf"){

				$nombre = mt_rand(10,999);

				$rutaPrograma = "Vistas/programas/Prog-".$nombre.".pdf";

				move_uploaded_file($_FILES["programa"]["tmp_name"], $rutaPrograma);

			}

				$tablaBD = "materias";

				$Cid = $_POST["Cid"];

				$datosC = array("id_carrera"=>$_POST["Cid"], "codigo"=>$_POST["codigo"], "nombre"=>$_POST["nombre"], "grado"=>$_POST["grado"], "tipo"=>$_POST["tipo"], "programa"=>$rutaPrograma);

				$resultado = MateriasM::CrearMateriaM($tablaBD, $datosC);

				if($resultado == true){

					echo '<script>

					window.location = "http://localhost/universidad-copia/Crear-Materias/'.$Cid.'";
					</script>';

				}

		}

	}



	public static function VerMateriasC(){

		$tablaBD = "materias";

		$resultado = MateriasM::VerMateriasM($tablaBD);

		return $resultado;

	}

	static public function VerMaterias2C($columna, $valor){

		$tablaBD = "materias";

		$resultado = MateriasM::VerMaterias2M($tablaBD, $columna, $valor);

		return $resultado;

	}



	public function EliminarMateriaC(){

		if(isset($_GET["Mid"])){

			$tablaBD = "materias";

			$id = $_GET["Mid"];

			$Cid = $_GET["Cid"];

			$resultado = MateriasM::EliminarMateriaM($tablaBD, $id);

			if($resultado == true){

					echo '<script>

					window.location = "http://localhost/universidad-copia/Crear-Materias/'.$Cid.'";
					</script>';

				}

		}

	}



	public function CrearComisionC(){

		if(isset($_POST["id_materia"])){

			$tablaBD = "comisiones";

			$datosC = array("id_materia"=>$_POST["id_materia"], "numero"=>$_POST["numero"], "c_maxima"=>$_POST["c_maxima"], "dias"=>$_POST["dias"], "horario"=>$_POST["horario"]);

			$id_materia = $_POST["id_materia"];

			$resultado = MateriasM::CrearComisionM($tablaBD, $datosC);

			if($resultado == true){

					echo '<script>

					window.location = "http://localhost/universidad-copia/Crear-Comisiones/'.$id_materia.'";
					</script>';

				}

		}

	}



	static public function VerComisionesC($columna, $valor){

		$tablaBD = "comisiones";

		$resultado = MateriasM::VerComisionesM($tablaBD, $columna, $valor);

		return $resultado;

	}

	static public function VerComisiones2C($columna, $valor){

		$tablaBD = "comisiones";

		$resultado = MateriasM::VerComisiones2M($tablaBD, $columna, $valor);

		return $resultado;

	}




	public function BorrarComisionC(){

		if(isset($_GET["Mid"])){

			$tablaBD = "comisiones";

			$id = $_GET["Cid"];

			$Mid = $_GET["Mid"];

			$resultado = MateriasM::BorrarComisionM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/universidad-copia/Crear-Comisiones/'.$Mid.'";
					</script>';

			}

		}

	}



	public function ColocarNotaC(){

		if(isset($_POST["id_alumno"])){

			$libreta = $_POST["libreta"];
			$id_carrera = $_POST["id_carrera"];

			$tablaBD = "notas";

			$datosC = array("id_alumno"=>$_POST["id_alumno"], "libreta"=>$_POST["libreta"], "id_materia"=>$_POST["id_materia"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "nota_final"=>$_POST["nota_final"], "estado"=>$_POST["estado"]);

			$resultado = MateriasM::ColocarNotaM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/universidad-copia/Ver-Plan/'.$id_carrera.'/'.$libreta.'";
					</script>';

			}

		}

	}



	static public function VerNotasC($columna, $valor){

		$tablaBD = "notas";

		$resultado = MateriasM::VerNotasM($tablaBD, $columna, $valor);

		return $resultado;

	}

	static public function VerNotas2C($columna, $valor){

		$tablaBD = "notas";

		$resultado = MateriasM::VerNotas2M($tablaBD, $columna, $valor);

		return $resultado;

	}




	public function CambiarNotaC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas";

			$libreta = $_POST["libreta"];
			$id_carrera = $_POST["id_carrera"];

			$datosC = array("id"=>$_POST["nota_id"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "nota_final"=>$_POST["nota_final"], "estado"=>$_POST["estado"]);

			$resultado = MateriasM::CambiarNotaM($tablaBD, $datosC);	
			
			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/universidad-copia/Ver-Plan/'.$id_carrera.'/'.$libreta.'";
					</script>';

			}		

		}

	}



	public function InscribirMateriaC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "insc_materias";

			$datosC = array("id_alumno"=>$_POST["id_alumno"], "id_materia"=>$_POST["id_materia"], "id_comision"=>$_POST["id_comision"]);

			$resultado = MateriasM::InscribirMateriaM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/universidad-copia/Materias";
					</script>';

			}	

		}

	}



	static public function VerInscMateriasC($columna, $valor){

		$tablaBD = "insc_materias";

		$resultado = MateriasM::VerInscMateriasM($tablaBD, $columna, $valor);

		return $resultado;

	}


static public function VerInscMaterias2C($columna, $valor){

		$tablaBD = "insc_materias";

		$resultado = MateriasM::VerInscMaterias2M($tablaBD, $columna, $valor);

		return $resultado;

	}



	public function BorrarInscMC(){

		$exp = explode("/", $_GET["url"]);

		$id = $exp[3];

		if(isset($id)){

			$tablaBD = "insc_materias";

			$resultado = MateriasM::BorrarInscMM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/universidad-copia/Materias";
					</script>';

			}

		}

	}


	public function VaciarRegistrosMateriasC(){

		if(isset($_POST["E"])){

			$tablaBD = "insc_materias";

			$resultado = MateriasM::VaciarRegistrosMateriasM($tablaBD);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/universidad-copia/Carreras";
					</script>';

			}

		}

	}
	//AGREGADO PARA CORRELATIVAS AGREGADO POR GPT
    
		public function AsignarCorrelativasC() {
			// Verificar si se ha enviado el formulario
			if (isset($_POST["asignar_correlativas"])) {
				
				// Verificar que existan la materia y las correlativas en el formulario
				if (isset($_POST["id_materia"]) && isset($_POST["correlativas"])) {
	
					$tablaBD = "materia_correlativa"; // Nombre d_e la tabla en la base de datos
	
					// Llamar al modelo para asignar las correlativas
					$resultado = MateriasM::AsignarCorrelativasM($tablaBD, $_POST["id_materia"], $_POST["correlativas"]);
					
					// Verificar el resultado de la operación
					if ($resultado) {
						echo "<div class='alert alert-success'>Correlativas asignadas correctamente.</div>";
					} else {
						echo "<div class='alert alert-danger'>Error al asignar correlativas.</div>";
					}
				} else {
					echo "<div class='alert alert-warning'>Por favor, selecciona una materia y sus correlativas.</div>";
				}
			}
		}
		public static function ObtenerCorrelativasC($id_materia){

        $tablaBD = "materia_correlativa";

        return MateriasM::ObtenerCorrelativasM($tablaBD, $id_materia);
    }
	

		public function MostrarFormularioCorrelativasC(){
	
			// Recibir el id de la materia
			if(isset($_GET['id'])){
				$id_materia = $_GET['id'];
	
				// Lógica para mostrar el formulario con las correlativas
				$correlativas = MateriasC::ObtenerCorrelativasC($id_materia);
				
				include "vistas/formulario_correlativas.php";
			}
		}
		public static function VerMateriasPorID($id_materia){
			$tablaBD = "materias"; // Asegúrate de que sea el nombre correcto de tu tabla
		
			$respuesta = MateriasM::VerMateriaPorIDM($tablaBD, $id_materia);
		
			return $respuesta;
		}
		public static function VerMateriasPorCarrera($id_carrera){
			$tablaBD = "materias"; // Asegúrate de que sea el nombre correcto de tu tabla
		
			$respuesta = MateriasM::VerMateriasPorCarreraM($tablaBD, $id_carrera);
		
			return $respuesta;
		}
		
		
	}
	
    

    // Método para obtener las correlativas de una materia
    
	
	




