<?php

require_once "../controladores/aulas.controlador.php";
require_once "../modelos/aulas.modelo.php";

/* =============================================
  EDITAR ORIENTACION
  ============================================= */
if (isset($_POST["idAula"])) {

    $editar = new AjaxAulas();
    $editar->idAula = $_POST["idAula"];
    $editar->ajaxEditarAula();
}

class AjaxAulas{
    /* =============================================
      EDITAR AULA
      ============================================= */

    public $idAula;

    public function ajaxEditarAula() {
        $item = "Id_Aula";
        $valor = $this->idAula;

        $respuesta = ControladorAulas::ctrMostrarAulas($item, $valor);

        echo json_encode($respuesta);
    }

}
