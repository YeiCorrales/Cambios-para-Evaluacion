<div class="content-wrapper">
   
    <section class="content-header">

        <h1>

            CALIFICACIONES

            <small>Registro por Secciones</small>

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Tablero</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">


                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form role="form">
                    <!-- text input -->
                    <div class="form-group">
                        <label>DOCENTE</label>
                        <label id="nombredocente"></label>
                    </div>

                    <!-- select -->
                    <div class="form-group">
                        <label>CLASES ASIGNADAS</label>
                        <select class="form-control" id="cboclases">
                            <option value="" selected="" disabled="">Seleccione una Clase...</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>SECCIONES ASIGNADAS</label>
                        <select class="form-control" id="cbosecciones">
                            <option value="" selected="" disabled="">Seleccione una Seccion...</option>

                        </select>
                    </div>



                </form>
                <!-- TABLA 000000000000000000000000000000000000000000000000000000000000000-->
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-12 text-right">
                                <!--<input type="submit" id="btnx" value="presionar">-->
                                <button id="btnx" class="btn btn-info" name="btnnotatodos"  data-toggle="modal" data-target="#modalagregarnotatodos">AGREGAR TODOS <span class=""><i class="fa fa-pencil"></i></span></button>
                                <button id="btnprint" class="btn btn-pinterest btnprint" name="btnprint">IMPRIMIR CALIFICACIONES<span class=""><i class="fa fa-print"></i></span></button>
                            </div><br><br>
                            <table id="tblalumnos" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead style="text-align: center;">
                                    <tr role="row" class="text-center">
                                        <th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 182px;" >
                                            ID
                                        </th>
                                        <th class="sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 182px;" >
                                            NOMBRE
                                        </th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                                           CORREO ELECTRONICO
                                        </th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">
                                           TELEFONO
                                        </th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">
                                           NOTA
                                        </th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">
                                           STATUS
                                        </th>
<!--                                        <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">
                                            <button class="btn btn-success" id="btntodos">REGISTRAR TODOS</button>
                                        </th>-->
<!--                                        <td>
                                            <button id="btnnotatodos" class="btn btn-info" name="btnnotatodos"  data-toggle="modal" data-target="#modalagregarnotatodos">AGREGAR TODOS <span class=""><i class="fa fa-pencil"></i></span></button>
                                            REGISTRAR CALIFICACION
                                        </td>-->
                                         <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">
                                          REGISTRAR CALIFICACIONES
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
<!--                                        <th rowspan="1" colspan="1">
                                            NOMBRE ALUMNO
                                        </th>
                                        <th rowspan="1" colspan="1">
                                            NOTA
                                        </th>
                                        <th rowspan="1" colspan="1">
                                            OBSERVACION
                                        </th>-->
                                        
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    </div>
                <!-- FIN TABLA 00000000000000000000000000000000000000000000000000000000000-->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- MODAL PARA AGREGAR CALIFICACIONES-->
<div id="modalagregarnota" class="modal fade in" role="dialog" style="display: none; padding-left: 17px;">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#f39c12; color:white">

          <button type="button" class="close" data-dismiss="modal">×</button>

          <h4 class="modal-title">AGREGAR CALIFICACION</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL ID ALUMNO -->

            <div class="form-group">
                <div class="label text-sm" id="alumnoactual"></div>
                <br>

               <div class="input-group">
                   
                 <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>

                 <input type="number"  class="form-control input-lg" id="txtnota" name="nota" max="100" min="0" maxlength="3">


               </div>

             </div>


           </div>

        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        

        
      </form>
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="salirmodal1">Salir</button>

          <button type="submit" class="btn btn-primary" id="btnagrega">AGREGAR CALIFICACION</button>

        </div>
    </div>

  </div>

</div>

<!-- MODAL PARA AGREGAR CALIFICACIONES-->
<div id="modalagregarnotatodos" class="modal fade in" role="dialog" style="display: none; padding-left: 17px;">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#f39c12; color:white">

          <button type="button" class="close" data-dismiss="modal">×</button>

          <h4 class="modal-title">AGREGAR CALIFICACION</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL ID ALUMNO -->

            <div class="form-group">
                <div class="label text-sm" id="alumnoactual2"></div>
                <br>

               <div class="input-group">
                   
                 <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>

                 <input type="number"  class="form-control input-lg" id="txtnota2" name="nota" max="100" min="0" maxlength="3">


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

          <button class="btn btn-primary" id="btnagreganotaactual">AGREGAR CALIFICACION</button>
         
        </div>
    </div>

  </div>

</div>

<script>
    $(function () {
        $('#tblalumnos').DataTable()
        $('#tbl').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    });
</script>

<script src="../acead/vistas/js/registracalificaciones.js"></script>