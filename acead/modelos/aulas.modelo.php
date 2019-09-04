<?php

require_once "conexion.php";

class ModeloAulas{

  /*=============================================
  MOSTRAR AULAS
  =============================================*/

  static public function MdlMostrarAulas($tabla, $item, $valor){

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
  REGISTRO DEL AULA
  =============================================*/

  static public function mdlIngresarAula($tabla, $datos){


    $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla (Num_Aula)
                                                  VALUES (:nombreaula)");

    $stmt->bindParam(":nombreaula", $datos["Num_Aula"], PDO::PARAM_STR);

    if($stmt->execute()){

      return "ok";

    }else{

      return "error";
    }

    $stmt->close();

    $stmt = null;

  }

  /*=============================================
  EDITAR AULA
  =============================================*/

  static public function mdlEditarAula($tabla, $datos){


    $stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE $tabla SET Num_Aula =:nombreaula
                                                    WHERE Id_Aula = :id");


    $stmt->bindParam(":id", $datos["Id_Aula"], PDO::PARAM_STR);
    $stmt->bindParam(":nombreaula", $datos["Num_Aula"], PDO::PARAM_STR);

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
  ACTUALIZAR ORIENTACION
  =============================================*/

  static public function mdlActualizarAula($tabla, $item1, $valor1, $item2, $valor2){

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
