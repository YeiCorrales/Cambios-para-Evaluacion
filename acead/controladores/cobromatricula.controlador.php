<?php

class ControladorCobroMatricula
{

  /*============ MOSTRAR ALUMNOS  =============================================*/
  static public function ctrMostrarCobroMatricula($item, $valor)
  {
    $tabla 		= "tbl_alumnos";
    $respuesta 	= ModeloCobroMatricula::MdlMostrarCobroMatricula($tabla, $item, $valor);
    return $respuesta;
  }


  /*=============	REGISTRO DE COBRO	=============================================*/

	static public function ctrCrearCobroMatricula()
	{
		if(isset($_POST["nuevoTotalMatricula"]))
		{
			if($_POST["nuevoTotalMatricula"])
			{
				$tabla = "tbl_cobromatricula";
				$datos = array(	"Id_Cobro" => null,
								"Id_Alumno" => strtoupper($_POST["editarAlumno"]),
								"TotalMatricula" => strtoupper($_POST["nuevoTotalMatricula"]));
				$respuesta = ModeloCobroMatricula::mdlIngresarMatriculaCobrada($tabla, $datos);
				if($respuesta == "ok")
				{
					echo '<script>
					swal(
					{
						type: "success",
						title: "¡Pago de matrícula agregado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>
					{
						if(result.value)
						{
							window.location = "cobromatricula";

						}
					});
					</script>';
				}else{
					echo '<script>
					swal(
					{
						type: "error",
						title: "¡Pago de matrícula ya cancelado!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>
					{
						if(result.value)
						{
							window.location = "cobromatricula";

						}
					});
					</script>';
				}

			}else
				{
					echo
					'<script>
					swal({
						type: "error",
						title: "¡Campo, no puede ir vacío o llevar caracteres no numericos!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>
							{
								if(result.value)
							{	window.location = "cobromatricula";	}		}
						);
					</script>';
				}
		}
	}

/*=============================================
  MOSTRAR PAGOS DE LA MATRICULA
  =============================================*/
static public function ctrPagosMatricula($ida)
{
    $tabla = "tbl_cobromatricula";
    $respuesta = ModeloCobroMatricula::mdlPagosMatricula($ida);
    return $respuesta;
  }


/*=============================================
COMPARAR SI PAGOMATRICULA EXISTE
=============================================*/
static public function ctrCompPagoMatri($ida, $tom)
{
  $tabla = "tbl_cobromatricula";
  $respuesta = ModeloCobroMatricula::MdlMostrarPagoMatri($tabla, $ida, $tom);
  return $respuesta;
}

}
