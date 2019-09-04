<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/alumnos.controlador.php";
require_once "controladores/modalidades.controlador.php";
require_once "controladores/clases.controlador.php";
require_once "controladores/matricula.controlador.php";
require_once "controladores/cambiopass.controlador.php";
require_once "controladores/configuracion.controlador.php";
require_once "controladores/orientaciones.controlador.php";
require_once "controladores/periodoacm.controlador.php";
require_once "controladores/contactorespon.controlador.php";
require_once "controladores/cobromatricula.controlador.php";
require_once "controladores/mostrarprecio.controlador.php";
require_once "controladores/pagomes.controlador.php";
require_once "controladores/secciones.controlador.php";
require_once "controladores/aulas.controlador.php";
require_once "controladores/roles.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/alumnos.modelo.php";
require_once "modelos/modalidades.modelo.php";
require_once "modelos/clases.modelo.php";
require_once "modelos/matricula.modelo.php";
require_once "modelos/cambiopass.modelo.php";
require_once "modelos/configuracion.modelo.php";
require_once "modelos/orientaciones.modelo.php";
require_once "modelos/periodoacm.modelo.php";
require_once "modelos/contactorespon.modelo.php";
require_once "modelos/cobromatricula.modelo.php";
require_once "modelos/mostrarprecio.modelo.php";
require_once "modelos/pagomes.modelo.php";
require_once "modelos/secciones.modelo.php";
require_once "modelos/aulas.modelo.php";
require_once "modelos/roles.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
