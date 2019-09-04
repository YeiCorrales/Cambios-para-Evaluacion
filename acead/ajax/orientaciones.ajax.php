<?php

require_once "../controladores/orientaciones.controlador.php";
require_once "../modelos/orientaciones.modelo.php";

/* =============================================
  EDITAR ORIENTACION
  ============================================= */
if (isset($_POST["idOrientacion"])) {

    $editar = new AjaxOrientaciones();
    $editar->idOrientacion = $_POST["idOrientacion"];
    $editar->ajaxEditarOrientacion();
}

class AjaxOrientaciones{
    /* =============================================
      EDITAR ORIENTACION
      ============================================= */

    public $idOrientacion;

    public function ajaxEditarOrientacion() {
        $item = "Id_orientacion";
        $valor = $this->idOrientacion;

        $respuesta = ControladorOrientaciones::ctrMostrarOrientaciones($item, $valor);

        echo json_encode($respuesta);
    }

}
