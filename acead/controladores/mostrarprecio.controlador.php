<?php

class ControladorPrecio
{

/*==============	MOSTRAR PRECIO  	=========================================*/
	static public function ctrPrecio()
	{
		$tabla = "tbl_precio";
		$respuesta = ModeloPrecio::MdlPrecio($tabla);
		return $respuesta;
	}

}
?>