<?php

require_once "../controladores/clases.controlador.php";
require_once "../modelos/clases.modelo.php";

/* =============================================
  EDITAR CLASE- ORIENTACION MODALIDAD
  ============================================= */
if (isset($_POST["idClase"])) {

    $editar = new AjaxClasesOrientaModali();
    $editar->idClase = $_POST["idClase"];
    $editar->ajaxEditarClaseOrientaModali();
}

class AjaxClasesOrientaModali{

    public $idClase;

    public function ajaxEditarClaseOrientaModali() {
        $item = "Id_Clase";
        $valor = $this->idClase;

        $respuesta = ControladorClases::ctrMostrarClasesOrientaModali($item, $valor);

        echo json_encode($respuesta);
    }

}
