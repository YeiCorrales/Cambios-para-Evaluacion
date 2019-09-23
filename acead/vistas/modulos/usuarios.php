<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar usuarios

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar usuarios</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <!-- BOTON AGREGAE USUARIO -->
      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario"><i class="fa fa-plus"></i>

          Agregar usuario

        </button>

      </div>


      <div class="box-body">

              <table class="table table-bordered table-striped dt-responsive tablas">

                  <thead>

                   <tr>

                     <th style="width:10px">#</th>
                     <th style="width:10px">Id</th>
                     <th>Nombre</th>
                     <th>Apellido</th>
                     <th>Telefono</th>
                     <th>Usuario</th>
                     <th style="width:100px">Correo Electronico</th>
                     <th style="width:50px">Perfil</th>
                     <th>Estado</th>
                     <th>Último login</th>
                     <th>Acciones</th>

                   </tr>

                  </thead>

                  <tbody>

                    <?php

            	         //Keren was here!

                    $item = null;
                    $valor = null;

                    $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                   foreach ($usuarios as $key => $value){

                      echo ' <tr>
                              <td>'.($key+1).'</td>
                              <td>'.$value["Id_usuario"].'</td>
                              <td>'.$value["PrimerNombre"].'</td>
                              <td>'.$value["PrimerApellido"].'</td>
                              <td>'.$value["Telefono"].'</td>
                              <td>'.$value["Usuario"].'</td>
                              <td>'.$value["CorreoElectronico"].'</td>   ';


                              switch ($value["Id_Rol"]) {
                                case '1':
                                  echo '<td><idUsuario="'.$value["Id_usuario"].'" perfil="1">Administador</td>';
                                  break;

                                  case '2':
                                    echo '<td><idUsuario="'.$value["Id_usuario"].'" perfil="2">Director</td>';
                                    break;

                                    case '3':
                                      echo '<td><idUsuario="'.$value["Id_usuario"].'" perfil="3">Docente</td>';
                                      break;

                                      case '4':
                                        echo '<td><idUsuario="'.$value["Id_usuario"].'" perfil="4">Autenticado</td>';
                                        break;

                                         case '5':
                                        echo '<td><idUsuario="'.$value["Id_usuario"].'" perfil="5">Pendiente</td>';
                                        break;

                              }


                              switch ($value["Id_Estado"]) {
                                case '1':
                                    echo '<td><button class="btn btn-warning btn-xs btnActivar" idUsuario="'.$value["Id_usuario"].'" estadoUsuario="1">Nuevo</button></td>';
                                  break;

                                case '2':
                                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["Id_usuario"].'" estadoUsuario="2">Inactivo</button></td>';
                                  break;

                                case '3':
                                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["Id_usuario"].'" estadoUsuario="3">Activo</button></td>';
                                  break;

                              }


                              echo '<td>'.$value["FechaUltimaConex"].'</td>


                              <td>

                                <div class="btn-group">

                                  <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["Id_usuario"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>



                                </div>

                              </td>

                            </tr>';
                    }


                    ?>


                  </tbody>

              </table>

          </div>



      </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL PRIMER NOMBRE -->

            <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoNombre1" id="nuevoNombre1" placeholder="Primer Nombre" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" maxlength="15" required>

                </div>

              </div>

            <!-- ENTRADA PARA EL SEGUNDO NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoNombre2" placeholder="Segundo Nombre" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" maxlength="15">

                </div>

            </div>

            <!-- ENTRADA PARA EL PRIMER APELLIDO -->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoApellido1" id="nuevoApellido1" placeholder="Primer Apellido" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" required style="text-transform: uppercase" maxlength="15">

                </div>

              </div>

            <!-- ENTRADA PARA EL PRIMER APELLIDO -->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoApellido2" placeholder="Segundo Apellido" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" maxlength="15">

                </div>

              </div>

              <!-- ENTRADA PARA EL TELEFONO -->

              <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                      <input type="text" class="form-control input-lg" name="nuevoTelefono" id="nuevoTelefono" placeholder="TELÉFONO" minlength="8" maxlength="15" pattern="[0-9]{8}">

                    </div>

              </div>

              <!-- ENTRADA PARA EL NUMERO DE IDENTIDAD -->

              <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                      <input type="text" class="form-control input-lg" name="nuevoCedula" id="nuevoCedula" placeholder="NÚMERO DE IDENTIDAD" minlength="8" maxlength="13" pattern="[0-9]{13}">

                    </div>

              </div>

              <!-- ENTRADA PARA EL CORREO ELECTRONICO -->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-at"></i></span>

                  <input type="email" class="form-control input-lg" name="nuevoEmail" id="nuevoEmail" placeholder="CORREO ELECTRÓNICO" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL USUARIO -->

               <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario" minlength="5" maxlength="15"placeholder="INGRESAR USUARIO" id="nuevoUsuario" pattern="|^[a-zA-Z]*$|" style="text-transform: uppercase" required>

                </div>

               </div>

              <!-- ENTRADA PARA LA CONTRASEÑA -->

               <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                  <input type="password" class="form-control input-lg" name="nuevoPassword" id="nuevoPassword" placeholder="INGRESAR CONTRASEÑA" maxlength="30" minlength="5" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^*-]).{5,8}$" required>

                </div>

                <p>La contraseña debera contener: una mayuscula, una minuscula, un numero y un caracter especial.</p>

               </div>

              <!-- ENTRADA PARA SELECCIONAR SU DEPARTAMENTO -->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-sitemap"></i></span>

                  <select class="form-control input-lg" name="nuevoDpto">

                    <option value="">SELECCIONAR DEPARTAMENTO</option>

                    <?php

                    $dpto = ControladorUsuarios::ctrCargarSelectDepartamento();
                    foreach ($dpto as $key => $value) {
                      echo "<option value='".$value['Id_Departamentos']."'>".$value['DescripDepart']."</option>";
                    }
                    ?>

                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA SELECCIONAR SU ESTADO CIVIL -->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-street-view"></i></span>

                  <select class="form-control input-lg" name="nuevoEstCivil">

                    <option value="">SELECCIONAR ESTADO CIVIL</option>

                    <?php

                    $civil = ControladorUsuarios::ctrCargarSelectEstCivil();
                    foreach ($civil as $key => $value) {
                      echo "<option value='".$value['Id_EstadoCivil']."'>".$value['Descripcion']."</option>";
                    }
                    ?>

                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA SELECCIONAR SU GENERO -->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>

                  <select class="form-control input-lg" name="nuevoGenero">

                    <option value="">SELECIONAR GÉNERO</option>

                    <?php

                    $genero = ControladorUsuarios::ctrCargarSelectGenero();
                    foreach ($genero as $key => $value) {
                      echo "<option value='".$value['Id_Genero']."'>".$value['Descripcion']."</option>";
                    }
                    ?>

                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA SELECCIONAR SU ROL -->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-users"></i></span>

                  <select class="form-control input-lg" name="nuevoRol">

                    <option value="">SELECCIONAR ROL DE USUARIO</option>

                    <?php

                    $role = ControladorUsuarios::ctrCargarSelectRol();
                    foreach ($role as $key => $value) {
                      echo "<option value='".$value['Id_Rol']."'>".$value['Rol']."</option>";
                    }
                    	echo $_POST['nuevoRol'];
                    ?>

                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA LA DIRECCIÓN -->
              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-building-o"></i></span>

                  <textarea class="form-control" rows="3" name= "nuevoDireccion" placeholder="DIRECCIÓN" style="text-transform: uppercase"></textarea>

                </div>

              </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>
        <script src="vistas/js/ctrespacios.js"></script>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#f39c12; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>


                  <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" readonly value="">


                </div>

              </div>

            <!-- ENTRADA PARA EL PRIMER NOMBRE -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarNombre1" id="editarNombre1" value="" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" maxlength="15" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL SEGUNDO NOMBRE -->

             <div class="form-group">

              <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="editarNombre2" id="editarNombre2" value="" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" maxlength="15">

                </div>

              </div>

            <!-- ENTRADA PARA EL PRIMER APELLIDO -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarApellido1" id="editarApellido1" value="" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" maxlength="15" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL PRIMER APELLIDO -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarApellido2" id="editarApellido2" value="" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" maxlength="15">

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

             <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                    <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" value="" minlength="8" maxlength="15" pattern="[0-9]{8}">

                  </div>

            </div>

            <!-- ENTRADA PARA EL NUMERO DE IDENTIDAD -->

             <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                    <input type="text" class="form-control input-lg" name="editarCedula" id="editarCedula" value="" maxlength="13" pattern="[0-9]{13}">

                  </div>

            </div>

            <!-- ENTRADA PARA EL CORREO ELECTRONICO -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-at"></i></span>

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" value="" maxlength="50" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <!-- <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                  <input type="password" class="form-control input-lg" name="editarPassword" id="editarPassword" placeholder="Escriba la Nueva Contraseña" maxlength="30" minlength="5" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^*-]).{5,8}$" required>

                </div>
                <p>La contraseña debera contener: una mayuscula, una minuscula, un numero y un caracter especial.</p>

              </div> -->

            <!-- ENTRADA PARA SELECCIONAR SU DEPARTAMENTO -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                <select class="form-control input-lg" id="editarDpto" name="editarDpto">

                  <option value="">Seleccionar Departmento</option>

                  <?php

                  $dpto = ControladorUsuarios::ctrCargarSelectDepartamento();
                  foreach ($dpto as $key => $value) {
                    echo "<option value='".$value['Id_Departamentos']."'>".$value['DescripDepart']."</option>";
                  }
                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU ESTADO CIVIL -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                <select class="form-control input-lg" id="editarEstCivil" name="editarEstCivil">

                  <option value="">Seleccionar Estado Civil</option>

                  <?php

                  $civil = ControladorUsuarios::ctrCargarSelectEstCivil();
                  foreach ($civil as $key => $value) {
                    echo "<option value='".$value['Id_EstadoCivil']."'>".$value['Descripcion']."</option>";
                  }
                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU GENERO -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                <select class="form-control input-lg" id="editarGenero" name="editarGenero">

                  <option value="">Seleccionar Genero</option>

                  <?php

                  $genero = ControladorUsuarios::ctrCargarSelectGenero();
                  foreach ($genero as $key => $value) {
                    echo "<option value='".$value['Id_Genero']."'>".$value['Descripcion']."</option>";
                  }
                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU ROL -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                <select class="form-control input-lg" id="editarRol" name="editarRol">

                  <option value="">Seleccionar Rol de Usuario</option>

                  <?php

                  $role = ControladorUsuarios::ctrCargarSelectRol();
                  foreach ($role as $key => $value) {
                    echo "<option value='".$value['Id_Rol']."'>".$value['Rol']."</option>";
                  }

                  ?>

                </select>

              </div>

            </div>

          <!-- ENTRADA PARA LA DIRECCIÓN -->
        <div class="form-group">

          <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>

                <textarea class="form-control" rows="3" name= "editarDireccion" placeholder="DIRECCIÓN" style="text-transform: uppercase"></textarea>

            </div>

          </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario</button>

        </div>

        <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?>
