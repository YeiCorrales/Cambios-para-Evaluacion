<?php

//@session_start();
require_once "conexion.php";


class ModeloRoles {

  /* =============================================
    OBTENER PERMISOS DEL ROL
    ============================================= */

  static public function mdlObtenerPermisos($tabla, $rol) {
    //echo "<script type='text/javascript'>alert('sql')</script>";

    $stmt= ConexionBD::Abrir_Conexion()->prepare("SELECT Id_Objeto AS OBJ,
                                                         PermisoInsercion AS PRI,
                                                         PermisoEliminacion AS PE,
                                                         PermisoActualizacion AS PA,
                                                         PermisoConsultar AS PC
                                                         FROM tbl_permisos WHERE Id_Rol = $rol");
     $stmt -> execute();

     return $stmt->fetchall();

   }

    /* =============================================
      MOSTRAR ROLES
      ============================================= */

    static public function MdlMostrarRoles($tabla, $item, $valor){


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
  }

  /* =============================================
    AGREGAR ROL
    ============================================= */

  static public function mdlAgregarRol($datosA) {

    $stmt= ConexionBD::Abrir_Conexion()->prepare("INSERT INTO tbl_roles (Rol, DescripRol, CreadoPor, FechaCreacion)
                                                  VALUES(:rol,:descriprol, :creado, '2019-04-20')");

    $stmt->bindParam(":rol", $datosA["Rol"], PDO::PARAM_STR);
    $stmt->bindParam(":descriprol", $datosA["DescripRol"], PDO::PARAM_STR);
    $stmt->bindParam(":creado", $datosA["CreadoPor"], PDO::PARAM_STR);


    if ($stmt->execute()) {
      return "ok";
      
    }else{
      echo "<script type='text/javascript'>alert('error sql')</script>";
    }



   }

   /* =============================================
     AGREGAR PERMISOS
     ============================================= */

   static public function mdlAgregarPermisos($datosB) {

     $stmtB= ConexionBD::Abrir_Conexion()->prepare("SELECT MAX(RO.Id_Rol) AS IDROL FROM tbl_roles RO");
     $stmtB -> execute();
     $resultadoA = $stmtB->fetchAll(PDO::FETCH_BOTH);
 		$idrol = $resultadoA[0]['IDROL'];

     $stmt= ConexionBD::Abrir_Conexion()->prepare("INSERT INTO tbl_permisos (PermisoInsercion, PermisoEliminacion, PermisoActualizacion, PermisoConsultar, Id_Rol, Id_Objeto, CreadoPor, FechaCreacion, ModificadoPor, FechaModificacion)
                                                   VALUES('0','0','0',:VPUsuarios, :idrol, '14', 'admin', '2019-04-20', 'null', 'null')");

     $stmt->bindParam(":VPUsuarios", $datosB["VPUsuarios"], PDO::PARAM_STR);
     $stmt->bindParam(":idrol", $idrol, PDO::PARAM_STR);


     if ($stmt->execute()) {
       return "ok";

     }else{
       echo "<script type='text/javascript'>alert('error sql')</script>";
     }

   }



}
