<?php

require_once "conexion.php";

class ModeloMatricula{

	/*=============================================
	MOSTRAR MATRÍCULA
	=============================================*/

	static public function MdlMostrarMatricula1($tabla, $item, $valor){


		if($item != null){

			$stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}


		$stmt -> Cerrar_Conexion();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR MATRICULA EN LA PANTALLA DE GESTION
	=============================================*/

	static public function MdlMostrarMatricula($tabla, $per){

		$stmtA = ConexionBD::Abrir_Conexion()->prepare("SELECT PA.id_periodoacm AS IDP FROM tbl_periodoacademico PA WHERE NOW() >= FechaInicio AND NOW() <= FechaFin;");
		$stmtA->execute();
		$resultadoA = $stmtA->fetchAll(PDO::FETCH_BOTH);
		$idPeriodoActual = $resultadoA[0]['IDP'];

			$stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT DISTINCT ALU.Id_Alumno AS IDA,
																										MA.Id_Matricula as IDMAT,
																										CONCAT(ALU.PrimerNombre,' ',ALU.PrimerApellido) AS Alum,
																										MODA.DescripModalidad as DMOD,
																										PER.DescripPeriodo AS DPER,
																										MA.Id_PeriodoAcm AS PER,
																										ORI.Nombre AS DORI,
																										CLAS.DescripClase AS DCLASE,
																										SEC.DescripSeccion AS DSEC
																										FROM tbl_matricula MA,
																										tbl_alumnos ALU,
																										tbl_modalidades MODA,
																										tbl_orientacion ORI,
																										tbl_clases CLAS,
																										tbl_secciones SEC,
																										tbl_periodoacademico PER
																										WHERE(ALU.Id_Alumno=MA.Id_Alumno)
																										AND (MODA.Id_Modalidad=MA.Id_Modalidad)
																										AND (ORI.Id_orientacion=MA.Id_Orientacion)
																										AND (CLAS.Id_Clase=MA.Id_Clase)
																										AND (SEC.Id_Seccion=MA.Id_Seccion)
																										AND(PER.Id_PeriodoAcm=MA.Id_PeriodoAcm)
																										AND(MA.Id_PeriodoAcm=$per)");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt -> Cerrar_Conexion();

		$stmt = null;

	}

	/*=============================================
	IMPRIMIR MATRÍCULA DE ALUMNOS
	=============================================*/

	static public function MdlImprimirMatricula($tabla, $d){

		$stmtA = ConexionBD::Abrir_Conexion()->prepare("SELECT PA.id_periodoacm AS IDP FROM tbl_periodoacademico PA WHERE NOW() >= FechaInicio AND NOW() <= FechaFin;");
		$stmtA->execute();
		$resultadoA = $stmtA->fetchAll(PDO::FETCH_BOTH);
		$idPeriodoActual = $resultadoA[0]['IDP'];

			$stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT MA.Id_Matricula as IDMAT,
																										CONCAT(ALU.PrimerNombre,' ',ALU.PrimerApellido) AS Alum,
																										MODA.DescripModalidad as DMOD,
																										ORI.Nombre AS DORI,
																										CLAS.DescripClase AS DCLASE,
																										SEC.DescripSeccion AS DSEC,
																										PER.DescripPeriodo AS DPER,
																										ALU.Id_Alumno AS IDA
																										FROM tbl_matricula MA,
																										tbl_alumnos ALU,
																										tbl_modalidades MODA,
																										tbl_orientacion ORI,
																										tbl_clases CLAS,
																										tbl_secciones SEC,
																										tbl_periodoacademico PER
																										WHERE(ALU.Id_Alumno=MA.Id_Alumno)
																										AND (MODA.Id_Modalidad=MA.Id_Modalidad)
																										AND (ORI.Id_orientacion=MA.Id_Orientacion)
																										AND (CLAS.Id_Clase=MA.Id_Clase)
																										AND (SEC.Id_Seccion=MA.Id_Seccion)
																										AND(PER.Id_PeriodoAcm=MA.Id_PeriodoAcm)
																										AND(MA.Id_PeriodoAcm=$idPeriodoActual)
																										AND (MA.Id_Alumno=$d)");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt -> Cerrar_Conexion();

		$stmt = null;

	}



 /*=============================================
  CARGAR SELECT
  =============================================*/
  static public function mdlCargarSelect($tabla){

    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla");
  	$stmt -> execute();

  	return $stmt -> fetchall();

    }

	/*=============================================
	 CARGAR ORIENTACIONES
	 =============================================*/

	 static public function mdlCargarOrientacion($tabla, $valor){

		 //$stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla WHERE Id_modalidad = $valor");

		 $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT Nombre FROM tbl_orientacion INNER JOIN tbl_mod_orientacion ON tbl_mod_orientacion.Id_Orientacion = tbl_orientacion.Id_orientacion where id_modalidad = $valor");
		 $stmt -> execute();

		 return $stmt -> fetchall();

		 }

		 /*=============================================
		 SELECCIONAR PERIODO VIGENTE
		 =============================================*/

		 static public function mdlPeriodoVigente(){

		 $stmtA = ConexionBD::Abrir_Conexion()->prepare("SELECT PA.id_periodoacm AS IDP FROM tbl_periodoacademico PA WHERE NOW() >= FechaInicio AND NOW() <= FechaFin;");
     $stmtA->execute();
     $resultadoA = $stmtA->fetchAll(PDO::FETCH_BOTH);
     $idPeriodoActual = $resultadoA[0]['IDP'];

		 return $idPeriodoActual;

	 }

	 /*=============================================
 	 MATRICULAR ALUMNO
 	 =============================================*/

 	 static public function mdlMatriculaAlumno($tabla, $datos){
		 //echo "<script type='text/javascript'>alert('sql')</script>";

		 $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla (Id_Alumno, Id_Modalidad, Id_Orientacion, Id_Clase, Id_Seccion, Id_PeriodoAcm)
																									 VALUES (:alumno, :modalidad, :orientacion, :clase, :seccion, :periodo)");


		 $stmt->bindParam(":alumno", $datos["Id_Alumno"], PDO::PARAM_INT);
		 $stmt->bindParam(":modalidad", $datos["Id_Modalidad"], PDO::PARAM_INT);
		 $stmt->bindParam(":orientacion", $datos["Id_Orientacion"], PDO::PARAM_INT);
		 $stmt->bindParam(":clase", $datos["Id_Clase"], PDO::PARAM_INT);
		 $stmt->bindParam(":seccion", $datos["Id_Seccion"], PDO::PARAM_INT);
		 $stmt->bindParam(":periodo", $datos["Id_PeriodoAcm"], PDO::PARAM_INT);

		 if($stmt->execute()){

			 return "ok";

		 }else{

			 return "error";

		 }

		 $stmt->close();

		 $stmt = null;

 		 }

		 /*=============================================
	 	 MATRICULAR ALUMNO
	 	 =============================================*/

	 	 static public function mdlInsertarCuentaCorriente($tabla, $datos){
			 //echo "<script type='text/javascript'>alert('sql')</script>";

			 $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla (Id_Alumno, Id_Modalidad, Id_Orientacion, Id_Clase, Id_Seccion, Id_PeriodoAcm)
																										 VALUES (:alumno, :modalidad, :orientacion, :clase, :seccion, :periodo)");


			 $stmt->bindParam(":alumno", $datos["Id_Alumno"], PDO::PARAM_INT);
			 $stmt->bindParam(":modalidad", $datos["Id_Modalidad"], PDO::PARAM_INT);
			 $stmt->bindParam(":orientacion", $datos["Id_Orientacion"], PDO::PARAM_INT);
			 $stmt->bindParam(":clase", $datos["Id_Clase"], PDO::PARAM_INT);
			 $stmt->bindParam(":seccion", $datos["Id_Seccion"], PDO::PARAM_INT);
			 $stmt->bindParam(":periodo", $datos["Id_PeriodoAcm"], PDO::PARAM_INT);

			 if($stmt->execute()){

				 return "ok";

			 }else{

				 return "error";

			 }

			 $stmt->close();

			 $stmt = null;

	 		 }


 /*=============================================
  CARGAR SELECT
  =============================================*/
  static public function mdlCompMatricula($tabla, $alumno, $mod, $ori, $clas, $per){

    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT Id_Matricula FROM tbl_matricula
																									WHERE Id_Alumno = $alumno
																									AND Id_Modalidad = $mod
																									AND Id_Orientacion = $ori
																									AND Id_Clase = $clas
																									AND Id_Seccion = $sec
																									AND Id_PeriodoAcm = $per");
  	$stmt -> execute();

		if($stmt->execute()){

  	return $stmt -> fetch();

		}else{

			echo "<script type='text/javascript'>alert('error sql')</script>";

    }


	}

	/*=============================================
	BORRAR MATRICULA
	=============================================*/

	static public function mdlBorrarMatricula($tabla, $datos){

		//echo "<script type='text/javascript'>alert('sql')</script>";

    $stmt = ConexionBD::Abrir_Conexion()->prepare("DELETE FROM $tabla WHERE tbl_matricula.Id_Matricula = :id");

    $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);


		if($stmt -> execute() ){

			return "ok";



		}else{

			return "error";

		}

		$stmt -> close();

		$stmt = null;


	}


}



$funcion = filter_input(INPUT_GET, 'caso');

switch ($funcion){

    case 'verificarmatricula':
        metodo_verificarmatricula();
    break;
}

function metodo_verificarmatricula(){

    //Recibiendo los parametros del ajax
    $alumno = filter_input(INPUT_POST, 'Id_Alumno');
    $mod = filter_input(INPUT_POST, 'Id_Modalidad');
    $ori = filter_input(INPUT_POST, 'Id_Orientacion');
    $clas = filter_input(INPUT_POST, 'Id_Clase');
    $sec = filter_input(INPUT_POST, 'Id_Seccion');
    //$per = filter_input(INPUT_POST, 'Id_PeriodoAcm');
    $tabla = "tbl_matricula";

    //Obtener el ID del periodo actual para evaluar que no este matriculado en este periodo
    $stmtA = ConexionBD::Abrir_Conexion()->prepare("SELECT PA.id_periodoacm AS IDP FROM tbl_periodoacademico PA WHERE NOW() >= FechaInicio AND NOW() <= FechaFin;");
    $stmtA->execute();
    $resultadoA = $stmtA->fetchAll(PDO::FETCH_BOTH);
    $idPeriodoActual = $resultadoA[0]['IDP'];

    //Query que valida si el alumno ya está matriculado según el resto de parámetros
    $stmtB = ConexionBD::Abrir_Conexion()->prepare("SELECT COUNT(*) AS cantidad FROM tbl_matricula TM INNER JOIN tbl_periodoacademico TPA ON TM.id_periodoacm=TPA.id_periodoacm WHERE TM.id_alumno = ".$alumno." AND TM.id_modalidad = ".$mod." AND TM.id_orientacion = ".$ori." AND TM.id_clase = ".$clas." AND TM.id_seccion= ".$sec." AND TM.id_periodoacm = ".$idPeriodoActual.";");
    $stmtB->execute();
    $resultadoB = $stmtB->fetchAll(PDO::FETCH_BOTH);
    $cantidadResult = $resultadoB[0]['cantidad'];

    if($cantidadResult > 0){
        //No lo puede matricular
        echo json_encode('0');
    }else{
        //Si lo puede matricular
        echo json_encode('1');
    }

}
