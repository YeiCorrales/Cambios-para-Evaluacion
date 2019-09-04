<?php

class ControladorAlumnos{

	/*=============================================
	REGISTRO DE ALUMNOS
	=============================================*/

	static public function ctrCrearAlumno(){

		if(isset($_POST["nuevoNombre1"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre1"])){


				$tabla = "tbl_alumnos";


				$datos = array("PrimerNombre" => strtoupper($_POST["nuevoNombre1"]),
										 "PrimerApellido"	=> strtoupper( $_POST["nuevoApellido1"]),
										 "SegundoNombre"	=> strtoupper($_POST["nuevoNombre2"]),
										 "SegundoApellido"	=> strtoupper($_POST["nuevoApellido2"]),
										 "FechaNacimiento" => $_POST["nuevoFechaNac"],
										 "CorreoElectronico" => $_POST["nuevoEmail"],
										 "Telefono" => $_POST["nuevoTelefono"],
										 "Cedula" => $_POST['nuevoCedula'],
										 "Id_EstadoCivil" => $_POST["nuevoEstCivil"],
										 "Id_Genero" => $_POST["nuevoGenero"],
										 "Id_Descuento" => $_POST["nuevoDescuento"],
									 	 "Direccion" => strtoupper($_POST["nuevoDireccion"]));


				$respuesta = ModeloAlumnos::mdlIngresarAlumno($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Alumno ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){

							window.location = "alumnos";

						}

					});


					</script>';


				}


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El Alumno no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){

							window.location = "alumnos";

						}

					});


				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR ALUMNO
	=============================================*/

	static public function ctrMostrarAlumnos($item, $valor){

		$tabla = "tbl_alumnos";

		$respuesta = ModeloAlumnos::MdlMostrarAlumnos($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR ALUMNO
	=============================================*/

	static public function ctrEditarAlumno(){


		if(isset($_POST["editarAlumno"])){


			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre1"])){

				$tabla = "tbl_alumnos";

				$datos = array("Id_Alumno" => $_POST["editarAlumno"],
										 "PrimerNombre" => strtoupper($_POST["editarNombre1"]),
										 "PrimerApellido"	=> strtoupper($_POST["editarApellido1"]),
										 "SegundoNombre"	=> strtoupper($_POST["editarNombre2"]),
										 "SegundoApellido"	=> strtoupper($_POST["editarApellido2"]),
										 "CorreoElectronico" => $_POST["editarEmail"],
										 "Telefono" => $_POST["editarTelefono"],
										 "Cedula" => $_POST["editarCedula"],
										 "Id_EstadoCivil" => $_POST["editarEstCivil"],
										 "Id_Genero" => $_POST["editarGenero"],
										 "Id_Descuento" => $_POST["editarDescuento"],
										 "Direccion" => strtoupper($_POST["editarDireccion"]));


				$respuesta = ModeloAlumnos::mdlEditarAlumno($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Alumno ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {

									window.location = "alumnos";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
							type: "error",
							title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result) => {
							if (result.value) {

							window.location = "usuarios";

							}
						})

					</script>';

			}

		}


	}


	/*=============================================
	BORRAR ALUMNO
	=============================================*/

	static public function ctrBorrarAlumno(){

		if(isset($_GET["idAlumno"])){


			$tabla = "tbl_alumnos";
			$datos = $_GET["idAlumno"];

			$respuesta = ModeloAlumnos::mdlBorrarAlumno($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Alumno ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "alumnos";

								}
							})

				</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR GENERO
	=============================================*/

	static public function ctrCargarSelectGenero(){

		$tabla = "tbl_genero";

		$respuesta = ModeloAlumnos::mdlCargarSelect($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR ESTADO CIVIL
	=============================================*/

	static public function ctrCargarSelectEstCivil(){

		$tabla = "tbl_estadocivil";

		$respuesta = ModeloAlumnos::mdlCargarSelect($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR DESCUENTO
	=============================================*/

	static public function ctrCargarSelectDescuento(){

		$tabla = "tbl_descuento";

		$respuesta = ModeloAlumnos::mdlCargarSelect($tabla);

		return $respuesta;

	}

	/*=============================================
	IMPRIMIR INFO ALUMNO
	=============================================*/

  static public function ctrImprimirInfoAlumno($idAlumnoInfo){

		$tabla = "tbl_alumnos";

		$respuesta = ModeloAlumnos::MdlMostrarAlumnos($tabla, $idAlumnoInfo);

		return $respuesta;
	}

}
