<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Seguridad
      
      <small>Control de contraseña</small>
    
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
        <h3 class="box-title">Cambio de contraseña</h3>

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
              <div class="col-md-12">
                  <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password actual</label>
                 <div class="input-group">
                      
                       <input type="password" class="form-control" id="passactual" name="passactual" placeholder="Contraseña proporcionada por el administrador">
                       <span class="input-group-btn"> 
                       <button id="btnojito1" class="btn btn-default reveal1" type="button"> <i class="fa fa-eye" id="ojito"></i></button>
                       </span>                          
             
                </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nuevo password</label>
                 <div class="input-group">
                      
                       <input type="password" class="form-control" id="nuevopass" name="nuevopass" placeholder="Nueva contraseña">
                       <span class="input-group-btn"> 
                       <button id="btnojito2" class="btn btn-default reveal1" type="button"> <i class="fa fa-eye" id="ojito"></i></button>
                       </span>                          
             
                </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirmar Password</label>
                  <div class="input-group">
                      
                       <input type="password" class="form-control" id="confirmapass" name="confirmapass" placeholder="Confirma la nueva contraseña">
                       <span class="input-group-btn"> 
                       <button id="btnojito3" class="btn btn-default reveal1" type="button"> <i class="fa fa-eye" id="ojito"></i></button>
                       </span>                          
             
                </div>
                </div>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary" id="btnenviar">Guardar</button>
              </div>
            </form>
              </div>
          </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer" id="pie1">
              
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="../acead/vistas/js/cambiopassedit.js"></script>
