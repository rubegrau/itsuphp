<?php

class ExamenesC{

    public function CrearExamenC(){

        if(isset($_POST["estado"])){

            $tablaBD = "examenes";

            $id_carrera = $_POST["id_carrera"];

            $datosC = array("estado"=>$_POST["estado"], "id_carrera"=>$_POST["id_carrera"], "id_materia"=>$_POST["id_materia"], 
            "profesor"=>$_POST["profesor"], "aula"=>$_POST["aula"], "fecha"=>$_POST["fecha"], "hora"=>$_POST["hora"]);

            $resultado = ExamenesM::CrearExamenM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>
                window.location = "http://localhost/universidad-copia/Crear-Examenes/'.$id_carrera.'";
                </script>';
            }
        }
    }

    static public function VerExamenesC($columna, $valor){

        $tablaBD = "examenes";

        $resultado = ExamenesM::VerExamenesM($tablaBD, $columna, $valor);

        return $resultado;
    }

    public function InscribirseExamenC() {

        if (isset($_POST["id_alumno"])) {
    
            $id_alumno = $_POST["id_alumno"];
            $id_materia = $_POST["id_materia"]; // La materia del examen
            $id_examen = $_POST["id_examen"];
            $libreta = $_POST["libreta"];
            $id_carrera = $_POST["id_carrera"];
    
            // Verificar si el alumno tiene correlativas pendientes
            $correlativasAprobadas = ExamenesM::VerificarCorrelativasM($id_materia, $id_alumno);
            $correlativasPendientes = MateriasM::ObtenerCorrelativasPendientesM($id_materia, $id_alumno);
    
            if (!empty($correlativasPendientes)) {
                // Mostrar las materias correlativas pendientes
                echo "<h3>Tienes las siguientes materias correlativas pendientes:</h3>";
                echo "<ul>";
                foreach ($correlativasPendientes as $correlativa) {
                    echo "<li>" . $correlativa["nombre"] . "</li>";
                }
                echo "</ul>";
    
                // Mostrar mensaje sin redirigir
                echo '<script>
                        alert("No puedes inscribirte a este examen porque tienes materias correlativas pendientes.");
                    </script>';
                return;
            }
    
            // Si no tiene correlativas pendientes, proceder con la inscripción
            if ($correlativasAprobadas == false) {
                echo '<script>
                alert("No puedes inscribirte a este examen porque tienes materias correlativas pendientes.");
                </script>';
                return;
            }
    
            // Proceder con la inscripción si no hay correlativas pendientes
            $tablaBD = "insc_examenes";
            $datosC = array("id_alumno" => $id_alumno, "id_examen" => $id_examen, "libreta" => $libreta);
            $resultado = ExamenesM::InscribirseExamenM($tablaBD, $datosC);
    
            if ($resultado == true) {
                echo '<script>
                alert("Te has inscrito exitosamente.");
                window.location = "http://localhost/universidad-copia/Ver-Examenes/'.$id_carrera.'"; //esto los agregue yo//
                </script>';
            }
        }
    }
    
    

    static public function VerInscExamenC($columna, $valor){

        $tablaBD = "insc_examenes";

        $resultado = ExamenesM::VerInscExamenM($tablaBD, $columna, $valor);

        return $resultado;
    }
    public function InscribirExamenC($id_alumno, $id_materia) {
        // Verificar si el alumno tiene todas las correlativas aprobadas
        $correlativas_aprobadas = MateriasM::VerificarCorrelativasM("materia_correlativa", $id_alumno, $id_materia);

        if ($correlativas_aprobadas) {
            // Si tiene todas las correlativas aprobadas, permitir inscripción
            $resultado = ExamenesM::InscribirseExamenM("insc_examenes", $id_alumno, $id_materia);

            if ($resultado) {
                echo "Inscripción exitosa";
            } else {
                echo "Error al inscribirse";
            }
        } else {
            // Si no tiene correlativas aprobadas, mostrar mensaje de error
            echo "No puedes inscribirte a este examen. Tienes materias correlativas pendientes.";
        }
    }

}
