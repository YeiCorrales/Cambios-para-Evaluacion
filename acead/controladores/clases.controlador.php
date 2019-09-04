<?php

class ControladorClases{

  /*=============================================
  MOSTRAR CLASES
  =============================================*/

  static public function ctrMostrarClases($item, $valor){

    $tabla = "tbl_clases";

    $respuesta = ModeloClases::MdlMostrarClases($tabla, $item, $valor);

    return $respuesta;
  }

  /*=============================================
  MOSTRAR CLASES MODALIDAD ORIENTACION pivote
  =============================================*/

  static public function ctrMostrarClasesOrientaModali($item, $valor){

    $tabla = "tbl_mod_orientacion";

    $respuesta = ModeloClases::MdlMostrarClasesOrientaModali($tabla, $item, $valor);

    return $respuesta;
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



  /*=============================================
  REGISTRO DE EN LA TABLA MODALIDAD-ORIENTACION
  =============================================*/

  static public function ctrCrearClaseOrientaModali(){

    if(isset($_POST["nuevoDescripClase"])){

      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDescripClase"])){

        $tabla = "tbl_mod_orientacion";


        $datos = array("Id_Modalidad" => $_POST["nuevoSelecModalidad"],
                       "Id_Orientacion" => $_POST["nuevoSelecOrientacion"]);


        $respuesta = ModeloClases::mdlIngresarClaseOrientaModali($tabla, $datos);
       }
    }

  }

  /*=============================================
	REGISTRO DE CLASES
	=============================================*/

	static public function ctrCrearClase(){

		if(isset($_POST["nuevoDescripClase"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDescripClase"])){

				$tabla = "tbl_clases";


				$datos = array("DescripClase" => strtoupper($_POST["nuevoDescripClase"]),
                       "Duracion" => $_POST["nuevoDuracion"]);


				$respuesta = ModeloClases::mdlIngresarClases($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La Clase sido guardada correctamente!",
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
						title: "¡El nombre de la Clase no puede ir vacía o llevar caracteres especiales!",
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
  EDITAR CLASES TABLA MODALIDAD-ORIENTACION
  =============================================*/

  static public function ctrEditarOrientaModali(){


   if(isset($_POST["editarIdClase"])){


     if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarIdClase"])){

       $tabla = "tbl_mod_orientacion";

       $datos = array("Id_Clase" => $_POST["editarIdClase"],
                    "Id_Modalidad" => $_POST["editarSelecModalidad"],
                    "Id_Orientacion" => $_POST["editarSelecOrientacion"]);

       $respuesta = ModeloClases::mdlEditarOrientaModali($tabla, $datos);


     }

    }
  }


  /*=============================================
  EDITAR CLASES
  =============================================*/

  static public function ctrEditarClase(){


   if(isset($_POST["editarDescripClase"])){


     if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripClase"])){

       $tabla = "tbl_clases";

       $datos = array("Id_Clase" => $_POST["editarIdClase"],
                    "DescripClase" => strtoupper($_POST["editarDescripClase"]),
                    "Duracion" => $_POST["editarDuracion"]);

       $respuesta = ModeloClases::mdlEditarClase($tabla, $datos);

       if($respuesta == "ok"){

         echo'<script>

         swal({
             type: "success",
             title: "La Clase ha sido editada correctamente",
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
             title: "¡El nombre de la Clase no puede ir vacío o llevar caracteres especiales!",
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





}
