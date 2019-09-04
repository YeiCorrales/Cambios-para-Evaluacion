<?php

class ControladorOrientaciones{

  /*=============================================
  MOSTRAR ORIENTACIONES
  =============================================*/

  static public function ctrMostrarOrientaciones($item, $valor){

    $tabla = "tbl_orientacion";

    $respuesta = ModeloOrientaciones::MdlMostrarOrientaciones($tabla, $item, $valor);

    return $respuesta;
  }


  /*=============================================
	REGISTRO DE ORIENTACION
	=============================================*/

	static public function ctrCrearOrientacion(){

		if(isset($_POST["nuevoNombreOrientacion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreOrientacion"])){


				$tabla = "tbl_orientacion";


				$datos = array("Nombre" => strtoupper($_POST["nuevoNombreOrientacion"]));


				$respuesta = ModeloOrientaciones::mdlIngresarOrientacion($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La Orientación sido guardada correctamente!",
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
						title: "¡El nombre de la Orentación no puede ir vacía o llevar caracteres especiales!",
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
 EDITAR ORIENTACION
 =============================================*/

 static public function ctrEditarOrientacion(){


   if(isset($_POST["editarOrientacion"])){


     if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarOrientacion"])){

       $tabla = "tbl_orientacion";

       $datos = array("Id_orientacion" => $_POST["editarIdOrientacion"],
                    "Nombre" => strtoupper($_POST["editarOrientacion"]));

       $respuesta = ModeloOrientaciones::mdlEditarOrientacion($tabla, $datos);

       if($respuesta == "ok"){

         echo'<script>

         swal({
             type: "success",
             title: "La Orientación ha sido editada correctamente",
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
	MOSTRAR LA ORIENTACION
	=============================================*/

	static public function ctrCargarSelectOrientacion(){

		$tabla = "tbl_orientacion";

		$respuesta = ModeloOrientaciones::mdlCargarSelect($tabla);

		return $respuesta;

	}



}
