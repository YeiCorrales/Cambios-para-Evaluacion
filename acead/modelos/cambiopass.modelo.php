<?php

require_once "conexion.php";

class ModeloPass{

  /*=============================================

  =============================================*/

  static public function mdlCambioPass($tabla, $item, $valor){

    if($item != null){

      $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

      $stmt -> execute();
      //echo "<script type='text/javascript'>alert('yes')</script>";
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
  OBTENER CORREO DEL USUARIO
  =============================================*/

  static public function mdlObtenerCorreo($tabla, $item, $bus, $valor){

    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT $bus FROM $tabla WHERE $item = :$item");

    $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

    $stmt -> execute();
    //echo "<script type='text/javascript'>alert('yes')</script>";
    return $stmt -> fetch();


  }


  /*=============================================
  CAMBIAR CONTRASEÑA
  =============================================*/

  static public function mdlCambioContrasena($tabla, $datos){

    $stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE $tabla SET Contrasena = :Contrasena WHERE Usuario = :Usuario");

    $stmt->bindParam(":Usuario", $datos["Usuario"], PDO::PARAM_STR);
    $stmt->bindParam(":Contrasena", $datos["Contrasena"], PDO::PARAM_STR);

    if($stmt->execute()){

      return "ok";

    }else{

      return "error";

    }

    $stmt->close();

    $stmt = null;

  }


  /*=============================================
  OBTENER PARAMETROS
  =============================================*/
  //CORREO
  static public function mdlObtenerParamCorreo($tabla2, $bus3, $param1){
    //echo "<script type='text/javascript'>alert('.$datos["Parametro"].')</script>";
    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT $bus3 FROM $tabla2 WHERE Parametro = :parametro");

    $stmt -> bindParam(":parametro", $param1, PDO::PARAM_STR);

    $stmt -> execute();
    //echo "<script type='text/javascript'>alert('yes')</script>";
    return $stmt -> fetch();

  }

  //CONTRASEÑA
  static public function mdlObtenerParamPass($tabla2, $bus3, $param2){
    //echo "<script type='text/javascript'>alert('.$datos["Parametro"].')</script>";
    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT $bus3 FROM $tabla2 WHERE Parametro = :parametro2");

    $stmt -> bindParam(":parametro2", $param2, PDO::PARAM_STR);

    $stmt -> execute();
    //echo "<script type='text/javascript'>alert('yes')</script>";
    return $stmt -> fetch();

  }

  //REMITENTE
  static public function mdlObtenerParamRemitente($tabla2, $bus3, $param3){
    //echo "<script type='text/javascript'>alert('.$datos["Parametro"].')</script>";
    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT $bus3 FROM $tabla2 WHERE Parametro = :parametro3");

    $stmt -> bindParam(":parametro3", $param3, PDO::PARAM_STR);

    $stmt -> execute();
    //echo "<script type='text/javascript'>alert('yes')</script>";
    return $stmt -> fetch();

  }




}
