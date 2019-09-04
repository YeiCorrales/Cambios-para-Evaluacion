<?php

class ControladorAulas{

  /*=============================================
  MOSTRAR AULAS
  =============================================*/

  static public function ctrMostrarAulas($item, $valor){

    $tabla = "tbl_aulas";

    $respuesta = ModeloAulas::MdlMostrarAulas($tabla, $item, $valor);

    return $respuesta;
  }


  /*=============================================
	REGISTRO DE AULAS
	=============================================*/

	static public function ctrCrearAula(){

		if(isset($_POST["nuevoNombreAula"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreAula"])){


				$tabla = "tbl_aulas";


				$datos = array("Num_Aula" => strtoupper($_POST["nuevoNombreAula"]));


				$respuesta = ModeloAulas::mdlIngresarAula($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Aula sido guardada correctamente!",
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
						title: "¡El nombre del Aula no puede ir vacía!",
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
 EDITAR AULA
 =============================================*/

 static public function ctrEditarAula(){


   if(isset($_POST["editarAula"])){


     if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarAula"])){

       $tabla = "tbl_aulas";

       $datos = array("Id_Aula" => $_POST["editarIdAula"],
                    "Num_Aula" => strtoupper($_POST["editarAula"]));

       $respuesta = ModeloAulas::mdlEditarAula($tabla, $datos);

       if($respuesta == "ok"){

         echo'<script>

         swal({
             type: "success",
             title: "El Aula ha sido editada correctamente",
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
             title: "¡El nombre no puede ir vacío!",
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

	static public function ctrCargarSelectAula(){

		$tabla = "tbl_aulas";

		$respuesta = ModeloAulas::mdlCargarSelect($tabla);

		return $respuesta;

	}



}
