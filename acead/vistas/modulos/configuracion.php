<div class="content-wrapper">

  <!-- ===================================
      CONFIG GENERAL
    ====================================== -->

  <section class="content-header">

    <h1>

      Administrar Configuracion General

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Configuracion</li>

    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="box">

              <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas">

                  <thead>

                   <tr>

                     <th style="width:10px">Id</th>
                     <th>Parametro</th>
                     <th>Valor</th>
                     <th>Acciones</th>


                   </tr>

                  </thead>

                  <tbody>

                      <?php

                      $item = null;
                      $valor = null;
                      $modalidades = ControladorConfiguracion::ctrMostrarConfig($item, $valor);

                     foreach ($modalidades as $key => $value){

                        echo ' <tr>

                                <td>'.$value["Id_Parametro"].'</td>
                                <td>'.$value["Parametro"].'</td>
                                <td>'.$value["Valor"].'</td>

                                <td>

                                  <div class="btn-group">

                                    <button class="btn btn-warning btnEditarParametro" idParametro="'.$value["Id_Parametro"].'" data-toggle="modal" data-target="#modalEditarParametro"><i class="fa fa-pencil"></i></button>

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

    <!-- /.box -->

  </section>


  <!-- ===================================
    PRECIOS
  ====================================== -->

  <section class="content-header">

    <h1>

      Administrar Precios

    </h1>


  </section>

  <section class="content">

    <div class="box">

              <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas">

                  <thead>

                   <tr>
                     <th style="width:10px">Id</th>
                     <th>Descripcion</th>
                     <th>Precio</th>
                     <th>Acciones</th>
                   </tr>

                  </thead>

                  <tbody>

                      <?php

                      $item = null;
                      $valor = null;
                      $modalidades = ControladorConfiguracion::ctrMostrarPrecio($item, $valor);

                     foreach ($modalidades as $key => $value){

                        echo ' <tr>

                                <td>'.$value["Id_precio"].'</td>
                                <td>'.$value["Descripcion"].'</td>
                                <td>'.$value["Precio"].'</td>

                                <td>

                                  <div class="btn-group">

                                    <button class="btn btn-warning btnEditarPrecio" idPrecio="'.$value["Id_precio"].'" data-toggle="modal" data-target="#modalEditarPrecio"><i class="fa fa-pencil"></i></button>

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

    <!-- /.box -->

  </section>

  <!-- ===================================
    DESCUENTOS
  ====================================== -->

  <section class="content-header">

    <h1>

      Administrar Descuentos

    </h1>



  </section>

  <section class="content">

    <div class="box">

      <!-- BOTON AGREGAE USUARIO -->
        <div class="box-header with-border">

              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarDescuento"><i class="fa fa-plus"></i>

                Agregar Descuento

              </button>

            </div>


              <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas">

                  <thead>

                   <tr>
                     <th style="width:10px">Id</th>
                     <th>Descuento</th>
                     <th>Valor de Descuento</th>
                     <th>Acciones</th>
                   </tr>

                  </thead>

                  <tbody>

                      <?php

                      $item = null;
                      $valor = null;
                      $modalidades = ControladorConfiguracion::ctrMostrarDescuento($item, $valor);

                     foreach ($modalidades as $key => $value){

                        echo ' <tr>

                                <td>'.$value["Id_Descuento"].'</td>
                                <td>'.$value["Descuento"].'</td>
                                <td>'.$value["ValorDesc"].'</td>

                                <td>

                                  <div class="btn-group">

                                    <button class="btn btn-warning btnEditarDescuento" title="Editar" idDescuento="'.$value["Id_Descuento"].'" data-toggle="modal" data-target="#modalEditarDescuento"><i class="fa fa-pencil"></i></button>

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

    <!-- /.box -->

  </section>


</div>
<!-- /.content-wrapper -->


<!--=====================================
MODAL AGREGAR PARAMETRO
======================================-->

<div id="modalAgregarParametro" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Nuevo Parametro</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DEL PARAMETRO -->

            <div class="form-group">

              <div class="input-group" title="Nombre del Parametro">

                <span class="input-group-addon"><i class="fa fa-cog" title="Nombre del Parametro"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoParametro" id="nuevoParametro" placeholder="Nombre del Parametro"  style="text-transform: uppercase" maxlength="30" required>

              </div>

            </div>


          <!-- ENTRADA PARA EL VALOR DEL PARAMETRO -->

          <div class="form-group">

            <div class="input-group" title="Valor del Parametro">

                <span class="input-group-addon"><i class="fa fa-pencil" title="Valor del Parametro"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoVal" id="nuevoVal" placeholder="Valor del Parametro" maxlength="100">

              </div>

          </div>

          </div>

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Parametro</button>

        </div>

        <?php

          $crearUsuario = new ControladorConfiguracion();
          $crearUsuario -> ctrCrearParametro();

        ?>
        <script src="vistas/js/ctrespacios.js"></script>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR DESCUENTO
======================================-->

<div id="modalAgregarDescuento" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Nuevo Descuento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DEL PARAMETRO -->

            <div class="form-group">

              <div class="input-group" title="Nombre del Descuento">

                <span class="input-group-addon"><i class="fa fa-cog" title="Nombre del Descuento"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDescripDescuento" id="nuevoDescripDescuento" placeholder="Nombre del Descuento"  style="text-transform: uppercase" maxlength="30" required>

              </div>

            </div>


          <!-- ENTRADA PARA EL VALOR DEL PARAMETRO -->

          <div class="form-group">

            <div class="input-group" title="Valor del Descuento">

                <span class="input-group-addon"><i class="fa fa-pencil" title="Valor del Descuento"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDescuento" id="nuevoDescuento" placeholder="Valor del Descuento" maxlength="100">

              </div>

          </div>

          </div>

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Parametro</button>

        </div>

        <?php

          $crearUsuario = new ControladorConfiguracion();
          $crearUsuario -> ctrCrearDescuento();

        ?>
        <script src="vistas/js/ctrespacios.js"></script>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PARAMETRO
======================================-->

<div id="modalEditarParametro" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#f39c12; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Parametro</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DEL PARAMETRO -->

            <div class="form-group">

              <div class="input-group" title="Nombre del Parametro">

                <span class="input-group-addon"><i class="fa fa-cog" title="Nombre del Parametro"></i></span>

                <input type="text" class="form-control input-lg" name="editarParametro" id="editarParametro" placeholder="Nombre del Parametro" style="text-transform: uppercase" maxlength="30" required>

              </div>

            </div>


          <!-- ENTRADA PARA EL VALOR DEL PARAMETRO -->

          <div class="form-group">

            <div class="input-group" title="Valor del Parametro">

                <span class="input-group-addon"><i class="fa fa-pencil" title="Valor del Parametro"></i></span>

                <input type="text" class="form-control input-lg" name="editarVal" id="editarVal" placeholder="Valor del Parametro" maxlength="15">

              </div>

          </div>

          </div>

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Parametro</button>

        </div>

        <?php

          $crearUsuario = new ControladorConfiguracion();
          $crearUsuario -> ctrEditarParametro();

        ?>
        <script src="vistas/js/ctrespacios.js"></script>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRECIO
======================================-->

<div id="modalEditarPrecio" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#f39c12; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Precio</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DEL PRECIO -->

            <div class="form-group">

              <div class="input-group" title="Nombre del Precio">

                <span class="input-group-addon"><i class="fa fa-cog" title="Nombre del Precio"></i></span>

                <input type="text" class="form-control input-lg" name="editarDescripPrecio" id="editarDescripPrecio" placeholder="Descripcion del Precio" style="text-transform: uppercase" maxlength="30" required>

              </div>

            </div>


          <!-- ENTRADA PARA EL VALOR DEL PARAMETRO -->

          <div class="form-group">

            <div class="input-group" title="Valor del Precio">

                <span class="input-group-addon"><i class="fa fa-pencil" title="Valor del Precio"></i></span>

                <input type="text" class="form-control input-lg" name="editarPrecio" id="editarPrecio" placeholder="Valor del Precio" maxlength="15">

              </div>

          </div>

          </div>

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Precio</button>

        </div>

        <?php

          $crearUsuario = new ControladorConfiguracion();
          $crearUsuario -> ctrEditarPrecio();

        ?>
        <script src="vistas/js/ctrespacios.js"></script>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR DESCUENTO
======================================-->

<div id="modalEditarDescuento" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#f39c12; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Descuento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DEL PRECIO -->

            <div class="form-group">

              <div class="input-group" title="Nombre del Descuento">

                <span class="input-group-addon"><i class="fa fa-cog" title="Nombre del Descuento"></i></span>

                <input type="text" class="form-control input-lg" name="editarDescripDescuento" id="editarDescripDescuento" placeholder="Descripcion del Descuento" style="text-transform: uppercase" maxlength="30" required>

              </div>

            </div>


          <!-- ENTRADA PARA EL VALOR DEL PARAMETRO -->

          <div class="form-group">

            <div class="input-group" title="Valor del Descuento">

                <span class="input-group-addon"><i class="fa fa-pencil" title="Valor del Descuento"></i></span>

                <input type="text" class="form-control input-lg" name="editarDescuento" id="editarDescuento" placeholder="Valor del Descuento" maxlength="15">

              </div>

          </div>

          </div>

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Precio</button>

        </div>

        <?php

          $crearUsuario = new ControladorConfiguracion();
          $crearUsuario -> ctrEditarDescuento();

        ?>
        <script src="vistas/js/ctrespacios.js"></script>

      </form>

    </div>

  </div>

</div>
