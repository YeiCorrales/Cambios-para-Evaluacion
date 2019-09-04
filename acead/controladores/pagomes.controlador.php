<?php

class ControladorPagomes
{

/*================================	MOSTRAR ALUMNO=============================================*/
	static public function ctrMostrarAlumnosPagomes($item, $valor)
	{
		$tabla = "tbl_alumnos";
		$respuesta = ModeloPagomes::MdlMostrarAlumnosPagomes($tabla, $item, $valor);
		return $respuesta;
	}

/*================== INGRESO DE PAGO DE LA MENSUALIDAD  =================*/
	static public function ctrIngresoPagomes()
	{
		if(isset($_POST["editarAlumno"]))
		{
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre1"]))
			{
				$tabla = "tbl_alumnos";
				$datos = array(	 "Id_Alumno" =>$_POST["editarAlumno"],
								 "PrimerNombre"	=> strtoupper($_POST["editarNombre1"]),
								 "PrimerApellido" => strtoupper($_POST["editarApellido1"]),
								 "Id_Descuento" => $_POST["editarDescuento"]);				 

				$respuesta = ModeloPagomes::mdlPagomesIngreso($tabla, $datos);
				if($respuesta == "ok")
				{
					echo'<script>
					swal({
						  type: "success",
						  title: "Pago realizado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "pagomes";

									}
								})

					</script>';
				}
			}
			else
			{
				echo'<script>
					swal({
							type: "error",
							title: "¡El no puede ir vacío o ni llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result) =>
							{
							if (result.value)
							{
							window.location = "pagomes";
							}
						})
					</script>';
			}
		}
	}

/*==================(INSERT) INGRESO DE PAGO DE LA MENSUALIDAD  =================*/
	static public function ctrMensualidadPago()
	{
		if(isset($_POST["editarAlumno"]))
		{
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre1"]))
			{
				$tabla = "tbl_cuentacorriente";
				$datos = array(	 "Id_Cuenta" 	=> 	null,
								 "MontoTotal"	=> 	$_POST["valor3"],
								 "Mespago"		=> 	$_POST["mesesapagar"],
								 "Id_Alumno" 	=>	$_POST["editarAlumno"],
								 "Id_Estado"	=> 	1,
								 "Id_Descuento" => 	$_POST["editarDescuento"]
							 	 );	

				$respuesta = ModeloPagomes::mdlInsMensualidadPago($tabla, $datos);
				if($respuesta == "ok")
				{
					echo'<script>
					swal({
						  type: "success",
						  title: "Pago realizado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "pagomes";

									}
								})

					</script>';
				}
			}
			else
			{
				echo'<script>
					swal({
							type: "error",
							title: "¡El no puede ir vacío o ni llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result) =>
							{
							if (result.value)
							{
							window.location = "pagomes";
							}
						})
					</script>';
			}
		}
	}
/*==============	BORRAR ALUMNO	=============================================*/

	static public function ctrBorrarPagomes()
	{
		if(isset($_GET["idAlumno"]))
		{
			$tabla = "tbl_alumnos";
			$datos = $_GET["idAlumno"];
			$respuesta = ModeloPagomes::mdlBorrarAlumnoPagomes($tabla, $datos);
			if($respuesta == "ok")
			{
				echo'<script>
				swal({
					  type: "success",
					  title: "El Alumno ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value)
								{
								window.location = "pagomes";
								}
							})
				</script>';
			}
		}
	}

/*=============================================
  MOSTRAR PAGOS DE LA MATRICULA
  =============================================*/
static public function ctrPagosMensual($ida)
{
    $tabla = "tbl_cuentacorriente";
    $respuesta = ModeloPagomes::mdlPagosMensual($ida);
    return $respuesta;
  }


	/*==========================	MOSTRAR GENERO	=============================================*/
	static public function ctrCargarSelectGenero()
	{	$tabla = "tbl_genero";
		$respuesta = ModeloPagomes::mdlCargarSelect($tabla);
		return $respuesta;
	}

/*=============================================	MOSTRAR ESTADO CIVIL ============================================*/
	static public function ctrCargarSelectEstCivil()
	{	$tabla = "tbl_estadocivil";
		$respuesta = ModeloPagomes::mdlCargarSelect($tabla);
		return $respuesta;
	}

/*======================	MOSTRAR DESCUENTO	=============================================*/
	static public function ctrCargarSelectDescuento()
	{	$tabla = "tbl_descuento";
		$respuesta = ModeloPagomes::mdlCargarSelect($tabla);
		return $respuesta;
	}
}
