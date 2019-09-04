<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Modalidades, Orientaciones y Clases

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Mantenimiento Academico</li>

    </ol>

  </section>

  <!-- FORMULARIO DE MODALIDADES  -->
  <section class="content" style="width:900px">

    <div class="box">

      <!-- BOTON AGREGAR MODALIDAD -->
        <div class="box-header with-border">

              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarModalidad">

                Agregar Modalidades

              </button>

            </div>


              <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas">

                  <thead>

                   <tr>

                     <th style="width:10px">#</th>
                     <th style="width:10px">Id</th>
                     <th>Modalidad</th>
                     <th>Acciones</th>


                   </tr>

                  </thead>

                  <tbody>

                      <?php



                      $item = null;
                      $valor = null;
                      $modalidades = ControladorModalidades::ctrMostrarModalidades($item, $valor);

                     foreach ($modalidades as $key => $value){

                        echo ' <tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["Id_Modalidad"].'</td>
                                <td>'.$value["DescripModalidad"].'</td>

                                <td>

                                  <div class="btn-group">

                                    <button class="btn btn-warning btnEditarModalidad" idModalidad="'.$value["Id_Modalidad"].'" data-toggle="modal" data-target="#modalEditarModalidad"><i class="fa fa-pencil"></i></button>




                                  </div>

                                </td>

                              </tr>';
                      }


                      ?>


                  </tbody>

                </table>

              </div>

              <!-- /ultimo div -->
    </div>

    <!--=====================================
MODAL AGREGAR MODALIDAD
======================================-->

<div id="modalAgregarModalidad" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Modalidad</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DE LA MODALIDAD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDescripModalidad" id="nuevoDescripModalidad" placeholder="Nombre de la Modalidad"  style="text-transform: uppercase" maxlength="" required>

              </div>

            </div>

           </div>

         </div>



        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Modalidad</button>

        </div>

        <?php

          $crearModalidad = new ControladorModalidades();
          $crearModalidad -> ctrCrearModalidad();

        ?>


      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR MODALIDAD
======================================-->

<div id="modalEditarModalidad" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#f39c12; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Modalidad</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ID DE MODALIDAD -->

             <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>


                  <input type="text" class="form-control input-lg" id="editarIdModalidad" name="editarIdModalidad" readonly value="">


                </div>

              </div>

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarModalidad" id="editarModalidad" value="" style="text-transform: uppercase" maxlength="40" required>

              </div>

            </div>

          </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Modalidad</button>

        </div>

        <?php

          $editarModalidad = new ControladorModalidades();
          $editarModalidad -> ctrEditarModalidad();

        ?>

         </form>

        </div>

      </div>

    </div>

  </section>

    <!--cerrar la sección-->

      <!-- FORMULARIO DE ORIENTACIONES -->

          <section class="content" style="width:900px">

            <div class="box">

              <!-- BOTON AGREGAR ORIENTACION -->
                <div class="box-header with-border">

                      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarOrientacion">

                        Agregar Orientación

                      </button>

                    </div>


                      <div class="box-body">

                        <table class="table table-bordered table-striped dt-responsive tablas">

                          <thead>

                           <tr>

                             <th style="width:10px">#</th>
                             <th style="width:10px">Id</th>
                             <th>Orientación</th>
                             <th>Acciones</th>


                           </tr>

                          </thead>

                          <tbody>

                              <?php



                              $item = null;
                              $valor = null;
                              $orientaciones = ControladorOrientaciones::ctrMostrarOrientaciones($item, $valor);

                             foreach ($orientaciones as $key => $value){

                                echo ' <tr>
                                        <td>'.($key+1).'</td>
                                        <td>'.$value["Id_orientacion"].'</td>
                                        <td>'.$value["Nombre"].'</td>

                                        <td>

                                          <div class="btn-group">

                                            <button class="btn btn-warning btnEditarOrientacion" idOrientacion="'.$value["Id_orientacion"].'" data-toggle="modal" data-target="#modalEditarOrientacion"><i class="fa fa-pencil"></i></button>



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
    MODAL AGREGAR ORIENTACION
    ======================================-->

    <div id="modalAgregarOrientacion" class="modal fade" role="dialog">

    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar Orientacion</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL NOMBRE DE LA ORIENTACION -->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoNombreOrientacion" id="nuevoNombreOrientacion" placeholder="Nombre de la Orientacion" style="text-transform: uppercase" maxlength="" required>

                </div>

              </div>

             </div>

           </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Orientación</button>

          </div>

          <?php

            $crearOrientacion = new ControladorOrientaciones();
            $crearOrientacion -> ctrCrearOrientacion();

          ?>



        </form>

      </div>

    </div>

  </div>

  <!--=====================================
    MODAL EDITAR ORIENTACION
    ======================================-->

    <div id="modalEditarOrientacion" class="modal fade" role="dialog">

    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#f39c12; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar Orientación</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">


              <!-- ID DE ORIENTACION -->

               <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>


                    <input type="text" class="form-control input-lg" id="editarIdOrientacion" name="editarIdOrientacion" readonly value="">


                  </div>

                </div>

              <!-- ENTRADA PARA EL NOMBRE -->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="editarOrientacion" id="editarOrientacion" value=""  style="text-transform: uppercase" maxlength="40" required>

                </div>

              </div>

            </div>



          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Modificar Orientación </button>

          </div>

          <?php

            $editarOrientacion = new ControladorOrientaciones();
            $editarOrientacion -> ctrEditarOrientacion();

          ?>

           </form>

          </div>

        </div>

     </div>

   <!-- /.box -->

  </section>
<!-- /.box -->


<!-- FORMULARIO DE CLASES -->

    <section class="content" style="width:900px">

      <div class="box">

        <!-- BOTON AGREGAR CLASE -->
        <div class="box-header with-border">

              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarClase">

                Agregar Clase

              </button>

            </div>


                <div class="box-body">

                  <table class="table table-bordered table-striped dt-responsive tablas" id="maintable">

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

<div id="modalAgregarClase" class="modal fade" role="dialog">

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

            <input type="text" class="form-control input-lg" name="nuevoDescripClase" id="nuevoDescripClase" placeholder="Nombre de la CLase" style="text-transform: uppercase" maxlength="" required>

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


      $crearClaseOrientaModali = new ControladorClases();
      $crearClaseOrientaModali -> ctrCrearClaseOrientaModali();


    ?>


  </form>

</div>

</div>

</div>

<!--=====================================
MODAL EDITAR CLASE
======================================-->

<div id="modalEditarClase" class="modal fade" role="dialog">

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

              <input type="text" class="form-control input-lg" name="editarDescripClase" id="editarDescripClase" placeholder="Nombre de la Clase"  style="text-transform: uppercase" maxlength="" required>

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

      <button type="submit" class="btn btn-primary">Modificar Clase </button>

    </div>

    <?php

      $editarClase = new ControladorClases();
      $editarClase -> ctrEditarClase();

      $editarClaseOrientaModali = new ControladorClases();
      $editarClaseOrientaModali -> ctrEditarOrientaModali();


    ?>

     </form>

    </div>

  </div>

</div>

</section>

<!-- FORMULARIO DE AULAS -->

    <section class="content" style="width:900px">

      <div class="box">

        <!-- BOTON AGREGAR AULA DE CLASES -->
          <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAula">

                  Agregar Aula

                </button>

              </div>


                <div class="box-body">

                  <table class="table table-bordered table-striped dt-responsive tablas">

                    <thead>

                     <tr>

                       <th style="width:10px">#</th>
                       <th style="width:10px">Id</th>
                       <th>Aula</th>
                       <th>Acciones</th>


                     </tr>

                    </thead>

                    <tbody>

                        <?php



                        $item = null;
                        $valor = null;
                        $aulas = ControladorAulas::ctrMostrarAulas($item, $valor);

                       foreach ($aulas as $key => $value){

                          echo ' <tr>
                                  <td>'.($key+1).'</td>
                                  <td>'.$value["Id_Aula"].'</td>
                                  <td>'.$value["Num_Aula"].'</td>

                                  <td>

                                    <div class="btn-group">

                                      <button class="btn btn-warning btnEditarAula" idAula="'.$value["Id_Aula"].'" data-toggle="modal" data-target="#modalEditarAula"><i class="fa fa-pencil"></i></button>



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
MODAL AGREGAR AULA
======================================-->

<div id="modalAgregarAula" class="modal fade" role="dialog">

<div class="modal-dialog">

<div class="modal-content">

  <form role="form" method="post" enctype="multipart/form-data">

    <!--=====================================
    CABEZA DEL MODAL
    ======================================-->

    <div class="modal-header" style="background:#3c8dbc; color:white">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <h4 class="modal-title">Agregar Aula</h4>

    </div>

    <!--=====================================
    CUERPO DEL MODAL
    ======================================-->

    <div class="modal-body">

      <div class="box-body">

        <!-- ENTRADA PARA EL NOMBRE DEL AULA-->

        <div class="form-group">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-user"></i></span>

            <input type="text" class="form-control input-lg" name="nuevoNombreAula" id="nuevoNombreAula" placeholder="Nombre del Aula" style="text-transform: uppercase" maxlength="" required>

          </div>

        </div>

       </div>

     </div>

    <!--=====================================
    PIE DEL MODAL
    ======================================-->

    <div class="modal-footer">

      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

      <button type="submit" class="btn btn-primary">Guardar Aula</button>

    </div>

    <?php

      $crearOrientacion = new ControladorAulas();
      $crearOrientacion -> ctrCrearAula();

    ?>



  </form>

</div>

</div>

</div>

<!--=====================================
MODAL EDITAR ORIENTACION
======================================-->

<div id="modalEditarAula" class="modal fade" role="dialog">

<div class="modal-dialog">

<div class="modal-content">

  <form role="form" method="post" enctype="multipart/form-data">

    <!--=====================================
    CABEZA DEL MODAL
    ======================================-->

    <div class="modal-header" style="background:#f39c12; color:white">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <h4 class="modal-title">Editar Aula</h4>

    </div>

    <!--=====================================
    CUERPO DEL MODAL
    ======================================-->

    <div class="modal-body">

      <div class="box-body">


        <!-- ID DEL AULA -->

         <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>


              <input type="text" class="form-control input-lg" id="editarIdAula" name="editarIdAula" readonly value="">


            </div>

          </div>

        <!-- ENTRADA PARA EL NOMBRE -->

        <div class="form-group">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-user"></i></span>

            <input type="text" class="form-control input-lg" name="editarAula" id="editarAula" value=""  style="text-transform: uppercase" maxlength="40" required>

          </div>

        </div>

      </div>



    <!--=====================================
    PIE DEL MODAL
    ======================================-->

    <div class="modal-footer">

      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

      <button type="submit" class="btn btn-primary">Modificar Aula </button>

    </div>

    <?php

      $editarOrientacion = new ControladorAulas();
      $editarOrientacion -> ctrEditarAula();

    ?>

     </form>

    </div>

  </div>

</div>

<!-- /.box -->

</section>
<!-- /.box -->


<!-- /.ultimo div -->
</div>
<!-- /.content-wrapper -->
