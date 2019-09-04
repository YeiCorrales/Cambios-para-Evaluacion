<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Alumnos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Alumnos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

<!-- BOTON AGREGAR ALUMNOS -->
      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAlumno">

          Agregar Alumno

        </button>

      </div>


      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th style="width:10px">Id</th>
           <th>Primer Nombre</th>
           <th>Segundo Nombre</th>
           <th>Primer Apellido</th>
           <th>Segundo Apellido</th>
           <th>Teléfono</th>
           <th>Fecha Nac</th>
           <th>Cédula</th>
           <th>Acciones</th>

         </tr>

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $alumnos = ControladorAlumnos::ctrMostrarAlumnos($item, $valor);

       foreach ($alumnos as $key => $value){

         echo ' <tr>
                 <td>'.($key+1).'</td>
                 <td>'.$value["Id_Alumno"].'</td>
                 <td>'.$value["PrimerNombre"].'</td>
                 <td>'.$value["SegundoNombre"].'</td>
                 <td>'.$value["PrimerApellido"].'</td>
                 <td>'.$value["SegundoApellido"].'</td>
                 <td>'.$value["Telefono"].'</td>
                 <td>'.$value["FechaNacimiento"].'</td>
                 <td>'.$value["Cedula"].'</td>     ';


                 echo '  <td>

                    <div class="btn-group">

                    <button title="Matricular Alumno" class="btn btn-success btnMatriculaAlumno" idAlumno="'.$value["Id_Alumno"].'" data-toggle="modal" data-target="#modalMatriculaAlumno"><i class="fa fa-building"></i></button>

                    <button title="Editar Alumno" class="btn btn-warning btnEditarAlumno" idAlumno="'.$value["Id_Alumno"].'" data-toggle="modal" data-target="#modalEditarAlumno"><i class="fa fa-pencil"></i></button>

                    <button title="Contacto Responsable" class="btn btn-info btnContactoResponsable" idAlumno="'.$value["Id_Alumno"].'" data-toggle="modal" data-target="#modalContactoResponsable"><i class="fa fa-envelope"></i></button>

                    <button title="Eliminar Alumno" class="btn btn-danger btnEliminarAlumno" idAlumno="'.$value["Id_Alumno"].'"><i class="fa fa-times"></i></button>

                    <button title="Más información" class="btn btn-primary btnInfoAlumno" idAlumno="'.$value["Id_Alumno"].'"><i class="fa fa-print"></i></button>



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
MODAL AGREGAR ALUMNO
======================================-->

<div id="modalAgregarAlumno" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Alumno</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoNombre1" id="nuevoNombre1" placeholder="Primer Nombre" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL PRIMER NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNombre2" id="nuevoNombre2" placeholder="Segundo Nombre" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL PRIMER APELLIDO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoApellido1" placeholder="Primer Apellido" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL PRIMER APELLIDO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoApellido2" placeholder="Segundo Apellido" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase">

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="TELÉFONO" minlength="8" maxlength="15" pattern="[0-9]{8}">

                  </div>

            </div>

            <!-- ENTRADA PARA EL NUMERO DE IDENTIDAD -->

            <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoCedula" placeholder="NÚMERO DE IDENTIDAD" minlength="8" maxlength="13" pattern="[0-9]{13}">

                  </div>

            </div>

            <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

            <div class="form-group">

              <div class="input-group">

                <div class="input-group-addon"><i class="fa fa-calendar"></i>

                </div>

                <input type="text" class="form-control" name="nuevoFechaNac" placeholder="yyyy/mm/dd" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>

              </div>

            </div>

            <!-- ENTRADA PARA EL CORREO ELECTRONICO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-at"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="CORREO ELECTRÓNICO" required>

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

                <span class="input-group-addon"><i class="fa  fa-venus-mars"></i></span>

                <select class="form-control input-lg" name="nuevoGenero">

                  <option value="">SELECCIONAR GÉNERO</option>

                  <?php

                  $genero = ControladorUsuarios::ctrCargarSelectGenero();
                  foreach ($genero as $key => $value) {
                    echo "<option value='".$value['Id_Genero']."'>".$value['Descripcion']."</option>";
                  }
                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR EL TIPO DE DESCUENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-money"></i></span>

                <select class="form-control input-lg" name="nuevoDescuento">

                  <option value="">SELECCIONAR TIPO DE DESCUENTO</option>

                  <?php

                  $descuento = ControladorAlumnos::ctrCargarSelectDescuento();
                  foreach ($descuento as $key => $value) {
                    echo "<option value='".$value['Id_Descuento']."'>".$value['Descuento']."</option>";
                  }
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

          <button type="submit" class="btn btn-primary">Guardar Alumno</button>

        </div>

        <?php

          $crearAlumno = new ControladorAlumnos();
          $crearAlumno -> ctrCrearAlumno();

        ?>
        <script src="vistas/js/ctrespacios.js"></script>

      </form>

    </div>

   </div>

  </div>

</div>


<?php

include 'matricula1.php';

 ?>


<!--=====================================
MODAL EDITAR ALUMNO
======================================-->

<div id="modalEditarAlumno" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#f39c12; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Alumno</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL ID ALUMNO -->

            <div class="form-group">

               <div class="input-group">

                 <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>

                   <input type="text" class="form-control input-lg" id="editarAlumno" name="editarAlumno" readonly value="">


               </div>

             </div>

            <!-- ENTRADA PARA EL PRIMER NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarNombre1" id="editarNombre1" value="" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL SEGUNDO NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="editarNombre2" id="editarNombre2" value="" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase">

              </div>

            </div>

            <!-- ENTRADA PARA EL PRIMER APELLIDO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarApellido1" id="editarApellido1" value="" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL SEGUNDO APELLIDO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarApellido2" id="editarApellido2" value="" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase">

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

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" value="" required>

              </div>

            </div>


            <!-- ENTRADA PARA SELECCIONAR SU ESTADO CIVIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                <select class="form-control input-lg" id="editarEstCivil" name="editarEstCivil">

                  <option value="">Seleccionar Estado Civil</option>

                  <?php

                  $civil = ControladorAlumnos::ctrCargarSelectEstCivil();
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

                  $genero = ControladorAlumnos::ctrCargarSelectGenero();
                  foreach ($genero as $key => $value) {
                    echo "<option value='".$value['Id_Genero']."'>".$value['Descripcion']."</option>";
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

          <button type="submit" class="btn btn-primary">Modificar Alumno</button>

        </div>

        <?php

          $editarAlumno = new ControladorAlumnos();
          $editarAlumno -> ctrEditarAlumno();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL CONTACTO RESPONSABLE
======================================-->

<div id="modalContactoResponsable" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#00c0ef; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Contacto Responsable</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL ID ALUMNO -->

            <div class="form-group">

               <div class="input-group">

                 <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>

                   <input type="text" class="form-control input-lg" id="editarAlumnoContact" name="editarAlumnoContact" readonly value="">


               </div>

             </div>

             <!-- ENTRADA PARA EL PRIMER NOMBRE -->

             <div class="form-group">

               <div class="input-group">

                 <span class="input-group-addon"><i class="fa fa-user"></i></span>

                 <input type="text" class="form-control input-lg" name="nuevoNombreContacto1" id="nuevoNombreContacto1" placeholder="Primer Nombre" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" required>

               </div>

             </div>

            <!-- ENTRADA PARA EL PRIMER APELLIDO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoApellidoContacto1" placeholder="Primer Apellido" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TIPO DE CONTACTO-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-male"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoContacto1" placeholder="Tipo de Contacto" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase">

              </div>

            </div>


            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoTelefonoContacto" placeholder="TELÉFONO" minlength="8" maxlength="15" pattern="[0-9]{8}">

                  </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Contacto</button>

        </div>

        <?php

          $crearContactoRespon = new ControladorContactoRespon();
          $crearContactoRespon -> ctrCrearContactoRespon();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

  $borrarAlumno = new ControladorAlumnos();
  $borrarAlumno -> ctrBorrarAlumno();

?>
