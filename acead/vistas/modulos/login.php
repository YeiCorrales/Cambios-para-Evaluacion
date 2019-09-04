<?php
  $row= ModeloUsuarios::mdlObtenerIntentos();
  $intento=1;
  $intento=$row['valor'];
  if(!isset($_GET['error'])){
      $error=0;
  }else{
    $error=$_GET['error'];
  }
  //Verificar que la variable exista y este iniciada
  if(!isset($_SESSION['intentos'])){
  $_SESSION['intentos'] = 1;
  }
  $r=false;
  if(isset($_SESSION['intentos'])&&$_SESSION['intentos']==$intento){
    $r=true;
  }
?>

<div id="back"></div>

<div class="login-box">

  <div class="login-logo">

    <img src="vistas/img/plantilla/academialogo.png" class="img-responsive" style="padding:30px 100px 0px 100px">

  </div>

  <div class="login-box-body">

    <p class="login-box-msg">INGRESAR AL SISTEMA</p>

    <form method="post">

      <div class="form-group has-feedback">

          <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <!--<span class="glyphicon glyphicon-user form-control-feedback"></span> -->
              <input type="text" class="form-control" placeholder="Usuario" id="user" name="ingUsuario" maxlength="15" minlength="5" style="text-transform: uppercase" autofocus autocomplete="off" required>

            </div>
      </div>

      <div class="form-group has-feedback">

          <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control pwd1" placeholder="CONTRASEÑA" name="ingPassword" id="pass" maxlength="15" minlength="5"autocomplete="off" required>
              <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->

              <span class="input-group-btn">
                  <button class="btn btn-default reveal1" type="button"><i class="glyphicon glyphicon-eye-open"></i></button></span>

                  <script src="vistas/js/showpass.js"></script>
          </div>

      </div>

      <?php if($r){
        $res = new ControladorUsuarios();
        $res -> ctrBloquearUsuario();
        ?>

      <br><div class="alert alert-danger">Usuario Bloqueado, ha sobrepasado los intentos permitidos. Contacte a su administrador.</div>
      <?php } ?>

      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" <?php if($r){ ?> disabled="true" <?php } ?> >INGRESAR</button>
        </div>
      </div>

  <!-- Recuperar contraseña y auto refistro -->
<!--     enlace a la ruta metodorecup que es el archivo que permite seleccionar el metodo de recuperacion de contraseña-->
  <button class="btn btn-link" type="button"><a href="metodorecup">¿Olvidaste tu usuario y/o contraseña?</a></button>
  <button class="btn btn-link" type="button"><a href="autoregistro">Registrate en el sistema</a></button>


      <?php
        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
      ?>

    </form>

  </div>

</div>
