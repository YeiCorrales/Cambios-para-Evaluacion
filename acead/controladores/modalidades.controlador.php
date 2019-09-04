<?php

class ControladorModalidades{

  /*=============================================
  MOSTRAR MODALIDADES
  =============================================*/

  static public function ctrMostrarModalidades($item, $valor){

    $tabla = "tbl_modalidades";

    $respuesta = ModeloModalidades::MdlMostrarModalidades($tabla, $item, $valor);

    return $respuesta;
  }


  /*=============================================
	REGISTRO DE MODALIDAD
	=============================================*/

	static public function ctrCrearModalidad(){

		if(isset($_POST["nuevoDescripModalidad"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDescripModalidad"])){


				$tabla = "tbl_modalidades";


				$datos = array("DescripModalidad" => strtoupper($_POST["nuevoDescripModalidad"]));


				$respuesta = ModeloModalidades::mdlIngresarModalidad($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La Modalidad sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){

							window.location = "modalidades";

						}

					});


					</script>';


				}


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El nombre de la Modalidad no puede ir vacía o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){

							window.location = "modalidades";

						}

					});


				</script>';

			}


		}


	}

  /*=============================================
 EDITAR MODALIDAD
 =============================================*/

 static public function ctrEditarModalidad(){


   if(isset($_POST["editarModalidad"])){


     if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarModalidad"])){

       $tabla = "tbl_modalidades";

       $datos = array("Id_Modalidad" => $_POST["editarIdModalidad"],
                    "DescripModalidad" => strtoupper($_POST["editarModalidad"]));

       $respuesta = ModeloModalidades::mdlEditarModalidad($tabla, $datos);

       if($respuesta == "ok"){

         echo'<script>

         swal({
             type: "success",
             title: "La Modalidad ha sido editada correctamente",
             showConfirmButton: true,
             confirmButtonText: "Cerrar",
             closeOnConfirm: false
             }).then((result) => {
                 if (result.value) {

                 window.location = "modalidades";

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

             window.location = "modalidades";

             }
           })

         </script>';

     }

    }

  }


  /*=============================================
	MOSTRAR LA MODALIDAD
	=============================================*/

	static public function ctrCargarSelectModalidad(){

		$tabla = "tbl_modalidades";

		$respuesta = ModeloModalidades::mdlCargarSelect($tabla);

		return $respuesta;

	}

  /*=============================================
	MOSTRAR LA ORIENTACION
	=============================================*/

	static public function ctrCargarSelectOrientacion(){

		$tabla = "tbl_orientacion";

		$respuesta = ModeloModalidades::mdlCargarSelect($tabla);

		return $respuesta;

	}




}
