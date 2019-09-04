<?php

require_once "conexion.php";

class ModeloSeccion{

  /*=============================================
  MOSTRAR Seccion
  =============================================*/

  static public function MdlMostrarSecciones($tabla, $item, $valor){


      $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT SEC.Id_Seccion as IDSEC, SEC.DescripSeccion AS DSEC, CONCAT(USU.PrimerNombre,' ',USU.PrimerApellido) AS MAE, SEC.HraClase as SHRA, SEC.AulaClase AS AU, PER.Id_PeriodoAcm AS DPER FROM tbl_usuarios USU, tbl_secciones SEC, tbl_periodoacademico PER WHERE (USU.Id_usuario=SEC.Id_usuario) AND (SEC.Id_Seccion=SEC.Id_Seccion) AND(PER.Id_PeriodoAcm=SEC.Id_PeriodoAcm)");

      $stmt -> execute();

      return $stmt -> fetchAll();

    $stmt -> Cerrar_Conexion();

    $stmt = null;

  }


    /*=============================================
  IMPRIMIR SECCIONES
  =============================================*/

  static public function MdlImprimirSecciones($tabla, $d){


      $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT SEC.Id_Seccion as IDSEC, SEC.DescripSeccion AS DSEC, CONCAT(USU.PrimerNombre,' ',USU.PrimerApellido) AS MAE, SEC.HraClase as SHRA, SEC.AulaClase AS AU, PER.Id_PeriodoAcm AS DPER FROM tbl_usuarios USU, tbl_secciones SEC, tbl_periodoacademico PER WHERE (USU.Id_usuario=SEC.Id_usuario) AND (SEC.Id_Seccion=SEC.Id_Seccion) AND(PER.Id_PeriodoAcm=SEC.Id_PeriodoAcm)");

      $stmt -> execute();

      return $stmt -> fetchAll();

    $stmt -> Cerrar_Conexion();

    $stmt = null;

  }



  /*=============================================
  REGISTRO DE SECCION
  =============================================*/

  static public function mdlIngresarSeccion($tabla, $datos){

    $stmt0 = ConexionBD::Abrir_Conexion()->prepare("SELECT TS.id_seccion AS IDS, TS.DescripSeccion AS DS, TS.HraClase AS HC, TS.AulaClase AS AC, TS.id_periodoacm AS IDP, TS.id_usuario AS IU FROM tbl_secciones TS WHERE TS.id_usuario = ".$datos["Id_usuario"]." AND TS.HraClase = '".$datos["HraClase"]."' AND TS.AulaClase = ".$datos["AulaClase"].";");
    $stmt0->execute();
    $resultado0 = $stmt0->fetchAll(PDO::FETCH_BOTH);
    
    $stmt1 = ConexionBD::Abrir_Conexion()->prepare("SELECT COUNT(*) AS CANT  FROM tbl_secciones TS WHERE TS.HraClase = '".$datos["HraClase"]."' AND TS.AulaClase = ".$datos["AulaClase"]." AND TS.id_periodoacm = ".$datos["Id_PeriodoAcm"]." AND TS.id_usuario = ".$datos["Id_usuario"].";");
    $stmt1->execute();
    $resultado1 = $stmt1->fetchAll(PDO::FETCH_BOTH);
    
    $stmt2 = ConexionBD::Abrir_Conexion()->prepare("SELECT COUNT(*) AS CANT2 FROM tbl_secciones TS WHERE TS.HraClase = '".$datos["HraClase"]."' AND TS.AulaClase = ".$datos["AulaClase"].";");
    $stmt2->execute();
    $resultado2 = $stmt2->fetchAll(PDO::FETCH_BOTH);
    
    $stmt3 = ConexionBD::Abrir_Conexion()->prepare("SELECT COUNT(*) AS CANT3 FROM tbl_secciones TS WHERE TS.HraClase = '".$datos["HraClase"]."' AND TS.AulaClase = ".$datos["AulaClase"].";");
    $stmt3->execute();
    $resultado3 = $stmt3->fetchAll(PDO::FETCH_BOTH);
    
    if(isset($resultado0[0]['IU'])){
        if($resultado1[0]['CANT'] > 0){
            //return 'Aqui no debe insertar porque ya hay un registro!!!';
            return 'error1';
        }else{
            //return 'AQUI SI PODRIA INSERTAR!!!!';
            if($resultado2[0]['HC'] == $datos["HraClase"].':00' && $resultado2[0]['AC'] == $datos["AulaClase"]){
                //return 'Aqui no se puede porque la aula y la hora ya estan ocupadas!!!';
                return 'error2';
            }else{
                //return 'Aqui si se PODRIA!!!!';
                if($resultado3[0]['CANT3'] > 0){
                    return 'error3';
                } else {
                    $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla(DescripSeccion, HraClase, AulaClase, Id_PeriodoAcm, Id_usuario) VALUES (:descripseccion, :horaclase, :aulaclase, :periodoacm, :idusuario);");


                    $stmt->bindParam(":descripseccion", $datos["DescripSeccion"], PDO::PARAM_STR);
                    $stmt->bindParam(":horaclase", $datos["HraClase"], PDO::PARAM_STR);
                    $stmt->bindParam(":aulaclase", $datos["AulaClase"], PDO::PARAM_STR);
                    $stmt->bindParam(":periodoacm", $datos["Id_PeriodoAcm"], PDO::PARAM_STR);
                    $stmt->bindParam(":idusuario", $datos["Id_usuario"], PDO::PARAM_STR);




                    if($stmt->execute()){

                      return "ok";

                    }else{

                      return "error";
                      //echo "<script type='text/javascript'>alert('neles')</script>";
                    } 
                }
                
                               
            }
        }
    }else{
        //return 'No devuelve!!';
        if($resultado2[0]['CANT2'] == 0){            
            //return 'aqui SI SE PODRIA YA QUE NO HAY REGISTRO ALGUNO!!';
                if($resultado3[0]['CANT3'] > 0){
                    return 'error3';
                } else {
                    $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla(DescripSeccion, HraClase, AulaClase, Id_PeriodoAcm, Id_usuario) VALUES (:descripseccion, :horaclase, :aulaclase, :periodoacm, :idusuario);");


                    $stmt->bindParam(":descripseccion", $datos["DescripSeccion"], PDO::PARAM_STR);
                    $stmt->bindParam(":horaclase", $datos["HraClase"], PDO::PARAM_STR);
                    $stmt->bindParam(":aulaclase", $datos["AulaClase"], PDO::PARAM_STR);
                    $stmt->bindParam(":periodoacm", $datos["Id_PeriodoAcm"], PDO::PARAM_STR);
                    $stmt->bindParam(":idusuario", $datos["Id_usuario"], PDO::PARAM_STR);




                    if($stmt->execute()){

                      return "ok";

                    }else{

                      return "error";
                      //echo "<script type='text/javascript'>alert('neles')</script>";
                    } 
                }           
        }else{
            //return 'Aqui NO SE PODRIA dado que no devuelve usuario!!!';
            return 'error3';
        }
    }
    

//    
//    //return $datos["AulaClase"];
//    if(isset($resultado0[0]['IU'])){
//        if($resultado0[0]['HC'] == $datos["HraClase"].':00' && $resultado0[0]['AC'] == $datos["AulaClase"]){
//            if($resultado0[0]['IDP'] == $datos["Id_PeriodoAcm"]){
//               return 'error'; 
//            }else{
//                //return 'Aqui si se puede porque no es el mismo periodo!!';
//                $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla(DescripSeccion, HraClase, AulaClase, Id_PeriodoAcm, Id_usuario) VALUES (:descripseccion, :horaclase, :aulaclase, :periodoacm, :idusuario);");
//
//
//                $stmt->bindParam(":descripseccion", $datos["DescripSeccion"], PDO::PARAM_STR);
//                $stmt->bindParam(":horaclase", $datos["HraClase"], PDO::PARAM_STR);
//                $stmt->bindParam(":aulaclase", $datos["AulaClase"], PDO::PARAM_STR);
//                $stmt->bindParam(":periodoacm", $datos["Id_PeriodoAcm"], PDO::PARAM_STR);
//                $stmt->bindParam(":idusuario", $datos["Id_usuario"], PDO::PARAM_STR);
//
//
//
//
//                if($stmt->execute()){
//
//                  return "ok";
//
//                }else{
//
//                  return "error";
//                  //echo "<script type='text/javascript'>alert('neles')</script>";
//                }
//            }
//        }else{
//            //return 'Aqui se puede siempre!!';
//            $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla(DescripSeccion, HraClase, AulaClase, Id_PeriodoAcm, Id_usuario) VALUES (:descripseccion, :horaclase, :aulaclase, :periodoacm, :idusuario);");
//    
//    
//            $stmt->bindParam(":descripseccion", $datos["DescripSeccion"], PDO::PARAM_STR);
//            $stmt->bindParam(":horaclase", $datos["HraClase"], PDO::PARAM_STR);
//            $stmt->bindParam(":aulaclase", $datos["AulaClase"], PDO::PARAM_STR);
//            $stmt->bindParam(":periodoacm", $datos["Id_PeriodoAcm"], PDO::PARAM_STR);
//            $stmt->bindParam(":idusuario", $datos["Id_usuario"], PDO::PARAM_STR);
//    
//    
//    
//    
//            if($stmt->execute()){
//    
//              return "ok";
//    
//            }else{
//    
//              return "error";
//              //echo "<script type='text/javascript'>alert('neles')</script>";
//            }
//        }
//    }else{
//        //return 'Aqui lo debe insertar todo porque no hay registro!!';
//        if($resultado1[0]['HC'] == $datos["HraClase"].':00' && $resultado1[0]['AC'] == $datos["AulaClase"]){
//            if($resultado1[0]['IDP'] == $datos["Id_PeriodoAcm"]){
//               return 'error1'; 
//            }else{
//                $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla(DescripSeccion, HraClase, AulaClase, Id_PeriodoAcm, Id_usuario) VALUES (:descripseccion, :horaclase, :aulaclase, :periodoacm, :idusuario);");
//    
//    
//                $stmt->bindParam(":descripseccion", $datos["DescripSeccion"], PDO::PARAM_STR);
//                $stmt->bindParam(":horaclase", $datos["HraClase"], PDO::PARAM_STR);
//                $stmt->bindParam(":aulaclase", $datos["AulaClase"], PDO::PARAM_STR);
//                $stmt->bindParam(":periodoacm", $datos["Id_PeriodoAcm"], PDO::PARAM_STR);
//                $stmt->bindParam(":idusuario", $datos["Id_usuario"], PDO::PARAM_STR);
//
//
//
//
//                if($stmt->execute()){
//
//                  return "ok";
//
//                }else{
//
//                  return "error";
//                  //echo "<script type='text/javascript'>alert('neles')</script>";
//                }
//            }
//        }
//        
//        
//    }
    //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>ñññññññññññññññññññññññññññññ
    
//    if($resultado0[0]['HC'] == $datos["HraClase"].':00' && $resultado0[0]['AC'] == $datos["AulaClase"] && $resultado0[0]['IDP'] == $datos["Id_PeriodoAcm"]){
//        return 'error';
//    }else{
//        return 'otra vez '.$resultado0[0]['IDP'].'-'.$datos["Id_PeriodoAcm"];
////        $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla(DescripSeccion, HraClase, AulaClase, Id_PeriodoAcm, Id_usuario) VALUES (:descripseccion, :horaclase, :aulaclase, :periodoacm, :idusuario);");
////
////
////        $stmt->bindParam(":descripseccion", $datos["DescripSeccion"], PDO::PARAM_STR);
////        $stmt->bindParam(":horaclase", $datos["HraClase"], PDO::PARAM_STR);
////        $stmt->bindParam(":aulaclase", $datos["AulaClase"], PDO::PARAM_STR);
////        $stmt->bindParam(":periodoacm", $datos["Id_PeriodoAcm"], PDO::PARAM_STR);
////        $stmt->bindParam(":idusuario", $datos["Id_usuario"], PDO::PARAM_STR);
////
////
////
////
////        if($stmt->execute()){
////
////          return "ok";
////
////        }else{
////
////          return "error";
////          //echo "<script type='text/javascript'>alert('neles')</script>";
////        } 
//    }
    
    //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    
//    if($resultado0[0]['HC'] !== $datos["HraClase"] && $resultado0[0]['AC'] !== $datos["AulaClase"]){
//        return $resultado0[0]['HC'];
//        //echo '<script>alert('.$resultado0[0]['HC'].');</script>';
//    }else{
////        $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla(DescripSeccion, HraClase, AulaClase, Id_PeriodoAcm, Id_usuario) VALUES (:descripseccion, :horaclase, :aulaclase, :periodoacm, :idusuario);");
////
////
////        $stmt->bindParam(":descripseccion", $datos["DescripSeccion"], PDO::PARAM_STR);
////        $stmt->bindParam(":horaclase", $datos["HraClase"], PDO::PARAM_STR);
////        $stmt->bindParam(":aulaclase", $datos["AulaClase"], PDO::PARAM_STR);
////        $stmt->bindParam(":periodoacm", $datos["Id_PeriodoAcm"], PDO::PARAM_STR);
////        $stmt->bindParam(":idusuario", $datos["Id_usuario"], PDO::PARAM_STR);
////
////
////
////
////        if($stmt->execute()){
////
////          return "ok";
////
////        }else{
////
////          return "error";
////          echo "<script type='text/javascript'>alert('neles')</script>";
////        } 
//    }
    

    


    //$stmt = null;

  }

  /*=============================================
  REGISTRO DE CLASE-SECCION
  =============================================*/

  static public function mdlIngresarClaseSeccion($tabla, $datos){

    $stmtA = ConexionBD::Abrir_Conexion()->prepare("SELECT MAX(SEC.Id_Seccion) AS IDSEC FROM tbl_secciones SEC");
    $stmtA->execute();
    $resultadoA = $stmtA->fetchAll(PDO::FETCH_BOTH);
    $idult = $resultadoA[0]['IDSEC'];

    $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla (Id_Clase, Id_Seccion)
                                                  VALUES (:idclase, :idseccion)");

    
    $stmt->bindParam(":idclase", $datos["Id_Clase"], PDO::PARAM_STR);
    $stmt->bindParam(":idseccion", $idult, PDO::PARAM_STR);



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
  CARGAR SELECT
  =============================================*/
  static public function mdlCargarSelect($tabla){

    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla");
    $stmt -> execute();

    return $stmt -> fetchall();

    }

  /*=============================================
  CARGAR MAESTRO
  =============================================*/
  static public function mdlCargarSelectMaestro($tabla){

    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla WHERE Id_Rol= 3");
    $stmt -> execute();

    return $stmt -> fetchall();

    }


}

$funcion = filter_input(INPUT_GET, 'caso');

switch ($funcion) {
  case 'updateseccion':
    fcn_actualizaseccion();
    break;
  case 'cargaelementos':
    fcn_cargaelementos();
    break;
}

$funcion = filter_input(INPUT_GET, 'caso');

switch ($funcion) {
  case 'updateseccion':
    fcn_actualizaseccion();
    break;
}

$funcion = filter_input(INPUT_GET, 'caso');

switch ($funcion) {
  case 'updateseccion':
    fcn_actualizaseccion();
    break;
}

function fcn_actualizaseccion(){

  $idseccion = filter_input(INPUT_POST, 'id_Seccion');
  $descseccion = filter_input(INPUT_POST, 'DescripSeccion');
  $hraclase = filter_input(INPUT_POST, 'HraClase');
  $aulaclase = filter_input(INPUT_POST, 'AulaClase');
  $idperiodoacm = filter_input(INPUT_POST, 'Id_PeriodoAcm');
  $idusuario = filter_input(INPUT_POST, 'Id_usuario');
  $idclase = filter_input(INPUT_POST, 'Id_Clase');

  $stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE tbl_secciones SET DescripSeccion = '".$descseccion."', HraClase = '".$hraclase."', AulaClase = '".$aulaclase."', Id_PeriodoAcm = ".$idperiodoacm.", Id_usuario = ".$idusuario." WHERE Id_Seccion = ".$idseccion.";");
  if($stmt->execute()){

    $stmt1 = ConexionBD::Abrir_Conexion()->prepare("UPDATE tbl_clases_secciones SET Id_Clase = ".$idclase." WHERE Id_Seccion = ".$idseccion.";");

    if($stmt1->execute()){
      echo json_encode('1');
    }

  }else{
    echo json_encode('0');
  }

}


function fcn_cargaelementos(){
    
    $ids = filter_input(INPUT_POST, 'id_seccion');
    
    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT TCS.id_seccion AS IDS, TCS.id_clase AS IDC, TS.id_periodoacm AS IDP, TS.id_usuario AS IDPf, TS.descripseccion AS DS, TS.hraclase AS HC, TS.aulaclase AS AC FROM tbl_clases_secciones TCS INNER JOIN tbl_secciones TS ON TCS.id_seccion = TS.id_seccion WHERE TCS.id_seccion = ".$ids.";");
    $stmt->execute();
    
    $resultado = $stmt->fetchAll(PDO::FETCH_BOTH);
    
    echo json_encode($resultado);
            
    
    
}