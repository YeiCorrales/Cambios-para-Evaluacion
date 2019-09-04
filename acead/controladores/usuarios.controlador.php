<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){


	if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[A-Za-z0-9]+$/', $_POST["ingUsuario"])){

				$tabla = "tbl_usuarios";

				$item = "Usuario";

				$valor = strtoupper($_POST["ingUsuario"]);


				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if($respuesta["Usuario"] == strtoupper($_POST["ingUsuario"]) && password_verify($_POST["ingPassword"], $respuesta['Contrasena'])){
					$_SESSION['intentos']=0;

                                        //switch controla la sesion y el estado del usuario

					switch($respuesta["Id_Estado"]){
						case '3':

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["Id_usuario"];
						$_SESSION["usuario"] = $respuesta["Id_usuario"];
						$_SESSION["nombre"] = $respuesta["PrimerNombre"];
						$_SESSION["perfil"] = $respuesta["Id_Rol"];


						/*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Tegucigalpa');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "FechaUltimaConex";
						$valor1 = $fechaActual;

						$item2 = "Id_usuario";
						$valor2 = $respuesta["Id_usuario"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

						if($ultimoLogin == "ok"){

                    //AQUI VA EL CODIGO PARA IR A LAS PREGUNTAS DE PRIMER ACCESO
                  $valor3 = "PrimerIngreso";
                  $revisaPacceso = ModeloUsuarios::obtenerPrimerIngreso($valor2);

                  /* Aquí hace el llamado de la funcion que inserta datos a la Bitacora
                   * Este llamado debe hacerse asi, siempre que se necesite guardar X acción en la bitacora
                   * Solo se debe ubicar en los lugares donde se realiza X acción que debe ser registrada en X objeto del sistema
                   * Como en formularios, pantallas, tablas, etc.
                   */

                  ConexionBD::Inserta_bitacora($fechaActual, 'Ingreso al sistema', 'Accediendo por el Login del sistema', $_SESSION['id'], 1);


                  if($revisaPacceso == true){
                      echo '<script> window.location = "preguntas"; </script>';
                  }else{
                      echo '<script>

								window.location = "inicio";

							</script>';
                                                    }


						}

						break;


						case '2':
						echo '<br><div class="alert alert-danger">El usuario no está activo, contacte a su administrador.</div>';

						break;

                                                //control del estado 1 primer ingreso
						case '1':
                                                    $_SESSION["iniciarSesion"] = "ok";
                                                    $_SESSION["id"] = $respuesta["Id_usuario"];
                                                    $_SESSION["usuario"] = $respuesta["Id_usuario"];
                                                    $_SESSION["nombre"] = $respuesta["PrimerNombre"];
                                                    $_SESSION["perfil"] = $respuesta["Id_Rol"];


                                                    /*=============================================
                                                    REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
                                                    =============================================*/

                                                    date_default_timezone_set('America/Tegucigalpa');

                                                    $fecha = date('Y-m-d');
                                                    $hora = date('H:i:s');

                                                    $fechaActual = $fecha.' '.$hora;

                                                    $item1 = "FechaUltimaConex";
                                                    $valor1 = $fechaActual;

                                                    $item2 = "Id_usuario";
                                                    $valor2 = $respuesta["Id_usuario"];

                                                    $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

                                                    if($ultimoLogin == "ok"){

                                                        //$valor3 = "PrimerIngreso";
                                                        $revisaPacceso = ModeloUsuarios::obtenerPrimerIngreso($valor2);

                                                        ConexionBD::Inserta_bitacora($fechaActual, 'Ingreso al sistema', 'Contestando las preguntas de seguridad para primer acceso!', $_SESSION['id'], 2);

                                                        if($revisaPacceso === true){
                                                            echo '<script> window.location = "preguntas"; </script>';
                                                        }else{
                                                            //session_destroy();
                                                            echo '<script>

                                                                    window.location = "inicio";

                                                            </script>';

                                                        }

                                                    }

                                                    break;

						/*$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["Id_usuario"];
						$_SESSION["usuario"] = $respuesta["Id_usuario"];
						$_SESSION["nombre"] = $respuesta["PrimerNombre"];
						$_SESSION["perfil"] = $respuesta["Id_Rol"];


						/*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/
                                                    /*
						date_default_timezone_set('America/Tegucigalpa');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "FechaUltimaConex";
						$valor1 = $fechaActual;

						$item2 = "Id_usuario";
						$valor2 = $respuesta["Id_usuario"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

						if($ultimoLogin == "ok"){

							echo '<script>

								window.location = "categorias";

							</script>';

						}

						break; */

					}


					}else{

					$_SESSION['intentos']+=1;

					echo '<br><div class="alert alert-danger">Error al ingresar, Usuario y/o Contraseña Invalidos</div>';


				}

			 }

		}

	}

	/*=============================================
   BLOQUEO DE USUARIO
	=============================================*/

	public function ctrBloquearUsuario(){

		if (isset($_POST['ingUsuario'])) {

			$tabla = "tbl_usuarios";

			$datos = array(
						 "Usuario" => $_POST["ingUsuario"],
						 "Id_Estado" => 2);

						 $respuesta = ModeloUsuarios::mdlBloquearUsuario($tabla, $datos);

					 }
		}



	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario(){

		if(isset($_POST["nuevoUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre1"])){


				$tabla = "tbl_usuarios";
				$nuevo = 1;
				$primeringreso = 0;
				$encriptar = password_hash($_POST["nuevoPassword"], PASSWORD_DEFAULT);

				$datos = array("PrimerNombre" => strtoupper($_POST["nuevoNombre1"]),
										 "PrimerApellido"	=> strtoupper($_POST["nuevoApellido1"]),
										 "SegundoNombre"	=> strtoupper($_POST["nuevoNombre2"]),
										 "SegundoApellido"	=> strtoupper($_POST["nuevoApellido2"]),
										 "CorreoElectronico" => $_POST["nuevoEmail"],
										 "Telefono" => $_POST["nuevoTelefono"],
										 "Cedula" => $_POST["nuevoCedula"],
					           "Usuario" => strtoupper($_POST["nuevoUsuario"]),
					           "Contrasena" => $encriptar,
										 "Id_Departamento" => $_POST["nuevoDpto"],
										 "Id_EstadoCivil" => $_POST["nuevoEstCivil"],
										 "Id_Genero" => $_POST["nuevoGenero"],
										 "Id_Rol" => $_POST["nuevoRol"],
										 "Direccion" => strtoupper($_POST["nuevoDireccion"]),
										 "Id_Estado" => $nuevo,
									   "PrimerIngreso" => $primeringreso);


				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){

							window.location = "usuarios";

						}

					});


					</script>';


				}


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){

							window.location = "usuarios";

						}

					});


				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "tbl_usuarios";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario(){


		if(isset($_POST["editarUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre1"])){

				$tabla = "tbl_usuarios";

				if($_POST["editarPassword"] != ""){


					$encriptar = password_hash($_POST["editarPassword"], PASSWORD_DEFAULT);

					}else{

						echo'<script>

								swal({
									  type: "error",

									  title: "¡La contraseña no puede ir vacía",

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

				$datos = array("PrimerNombre" => strtoupper($_POST["editarNombre1"]),
										 "PrimerApellido"	=> strtoupper($_POST["editarApellido1"]),
										 "SegundoNombre"	=> strtoupper($_POST["editarNombre2"]),
										 "SegundoApellido"	=> strtoupper($_POST["editarApellido2"]),
										 "CorreoElectronico" => $_POST["editarEmail"],
										 "Telefono" => $_POST["editarTelefono"],
										 "Cedula" => $_POST["editarCedula"],
					           "Contrasena" => $encriptar,
										 "Id_Departamento" => $_POST["editarDpto"],
										 "Id_EstadoCivil" => $_POST["editarEstCivil"],
										 "Id_Genero" => $_POST["editarGenero"],
										 "Usuario" => $_POST["editarUsuario"],
										 "Id_Rol" => $_POST["editarRol"],
									   "Direccion" => strtoupper($_POST["editarDireccion"]));


							  // "Id_Rol" => $_POST["editarPerfil"]

							   //"foto" => $ruta)



				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
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
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){


			$tabla ="tbl_usuarios";
			$datos = $_GET["idUsuario"];



			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
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
	MOSTRAR GENERO
	=============================================*/

	static public function ctrCargarSelectGenero(){

		$tabla = "tbl_genero";

		$respuesta = ModeloUsuarios::mdlCargarSelect($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR DEPARTAMENTOS
	=============================================*/

	static public function ctrCargarSelectDepartamento(){

		$tabla = "tbl_departamentos";

		$respuesta = ModeloUsuarios::mdlCargarSelect($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR ESTADO CIVIL
	=============================================*/

	static public function ctrCargarSelectEstCivil(){

		$tabla = "tbl_estadocivil";

		$respuesta = ModeloUsuarios::mdlCargarSelect($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR ESTADO CIVIL
	=============================================*/

	static public function ctrCargarSelectRol(){

		$tabla = "tbl_roles";

		$respuesta = ModeloUsuarios::mdlCargarSelect($tabla);

		return $respuesta;

	}


}
