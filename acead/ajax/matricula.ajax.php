<?php

require_once "../controladores/matricula.controlador.php";
require_once "../modelos/matricula.modelo.php";
echo "<script type='text/javascript'>alert('ajax de m...')</script>";


/*=============================================
VALIDAR NO REPETIR MATRICULA
=============================================*/

if(isset( $_POST["Id_Alumno"])){

 $validarMatricula = new AjaxMatricula();
 $validarMatricula -> validarMatricula = $_POST["Id_Alumno"];
 $validarMatricula -> ajaxValidarMatricula();

}



class AjaxMatricula{


 /*=============================================
 VALIDAR NO REPETIR USUARIO
 =============================================*/

 public $validarMatricula;

 public function ajaxValidarMatricula(){

   $alumno = "Id_Alumno";
   $mod = "Id_Modalidad";
   $ori = "Id_Orientacion";
   $clas = "Id_Clase";
   $per = "Id_PeriodoAcm";
   $tabla = "tbl_matricula";

   $valor = $this->validarMatricula;

   $respuesta = ControladorMatricula::ctrCompMatricula($alumno, $mod, $ori, $clas, $per);

   echo json_encode($respuesta);

 }


}
