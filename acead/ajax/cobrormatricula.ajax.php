<?php
require_once "../controladores/cobromatricula.controlador.php";
require_once "../modelos/cobromatricula.modelo.php";

/* =============================================
  MOSTRAR ALUMNO
  ============================================= */
if (isset($_POST["idAlumno"])) 
{
    $editar           = new AjaxCobroMatricula();
    $editar->idAlumno = $_POST["idAlumno"];
    $editar->ajaxEditarCobroMatricula();
}

class AjaxCobroMatricula
{
    /* =============================================
      INGRESAR COBRO MATRICULA
      ============================================= */

    public $idAlumno;
    public function ajaxEditarCobroMatricula() 
    {
        $item       = "Id_Alumno";
        $valor      =  $this->idAlumno;
        $respuesta  =  ControladorCobroMatricula::ctrMostrarCobroMatricula($item, $valor);
        echo json_encode($respuesta);
    }
}

/* ::::matricula.ajax :::::*/

/*=============================================
VALIDAR NO REPETIR MATRICULA
=============================================*/

if(isset( $_POST["Id_Alumno"]))
{
 $validarPagomatri = new AjaxPagoMatri();
 $validarPagomatri -> validarPagomatri = $_POST["Id_Alumno"];
 $validarPagomatri -> ajaxValidarPagoMatri();
}

class AjaxPagoMatri
{
 /*==================== VALIDAR NO REPETIR PAGOMATRICULA =============================================*/

 public $validarPagomatri;
 public function ajaxValidarPagoMatri()
 {
   $ida = "Id_Alumno";
   $tom = "TotalMatricula";
   $tabla = "tbl_cobromatricula";
   $valor = $this->validarPagomatri;
   $respuesta = ControladorCobroMatricula::ctrCompPagoMatri($ida, $tom);
   echo json_encode($respuesta);
 }
