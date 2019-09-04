    <?php

require_once "../controladores/pagomes.controlador.php";
require_once "../modelos/pagomes.modelo.php";

/* =============================================
  REGISTRO DE PAGO DE MENSUALIDAD
  ============================================= */
if (isset($_POST["idAlumno"])) {

    $editar           = new AjaxAlumnos();
    $editar->idAlumno = $_POST["idAlumno"];
    $editar->ajaxEditarAlumno();
}

class AjaxAlumnos
{    /* =============================================      EDITAR ALUMNOS      ============================================= */
    public $idAlumno;
    public function ajaxEditarAlumno()
    {
        $item = "Id_Alumno";
        $valor = $this->idAlumno;
        $respuesta = ControladorPagomes::ctrMostrarAlumnosPagomes($item, $valor);
        echo json_encode($respuesta);
    }
}
