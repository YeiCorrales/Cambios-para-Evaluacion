<div class="content-wrapper">

  <!-- FORMULARIO DE CLASES -->

      <section class="content" style="width:550px">

        <div class="box">

          <!-- BOTON AGREGAR CLASE -->
            <div class="box-header with-border">

                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarClase">

                    Agregar Clase

                  </button>

                </div>


                  <div class="box-body">

                    <table class="table table-bordered table-striped dt-responsive tablas">

                      <thead>

                       <tr>

                       <th style="width:10px">#</th>
                       <th style="width:10px">Id</th>
                       <th>Clase</th>
                       <th>Duración</th>
                       <th>Acciones</th>


                       </tr>

                      </thead>

                      <tbody>

                          <?php



                          $item = null;
                          $valor = null;
                          $clases = ControladorClases::ctrMostrarClases($item, $valor);

                         foreach ($clases as $key => $value){

                            echo ' <tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value["Id_Clase"].'</td>
                                    <td>'.$value["DescripClase"].'</td>
                                    <td>'.$value["Duracion"].'</td>

                                    <td>

                                      <div class="btn-group">

                                        <button class="btn btn-warning btnEditarClase" idClase="'.$value["Id_Clase"].'" data-toggle="modal" data-target="#modalEditarClase"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btnEliminarClase" idClase="'.$value["Id_Clase"].'"><i class="fa fa-times"></i></button>


                                      </div>

                                    </td>

                                  </tr>';
                          }


                          ?>


                      </tbody>

                    </table>

                  </div>

                  <!-- /.content -->
        </div>

<!--=====================================
MODAL AGREGAR CLASE
======================================-->

<div id="modalAgregarCLase" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Clase</h4>

      </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!-- ENTRADA PARA SELECCIONAR LA MODALIDAD -->

             <div class="form-group">

               <div class="input-group">

                 <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                 <select class="form-control input-lg" name="nuevoSelecModalidad">

                   <option value="">Seleccionar La Modalidad</option>

                   <?php

                   $modalidad = ControladorModalidades::ctrCargarSelectModalidad();
                   foreach ($modalidad as $key => $value) {
                     echo "<option value='".$value['Id_Modalidad']."'>".$value['DescripModalidad']."</option>";
                   }
                     echo $_POST['nuevoSelecModalidad'];
                   ?>

                 </select>

               </div>

             </div>

             <!-- ENTRADA PARA SELECCIONAR LA ORIENTACION -->

             <div class="form-group">

               <div class="input-group">

                 <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                 <select class="form-control input-lg" name="nuevoSelecOrientacion">

                   <option value="">Seleccionar la orientación de la Clase</option>

                   <?php

                   $role = ControladorModalidades::ctrCargarSelectOrientacion();
                   foreach ($role as $key => $value) {
                     echo "<option value='".$value['Id_orientacion']."'>".$value['Nombre']."</option>";
                   }
                     echo $_POST['nuevoSelecOrientacion'];
                   ?>

                 </select>

               </div>

             </div>

          <!-- ENTRADA PARA EL NOMBRE DE LA CLASE -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" name="nuevoDescripClase" id="nuevoDescripClase" placeholder="Nombre de la CLase" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" maxlength="" required>

            </div>

          </div>

          <!-- ENTRADA PARA LA DURACIÓN DE LA CLASE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-times"></i></span>

                <input type="time" class="form-control input-lg" name="nuevoDuracion" id="nuevoDuracion" placeholder="hrs:min"  pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" class="inputs time" required>

              </div>

            </div>

         </div>

       </div>

      <!--=====================================
      PIE DEL MODAL
      ======================================-->

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar CLase</button>

      </div>

      <?php

        $crearClase = new ControladorClases();
        $crearClase -> ctrCrearClase();

      ?>


      <?php

        $borrarClase = new ControladorClases();
        $borrarClase -> ctrBorrarClase();

      ?>


    </form>

  </div>

</div>

</div>

<!--=====================================
MODAL EDITAR CLASE
======================================-->

<div id="modalEditarCLase" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

      <div class="modal-header" style="background:#f39c12; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar Clase</h4>

      </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-body">

        <div class="box-body">


          <!-- ID DE LA CLASE -->

           <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>


                <input type="text" class="form-control input-lg" id="editarIdClase" name="editarIdClase" readonly value="">


              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR LA MODALIDAD -->

               <div class="form-group">

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                   <select class="form-control input-lg" name="editarSelecModalidad">

                     <option value="">Seleccionar La Modalidad</option>

                     <?php

                     $modalidad = ControladorModalidades::ctrCargarSelectModalidad();
                     foreach ($modalidad as $key => $value) {
                       echo "<option value='".$value['Id_Modalidad']."'>".$value['DescripModalidad']."</option>";
                     }
                       echo $_POST['editarSelecModalidad'];
                     ?>

                   </select>

                 </div>

               </div>

               <!-- ENTRADA PARA SELECCIONAR LA ORIENTACION -->

               <div class="form-group">

                 <div class="input-group">

                   <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>

                   <select class="form-control input-lg" name="editarSelecOrientacion">

                     <option value="">Seleccionar la orientación de la Clase</option>

                     <?php

                     $role = ControladorModalidades::ctrCargarSelectOrientacion();
                     foreach ($role as $key => $value) {
                       echo "<option value='".$value['Id_orientacion']."'>".$value['Nombre']."</option>";
                     }
                       echo $_POST['editarSelecOrientacion'];
                     ?>

                   </select>

                 </div>

               </div>

            <!-- ENTRADA PARA EL NOMBRE DE LA CLASE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarDescripClase" id="editarDescripClase" placeholder="Nombre de la CLase" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" maxlength="" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DURACIÓN DE LA CLASE -->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-times"></i></span>

                  <input type="time" class="form-control input-lg" name="editarDuracion" id="editarDuracion" placeholder="hrs:min"  pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" class="inputs time" required>

                </div>

              </div>


            </div>

          </div>





      <!--=====================================
      PIE DEL MODAL
      ======================================-->

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar CLase </button>

      </div>

      <?php

        $editarClase = new ControladorClases();
        $editarClase -> ctrEditarClase();

      ?>

       </form>

      </div>

    </div>

 </div>

 </section>

<!-- /.ultimo div -->
</div>
<!-- /.content-wrapper -->
