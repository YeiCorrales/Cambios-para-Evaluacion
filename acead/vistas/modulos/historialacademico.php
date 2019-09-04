<div class="content-wrapper">

    <section class="content-header">

        <h1>

            HISTORIAL ACADEMICO

            <small>Revision</small>

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Tablero</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <!--    <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Title</h3>
        
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                          title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                  <div class="row">
                      
                  </div>
              </div>
               /.box-body 
              <div class="box-footer">
                Footer
              </div>
               /.box-footer
            </div>-->
        <!-- /.box -->
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Resumen de las asignaturas cursadas</h3><br>
<!--                    <button id="btnprint" class="btn btn-pinterest btnprint" name="btn
                            +print">IMPRIMIR HISTORIAL <span class=""><i class="fa fa-print"></i></span></button>-->
                </div>
               
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <!-- De aqui el show entries-->
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="tblhistorial" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="display:none;">alumno</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">NOMBRE ALUMNO</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 182px;">IDENTIDAD</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">MODALIDAD</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 199px;">ORIENTACION</th>
                                            <th>IMPRIMIR HISTORIAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<!--                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>-->
                                    </tbody>
                                    
                                    <tfoot>
                                        <!--<tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>-->
                                    </tfoot>
                                </table>
                               
                            </div>
                        </div>
                        
                    </div>

                    <!--  000000000000000000000000000000000000000000000000000000000000000000000000 -->


                </div> 

                <!-- /.box-body -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="../acead/vistas/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../acead/vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../acead/vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../acead/vistas/bower_components/fastclick/lib/fastclick.js"></script>

<script src="../acead/vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../acead/vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $('#tblhistorial').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
<script src="../acead/vistas/js/historialacademico.js"></script>
<script type="text/javascript">
//    pageSetup();

    var pagefunction = function () {
        var responsiveHelper_dt_basic = undefined;
        var responsiveHelper_datatable_fixed_column = undefined;
        var responsiveHelper_datatable_col_reorder = undefined;
        var responsiveHelper_datatable_tabletools = undefined;

        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };

        $('#tblhistorial').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12'f><'col-sm-6 hidden-xs'l>r>" + "t" + "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true
        });
        //carga_historial();
    };



    function carga_historial() {
        var tabla_historial = $('#tblhistorial').DataTable({
            "destroy": true,
            "ajax": {
                "method": "POST",
                "dataType": "json",
                "url": "../acead/modelos/alumnos.modelo.php?caso=cargahistorial"
            },
            "columns": [
                {"data": "idclase"},
                {"data": "codclase"},
                {"data": "nombreclase"},
                {"data": "nota"},
                {"data": "status"}
            ],
            "sDom": "<'dt-toolbar'<'col-xs-12'f><'col-sm-6 hidden-xs'l>r>" + "t" + "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true
        });
    }
    ;
</script>
