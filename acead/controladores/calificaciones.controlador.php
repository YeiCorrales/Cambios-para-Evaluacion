<?php


class ControladorCalificaciones{

  /*=============================================
  MOSTRAR MODALIDADES
  =============================================*/

  static public function ctrCargarSelectModalidades(){

    $tabla = "tbl_modalidades";

    $respuesta = ModeloMatricula::mdlCargarSelect($tabla);

    return $respuesta;

  }
  
  /*=============================================
  MOSTRAR CALÑIFICACIONES
  =============================================*/
static public function ctrMostrarCalificaciones($c, $s){

    $tabla = "tbl_calificaciones";

    $respuesta = Calificaciones::mdlMostrarCalificaciones($c, $s);

    return $respuesta;

  }
  
  /*=============================================
  MOSTRAR HISTORIAL
  =============================================*/
static public function ctrMostrarHistorial($ida){

    $tabla = "tbl_calificaciones";

    $respuesta = Calificaciones::mdlMostrarHistorial($ida);

    return $respuesta;

  }
  
  /*=============================================
	MOSTRAR MATRICULA
	=============================================*/

	static public function ctrMostrarMatricula($item, $valor){

		$tabla = "tbl_matricula";

		$respuesta = ModeloMatricula::MdlMostrarMatricula($tabla, $item, $valor);

		return $respuesta;
	}



}
