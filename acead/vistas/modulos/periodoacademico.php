<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Periodos Academicos

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Configuracion</li>

    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="box">

      <!-- BOTON AGREGAE USUARIO -->
        <div class="box-header with-border">

              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPeriodo"><i class="fa fa-plus"></i>

                Agregar Periodo Academico

              </button>

        </div>


              <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas">

                  <thead>

                   <tr>

                     <th>Id</th>
                     <th>Descripcion</th>
                     <th>Fecha de Inicio</th>
                     <th>Fecha Final</th>
                     <th>Estado</th>
                     <th>Acciones</th>


                   </tr>

                  </thead>

                  <tbody>

                      <?php



                      $item = null;
                      $valor = null;
                      $modalidades = ControladorPeriodoAcm::ctrMostrarPeriodoAcm($item, $valor);

                     foreach ($modalidades as $key => $value){

                        echo ' <tr>
                                <td>'.$value["Id_PeriodoAcm"].'</td>
                                <td>'.$value["DescripPeriodo"].'</td>
                                <td>'.$value["FechaInicio"].'</td>
                                <td>'.$value["FechaFin"].'</td>
                                <td>'.$value["Activo"].'</td>

                                <td>

                                  <div class="btn-group">

                                    <button class="btn btn-warning btnEditarPeriodo" title="Editar" idPeriodo="'.$value["Id_PeriodoAcm"].'" data-toggle="modal" data-target="#modalEditarPeriodo"><i class="fa fa-pencil"></i></button>



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
MODAL AGREGAR PERIODO ACADEMICO
======================================-->

<div id="modalAgregarPeriodo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Nuevo Periodo Academico</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DEL PERIODO ACADEMICO -->

            <div class="form-group">
              <label>Nombre Periodo Academico</label>

              <div class="input-group" title="Nombre del Perido">

                <span class="input-group-addon"><i class="fa fa-cog" title="Nombre del Perido"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPeriodo" id="nuevoPeriodo" placeholder="PERIODO ACADEMICO"  style="text-transform: uppercase" maxlength="30" required>

              </div>

            </div>


          <!-- ENTRADA PARA EL VALOR DE LA FECHA INICIAL -->

          <div class="form-group">
            <label>Fecha Inicial:</label>

            <div class="input-group date" title="Fecha Inicial">

              <span class="input-group-addon"><i class="fa fa-calendar" title="Fecha Inicial"></i></span>

              <input type="text" class="form-control pull-right" data-date-format='yyyy-mm-dd' placeholder="DD-MM-YYYY" name="FechaInicial" id="datepicker" required>
            </div>

          </div>


          <!-- ENTRADA PARA EL VALOR DE LA FECHA FINAL -->

          <div class="form-group">
            <label>Fecha Final:</label>

            <div class="input-group date" title="Fecha Final">

              <span class="input-group-addon"><i class="fa fa-calendar" title="Fecha Final"></i></span>

              <input type="text" class="form-control pull-right" placeholder="DD-MM-YYYY" data-date-format='yyyy-mm-dd' name="FechaFinal" id="datepicker2" required>
            </div>
            <!-- /.input group -->
          </div>

          <!-- ENTRADA PARA EL ESTADO -->

          <div class="form-group">
            <label>Estado:</label>

            <div class="form-group">

              <div class="input-group" title="Estado del Periodo">

                <span class="input-group-addon"><i class="fa fa-asterisk" title="Estado del Periodo"></i></span>

                <select class="form-control input-lg" name="estadoperiodo" id="estadoperiodo" required>

                  <option value="">Seleccionar Estado</option>

                  <?php

                  $dpto = ControladorPeriodoAcm::ctrCargarSelectEstado();
                  foreach ($dpto as $key => $value) {
                    echo "<option value='".$value['Activo']."'>".$value['Activo']."</option>";
                  }
                  ?>

                </select>

              </div>

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

          $crearUsuario = new ControladorPeriodoAcm();
          $crearUsuario -> ctrCrearPeriodoAcm();

        ?>
        <script src="vistas/js/ctrespacios.js"></script>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PERIODO
======================================-->

<div id="modalEditarPeriodo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#f39c12; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Periodo Academico</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DEL PERIODO ACADEMICO -->

            <div class="form-group">
              <label>Nombre Periodo Academico</label>

              <div class="input-group" title="Nombre del Periodo">

                <span class="input-group-addon"><i class="fa fa-cog" title="Nombre del Periodo"></i></span>

                <input type="text" class="form-control input-lg" name="editarPeriodo" id="editarPeriodo" placeholder="PERIODO ACADEMICO"  style="text-transform: uppercase" maxlength="30" required>

              </div>

            </div>


          <!-- ENTRADA PARA EL VALOR DE LA FECHA INICIAL -->

          <div class="form-group">
            <label>Fecha Inicial:</label>

            <div class="input-group date" title="Fecha Inicial">

              <span class="input-group-addon"><i class="fa fa-calendar" title="Fecha Inicial"></i></span>

              <input type="text" class="form-control pull-right" placeholder="DD-MM-YYYY" data-date-format='yyyy-mm-dd' name="editarFechaInicial" id="editardatepicker">
            </div>

          </div>


          <!-- ENTRADA PARA EL VALOR DE LA FECHA FINAL -->

          <div class="form-group">
            <label>Fecha Final:</label>

            <div class="input-group date" title="Fecha Final">

              <span class="input-group-addon"><i class="fa fa-calendar" title="Fecha Final"></i></span>

              <input type="text" class="form-control pull-right" placeholder="DD-MM-YYYY" data-date-format='yyyy-mm-dd' name="editarFechaFinal" id="editardatepicker2">
            </div>
            <!-- /.input group -->
          </div>

          <!-- ENTRADA PARA EL ESTADO -->

          <div class="form-group">
            <label>Estado:</label>

            <div class="form-group">

              <div class="input-group" title="Estado del Periodo">

                <span class="input-group-addon"><i class="fa fa-asterisk" title="Estado del Periodo"></i></span>

                <select class="form-control input-lg" name="editarestadoperiodo" id="editarestadoperiodo">

                  <option value="">Seleccionar Estado</option>
                  <option value="0">INACTIVO</option>
                  <option value="1">ACTIVO</option>

                </select>

              </div>

            </div>

            </div>

          </div>

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Periodo</button>

        </div>

        <?php

          $crearUsuario = new ControladorPeriodoAcm();
          $crearUsuario -> ctrEditarPeriodoAcm();

        ?>
        <script src="vistas/js/ctrespacios.js"></script>

      </form>

    </div>

  </div>

</div>
