<?php
//session_start();


 ?>

 <div class="boxcambiopass">

   <div class="box-body">

    <p class="box-msg"><b>CAMBIO DE CONTRASEÑA</b></p>

    <form method="post">

      <div class="form-group has-feedback">

        <!-- ENTRADA PARA EL USUADIO -->
          <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" placeholder="Ingrese su usuario" id="cambioUsuario" name="cambioUsuario" maxlength="15" minlength="5" style="text-transform: uppercase" autofocus autocomplete="off" required>

            </div>

      </div>

      <div class="row" style="padding: 15px">
        <div class="">

          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Generar Nueva Contraseña</button>
          <button type="button" class="btn btn-default pull-right"><i class="fa fa-user"></i><a href="login"> Volver al Login</a></button>

        </div>
      </div>

      <?php

        $pass = new ControladorPass();
        $pass -> ctrCambioPass();
        $pass -> ctrEMAIL();


      ?>

    </form>
   </div>
 </div>
