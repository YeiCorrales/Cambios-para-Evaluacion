<?php

class ControladorContactoRespon{

	/*=============================================
	REGISTRO DE CONTACTO
	=============================================*/

	static public function ctrCrearContactoRespon(){

		if(isset($_POST["nuevoNombreContacto1"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreContacto1"])){


				$tabla = "tbl_contrespon";


				$datos = array("Id_Alumno" => $_POST["editarAlumnoContact"],
					           "Nombre" => strtoupper($_POST["nuevoNombreContacto1"]),
										 "Apellido"	=> strtoupper( $_POST["nuevoApellidoContacto1"]),
							       "DescripContact"	=> strtoupper( $_POST["nuevoContacto1"]),
                     "Telefono" => $_POST["nuevoTelefonoContacto"]);

				$respuesta = ModeloContactoRespon::mdlIngresarContactoRespon($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Contacto ha sido guardado correctamente!",
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
						title: "¡El Contacto no puede ir vacío o llevar caracteres especiales!",
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
	MOSTRAR CONTACTO RESPONSABLE
	=============================================*/

	static public function ctrMostrarContactoRespon($item, $valor){

		$tabla = "tbl_contrespon";

		$respuesta = ModeloContactoRespon::MdlMostrarContactoRespon($tabla, $item, $valor);

		return $respuesta;
	}

}
