<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Roles de Usuario

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Roles de Usuario</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

<!-- BOTON AGREGAR ROL -->
      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarRol">

          Agregar Rol

        </button>

      </div>


      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Nombre Rol</th>
           <th>Descripcion</th>
           <th>Creado Por</th>
           <th>Fecha de Creacion</th>
           <th>Modificado Por</th>
           <th>Fecha de Modificacion</th>
           <th>Acciones</th>

         </tr>

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $roles = ControladorRoles::ctrMostrarRoles($item, $valor);

       foreach ($roles as $key => $value){

         echo ' <tr>
                 <td>'.($key+1).'</td>
                 <td>'.$value["Rol"].'</td>
                 <td>'.$value["DescripRol"].'</td>
                 <td>'.$value["CreadoPor"].'</td>
                 <td>'.$value["FechaCreacion"].'</td>
                 <td>'.$value["ModificadoPor"].'</td>
                 <td>'.$value["FechaModificacion"].'</td>';


                 echo '  <td>

                    <div class="btn-group">

                    <button class="btn btn-warning btnEditarAlumno" title="Editar" idAlumno="'.$value["Id_Rol"].'" data-toggle="modal" data-target="#modalEditarAlumno"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger btnEliminarAlumno" title="Eliminar" idAlumno="'.$value["Id_Rol"].'"><i class="fa fa-times"></i></button>

                    </div>

                  </td>

                </tr>';
        }


        ?>


        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>


<!--=====================================
MODAL AGREGAR ROL
======================================-->

<div id="modalAgregarRol" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Rol</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DEL ROL -->

            <div class="form-group">

              <div class="input-group" title="Nombre del Rol">

                <span class="input-group-addon"><i class="fa fa-user" title="Nombre del Rol"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoRoles" id="nuevoRoles" placeholder="NOMBRE DEL ROL" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCION DEL ROL -->

            <div class="form-group">

              <div class="input-group" title="Descripcion del Rol">

                <span class="input-group-addon"><i class="fa fa-asterisk" title="Descripcion del Rol"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDescripRol" id="nuevoDescripRol" placeholder="DESCRIPCION DEL ROL" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|" style="text-transform: uppercase" required>

              </div>

            </div>

        <section class="content">

        <!-- =============================================
          SELECCIONAR PERMISOS PARA EL ROL

          Referencias:
          VP: Ver Pantalla
          AG: Agregar
          ED: Editar
          MA: Matricular
          BR: Borrar
          IR: Imprimir Reporte
          ============================================= -->

        <!-- =============================================
          USUARIOS
          ============================================= -->
          <div class="box">

            <div class="box-header with-border">
              <h3 class="box-title" style="weight:bold">Usuarios</h3>

                  <div class="box-tools pull-right">
                    <button class="btn collapsible" data-widget="collapse" data-toggle="collapse show" title="Minimizar">
                      <i class="fa fa-minus"></i></button>
                  </div>
            </div>

            <div class="box-body">
              <div class="form-group">
                  <label class="container">Ver Pantalla de Usuarios
                    <input type="checkbox" name="VPUsuarios" id="VPUsuarios">
                    <span class="checkmark"></span>
                  </label>

                  <label class="container">Agregar Usuarios
                    <input type="checkbox" name="AGUsuarios" id="AGUsuarios">
                    <span class="checkmark"></span>
                  </label>

                  <label class="container">Editar Usuarios
                    <input type="checkbox" name="EDUsuarios" id="EDUsuarios">
                    <span class="checkmark"></span>
                  </label>

                  <label class="container">Ver Pantalla de Roles
                    <input type="checkbox" name="VPRoles" id="VPRoles">
                    <span class="checkmark"></span>
                  </label>

                  <label class="container">Agregar Roles
                    <input type="checkbox" name="AGRoles" id="AGRoles">
                    <span class="checkmark"></span>
                  </label>

                  <label class="container">Editar Roles
                    <input type="checkbox" name="EDRoles" id="EDRoles">
                    <span class="checkmark"></span>
                  </label>
              </div>
            </div>

          </div>

        <!-- =============================================
          ALUMNOS
          ============================================= -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Alumnos</h3>

                  <div class="box-tools pull-right">
                    <button class="btn collapsible" data-widget="collapse" data-toggle="collapse show" title="Minimizar">
                      <i class="fa fa-minus"></i></button>
                  </div>
            </div>

            <div class="box-body">
              <div class="form-group">
                  <label class="container">Ver Pantalla de Alumnos
                    <input type="checkbox" name="VPAlumnos" id="VPAlumnos">
                    <span class="checkmark"></span>
                  </label>

                  <label class="container">Agregar Alumnos
                    <input type="checkbox" name="AGAlumnos" id="AGAlumnos">
                    <span class="checkmark"></span>
                  </label>

                  <label class="container">Editar Alumnos
                    <input type="checkbox" name="EDAlumnos" id="EDAlumnos">
                    <span class="checkmark"></span>
                  </label>

                  <label class="container">Matricular Alumnos
                    <input type="checkbox" name="MAAlumnos" id="MAAlumnos">
                    <span class="checkmark"></span>
                  </label>

                  <label class="container">Borrar Alumnos
                    <input type="checkbox" name="BRAlumnos" id="BRAlumnos">
                    <span class="checkmark"></span>
                  </label>

                  <label class="container">Imprimir Reportes de Alumnos
                    <input type="checkbox" name="IRAlumnos" id="IRAlumnos">
                    <span class="checkmark"></span>
                  </label>

                  <label class="container">Ver Historial Academico
                    <input type="checkbox" name="VPHistorial" id="VPHistorial">
                    <span class="checkmark"></span>
                  </label>

                  <label class="container">Imprimir Reportes de Historial Academico
                    <input type="checkbox" name="IRHistorial" id="IRHistorial">
                    <span class="checkmark"></span>
                  </label>
              </div>
            </div>

          </div>

          <!-- =============================================
              GESTION ACADEMICA
            ============================================= -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Gestion Academica</h3>

                    <div class="box-tools pull-right">
                      <button class="btn collapsible" data-widget="collapse" data-toggle="collapse show" title="Minimizar">
                        <i class="fa fa-minus"></i></button>
                    </div>
              </div>

              <div class="box-body">
                <div class="form-group">
                    <label class="container">Ver Pantalla de Matricula Historica
                      <input type="checkbox" name="VPMatHisorica" id="VPMatHisorica">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Imprimir Reportes de Matricula
                      <input type="checkbox" name="IRMatHistorica" id="IRMatHistorica">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Ver Pantalla de Administracion
                      <input type="checkbox" name="VPAdministracion" id="VPAdministracion">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Agregar Modalidades
                      <input type="checkbox" name="AGModalidades" id="AGModalidades">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Editar Modalidades
                      <input type="checkbox" name="EDModalidades" id="EDModalidades">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Agregar Orientaciones
                      <input type="checkbox" name="AGOrientaciones" id="AGOrientaciones">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Editar Orientaciones
                      <input type="checkbox" name="EDOrientaciones" id="EDOrientaciones">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Agregar Clases
                      <input type="checkbox" name="AGClases" id="AGClases">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Editar Clases
                      <input type="checkbox" name="EDClases" id="EDClases">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Imprimir Reportes de Administracion
                      <input type="checkbox" name="IRAdministracion" id="IRAdministracion">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Ver Pantalla de Secciones
                      <input type="checkbox" name="VPSecciones" id="VPSecciones">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Agregar Secciones
                      <input type="checkbox" name="AGSecciones" id="AGSecciones">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Editar Secciones
                      <input type="checkbox" name="EDSecciones" id="EDSecciones">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Agregar Aulas
                      <input type="checkbox" name="AGAulas" id="AGAulas">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Editar Aulas
                      <input type="checkbox" name="EDAulas" id="EDAulas">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Imprimir Reportes de Secciones
                      <input type="checkbox" name="IRSecciones" id="IRSecciones">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Ver Pantalla de Periodo Academico
                      <input type="checkbox" name="VPPeriodoAcm" id="VPPeriodoAcm">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Agregar Periodo Academico
                      <input type="checkbox" name="AGPeriodoAcm" id="AGPeriodoAcm">
                      <span class="checkmark"></span>
                    </label>

                    <label class="container">Editar Periodo Academico
                      <input type="checkbox" name="EDPeriodoAcm" id="EDPeriodoAcm">
                      <span class="checkmark"></span>
                    </label>
                </div>
              </div>

            </div>

            <!-- =============================================
              CALIFICACIONES
              ============================================= -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Calificaciones</h3>

                      <div class="box-tools pull-right">
                        <button class="btn collapsible" data-widget="collapse" data-toggle="collapse show" title="Minimizar">
                          <i class="fa fa-minus"></i></button>
                      </div>
                </div>

                <div class="box-body">
                  <div class="form-group">
                      <label class="container">Ver Pantalla de Calificaciones
                        <input type="checkbox" name="VPCalificaciones" id="VPCalificaciones">
                        <span class="checkmark"></span>
                      </label>

                      <label class="container">Agregar Calificaciones
                        <input type="checkbox" name="AGCalificaciones" id="AGCalificaciones">
                        <span class="checkmark"></span>
                      </label>

                      <label class="container">Editar Calificaciones
                        <input type="checkbox" name="EDCalificaciones" id="EDCalificaciones">
                        <span class="checkmark"></span>
                      </label>

                      <label class="container">Imprimir Reporte de Calificaciones
                        <input type="checkbox" name="IRCalificaciones" id="IRCalificaciones">
                        <span class="checkmark"></span>
                      </label>
                  </div>
                </div>

              </div>

              <!-- =============================================
                COBROS
                ============================================= -->
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Cobros</h3>

                        <div class="box-tools pull-right">
                          <button class="btn collapsible" data-widget="collapse" data-toggle="collapse show" title="Minimizar">
                            <i class="fa fa-minus"></i></button>
                        </div>
                  </div>

                  <div class="box-body">
                    <div class="form-group">
                        <label class="container">Ver Pantalla de Cobros
                          <input type="checkbox" name="VPCobros" id="VPCobros">
                          <span class="checkmark"></span>
                        </label>

                        <label class="container">Agregar Pagos
                          <input type="checkbox" name="AGPagos" id="AGPagos">
                          <span class="checkmark"></span>
                        </label>

                        <label class="container">Imprimir Reportes de Pagos
                          <input type="checkbox" name="IRPagos" id="IRPagos">
                          <span class="checkmark"></span>
                        </label>
                    </div>
                  </div>

                </div>

                <!-- =============================================
                  CONFIGURACIONES
                  ============================================= -->
                  <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Configuraciones</h3>

                          <div class="box-tools pull-right">
                            <button class="btn collapsible" data-widget="collapse" data-toggle="collapse show" title="Minimizar">
                              <i class="fa fa-minus"></i></button>
                          </div>
                    </div>

                    <div class="box-body">
                      <div class="form-group">
                          <label class="container">Ver Pantalla de Configuraciones
                            <input type="checkbox" name="VPConfig" id="VPConfig">
                            <span class="checkmark"></span>
                          </label>

                          <label class="container">Editar Parametros Generales
                            <input type="checkbox" name="EDParametros" id="EDParametros">
                            <span class="checkmark"></span>
                          </label>

                          <label class="container">Editar Precios
                            <input type="checkbox" name="EDPrecios" id="EDPrecios">
                            <span class="checkmark"></span>
                          </label>

                          <label class="container">Agregar Descuentos
                            <input type="checkbox" name="AGDescuentos" id="AGDescuentos">
                            <span class="checkmark"></span>
                          </label>

                          <label class="container">Editar Descuentos
                            <input type="checkbox" name="EDDescuentos" id="EDDescuentos">
                            <span class="checkmark"></span>
                          </label>
                      </div>
                    </div>

                  </div>


        </section>


          </div>

        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Rol</button>

        </div>

        <?php

          $crearROL = new ControladorRoles();
          $crearROL -> ctrAgregarRoles();

        ?>
        <script src="vistas/js/ctrespacios.js"></script>

      </form>

    </div>

   </div>

  </div>

</div>





<?php

  $borrarAlumno = new ControladorAlumnos();
  $borrarAlumno -> ctrBorrarAlumno();

?>
