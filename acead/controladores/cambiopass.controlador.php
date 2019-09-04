<?php
include 'PHPMailer/PHPMailerAutoload.php';
//include '../PHPMailer/PHPMailerAutoload.php';

class ControladorPass{

  /*================================================
  OBTENER ID DE USUARIO Y COMPARAR SI EXISTE O NO
  ================================================*/

  static public function ctrCambioPass(){

      if(isset($_POST["cambioUsuario"])){

        if(preg_match('/^[A-Za-z0-9]+$/', $_POST["cambioUsuario"])){

          $tabla = "tbl_usuarios";

  				$item = "Usuario";

  				$valor = strtoupper($_POST["cambioUsuario"]);

          //$code = $_POST["code"];

          $respuesta = ModeloPass::mdlCambioPass($tabla, $item, $valor);

          if($respuesta["Usuario"] == strtoupper($_POST["cambioUsuario"])){

            $id = $respuesta["Id_usuario"];

          }else{

            echo '<br><div class="alert alert-danger">Error al ingresar, Usuario Invalido.</div>';

          }

        }

      }

    }

  /*=============================================
  ENVIO DE CORREO
  =============================================*/

  static public function ctrEMAIL(){

    if(isset($_POST["cambioUsuario"])){

        if(preg_match('/^[A-Za-z0-9]+$/', $_POST["cambioUsuario"])){

          $tabla = "tbl_usuarios";

          $item = "Usuario";

          $bus = "CorreoElectronico";
          $bus2 = "code";

          $valor = strtoupper($_POST["cambioUsuario"]);

          $respuesta = ModeloPass::mdlObtenerCorreo($tabla, $item, $bus, $valor);

        //$code = $respuesta["code"];
    		$correo = $respuesta["CorreoElectronico"];

        //echo $correo;


        // ENVIO DE CORREO //

      $tabla2 = "tbl_parametros";
      $bus3 = "valor";

      $param1 = "CORREO_ELECTRONICO";
      $param2 = "CONTRASENA_CORREO";
      $param3 = "REMITENTE_CORREO";

      $parametro = ModeloPass::mdlObtenerParamCorreo($tabla2, $bus3, $param1);
      $parametro2 = ModeloPass::mdlObtenerParamPass($tabla2, $bus3, $param2);
      $parametro3 = ModeloPass::mdlObtenerParamRemitente($tabla2, $bus3, $param3);

      $correoinstit = $parametro["valor"];
      $pass = $parametro2["valor"];
      $remitente = $parametro3["valor"];

  		$email_address = $correo;

    	$email_subject = "Recuperacion de contraseña: ";

    	$email_body= "<p>Hola <b>".$valor."</b> Su Link de recuperacion de contraseña es el siguiente:</p>
    							  </p> http://localhost/acead/index.php?ruta=cambiocontrasena-correo&user=".$valor."</p>";


    $mail=new PHPMailer();

    $mail->isSMTP();

    $mail->SMTPDebug = 0;

    $mail->Debugoutput = 'html';

    $mail->Host = 'smtp.gmail.com';

    $mail->Port = 587;

    $mail->SMTPSecure = 'tls';

    $mail->SMTPAuth = true;

    $mail->Username = $correoinstit;

    $mail->Password = $pass;

    $mail->setFrom($correoinstit, $remitente);

    $mail->addAddress($email_address, $valor);

    $mail->Subject = $email_subject;
    $mail->MsgHTML($email_body);


    if ($mail->send()) {

        echo '<br><div class="alert alert-success">Correo Enviado Exitosamente!</div>';
    } else {

        echo '<br><div class="alert alert-danger">Error al enviar Correo Electronico</div>';

    }


    	}

    }
  }


  /*=============================================
  CAMBIAR CONTRASEÑA
  =============================================*/

  static public function ctrCambioContraseña(){

    if(isset($_GET['user'])){

      if(isset($_POST["cambiopassword"])){

          if($_POST["cambiopassword"] == $_POST["confirmapass"]){
            $usuario = $_GET['user'];

            $encriptar = password_hash($_POST["cambiopassword"], PASSWORD_DEFAULT);

            $tabla = "tbl_usuarios";


            $datos = array("Usuario" => $usuario,
                          "Contrasena" => $encriptar);

            $respuesta = ModeloPass::mdlCambioContrasena($tabla, $datos);

            if($respuesta == "ok"){

              echo '<br><div class="alert alert-success">Contraseña Modificada.</div>';

            }

          }else{

          	echo '<br><div class="alert alert-danger">Las Contraseñas no coinciden.</div>';

          }

    }

  }

  }











}
