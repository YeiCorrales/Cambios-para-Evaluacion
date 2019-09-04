<?php

require_once "conexion.php";

class ModeloClases{

  /*=============================================
  MOSTRAR CLASES
  =============================================*/

  static public function MdlMostrarClases($tabla, $item, $valor){

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
  MOSTRAR CLASES ORIENTA MODALIDAD pivote
  =============================================*/

  static public function MdlMostrarClasesOrientaModali($tabla, $item, $valor){

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
  REGISTRO DE ORIENTACION-CLASE
  =============================================*/

  static public function mdlIngresarClaseOrientaModali($tabla, $datos){

    $stmtA = ConexionBD::Abrir_Conexion()->prepare("SELECT MAX(CLA.id_clase) AS IDCLASE FROM tbl_clases CLA");
    $stmtA->execute();
    $resultadoA = $stmtA->fetchAll(PDO::FETCH_BOTH);
    $idult = $resultadoA[0]['IDCLASE'];

    $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla (Id_Orientacion, Id_Modalidad, Id_Clase)
                                                  VALUES (:idorientacion, :idmodalidad, :idclase)");

    $stmt->bindParam(":idorientacion", $datos["Id_Orientacion"], PDO::PARAM_STR);
    $stmt->bindParam(":idmodalidad", $datos["Id_Modalidad"], PDO::PARAM_STR);
    $stmt->bindParam(":idclase", $idult, PDO::PARAM_STR);

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
  REGISTRO DE CLASES
  =============================================*/

  static public function mdlIngresarClases($tabla, $datos){

    $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla (DescripClase, Duracion)
                                                  VALUES (:descripclase, :duracion)");

    $stmt->bindParam(":descripclase", $datos["DescripClase"], PDO::PARAM_STR);
    $stmt->bindParam(":duracion", $datos["Duracion"], PDO::PARAM_STR);

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
    EDITAR ORIENTACION-CLASE
    =============================================*/

    static public function mdlEditarOrientaModali($tabla, $datos){


      $stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE tbl_mod_orientacion SET Id_Modalidad =:idmodalidad,
                                                                       Id_orientacion =:idorientacion
                                                      WHERE Id_Clase = :id");


      $stmt->bindParam(":id", $datos["Id_Clase"], PDO::PARAM_STR);
      $stmt->bindParam(":idmodalidad", $datos["Id_Modalidad"], PDO::PARAM_STR);
      $stmt->bindParam(":idorientacion", $datos["Id_Orientacion"], PDO::PARAM_STR);

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
  EDITAR CLASES
  =============================================*/

  static public function mdlEditarClase($tabla, $datos){


    $stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE $tabla SET DescripClase =:descripclase,
                                                                     Duracion =:duracion
                                                    WHERE Id_Clase = :id");


    $stmt->bindParam(":id", $datos["Id_Clase"], PDO::PARAM_STR);
    $stmt->bindParam(":descripclase", $datos["DescripClase"], PDO::PARAM_STR);
    $stmt->bindParam(":duracion", $datos["Duracion"], PDO::PARAM_STR);

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
  ACTUALIZAR MODALIDAD
  =============================================*/

  static public function mdlActualizarModalidad($tabla, $item1, $valor1, $item2, $valor2){

    $stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

    $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
    $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

    if($stmt -> execute()){

      return "ok";

    }else{

      return "error";
      echo "<script type='text/javascript'>alert('neles')</script>";

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
