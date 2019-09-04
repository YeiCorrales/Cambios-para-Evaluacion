<?php

require_once "../controladores/modalidades.controlador.php";
require_once "../modelos/modalidades.modelo.php";

/* =============================================
  EDITAR MODALIDAD
  ============================================= */
if (isset($_POST["idModalidad"])) {

    $editar = new AjaxModalidades();
    $editar->idModalidad = $_POST["idModalidad"];
    $editar->ajaxEditarModalidad();
}

class AjaxModalidades{
    /* =============================================
      EDITAR MODALIDAD
      ============================================= */

    public $idModalidad;

    public function ajaxEditarModalidad() {
        $item = "Id_Modalidad";
        $valor = $this->idModalidad;

        $respuesta = ControladorModalidades::ctrMostrarModalidades($item, $valor);

        echo json_encode($respuesta);
    }

}
