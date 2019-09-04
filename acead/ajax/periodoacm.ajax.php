<?php

require_once "../controladores/periodoacm.controlador.php";
require_once "../modelos/periodoacm.modelo.php";


class AjaxPeriodoAcm{

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	public $idPeriodo;

	public function ajaxEditarPeriodo(){

		$item = "Id_PeriodoAcm";
		$valor = $this->idPeriodo;

		$respuesta = ControladorPeriodoAcm::ctrMostrarPeriodoAcm($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idPeriodo"])){

	$editar = new AjaxPeriodoAcm();
	$editar ->idPeriodo = $_POST["idPeriodo"];
	$editar -> ajaxEditarPeriodo();

}
