<?php

require_once "conexion.php";

class ModeloContactoRespon{

	/*=============================================
	MOSTRAR CONTACTO RESPONSABLE
	=============================================*/

	static public function MdlMostrarContactoRespons($tabla, $item, $valor){


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
	CREAR CONTACTO RESPONSABLE
	=============================================*/

	static public function mdlIngresarContactoRespon($tabla, $datos){

		$stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla SET Nombre = :nombre1,
                                                                   Apellido = :apellido1,
                                                                   Telefono = :telefono,
                                                                   DescripContact = :descripcontact
                                                                WHERE Id_Alumno = :id");

		$stmt->bindParam(":id", $datos["Id_Alumno"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre1", $datos["Nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido1", $datos["Apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcontact", $datos["DescripContact"], PDO::PARAM_STR);




		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

		$stmt = null;

	}

}
