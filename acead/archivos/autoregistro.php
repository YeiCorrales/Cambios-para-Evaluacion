<?php require 'initPage.php'; ?>

  <div class="container">
      <div class="panel panel-primary ">
          <div class="panel-heading">
              <h3 class="text-center"><strong>Registrar Nuevo Usuario</strong>s</h3>
          </div>
          
          <div class="panel-body">                
              <form role="form">

                  <div class="form-group row">
                      <div class="col-xs-4 col-sm-4 col-md-4">
                              <label for="pNombre">Primer Nombre</label>
                              <input type="text" id="pNombre" class="form-control" placeholder="Primer Nombre" required> 
                       </div>
                       <div class="col-xs-4 col-sm-4 col-md-4">
                              <label for="sNombre">Segundo Nombre</label>
                              <input type="text" id="sNombre" class="form-control" placeholder="Segundo Nombre" required> 
                      </div>
                       <div class="col-xs-4 col-sm-4 col-md-4">
                              <label for="pApellido">Primer Apellido</label>
                              <input type="text" id="pApellido" class="form-control" placeholder="Primer Apellido" required> 
                      </div>  
                  </div>

                  <div class="form-group row">
                      <div class="col-xs-4 col-sm-4 col-md-4">
                              <label for="sApellido">Segundo Apellido</label>
                              <input type="text" id="sApellido" class="form-control" placeholder="Segundo Apellido"> 
                       </div>

                       <div class="col-xs-4 col-sm-4 col-md-4">
                          <label for="pn">Cedula</label>
                          <input type="number" id="cedula" class="form-control" placeholder="9999888800111" required> 
                      </div>
                       <div class="col-xs-4 col-sm-4 col-md-4">
                          <label for="telefono">Telefono</label>                  
                          <input type="number" id="telefono" class="form-control" aria-describedby="emailHelp" placeholder="99999999">
                      </div> 
                  </div>                    
                  
                  <div class="form-group row">
                      <div class="col-xs-4 col-sm-4 col-md-4">
                              <label for="genero">Genero</label>
                              <select class="form-control">
                                <option>Masculino</option>
                                <option>Femenino</option>                                  
                              </select>
                       </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                              <label for="estadoCivil">Estado Civil</label>
                              <select class="form-control">
                                <option>Soltero</option>
                                <option>Casado</option>
                                <option>Divorciado</option>                                  
                              </select>
                       </div>
                      <div class="col-xs-4 col-sm-4 col-md-4">
                          <label for="departamento">Departamento</label>
                          <select class="form-control">
                            <option>Francisco Morazan</option>
                            <option>Choluteca</option>
                            <option>Atlantida</option>
                            <option>Olancho</option>                
                          </select>
                       </div>
                  </div>  

                  <div class="form-group row">
                       <div class="col-xs-4 col-sm-4 col-md-4">
                          <label for="correo">Correo</label>          
                          <input type="email" id="correo" class="form-control" aria-describedby="emailHelp" placeholder="ejemplo@prueba.com">
                      </div>
                      <div class="col-xs-4 col-sm-4 col-md-4">
                              <label for="usuario">Usuario</label>
                              <input type="text" id="usuario" class="form-control" placeholder="Nombre de Usuario" required> 
                       </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                          <label for="rol">Rol</label>
                          <select class="form-control">
                            <option>Administrador</option>
                            <option>Super Usuario</option>
                            <option>Maestro</option>
                            <option>Alumno</option>                
                          </select>
                       </div> 
                  </div>                                        

                  <div class="form-group row">                         
                      <div class="col-xs-4 col-sm-4 col-md-4">                            
                          <label for="contraseña">Contraseña </label>    
                          <input type="password" id="contrasena" class="form-control" aria-describedby="emailHelp" placeholder="Contraseña">
                      </div>
                      <div class="col-xs-4 col-sm-4 col-md-4">                            
                          <label for="confirmarContraseña">Confirmar Contraseña </label>    
                          <input type="password" id="confirmarContrasena" class="form-control" aria-describedby="emailHelp" placeholder="Contraseña">
                      </div>
                  </div>

                  <div class="form-group text-right">                         
                    <button type="button " class="btn btn-success" id="login">
                        <span class="glyphicon glyphicon-user"></span>Login
                    </button> 
                    <button type="button " class="btn btn-info " id="guardar">
                        <span class="glyphicon glyphicon-save"></span> Guardar
                    </button>
                    <button type="button " class="btn btn-danger" id="cancelar">
                        <span class="glyphicon glyphicon-remove"></span> Cancelar
                    </button>
                  </div>       
              </form>                        
          </div>           
      </div>    
    </div>

<?php require 'footer.php'; ?>
<?php require 'finishPage.php'; ?>