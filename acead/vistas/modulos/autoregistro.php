<!DOCTYPE html>
<html lang="es">
  
  <head>
    <title>Academia CEAD</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

     <!--=====================================
    PLUGINS DE CSS
    ======================================-->
    <link rel="icon" href="vistas/img/plantilla/icono-negro.png">
    <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

    <!--=====================================
    PLUGINS DE JAVASCRIPT
    ======================================-->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

  </head>
  
  <body class="hold-transition skin-blue sidebar-collapse ">

    <div class="content-wrapper">

      <section class="content">
        <div class="panel panel-primary ">
          <div class="panel-heading">
              <h3 class="text-center"><strong>Registrar Nuevo Usuario</strong>s</h3>
          </div>
          
          <div class="panel-body pg-info">                
              <form role="form">

                  <div class="form-group row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <label for="pNombre">Primer Nombre</label>
                      <input type="text" id="pNombre" onKeyUp="this.value=this.value.toUpperCase();" class="form-control" placeholder="Primer Nombre" required > 
                     </div>
                     <div class="col-xs-4 col-sm-4 col-md-4">
                      <label for="sNombre">Segundo Nombre</label>
                        <input type="text" id="sNombre" onKeyUp="this.value=this.value.toUpperCase();" class="form-control" placeholder="Segundo Nombre" required >
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <label for="pApellido">Primer Apellido</label>
                      <input type="text" id="pApellido" onKeyUp="this.value=this.value.toUpperCase();" class="form-control" placeholder="Primer Apellido" required >
                    </div>  
                  </div>

                  <div class="form-group row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <label for="sApellido">Segundo Apellido</label>
                      <input type="text" id="sApellido" onKeyUp="this.value=this.value.toUpperCase();" class="form-control" placeholder="Segundo Apellido" >
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <label for="pn">Cedula</label>
                      <input type="number" id="cedula" onKeyUp="this.value=this.value.toUpperCase();" class="form-control" placeholder="9999888800111" required >
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <label for="telefono">Telefono</label>                  
                      <input type="number" id="telefono" onKeyUp="this.value=this.value.toUpperCase();" class="form-control" aria-describedby="emailHelp" placeholder="99999999" required >
                    </div> 
                  </div>                    
                  
                  <div class="form-group row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <label for="genero">Genero</label>
                      <select class="form-control" id="genero">
                        <option selected="true" value="null" >Elija un Genero</option>
                      </select>
                     </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <label for="estadoCivil">Estado Civil</label>
                      <select class="form-control" id="estadoCivil">
                        <option selected="true" value="null" >Elija un Estado Civil</option>
                      </select>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <label for="departamento">Departamento</label>
                      <select class="form-control" id="departamento">
                        <option selected="true" value="null" >Elija un Departamento</option>
                      </select>
                    </div>
                  </div>  

                  <div class="form-group row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <label for="correo">Correo</label>          
                      <input type="email" id="correo" class="form-control" aria-describedby="emailHelp" placeholder="ejemplo@prueba.com" required >
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <label for="usuario">Usuario</label>
                      <input type="text" id="usuario" onKeyUp="this.value=this.value.toUpperCase();" class="form-control" placeholder="Nombre de Usuario"  required > 
                    </div> 
                  </div>                                        

                  <div class="form-group row">                         
                    <div class="col-xs-4 col-sm-4 col-md-4">                            
                      <label for="contraseña">Contraseña </label>    
                      <input type="password" id="contrasena" class="form-control" aria-describedby="emailHelp" placeholder="Contraseña" required>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">                            
                      <label for="confirmarContraseña">Confirmar Contraseña </label>    
                      <input type="password" id="confirmarContrasena" class="form-control" aria-describedby="emailHelp" placeholder="Contraseña" required >
                    </div>
                  </div>
              </form>                        
          </div>           
          <div class="panel-footer text-right">
            <a class="btn btn-success" href="aceads" role="button">
              <span class="glyphicon glyphicon-user"></span>Login
            </a>
            <button type="button " class="btn btn-info " id="guardar">
              <span class="glyphicon glyphicon-save"></span> Guardar
            </button>
          </div>
        </div>    
      </section>

    </div>
        
    <?php include "footer.php"; ?>
      
    <script type="text/javascript" src="../acead/vistas/js/autoRegistro.js"></script>

  </body>

</html>