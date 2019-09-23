<?php

class ControladorPeriodoAcm{

  /*=============================================
  MOSTRAR PERIODO
  =============================================*/

  static public function ctrMostrarPeriodoAcm($item, $valor){

    $tabla = "tbl_periodoacademico";
    //echo "<script type='text/javascript'>alert('$valor')</script>";
    $respuesta = ModeloPeriodoAcm::MdlMostrarPer($tabla, $item, $valor);

    return $respuesta;
  }

  /*=============================================
  EDITAR PERIODO
  =============================================*/

  static public function ctrEditarPeriodoAcm(){


    if(isset($_POST["editarPeriodo"])){
//echo "<script type='text/javascript'>alert('control')</script>";
      $tabla = "tbl_periodoacademico";

              $datos = array("DescripPeriodo" => $_POST["editarPeriodo"],
                       "FechaInicio" => $_POST["editarFechaInicial"],
                       "FechaFin" => $_POST["editarFechaFinal"],
                       "Activo" => $_POST["editarestadoperiodo"]);


        $respuesta = ModeloPeriodoAcm::mdlEditarPeriodo($tabla, $datos);

        if($respuesta == "ok"){

          echo'<script>

          swal({
              type: "success",
              title: "El periodo ha sido editado correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
              closeOnConfirm: false
              }).then((result) => {
                  if (result.value) {

                  window.location = "periodoacademico";

                  }
                })

          </script>';

        }elseif($respuesta == "error"){
          echo "<script type='text/javascript'>alert('error')</script>";
        }

    }

  }

  /*=============================================
	AGREGAR PARAMETRO NUEVO
	=============================================*/

	static public function ctrCrearPeriodoAcm(){

		if(isset($_POST["nuevoPeriodo"])){

        $usuario = $_SESSION["id"];
				$tabla = "tbl_periodoacademico";


				$datos = array("DescripPeriodo" => strtoupper($_POST["nuevoPeriodo"]),
										   "FechaInicio" => $_POST["FechaInicial"],
                       "FechaFin"=> $_POST["FechaFinal"],
                       "Activo" => $_POST["estadoperiodo"]);


				$respuesta = ModeloPeriodoAcm::mdlIngresarPeriodo($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Periodo Academico ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){

							window.location = "periodoacademico";

						}

					});


					</script>';


				}else {
          echo "<script type='text/javascript'>alert('error')</script>";
        }

		}


	}

  /*=============================================
	CARGAR ESTADOS
	=============================================*/

	static public function ctrCargarSelectEstado(){

		$tabla = "tbl_periodoacademico";

		$respuesta = ModeloPeriodoAcm::mdlCargarSelect($tabla);

		return $respuesta;

	}





}
