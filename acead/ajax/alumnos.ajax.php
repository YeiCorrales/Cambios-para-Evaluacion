<?php

require_once "../controladores/alumnos.controlador.php";
require_once "../modelos/alumnos.modelo.php";

/* =============================================
  EDITAR ALUMNO
  ============================================= */
if (isset($_POST["idAlumno"])) {

    $editar = new AjaxAlumnos();
    $editar->idAlumno = $_POST["idAlumno"];
    $editar->ajaxEditarAlumno();
}

class AjaxAlumnos {
    /* =============================================
      EDITAR ALUMNOS
      ============================================= */

    public $idAlumno;

    public function ajaxEditarAlumno() {
        //echo "<script type='text/javascript'>alert('ajax')</script>";
        $item = "Id_Alumno";
        $valor = $this->idAlumno;

        //$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
        $respuesta = ControladorAlumnos::ctrMostrarAlumnos($item, $valor);

        echo json_encode($respuesta);
    }

}
