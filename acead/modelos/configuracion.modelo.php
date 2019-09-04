<?php

require_once "conexion.php";

class ModeloConfiguracion{

  /*=============================================
  MOSTRAR MODALIDADES
  =============================================*/

  static public function MdlMostrarConfig($tabla, $item, $valor){
    //echo "<script type='text/javascript'>alert('sql script')</script>";

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

  /* =============================================
    EDITAR PARAMETRO
    ============================================= */

  static public function mdlEditarParametro($tabla, $datos) {


      $stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE $tabla SET Parametro = :parametro, Valor = :valor, FechaModificacion = :fecha
                                                              WHERE Parametro = :parametro");

      $stmt->bindParam(":parametro", $datos["Parametro"], PDO::PARAM_STR);
      $stmt->bindParam(":valor", $datos["Valor"], PDO::PARAM_STR);
      $stmt->bindParam(":fecha", $datos["FechaModificacion"], PDO::PARAM_STR);


      if ($stmt->execute()) {

          return "ok";
      } else {

          return "error";
      }

      $stmt->close();

      $stmt = null;
  }

  /* =============================================
    EDITAR PRECIO
    ============================================= */

  static public function mdlEditarPrecio($tabla, $datos) {
    //echo "<script type='text/javascript'>alert('sql script')</script>";

      $stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE $tabla SET Descripcion = :descripcion, Precio = :precio
                                                              WHERE Descripcion = :descripcion");

      $stmt->bindParam(":descripcion", $datos["Descripcion"], PDO::PARAM_STR);
      $stmt->bindParam(":precio", $datos["Precio"], PDO::PARAM_STR);

      if ($stmt->execute()) {

          return "ok";
      } else {

          return "error";
      }

      $stmt->close();

      $stmt = null;
  }

  /* =============================================
    EDITAR DESCUENTO
    ============================================= */

  static public function modalEditarDescuento($tabla, $datos) {
    //echo "<script type='text/javascript'>alert('sql script')</script>";

      $stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE $tabla SET Descuento = :descuento, ValorDesc = :precio
                                                              WHERE Descuento = :descuento");

      $stmt->bindParam(":descuento", $datos["Descuento"], PDO::PARAM_STR);
      $stmt->bindParam(":precio", $datos["ValorDesc"], PDO::PARAM_STR);

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

  static public function mdlIngresarParametro($tabla, $datos) {
      //echo "<script type='text/javascript'>alert('sql script')</script>";

      $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla(Parametro,  Valor, FechaCreacion, Id_usuario)
                                                VALUES (:parametro, :valor, :fecha, :usuario)");


      $stmt->bindParam(":parametro", $datos["Parametro"], PDO::PARAM_STR);
      $stmt->bindParam(":valor", $datos["Valor"], PDO::PARAM_STR);
      $stmt->bindParam(":fecha", $datos["FechaCreacion"], PDO::PARAM_STR);
      $stmt->bindParam(":usuario", $datos["Id_usuario"], PDO::PARAM_STR);

      if ($stmt->execute()) {

          return "ok";
      } else {

          return "error";
      }

      $stmt->close();

      $stmt = null;
  }

  /* =============================================
    REGISTRO DE DESCUENTO
    ============================================= */

  static public function mdlIngresarDescuento($tabla, $datos) {
      //echo "<script type='text/javascript'>alert('sql script')</script>";

      $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla(Descuento,  ValorDesc)
                                                VALUES (:parametro, :valor)");


      $stmt->bindParam(":parametro", $datos["Descuento"], PDO::PARAM_STR);
      $stmt->bindParam(":valor", $datos["ValorDesc"], PDO::PARAM_STR);

      if ($stmt->execute()) {

          return "ok";
      } else {

          return "error";
      }

      $stmt->close();

      $stmt = null;
  }






}
