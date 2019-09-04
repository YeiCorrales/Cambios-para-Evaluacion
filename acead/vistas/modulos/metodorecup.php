<!-- 
archivo:            formulario del metodo de recuperacion de contraseña
autor:              nicolle varela
fecha:              02/2019
correo:             nicollevarela1995@gmail.com
proyecto:           academia cead
-->

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Seguridad del Sistema
  
      
      <small>Seleccionar metodo de recuperacion de constraseña</small>
    
    </h1>

    

  </section>

  <!-- Main content -->
  <section class="content">
<!-- contenido del formulario-->
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Datos requeridos</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
       <div class="box box-success">
            <div class="box-header with-border">
             
            </div>
            <div class="box-body">
                <div class="form-group" style="margin-left: auto; margin-right: auto; width: 50%;">
                    <input class="form-control input-lg " type="text" placeholder="ingresa el usuario" maxlength="15" minlength="5" style="text-transform: uppercase" autofocus autocomplete="off" required="" name="txtusuario">
                </div>
              <br>
              <div class="form-group" style="margin-left: auto; margin-right: auto; width: 50%;">
                  <button type="button" class="btn btn-block btn-primary " id="recupcorreo">Recuperacion por correo</button>
                  <button type="button" class="btn btn-block btn-primary " id="recupreguntas">Recuperacion por preguntas</button>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--archivo js asociado al formulario(jquery- ajax)-->
<script src="../acead/vistas/js/metodorecup.js"></script>