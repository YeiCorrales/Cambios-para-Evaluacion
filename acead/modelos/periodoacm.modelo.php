<?php

require_once "conexion.php";

class ModeloPeriodoAcm{

  /*=============================================
  MOSTRAR MODALIDADES
  =============================================*/

  static public function MdlMostrarPer($tabla, $item, $valor){
    //echo "<script type='text/javascript'>alert('sql script')</script>";

    if($item != null){


      $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

      $stmt -> execute();

      return $stmt -> fetch();

    }else{
      //echo "<script type='text/javascript'>alert('wut')</script>";


      $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla");

      $stmt -> execute();

      return $stmt -> fetchAll();

    }


    $stmt -> Cerrar_Conexion();

    $stmt = null;

  }

  /* =============================================
    EDITAR USUARIO
    ============================================= */

  static public function mdlEditarPeriodo($tabla, $datos) {
    //echo "<script type='text/javascript'>alert('modelo')</script>";

      $stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE $tabla SET DescripPeriodo = :periodo, FechaInicio = :fechainicio, FechaFin = :fechafin, Activo = :estado
                                                              WHERE DescripPeriodo = :periodo");

      $stmt->bindParam(":periodo", $datos["DescripPeriodo"], PDO::PARAM_STR);
      $stmt->bindParam(":fechainicio", $datos["FechaInicio"], PDO::PARAM_STR);
      $stmt->bindParam(":fechafin", $datos["FechaFin"], PDO::PARAM_STR);
      $stmt->bindParam(":estado", $datos["Activo"], PDO::PARAM_STR);


      if ($stmt->execute()) {

          return "ok";
      } else {

          return "error";
      }

      $stmt->close();

      $stmt = null;
  }


  /* =============================================
    REGISTRO DE PARAMETRO
    ============================================= */

  static public function mdlIngresarPeriodo($tabla, $datos) {
      //echo "<script type='text/javascript'>alert('sql script')</script>";

      $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla(DescripPeriodo, FechaInicio, FechaFin, Activo)
                                                VALUES (:periodo, :fechaini, :fechafin, :estado)");


      $stmt->bindParam(":periodo", $datos["DescripPeriodo"], PDO::PARAM_STR);
      $stmt->bindParam(":fechaini", $datos["FechaInicio"], PDO::PARAM_STR);
      $stmt->bindParam(":fechafin", $datos["FechaFin"], PDO::PARAM_STR);
      $stmt->bindParam(":estado", $datos["Activo"], PDO::PARAM_STR);

      if ($stmt->execute()) {

          return "ok";
      } else {

          return "error";
      }

      $stmt->close();

      $stmt = null;
  }

  /* =============================================
    CARGAR SELECT
    ============================================= */
    static public function mdlCargarSelect($tabla) {

        $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT Activo FROM $tabla");
        $stmt->execute();

        return $stmt->fetchall();
    }






}
