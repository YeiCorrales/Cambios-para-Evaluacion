<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Secciones

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Mantenimiento Academico</li>

    </ol>

  </section>


<!-- FORMULARIO DE CLASES -->

    <section class="content" style="width:1000px">

      <div class="box">

        <!-- BOTON AGREGAR SECCION -->
        <div class="box-header with-border">

              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSeccion">

                Agregar Seccion

              </button>

        </div>


                <div class="box-body">

                  <table class="table table-bordered table-striped dt-responsive tablas" id="TablaSecciones">

                    <thead>

                     <tr>
                     <th style="width:10px">#</th>
                     <th style="width:10px">Id</th>
                     <th>Seccion</th>
                     <th style="width:100px">Maestro</th>
                     <th>Hora Clase</th>
                     <th>Aula</th>
                     <th>Periodo Academico</th>
                     <th>Acciones</th>


                     </tr>

                    </thead>

                    <tbody>

                        <?php



                      $item = null;
                      $valor = null;
                      $secciones = ControladorSecciones::ctrMostrarSeccion($item, $valor);

                     foreach ($secciones as $key => $value){

                        echo ' <tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["IDSEC"].'</td>
                                <td>'.$value["DSEC"].'</td>
                                <td>'.$value["MAE"].'</td>
                                <td>'.$value["SHRA"].'</td>
                                <td>'.$value["AU"].'</td>
                                <td>'.$value["DPER"].'</td>

                                <td>

                                  <div class="btn-group">
                                    <button title="Editar Seccions" class="btn btn-warning btnEditarSeccion" IDSEC="'.$value["IDSEC"].'" data-toggle="modal" data-target="#modalEditarSeccion"><i class="fa fa-pencil"></i></button>
                                    <button title="Imprimir Seccion" class="btn btn-info btnImprimirSeccion" IDSEC="'.$value["IDSEC"].'"><i class="fa fa-print"></i></button>
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
MODAL AGREGAR SECCION
======================================-->

<div id="modalAgregarSeccion" class="modal fade" role="dialog">

  <div class="modal-dialog">

  <div class="modal-content">

  <form role="form" method="post" enctype="multipart/form-data">

    <!--=====================================
    CABEZA DEL MODAL
    ======================================-->

    <div class="modal-header" style="background:#3c8dbc; color:white">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <h4 class="modal-title">Agregar Seccion</h4>

    </div>

    <!--=====================================
    CUERPO DEL MODAL
    ======================================-->

    <div class="modal-body">

      <div class="box-body">

        <!-- ENTRADA PARA SELECCIONAR LA CLASE -->

           <div class="form-group">

             <div class="input-group" title = "Seleccione Clase">

               <span class="input-group-addon"><i class="fa fa-book" title = "Seleccione Clase"></i></span>

               <select class="form-control input-lg" name="nuevoSelecClase">

                      <option value="">Seleccione Clase</option>

                      <?php

                      $dpto = ControladorSecciones::ctrCargarClase();
                      foreach ($dpto as $key => $value) {
                        echo "<option value='".$value['Id_Clase']."'>".$value['DescripClase']."</option>";
                      }
                           echo $_POST['nuevoSelecClase'];
                      ?>

                    </select>

             </div>

           </div>

           <!-- ENTRADA PARA SELECCIONAR PERIODO ACADEMICO -->

           <div class="form-group">

             <div class="input-group" title = "Seleccione Periodo Academico">

               <span class="input-group-addon"><i class="fa fa-calendar" title = "Seleccione Periodo Academico"></i></span>

               <select class="form-control input-lg" name="nuevoPeriodo">

                      <option value="">Seleccione Periodo Academico</option>

                      <?php

                      $dpto = ControladorSecciones::ctrCargarPeriodo();
                      foreach ($dpto as $key => $value) {
                        echo "<option value='".$value['Id_PeriodoAcm']."'>".$value['DescripPeriodo']."</option>";
                      }
                      ?>

                    </select>

             </div>

           </div>

           <!-- ENTRADA PARA SELECCIONAR MAESTRO -->

           <div class="form-group">

             <div class="input-group" title = "Seleccione Maestro">

               <span class="input-group-addon"><i class="fa fa-user" title = "Seleccione Maestro"></i></span>

                                    <select class="form-control input-lg" name="nuevoMaestro">

                      <option value="">Seleccione Maestro</option>

                      <?php
                      $maestro = ControladorSecciones::ctrCargarMaestro();
                                   foreach ($maestro as $key => $value) {

                        echo "<option value='".$value['Id_usuario']."'>".$value['PrimerNombre']."</option>";
                      }
                      ?>

                    </select>

             </div>

           </div>



        <!-- ENTRADA PARA EL NOMBRE DE LA SECCION -->

        <div class="form-group">

          <div class="input-group" title = "Ingrese Nombre Seccion">

            <span class="input-group-addon"><i class="fa fa-user" title = "Ingrese Nombre Seccion"></i></span>

            <input type="text" class="form-control input-lg" name="nuevoDescripSeccion" id="nuevoDescripSeccion" placeholder="Nombre de la Seccion" style="text-transform: uppercase" maxlength="" required>

          </div>

        </div>

        <!-- ENTRADA PARA LA DURACIÓN DE LA CLASE -->

          <div class="form-group">

            <div class="input-group" title = "Ingrese Hora Sección">

              <span class="input-group-addon"><i class="fa fa-times" title = "Ingrese Hora Sección"></i></span>

              <input type="time" class="form-control input-lg" name="HrsClas" id="HrsClas" placeholder="hrs:min:seg"  pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" class="inputs time" required>

            </div>

          </div>

     
           <!-- ENTRADA PARA SELECCIONAR AULA -->

           <div class="form-group">

             <div class="input-group" title = "Seleccione Aula">

               <span class="input-group-addon"><i class="fa fa-user" title = "Seleccione Aula"></i></span>

                                    <select class="form-control input-lg" name="aulaclase">

                      <option value="">Seleccione Aula</option>

                      <?php
                      $aula = ControladorSecciones::ctrCargarAula();
                                   foreach ($aula as $key => $value) {

                        echo "<option value='".$value['Id_Aula']."'>".$value['Num_Aula']."</option>";
                      }
                      ?>

                    </select>

             </div>

           </div>





       </div>

     </div>

    <!--=====================================
    PIE DEL MODAL
    ======================================-->

    <div class="modal-footer">

      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

      <button type="submit" name="btnguardar" class="btn btn-primary">Guardar Seccion</button>

    </div>

    <?php

      $crearSeccion = new ControladorSecciones();
      $crearSeccion -> ctrCrearSeccion();


      $crearClaseSeccion = new ControladorSecciones();
      $crearClaseSeccion -> ctrCrearClaseSeccion();

    ?>


  </form>

</div>

</div>

</div>



<!--=======================================================================================================
                              MODAL PARA EDITAR SECCION
    ========================================================================================================-->

<div id="modalEditarSeccion" class="modal fade in" role="dialog" style="display: none;">

<div class="modal-dialog">

<div class="modal-content">

  <form role="form" method="post" enctype="multipart/form-data">

    <!--=====================================
    CABEZA DEL MODAL
    ======================================-->

    <div class="modal-header" style="background:#f39c12; color:white">

      <button type="button" class="close" data-dismiss="modal">×</button>

      <h4 class="modal-title">Editar Seccion</h4>

    </div>

    <!--=====================================
    CUERPO DEL MODAL
    ======================================-->

    <div class="modal-body">

      <div class="box-body">

        <!-- ENTRADA PARA SELECCIONAR LA CLASE -->
        <div class="form-group">
          <div class="input-group" title = "ID Seccion">

            <span class="input-group-addon"><i class="fa fa-book" title = "ID Seccion"></i></span>

            <input type="text" class="form-control input-lg" name="idseccionedit" id="idseccionedit" style="text-transform: uppercase" maxlength="" required="" disabled="">

          </div>
        </div>

           <div class="form-group">

             <div class="input-group" title = "Seleccione Clase">

               <span class="input-group-addon"><i class="fa fa-book" title = "Seleccione Clase""></i></span>

               <select class="form-control input-lg" name="nuevoclaseedit" id="nuevoclaseedit">

                      <option value="">Seleccione Clase</option>

                      <?php

                      $dpto = ControladorSecciones::ctrCargarClase();
                      foreach ($dpto as $key => $value) {
                        echo "<option value='".$value['Id_Clase']."'>".$value['DescripClase']."</option>";
                      }
                      ?>

                    </select>

             </div>

           </div>

           <!-- ENTRADA PARA SELECCIONAR PERIODO ACADEMICO -->

           <div class="form-group">

             <div class="input-group" title = "Seleccione Periodo Academico">

               <span class="input-group-addon"><i class="fa fa-calendar" title = "Seleccione Periodo Academico"></i></span>

               <select class="form-control input-lg" name="nuevoperiodoedit">

                      <option value="">Seleccione Periodo Academico</option>

                      <?php

                      $dpto = ControladorSecciones::ctrCargarPeriodo();
                      foreach ($dpto as $key => $value) {
                        echo "<option value='".$value['Id_PeriodoAcm']."'>".$value['DescripPeriodo']."</option>";
                      }
                      ?>

                    </select>

             </div>

           </div>

 <!-- ENTRADA PARA SELECCIONAR MAESTRO -->

           <div class="form-group">

             <div class="input-group" title = "Seleccione Maestro">

               <span class="input-group-addon"><i class="fa fa-user" title = "Seleccione Maestro"></i></span>

                                    <select class="form-control input-lg" name="nuevomaestroedit">

                      <option value="">Seleccione Maestro</option>

                      <?php
                      $maestro = ControladorSecciones::ctrCargarMaestro();
                                   foreach ($maestro as $key => $value) {

                        echo "<option value='".$value['Id_usuario']."'>".$value['PrimerNombre']."</option>";
                      }
                      ?>

                    </select>

             </div>

           </div>



        <!-- ENTRADA PARA EL NOMBRE DE LA SECCION -->

        <div class="form-group">

          <div class="input-group" title = "Ingrese Nombre Seccion">

            <span class="input-group-addon"><i class="fa fa-user" title = "Ingrese Nombre Seccion"></i></span>

            <input type="text" class="form-control input-lg" name="nuevadescedit" id="nuevadescedit" placeholder="Nombre de la Seccion" style="text-transform: uppercase" maxlength="" required>

          </div>

        </div>

        <!-- ENTRADA PARA LA DURACIÓN DE LA CLASE -->

          <div class="form-group">

            <div class="input-group" title ="Ingrese Hora Seccion">

              <span class="input-group-addon"><i class="fa fa-times" title="Ingrese Hora Seccion"></i></span>

              <input type="time" class="form-control input-lg" name="hrsclaseedit" id="hrsclaseedit" placeholder="hrs:min"  pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" class="inputs time" required>

            </div>

          </div>

      <!-- ENTRADA PARA SELECCIONAR AULA -->

           <div class="form-group">

             <div class="input-group" title = "Seleccione Aula">

               <span class="input-group-addon"><i class="fa fa-user" title = "Seleccione Aula"></i></span>

                                    <select class="form-control input-lg" name="nuevaaulaedit">

                      <option value="">Seleccione Aula</option>

                      <?php
                      $maestro = ControladorSecciones::ctrCargarAula();
                                   foreach ($maestro as $key => $value) {

                        echo "<option value='".$value['Id_Aula']."'>".$value['Num_Aula']."</option>";
                      }
                      ?>

                    </select>

             </div>

           </div>






       </div>

     </div>

    <!--=====================================
    PIE DEL MODAL
    ======================================-->




  </form>
  <div class="modal-footer">

      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

      <button type="submit" name="btneditarSecc" class="btn btn-primary">Guardar Seccion</button>

    </div>

</div>

</div>

</div>

<!-- /.ultimo div -->
</div>
<!-- /.content-wrapper -->
<script src="../acead/vistas/js/seccion.js"></script>
