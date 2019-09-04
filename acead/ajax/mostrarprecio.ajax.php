<?php

require_once "../controladores/mostrarprecio.controlador.php";
require_once "../modelos/mostrarprecio.modelo.php";

if (isset($_POST["idPrecio"])) 
{
    $editar           = new AjaxPrecio();
    $editar->idPrecio = $_POST["idPrecio"];
    $editar->ajaxEditarPrecio();
}

class AjaxPrecio
{
    public $idPrecio;
    public function ajaxEditarPrecio() 
    {
        $item = "Id_precio";
        $valor = $this->idPrecio;
        $respuesta = ControladorPrecio::ctrPrecio($item, $valor);
        echo json_encode($respuesta);
    }
}
