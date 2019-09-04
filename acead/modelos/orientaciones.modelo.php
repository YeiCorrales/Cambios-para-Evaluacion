<?php

require_once "conexion.php";

class ModeloOrientaciones{

  /*=============================================
  MOSTRAR ORIENTACION
  =============================================*/

  static public function MdlMostrarOrientaciones($tabla, $item, $valor){

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
  REGISTRO DE ORIENTACION
  =============================================*/

  static public function mdlIngresarOrientacion($tabla, $datos){


    $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla (Nombre)
                                                  VALUES (:nombreorientacion)");

    $stmt->bindParam(":nombreorientacion", $datos["Nombre"], PDO::PARAM_STR);

    if($stmt->execute()){

      return "ok";

    }else{

      return "error";
    }

    $stmt->close();

    $stmt = null;

  }

  /*=============================================
  EDITAR MODALIDAD
  =============================================*/

  static public function mdlEditarOrientacion($tabla, $datos){


    $stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE $tabla SET Nombre =:nombreorientacion
                                                    WHERE Id_orientacion = :id");


    $stmt->bindParam(":id", $datos["Id_orientacion"], PDO::PARAM_STR);
    $stmt->bindParam(":nombreorientacion", $datos["Nombre"], PDO::PARAM_STR);

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

  static public function mdlActualizarOrientacion($tabla, $item1, $valor1, $item2, $valor2){

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
