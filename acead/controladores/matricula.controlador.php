<?php


class ControladorMatricula{

  /*=============================================
  MOSTRAR MODALIDADES
  =============================================*/

  static public function ctrCargarSelectModalidades(){

    $tabla = "tbl_modalidades";

    $respuesta = ModeloMatricula::mdlCargarSelect($tabla);

    return $respuesta;

  }



  /*=============================================
	MOSTRAR MATRICULA
	=============================================*/

	static public function ctrMostrarMatricula($per){

    $tabla = "tbl_matricula";

		$respuesta = ModeloMatricula::MdlMostrarMatricula($tabla, $per);

		return $respuesta;
	}

  /*=============================================
	MOSTRAR MATRICULA EN EL ALUMNO
	=============================================*/

	static public function ctrMostrarMatriculaAlumno($d){

		$tabla = "tbl_matricula";

		$respuesta = ModeloMatricula::MdlImprimirMatricula($tabla, $d);

		return $respuesta;
	}

  /*=============================================
	IMPRIMIR MATRICULA
	=============================================*/

  static public function ctrImprimirMatricula($d){

		$tabla = "tbl_matricula";

		$respuesta = ModeloMatricula::MdlImprimirMatricula($tabla, $d);

		return $respuesta;
	}


  /*=============================================
	MATRICULAR ALUMNO
	=============================================*/
  static public function ctrMatricularAlumno(){

    if(isset($_POST["IdAlumno"])){

    if(isset($_POST["matriculaModalidad"])){

      if(isset($_POST["adicionar1"])){

        if(isset($_POST["adicionar2"])){

          if(isset($_POST["adicionar3"])){

            $tabla = "tbl_matricula";


            $periodo = ModeloMatricula::mdlPeriodoVigente();

            $datos= array("Id_Alumno" => $_POST["IdAlumno"],
                          "Id_Modalidad" => $_POST["matriculaModalidad"],
                          "Id_Orientacion" => $_POST["adicionar1"],
                          "Id_Clase" => $_POST["adicionar2"],
                          "Id_Seccion" => $_POST["adicionar3"],
                          "Id_PeriodoAcm" => $periodo);

            $a = $_GET["idAlumno"];

            $respuesta = ModeloMatricula::mdlMatriculaAlumno($tabla, $datos);



            //echo "<script type='text/javascript'>alert('neles')</script>";

           if($respuesta == "ok"){

    					echo '<script>

    					swal({

    						type: "success",
    						title: "¡Matricula Exitosa!",
    						showConfirmButton: true,
    						confirmButtonText: "Cerrar",
    						closeOnConfirm: false

    					}).then((result)=>{

    						if(result.value){

    							window.location = "index.php?ruta=alumdata&idAlumno="+'.json_encode($a).';

    						}

    					});


    					</script>';


    				}

          }else{

            //si no se selecciono seccion
             echo "<script type='text/javascript'>alert('Debe seleccionar una Seccion')</script>";
           }
        }else{

          //si no se selecciono clase
          echo "<script type='text/javascript'>alert('Debe seleccionar una Clase')</script>";
        }
      }else{
        //Si no se ha seleccionado orientacion
        echo "<script type='text/javascript'>alert('Debe seleccionar una Orientacion')</script>";
      }

    }else{
      // Si no se ha elegido MODALIDAD
      echo "<script type='text/javascript'>alert('Debe seleccionar una Modalidad')</script>";
    }




	}

}

/*=============================================
COMPARAR SI MATRICULA EXISTE
=============================================*/

static public function ctrCompMatricula($alumno, $mod, $ori, $clas, $per){

  $tabla = "tbl_matricula";

  $respuesta = ModeloMatricula::MdlMostrarMatricula($tabla, $alumno, $mod, $ori, $clas, $per);

  return $respuesta;
}

/*=============================================
BORRAR MATRICULA
=============================================*/

static public function ctrBorrarMatricula(){


  if(isset($_GET["idMatricula"])){
    //echo "<script type='text/javascript'>alert('SUP')</script>";

    $tabla = "tbl_matricula";
    $datos = $_GET["idMatricula"];

    $a = $_GET["idAlumno"];

    $respuesta = ModeloMatricula::mdlBorrarMatricula($tabla, $datos);

    if($respuesta == "ok"){

      echo'<script>

      swal({
          type: "success",
          title: "La Matricula ha sido borrada correctamente",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
          closeOnConfirm: false
          }).then((result) => {
              if (result.value) {

              window.location = "index.php?ruta=alumdata&idAlumno="+'.$a.';

              }
            })

      </script>';

    }else{
       echo "<script type='text/javascript'>alert('ERROR EN SQL')</script>";

    }

  }

}




}
