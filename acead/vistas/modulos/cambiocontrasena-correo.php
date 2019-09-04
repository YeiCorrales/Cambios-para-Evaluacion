<?php
//session_start();


 ?>

 <div class="boxcambiopass">

   <div class="box-body">

    <p class="box-msg"><b>CAMBIO CONTRASEÑA</b></p>

    <form method="post">

      <div class="form-group has-feedback">


            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="INGRESE CONTRASEÑA NUEVA" id="cambiopass" name="cambiopassword" autofocus autocomplete="off" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^*-]).{5,8}$" required>

                <span class="input-group-btn">
                    <button class="btn btn-default reveal1" id="pwd1" type="button"><i class="fa fa-eye" id="ojito"></i></button></span>

              </div>
            </div>

            <div class="form-group has-feedback">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control" placeholder="CONFIRME CONTRASEÑA" id="confirmapass" name="confirmapass" autofocus autocomplete="off" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^*-]).{5,8}$" required>

                  <span class="input-group-btn">
                      <button class="btn btn-default reveal1" id="pwd2" type="button"><i class="fa fa-eye" id="ojito"></i></button></span>

                </div>

            </div>

      <div class="row" style="padding: 15px">
        <div class="">
          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Cambiar Contraseña</button>
          <button type="button" class="btn btn-default pull-right"><i class="fa fa-user"></i><a href="login"> Volver al Login</a></button>
        </div>
      </div>

      <?php

      $cambio = new ControladorPass();
      $cambio -> ctrCambioContraseña();

      ?>

    </form>
   </div>
 </div>

<script src="vistas/js/showpass.js"></script>
