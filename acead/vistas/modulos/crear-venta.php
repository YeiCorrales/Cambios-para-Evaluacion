<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Matricula

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Matricula</li>

    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
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
        Start creating your amazing application!
        </div>

        <!-- ENTRADA PARA SELECCIONAR EL ALUMNO -->

        <div class="form-group">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-users"></i></span>

            <select class="form-control input-lg" name="nuevoDpto">

              <option value="">Seleccionar Alumno</option>

              <?php

              $alum = ControladorMatricula::ctrCargarSelectAlumnos();
              foreach ($alum as $key => $value) {
                echo "<option value='".$value['Id_Alumno']."'>".$value['PrimerNombre']."</option>";
              }
              ?>

            </select>

          </div>

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
