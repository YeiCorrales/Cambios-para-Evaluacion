<?php

require_once "../controladores/clases.controlador.php";
require_once "../modelos/clases.modelo.php";

/* =============================================
  EDITAR CLASE
  ============================================= */
if (isset($_POST["idClase"])) {

    $editar = new AjaxClases();
    $editar->idClase = $_POST["idClase"];
    $editar->ajaxEditarClase();
}

class AjaxClases{

    public $idClase;

    public function ajaxEditarClase() {
        $item = "Id_Clase";
        $valor = $this->idClase;

        $respuesta = ControladorClases::ctrMostrarClases($item, $valor);

        echo json_encode($respuesta);
    }

}
