<div class="content-wrapper">

      <!-- FORMULARIO DE ORIENTACIONES -->

          <section class="content" style="width:550px">

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
                                            <button class="btn btn-danger btnEliminarOrientacion" idOrientacion="'.$value["Id_orientacion"].'"><i class="fa fa-times"></i></button>


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

                  <input type="text" class="form-control input-lg" name="nuevoNombreOrientacion" id="nuevoNombreOrientacion" placeholder="Nombre de la Orientacion" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" maxlength="" required>

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


          <?php

            $borrarOrientacion = new ControladorOrientaciones();
            $borrarOrientacion -> ctrBorrarOrientacion();

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

                  <input type="text" class="form-control input-lg" name="editarOrientacion" id="editarOrientacion" value="" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" maxlength="40" required>

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





<!-- /.ultimo div -->
</div>
<!-- /.content-wrapper -->
