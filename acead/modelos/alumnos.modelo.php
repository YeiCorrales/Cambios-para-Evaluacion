<?php

require_once "conexion.php";

class ModeloAlumnos{

	/*=============================================
	MOSTRAR ALUMNOS
	=============================================*/

	static public function MdlMostrarAlumnos($tabla, $item, $valor){


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
	REGISTRO DE ALUMNOS
	=============================================*/

	static public function mdlIngresarAlumno($tabla, $datos){

		$stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla (PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido, FechaNacimiento, CorreoElectronico, Telefono, Cedula,  Id_estadocivil, Id_genero, Id_Descuento, Direccion)
			   																					VALUES (:nombre1, :nombre2, :apellido1, :apellido2, :FechaNac, :email, :telefono, :cedula, :estcivil, :genero, :descuento, :direccion)");


		$stmt->bindParam(":nombre1", $datos["PrimerNombre"], PDO::PARAM_STR);
    $stmt->bindParam(":nombre2", $datos["SegundoNombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido1", $datos["PrimerApellido"], PDO::PARAM_STR);
    $stmt->bindParam(":apellido2", $datos["SegundoApellido"], PDO::PARAM_STR);
		$stmt->bindParam(":FechaNac", $datos["FechaNacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["CorreoElectronico"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":cedula", $datos["Cedula"], PDO::PARAM_STR);
    $stmt->bindParam(":estcivil", $datos["Id_EstadoCivil"], PDO::PARAM_STR);
    $stmt->bindParam(":genero", $datos["Id_Genero"], PDO::PARAM_STR);
		$stmt->bindParam(":descuento", $datos["Id_Descuento"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["Direccion"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";



		}else{

			return "error";
			echo "<script type='text/javascript'>alert('neles')</script>";
		}

		$stmt->close();

		$stmt = null;

		}


	/*=============================================
	EDITAR ALUMNO
	=============================================*/

	static public function mdlEditarAlumno($tabla, $datos){

		$stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE $tabla SET PrimerNombre = :nombre1,
                                                                   SegundoNombre = :nombre2,
                                                                   PrimerApellido = :apellido1,
                                                                   SegundoApellido = :apellido2,
																																	 CorreoElectronico = :email,
                                                                   Telefono = :telefono,
                                                                   Cedula = :cedula,
                                                                   Id_estadocivil = :estcivil,
                                                                   Id_genero = :genero,
																																	 Direccion = :direccion
                                                                WHERE Id_Alumno = :id");

		$stmt->bindParam(":id", $datos["Id_Alumno"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre1", $datos["PrimerNombre"], PDO::PARAM_STR);
    $stmt->bindParam(":nombre2", $datos["SegundoNombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido1", $datos["PrimerApellido"], PDO::PARAM_STR);
    $stmt->bindParam(":apellido2", $datos["SegundoApellido"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["CorreoElectronico"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":cedula", $datos["Cedula"], PDO::PARAM_STR);
    $stmt->bindParam(":estcivil", $datos["Id_EstadoCivil"], PDO::PARAM_STR);
    $stmt->bindParam(":genero", $datos["Id_Genero"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["Direccion"], PDO::PARAM_STR);



		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	ACTUALIZAR ALUMNO
	=============================================*/

	static public function mdlActualizarAlumno($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR ALUMNO
	=============================================*/

	static public function mdlBorrarAlumno($tabla, $datos){

    $stmt = ConexionBD::Abrir_Conexion()->prepare("DELETE FROM tbl_alumnos WHERE Id_Alumno = :id");

    $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);


		if($stmt -> execute() ){

			return "ok";



		}else{

			return "error";

		}

		$stmt -> close();

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



}

/*
 * Selector de funciones para cargar los Selects en cascada
 *
 */
$funcion = filter_input(INPUT_GET, 'caso');

switch ($funcion){
    case 'cargaorientacion':
    metodo_cargaorientacion();
    break;
    case 'cargaclases':
    metodo_cargaclases();
    break;
    case 'cargasecciones':
    metodo_cargasecciones();
    break;
    case 'cargahistorial':
    metodo_cargahistorial();
    break;
    case 'llenaselect':
    metodo_llenaselect();
    break;
    case 'llenaselectclases':
    metodo_llenaselectclases();
    break;
    case 'cargaalumnos':
    metodo_cargaalumnos();
    break;
    case 'registracali':
    metodo_registracali();
    break;
    case 'insertanota':
    metodo_insertanota();
    break;
    case 'obtienecalificaciones':
    metodo_obtienecalificaciones();
    break;
    case 'califtodo':
    metodo_califtodo();
    break;
}



function metodo_cargaorientacion(){
    $idmodalidad = filter_input(INPUT_POST, 'idmodalidad');

    //$stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT TOR.id_orientacion AS ID, TOR.nombre AS nombre FROM tbl_Orientacion TOR WHERE TOR.Id_modalidad = ".$idmodalidad.";");
    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT DISTINCT tbl_orientacion.Id_orientacion as ID, Nombre as nombre FROM tbl_orientacion INNER JOIN tbl_mod_orientacion ON tbl_mod_orientacion.Id_Orientacion = tbl_orientacion.Id_orientacion where id_modalidad =$idmodalidad");
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_BOTH);

    echo json_encode($resultado);

}
function metodo_cargaclases(){
    $idmodalidad = filter_input(INPUT_POST, 'idmodalidad');

    //$stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT TC.id_clase AS IDC, TC.DescripClase AS DC, TC.Duracion AS DUR FROM tbl_Clases TC WHERE TC.Id_orientacion = ".$idmodalidad.";");
    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT DISTINCT tbl_clases.Id_Clase as IDC, DescripClase as DC FROM tbl_clases INNER JOIN tbl_mod_orientacion ON tbl_mod_orientacion.Id_Clase = tbl_clases.Id_Clase where Id_Modalidad =$idmodalidad");
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_BOTH);

    echo json_encode($resultado);

}
function metodo_cargasecciones(){
    $idclase = filter_input(INPUT_POST, 'idclase');

    //$stmt = ConexionBD::Abrir_Conexion()->prepare("select TS.id_seccion AS ISE, TS.DescripSeccion AS DS from tbl_secciones TS WHERE TS.id_clase = ".$idclase.";");
    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT tbl_secciones.Id_Seccion as ISE, DescripSeccion as DS FROM tbl_secciones INNER JOIN tbl_clases_secciones ON tbl_clases_secciones.Id_Seccion = tbl_secciones.Id_Seccion where id_clase =$idclase");

    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_BOTH);

    echo json_encode($resultado);

}


function metodo_cargahistorial(){
    @session_start();
        $idu = $_SESSION["usuario"];
   // $stmt= ConexionBD::Abrir_Conexion()->prepare("select TA.id_alumno AS IDA, TCL.Id_Clase AS ID, TCL.DescripClase AS NC, concat(TA.PrimerNombre, ' ', TA.SegundoNombre,' ', TA.PrimerApellido, ' ', TA.SegundoApellido) AS EST, TC.NotaFinal AS NF, TOB.observacion AS STATUS from (((tbl_calificaciones TC inner join tbl_obsnotas TOB on TC.cod_obs=TOB.cod_obs) inner join tbl_secciones TS on TC.Id_Seccion = TS.Id_Seccion) inner join tbl_clases TCL on TC.Id_Clase = TCL.Id_Clase) inner join tbl_alumnos TA on TC.id_alumno = TA.Id_Alumno where TS.Id_usuario = ".$idu.";");
    $stmt= ConexionBD::Abrir_Conexion()->prepare("select DISTINCT TA.id_alumno AS IDA, concat(TA.PrimerNombre, ' ', TA.SegundoNombre,' ', TA.PrimerApellido, ' ', TA.SegundoApellido) AS EST, TA.cedula as CE, TMO.Descripmodalidad AS DMO, TOR.nombre from ((tbl_matricula TM inner join tbl_orientacion TOR on TM.id_orientacion=TOR.id_orientacion) inner join tbl_modalidades TMO on TM.id_modalidad=TMO.id_modalidad) inner join tbl_alumnos TA on TM.id_alumno = TA.id_alumno;");
    $stmt ->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_BOTH);
      echo json_encode($resultado);

}

function metodo_llenaselect(){
    @session_start();
    $idu= $_SESSION["usuario"];
    $stmt= ConexionBD::Abrir_Conexion()->prepare("SELECT TS.id_seccion AS IDS, TS.descripseccion AS DS FROM TBL_SECCIONES TS WHERE ID_USUARIO=".$idu.";");
    $stmt ->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_BOTH);
      echo json_encode($resultado);
}

function metodo_llenaselectclases(){
    @session_start();
    $idu= $_SESSION["usuario"];
    $stmt= ConexionBD::Abrir_Conexion()->prepare("select DISTINCT TC.id_clase AS IDC, TC.descripclase AS DC, TM.id_periodoacm, TP.fechainicio, TP.id_periodoacm from tbl_clases TC inner join (tbl_matricula TM inner join (tbl_periodoacademico TP inner join tbl_secciones TS on TP.id_periodoacm=TS.id_periodoacm) on TM.id_periodoacm=TP.Id_periodoacm) on TC.id_clase=TM.id_clase where TS.id_usuario=".$idu." AND (NOW() >= TP.fechainicio AND NOW() <= TP.fechafin);");
    $stmt ->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_BOTH);
      echo json_encode($resultado);
}

function metodo_cargaalumnos(){
    @session_start();
    $idu= $_SESSION["usuario"];
    $ids = filter_input(INPUT_POST, 'id_seccion');
    $idc = filter_input(INPUT_POST, 'id_clase');
    //$stmt= ConexionBD::Abrir_Conexion()->prepare("select TA.id_alumno AS IDA, concat(TA.primernombre, ' ', TA.segundonombre, ' ', TA.primerapellido, ' ', TA.segundoapellido) AS nombre, TA.correoelectronico AS CE, TA.telefono AS TEL from (tbl_matricula TM inner join tbl_alumnos TA on TM.id_alumno = TA.id_alumno) inner join tbl_Secciones TS on TM.id_seccion = TS.id_seccion where TS.id_usuario = ".$idu." and TS.id_seccion=".$ids.";");
    //$stmt= ConexionBD::Abrir_Conexion()->prepare("select DISTINCT TA.id_alumno AS IDA, concat(TA.primernombre, ' ', TA.segundonombre, ' ', TA.primerapellido, ' ', TA.segundoapellido) AS nombre, TA.correoelectronico AS CE, TA.telefono AS TEL, TCAL.notafinal AS NF, TOB.observacion AS OBS from (tbl_matricula TM inner join (tbl_alumnos TA inner join (tbl_calificaciones TCAL INNER JOIN tbl_obsnotas TOB on TCAL.cod_obs=TOB.cod_obs) on TA.id_alumno=TCAL.id_alumno) on TM.id_alumno = TA.id_alumno) inner join tbl_Secciones TS on TM.id_seccion = TS.id_seccion where TS.id_usuario = ".$idu." and TS.id_seccion=".$ids.";");
    $stmt= ConexionBD::Abrir_Conexion()->prepare("select DISTINCT TA.id_alumno AS IDA, concat(TA.primernombre, ' ', TA.segundonombre, ' ', TA.primerapellido, ' ', TA.segundoapellido) AS nombre, TA.correoelectronico AS CE, TA.telefono AS TEL, TCAL.notafinal AS NF, TOB.observacion AS OBS from (tbl_matricula TM inner join (tbl_alumnos TA inner join (tbl_calificaciones TCAL INNER JOIN tbl_obsnotas TOB on TCAL.cod_obs=TOB.cod_obs) on TA.id_alumno=TCAL.id_alumno) on TM.id_alumno = TA.id_alumno) inner join tbl_Secciones TS on TM.id_seccion = TS.id_seccion where TS.id_usuario =".$idu." and TS.id_seccion=".$ids." and TCAL.id_clase=".$idc.";");
    $stmt -> execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_BOTH);
      echo json_encode($resultado);

}
function metodo_registracali(){
    $ida = filter_input(INPUT_POST, 'id_alumno');

}

function metodo_insertanota(){
     $nf = filter_input(INPUT_POST, 'notafinal');
     $ida = filter_input(INPUT_POST, 'id_alumno');
     $ids = filter_input(INPUT_POST, 'id_seccion');
     $codobs = filter_input(INPUT_POST, 'cod_obs');
     $idc = filter_input(INPUT_POST, 'id_clase');

     //evaluando si ya existe la calificacion especifica en la tabla calificaciones
     $stmt0= ConexionBD::Abrir_Conexion()->prepare("select count(*) AS CANT from  tbl_calificaciones where id_alumno=".$ida." and id_clase=".$idc.";");
     $stmt0->execute();
     $resultado=$stmt0->fetchAll(PDO::FETCH_BOTH);
     if($resultado[0]['CANT']==0){
         //aqui es un insert
         $stmt= ConexionBD::Abrir_Conexion()->prepare("insert into tbl_calificaciones(notafinal,id_alumno,id_seccion, cod_obs, id_clase) values(".$nf.",".$ida." ,".$ids.", ".$codobs.",".$idc." );");
            if($stmt->execute()){
                echo json_encode('1');
           }else{
               echo json_encode('0');

           }
     }else{
         //aqui es un update

         $stmt1= ConexionBD::Abrir_Conexion()->prepare("update tbl_calificaciones set notafinal=".$nf.", cod_obs=".$codobs." where id_alumno=".$ida." and id_clase=".$idc.";");
          if($stmt1->execute()){
                echo json_encode('1');
           }else{
               echo json_encode('0');

           }
     }



   }

   function metodo_obtienecalificaciones(){
       @session_start();
       $idu=$_SESSION['id'];
        $idc = filter_input(INPUT_POST, 'id_clase');
        $ids = filter_input(INPUT_POST, 'id_seccion');
        $hoy = getdate();
        $fechaactual = $hoy['year'] . "-" . $hoy['mon'] . "-" . $hoy['mday'];

//        $stmt= ConexionBD::Abrir_Conexion()->prepare("select distinct TAL.id_alumno AS IDAL, concat(TAL.primernombre, ' ', TAL.segundonombre, ' ', TAL.primerapellido, ' ', TAL.segundoapellido) AS nombre, TC.id_calificaciones AS IDC, TC.notafinal AS NF, TC.id_alumno AS IA, TC.id_seccion AS IDS, TC.cod_obs AS CO, TC.id_clase AS ICL from tbl_calificaciones TC inner join ((tbl_secciones TS inner join (tbl_matricula TM inner join tbl_alumnos TAL o n TM.id_alumno=TAL.id_alumno) on TS.id_Seccion=TM.id_seccion) INNER JOIN tbl_periodoacademico TPA on TS.id_periodoacm=TPA.id_periodoacm) on TC.id_seccion=TS.id_seccion where TC.id_clase=".$idc." and TC.id_seccion=".$ids." and (NOW() >= TPA.fechainicio and NOW() <= TPA.fechafin);");
        $stmt= ConexionBD::Abrir_Conexion()->prepare("select distinct TAL.id_alumno AS IDAL, concat(TAL.primernombre, ' ', TAL.segundonombre, ' ', TAL.primerapellido, ' ', TAL.segundoapellido) AS nombre, TC.id_calificaciones AS IDC, TC.notafinal AS NF, TC.id_alumno AS IA, TC.id_seccion AS IDS, TC.cod_obs AS CO, TC.id_clase AS ICL from tbl_calificaciones TC inner join ((tbl_secciones TS inner join (tbl_matricula TM inner join tbl_alumnos TAL on TM.id_alumno=TAL.id_alumno) on TS.id_Seccion=TM.id_seccion) INNER JOIN tbl_periodoacademico TPA on TS.id_periodoacm=TPA.id_periodoacm) on TC.id_seccion=TS.id_seccion where TC.id_clase=".$idc." and TC.id_seccion=".$ids." and (NOW() >= TPA.fechainicio and NOW() <= TPA.fechafin) group by TAL.id_alumno;");
        $stmt->execute();
        $resultado=$stmt->fetchAll(PDO::FETCH_BOTH);
        
        //ConexionBD::inserta_bitacora($fechaActual, 'Agregando notas', 'Notas individuales por Alumnos', $idu, 8);
        
        ConexionBD::Inserta_bitacora($fechaactual, 'Agregando notas', 'Notas individuales por Alumnos', $idu, 8);
        
        echo json_encode($resultado);
   }

   function metodo_califtodo(){
       $nf = filter_input(INPUT_POST, 'notafinal');
       $ida = filter_input(INPUT_POST, 'idalumno');
       $ids = filter_input(INPUT_POST, 'idseccion');
       $codobs = filter_input(INPUT_POST, 'cod_obs');
       $idc = filter_input(INPUT_POST, 'id_clase');

       $stmt= ConexionBD::Abrir_Conexion()->prepare("select count(*) AS CANTIDAD from tbl_calificaciones where id_alumno=".$ida." and id_seccion=".$ids." and id_clase=".$idc.";");
       $stmt->execute();
       $resultado=$stmt->fetchAll(PDO::FETCH_BOTH);


       if($resultado[0]['CANTIDAD']==0){
       //AQUI ES UN INSERT
        $stmta= ConexionBD::Abrir_Conexion()->prepare("INSERT INTO tbl_calificaciones(notafinal, id_alumno, id_seccion, cod_obs, id_clase) values(".$nf.",".$ida." ,".$ids." ,".$codobs." ,".$idc." );");
        if($stmta->execute()){
            echo json_encode('1');
        }else{
             echo json_encode('0');
        }


       }else{
        //AQUI ES UN UPDATE
            $stmtb= ConexionBD::Abrir_Conexion()->prepare("UPDATE tbl_calificaciones set notafinal=".$nf." where id_alumno=".$ida." and id_clase=".$idc." and id_Seccion=".$ids.";");
            if($stmtb->execute()){
            echo json_encode('1');
        }else{
             echo json_encode('0');
        }


       }


   }
