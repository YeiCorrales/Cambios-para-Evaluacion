<?php

require_once "conexion.php";

class Calificaciones{
    
    /*=============================================
	MOSTRAR CALIFICACIONES
	=============================================*/
        static public function mdlMostrarCalificaciones($c, $s){
            
            if($c !== null && $s !== null){
                $stmt0 = ConexionBD::Abrir_Conexion()->prepare("SELECT TP.id_periodoacm AS TPA FROM tbl_periodoacademico TP INNER JOIN tbl_matricula TM on TP.id_periodoacm = TM.id_periodoacm WHERE NOW() >= TP.fechainicio AND NOW() <= TP.fechafin AND TM.id_seccion = ".$s." AND TM.id_Clase = ".$c.";");
                $stmt0->execute();
                $resultado0 = $stmt0->fetchAll(PDO::FETCH_BOTH);
                
                $periodoid = $resultado0[0]['TPA'];
                
                //$stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT DISTINCT TA.id_alumno AS IDA, concat(TA.primernombre, ' ', TA.segundonombre, ' ', TA.primerapellido, ' ', TA.segundoapellido) AS nombre, TC.notafinal AS NF, TOB.Observacion AS OBS FROM (tbl_calificaciones TC INNER JOIN tbl_obsnotas TOB ON TC.cod_obs = TOB.cod_obs) INNER JOIN (tbl_Alumnos TA INNER JOIN tbl_matricula TM ON TA.id_alumno = TM.id_alumno) WHERE TC.id_Seccion = ".$s." AND TC.id_Clase = ".$c." AND TM.id_periodoacm = ".$periodoid.";");
                $stmt = ConexionBD::Abrir_Conexion()->prepare("select DISTINCT TCL.descripclase AS DC, TS.Descripseccion AS DS, CONCAT(TA.primernombre, ' ', TA.segundonombre, ' ', TA.primerapellido, ' ', TA.segundoapellido)AS NOMBRE, TCA.notafinal AS NF, TOB.observacion AS OBS, CONCAT(TU.primernombre, ' ', TU.primerapellido) AS NPROFE from (((tbl_calificaciones TCA INNER JOIN tbl_obsnotas TOB ON TCA.cod_obs=TOB.cod_obs) INNER JOIN tbl_alumnos TA ON TCA.id_alumno=TA.id_alumno) inner join (tbl_secciones TS inner join tbl_usuarios TU ON TS.id_usuario=TU.id_usuario) ON TCA.id_seccion=TS.id_seccion) INNER JOIN tbl_clases TCL ON TCA.id_clase = TCL.Id_clase WHERE TCA.id_clase=".$c." and TCA.id_Seccion=".$s." and TS.id_periodoacm=".$periodoid.";");
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_BOTH);
                
                return $resultado;
            }else{
                $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM tbl_calificaciones");

			$stmt -> execute();

			return $stmt -> fetchAll();
            }   
            
            
        }
        
        /*=============================================
	MOSTRAR HISTORIAL
	=============================================*/
        static public function mdlMostrarHistorial($ida){
            
            if($ida !== null){
             $stmt= ConexionBD::Abrir_Conexion()->prepare("select TCL.Id_Clase AS ID, TCL.DescripClase AS NC, TS.DescripSeccion AS DS, TPA.descripperiodo AS DP, TC.NotaFinal AS NF, TOB.observacion AS STATUS from (((tbl_calificaciones TC inner join tbl_obsnotas TOB on TC.cod_obs=TOB.cod_obs) inner join (tbl_secciones TS INNER JOIN tbl_periodoacademico AS TPA ON TS.id_periodoacm=TPA.id_periodoacm) on TC.Id_Seccion = TS.Id_Seccion) inner join tbl_clases TCL on TC.Id_Clase = TCL.Id_Clase) inner join tbl_alumnos TA on TC.id_alumno = TA.Id_Alumno where TC.Id_Alumno = ".$ida.";");   
             $stmt->execute();
             $resultado=$stmt->fetchAll(PDO::FETCH_BOTH);
             return $resultado;
            }else{
                $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM tbl_calificaciones");

			$stmt -> execute();

			return $stmt -> fetchAll();
            }   
            
            
        }
        
        
        
	/*=============================================
	MOSTRAR MATRÍCULA
	=============================================*/

	static public function MdlMostrarMatricula($tabla, $item, $valor){


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

		 $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla WHERE Id_modalidad = $valor");
		 $stmt -> execute();

		 return $stmt -> fetchall();

		 }





}
