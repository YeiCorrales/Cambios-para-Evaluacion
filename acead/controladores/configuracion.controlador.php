<?php

class ControladorConfiguracion{

  /*=============================================
  MOSTRAR PARAMETROS
  =============================================*/

  static public function ctrMostrarConfig($item, $valor){

    $tabla = "tbl_parametros";

    $respuesta = ModeloConfiguracion::MdlMostrarConfig($tabla, $item, $valor);

    return $respuesta;
  }

  /*=============================================
  MOSTRAR PRECIO
  =============================================*/

  static public function ctrMostrarPrecio($item, $valor){

    $tabla = "tbl_precio";

    $respuesta = ModeloConfiguracion::MdlMostrarConfig($tabla, $item, $valor);

    return $respuesta;
  }

  /*=============================================
  MOSTRAR PRECIO
  =============================================*/

  static public function ctrMostrarDescuento($item, $valor){

    $tabla = "tbl_descuento";

    $respuesta = ModeloConfiguracion::MdlMostrarConfig($tabla, $item, $valor);

    return $respuesta;
  }

  /*=============================================
  AGREGAR PARAMETRO NUEVO
  =============================================*/

  static public function ctrCrearParametro(){

    if(isset($_POST["nuevoParametro"])){

      date_default_timezone_set('America/Tegucigalpa');

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $fechaActual = $fecha.' '.$hora;

        $usuario = $_SESSION["id"];
        $tabla = "tbl_parametros";


        $datos = array("Parametro" => strtoupper($_POST["nuevoParametro"]),
                       "Valor" => $_POST["nuevoVal"],
                       "FechaCreacion"=> $fechaActual,
                       "Id_usuario" => $usuario);


        $respuesta = ModeloConfiguracion::mdlIngresarParametro($tabla, $datos);

        if($respuesta == "ok"){

          echo '<script>

          swal({

            type: "success",
            title: "¡El Parametro ha sido guardado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

          }).then((result)=>{

            if(result.value){

              window.location = "configuracion";

            }

          });


          </script>';


        }else {
          echo "<script type='text/javascript'>alert('error')</script>";
        }

    }


  }

  /*=============================================
  AGREGAR DESCUENTO NUEVO
  =============================================*/

  static public function ctrCrearDescuento(){

    if(isset($_POST["nuevoDescuento"])){

        $usuario = $_SESSION["id"];
        $tabla = "tbl_descuento";


        $datos = array("Descuento" => strtoupper($_POST["nuevoDescripDescuento"]),
                       "ValorDesc" => $_POST["nuevoDescuento"]);


        $respuesta = ModeloConfiguracion::mdlIngresarDescuento($tabla, $datos);

        if($respuesta == "ok"){

          echo '<script>

          swal({

            type: "success",
            title: "¡El Descuento ha sido guardado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

          }).then((result)=>{

            if(result.value){

              window.location = "configuracion";

            }

          });


          </script>';


        }elseif ($respuesta == "error") {
          echo "<script type='text/javascript'>alert('error SQL')</script>";
        }

      }

  }


  /*=============================================
  EDITAR PARAMETROS
  =============================================*/

  static public function ctrEditarParametro(){


    if(isset($_POST["editarParametro"])){

      $tabla = "tbl_parametros";

      date_default_timezone_set('America/Tegucigalpa');

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $fechaActual = $fecha.' '.$hora;


        $datos = array("Parametro" => $_POST["editarParametro"],
                       "FechaModificacion" => $fechaActual,
                       "Valor" => $_POST["editarVal"]);


        $respuesta = ModeloConfiguracion::mdlEditarParametro($tabla, $datos);

        if($respuesta == "ok"){

          echo'<script>

          swal({
              type: "success",
              title: "El parametro ha sido editado correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
              closeOnConfirm: false
              }).then((result) => {
                  if (result.value) {

                  window.location = "configuracion";

                  }
                })

          </script>';

        }

    }

  }


  /*=============================================
  EDITAR PRECIO
  =============================================*/

  static public function ctrEditarPrecio(){


    if(isset($_POST["editarDescripPrecio"])){

      $tabla = "tbl_precio";

        $datos = array("Descripcion" => $_POST["editarDescripPrecio"],
                       "Precio" => $_POST["editarPrecio"]);


        $respuesta = ModeloConfiguracion::mdlEditarPrecio($tabla, $datos);

        if($respuesta == "ok"){

          echo'<script>

          swal({
              type: "success",
              title: "El precio ha sido editado correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
              closeOnConfirm: false
              }).then((result) => {
                  if (result.value) {

                  window.location = "configuracion";

                  }
                })

          </script>';

        }elseif ($respuesta == "error") {
          echo "<script type='text/javascript'>alert('sql script error')</script>";
        }

    }

  }

  /*=============================================
  EDITAR PRECIO
  =============================================*/

  static public function ctrEditarDescuento(){


    if(isset($_POST["editarDescripDescuento"])){

      $tabla = "tbl_descuento";

        $datos = array("Descuento" => $_POST["editarDescripDescuento"],
                       "ValorDesc" => $_POST["editarDescuento"]);


        $respuesta = ModeloConfiguracion::modalEditarDescuento($tabla, $datos);

        if($respuesta == "ok"){

          echo'<script>

          swal({
              type: "success",
              title: "El Descuento ha sido editado correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
              closeOnConfirm: false
              }).then((result) => {
                  if (result.value) {

                  window.location = "configuracion";

                  }
                })

          </script>';

        }elseif ($respuesta == "error") {
          echo "<script type='text/javascript'>alert('sql script error')</script>";
        }

    }

  }



}
