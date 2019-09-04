<?php

require_once "conexion.php";
class ModeloPagomes
{
/*=============================================	MOSTRAR ALUMNOS =============================================*/

	static public function MdlMostrarAlumnosPagomes($tabla, $item, $valor)
	{
		if($item != null)
		{
			$stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}
		else
		{
			$stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> Cerrar_Conexion();
		$stmt = null;
	}

	/*=============================================
	EDITAR PAGO MES
	=============================================*/

	static public function mdlEditarAlumnoPagomes($tabla, $datos)
	{
		$stmt = ConexionBD::Abrir_Conexion()->prepare("UPDATE $tabla SET PrimerNombre	= :nombre1,
                                                                       PrimerApellido = :apellido1,
                                                                       SegundoApellido = :apellido2,
                                                                      Id_Descuento = :editarDescuento,
                                                                      WHERE Id_Alumno 	= :id"		);

		$stmt->bindParam(":id",$datos["Id_Alumno"],PDO::PARAM_STR);
		$stmt->bindParam(":nombre1",$datos["PrimerNombre"],PDO::PARAM_STR);
		$stmt->bindParam(":apellido1",$datos["PrimerApellido"],PDO::PARAM_STR);
   		$stmt->bindParam(":editarDescuento",$datos["Id_Descuento"],PDO::PARAM_STR);

		if($stmt -> execute())
		{
			return "ok";
		}
		else
		{
			return "error";
		}
		$stmt -> close();
		$stmt = null;
	}
/*=============================================
	(INSERT) PAGO MENSUALIDAD
	=============================================*/

	static public function mdlInsMensualidadPago($tabla, $datos)
	{
		$stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO $tabla 
                                                                   (
                                                                   Id_Cuenta,
                                                                   MontoTotal,
                                                                   Mespago,
                                                                   Id_Alumno,
                                                                   Id_Estado,
                                                                   Id_Descuento
                                                                   )
                                                                   VALUES ( 
                                                                   :editarcuenta,
                                                                   :nuevoCobroMensual,
                                                                   :mesesapagar,
                                                                   :editarAlumno,
                                                                   :editarestado,
                                                                   :editarDescuento) ");
		$stmt->bindParam(":editarcuenta",		$datos["Id_Cuenta"],PDO::PARAM_STR);
		$stmt->bindParam(":nuevoCobroMensual",	$datos["MontoTotal" ],PDO::PARAM_STR);
		$stmt->bindParam(":mesesapagar" ,		$datos["Mespago"],PDO::PARAM_STR); 
   		$stmt->bindParam(":editarAlumno" ,		$datos["Id_Alumno"],PDO::PARAM_STR);
   		$stmt->bindParam(":editarDescuento",	$datos["Id_Descuento"],PDO::PARAM_STR);
		$stmt->bindParam(":editarestado",		$datos["Id_Estado"],PDO::PARAM_STR);		
	
		if($stmt -> execute())
		{
			return "ok";
		}
		else
		{
			return "error";
		}
		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	BORRAR ALUMNO
	=============================================*/

	static public function mdlBorrarAlumnoPagomes($tabla, $datos)
	{
    $stmt = ConexionBD::Abrir_Conexion()->prepare("DELETE FROM tbl_alumnos WHERE Id_Alumno = :id");
    $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
		if($stmt -> execute() )
		{
			return "ok";
		}
		else
		{
			return "error";
		}
		$stmt -> close();
		$stmt = null;
	}

/*===================================  CARGAR SELECT  =============================================*/
  static public function mdlCargarSelect($tabla)
  {
    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla");
  	$stmt -> execute();
  	return $stmt -> fetchall();
  }

/*====================  MOSTRAR PAGOS DE MENSUALIDAD COBRADOS ===================================*/
        static public function mdlPagosMensual($ida)
        {    
            if($ida !== null)
            {
                $stmt0 = ConexionBD::Abrir_Conexion()->prepare("select  concat(TA.PrimerNombre, ' ', TA.SegundoNombre, ' ', TA.PrimerApellido, ' ', TA.segundoapellido) AS nombre,TCM.MontoTotal AS TM from tbl_cuentacorriente TCM inner join tbl_alumnos TA on TCM.Id_Alumno = TA.Id_Alumno WHERE TA.Id_Alumno = ".$ida.";");
                $stmt0->execute();
                $resultado0 = $stmt0->fetchAll(PDO::FETCH_BOTH);
                
                return $resultado0;
            }   
            
            
        }/*modelo factura pago mes*/

}
