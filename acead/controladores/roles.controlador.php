<?php

class ControladorRoles{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrAtributosRol($rol){

		$tabla = "tbl_permisos";

		$respuesta = ModeloRoles::mdlObtenerPermisos($tabla, $rol);

		return $respuesta;

		//echo "<script type='text/javascript'>alert(".$rol.")</script>";

	}

	/*=============================================
	MOSTRAR ROL
	=============================================*/

	static public function ctrMostrarRoles($item, $valor){

		$tabla = "tbl_roles";

		$respuesta = ModeloRoles::MdlMostrarRoles($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR ROL
	=============================================*/

	static public function ctrAgregarRoles(){

		if (isset($_POST["nuevoRoles"])) {

			$usuario = $_SESSION["id"];

				//Usuarios
				if (isset($_POST["VPUsuarios"])) {
					$VPUsuarios = 1;
				}else{
					$VPUsuarios = 0;
				}

				$datosA = array("Rol" => strtoupper($_POST["nuevoRoles"]),
											 "DescripRol" => strtoupper($_POST["nuevoDescripRol"]),
										 	 "CreadoPor" => $usuario);

				$respuestaA = ModeloRoles::mdlAgregarRol($datosA);

				if ($respuestaA = "ok") {
					$datosB= array("VPUsuarios" => $VPUsuarios);

					$respuestaB = ModeloRoles::mdlAgregarPermisos($datosB);

					if ($respuestaB = "ok") {
						echo '<script>

						swal({

							type: "success",
							title: "¡El Alumno ha sido guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false

						}).then((result)=>{

							if(result.value){

								window.location = "roles";

							}

						});


						</script>';

					}else{
						echo "<script type='text/javascript'>alert('error sql')</script>";
					}

				}


		}






	}



}
