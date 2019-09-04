<?php

require_once "../controladores/configuracion.controlador.php";
require_once "../modelos/configuracion.modelo.php";

class AjaxConfiguracion{

	/*=============================================
	EDITAR PARAMETRO
	=============================================*/

	public $idParametro;

	public function ajaxEditarParametro(){

		$item = "Id_Parametro";
		$valor = $this->idParametro;

		$respuesta = ControladorConfiguracion::ctrMostrarConfig($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR PRECIO
	=============================================*/

	public $idPrecio;

	public function ajaxEditarPrecio(){

		$item = "Id_precio";
		$valor = $this->idPrecio;

		$respuesta = ControladorConfiguracion::ctrMostrarPrecio($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR DESCUENTO
	=============================================*/

	public $idDescuento;

	public function ajaxEditarDescuento(){

		$item = "Id_Descuento";
		$valor = $this->idDescuento;

		$respuesta = ControladorConfiguracion::ctrMostrarDescuento($item, $valor);

		echo json_encode($respuesta);

	}




}

/*=============================================
EDITAR PARAMETRO
=============================================*/
if(isset($_POST["idParametro"])){

	$editar = new AjaxConfiguracion();
	$editar ->idParametro = $_POST["idParametro"];
	$editar -> ajaxEditarParametro();

}

/*=============================================
EDITAR PRECIO
=============================================*/
if(isset($_POST["idPrecio"])){

	$editar = new AjaxConfiguracion();
	$editar ->idPrecio = $_POST["idPrecio"];
	$editar -> ajaxEditarPrecio();

}

/*=============================================
EDITAR DESCUENTO
=============================================*/
if(isset($_POST["idDescuento"])){

	$editar = new AjaxConfiguracion();
	$editar ->idDescuento = $_POST["idDescuento"];
	$editar -> ajaxEditarDescuento();

}
