<?php

require_once "../controladores/secciones.controlador.php";
require_once "../modelos/secciones.modelo.php";

/* =============================================
  EDITAR MODALIDAD
  ============================================= */
if (isset($_POST["idSeccion"])) {

    $editar = new AjaxSecciones();
    $editar->idSeccion = $_POST["idSeccion"];
    $editar->ajaxEditarSeccion();
}

class AjaxSecciones{
    /* =============================================
      EDITAR SECCION
      ============================================= */

    public $idSeccion;

    public function ajaxEditarSeccion() {
        $item = "Id_Seccion";
        $valor = $this->idSeccion;

        $respuesta = ControladorSecciones::ctrMostrarSeccion($item, $valor);

        echo json_encode($respuesta);
    }

}
