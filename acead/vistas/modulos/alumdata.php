<div id="alumdata" class="content-wrapper">

  <section class="content-header">

    <h1>

      Matricula Alumno

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>

      <li><a href="alumnos"><i class="active"></i>Alumnos</a></li>

      <li class="active">Matrícula Alumno</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <!-- NOMBRE DEL ALUMNO -->


      <div class="box-header with-border">

          <font weight="500" style="color:#4e1f81" size="5">Nombre del Alumno: </font>

             <?php
             $item = "Id_Alumno";
             $valor = $_GET["idAlumno"];
             //$d = $_GET["idAlumno"];

             $alumno = ControladorAlumnos::ctrMostrarAlumnos($item, $valor);

             echo '<div style="font-size:1.25em">'.$p= $alumno["PrimerNombre"].' '.$alumno["PrimerApellido"].'</div>';

              ?>

           <br>

           <font font-weight:"500" style="color:#4e1f81" size="4">Numero de Identidad: </font>

           <?php
           echo '<div style="font-size:1.25em">'.$alumno["Cedula"].'</div>';

           ?>

      </div>

      <!-- BOTON AGREGAR ALUMNOS -->
            <div class="box-header with-border">

              <h4>

              Clases Matriculadas

            </h4>

            <br>

            <?php echo '<button class="btn btn-primary  btnAgregarMatricula" idAlumno="'.$alumno["Id_Alumno"].'" nombre="'.$alumno["PrimerNombre"].'" data-toggle="modal" data-target="#modalMatriculaAlumno">Agregar Clases</button>'; ?>


            </div>



      <!-- MATRICULA DE CLASES -->


      <div class="box-body">

              <table class="table table-bordered table-striped dt-responsive tablas">

                  <thead>

                   <tr>

                     <th style="width:10px">#</th>
                     <th>Modalidad</th>
                     <th>Orientacion</th>
                     <th>Clase</th>
                     <th>Seccion</th>

                     <th>Acciones</th>

                   </tr>

                  </thead>

                  <tbody>

                    <?php

            	         //Keren was here!

                    //public $idAlumno;

                    $item = null;
                    $valor = null;
                    $d = $_GET["idAlumno"];

                    $matricula = ControladorMatricula::ctrMostrarMatriculaAlumno($d);

                   foreach ($matricula as $key => $value){

                      echo ' <tr>
                              <td>'.($key+1).'</td>
                              <td>'.$value["DMOD"].'</td>
                              <td>'.$value["DORI"].'</td>
                              <td>'.$value["DCLASE"].'</td>
                              <td>'.$value["DSEC"].'</td>';


                              echo '<td>

                                <div class="btn-group">

                                  <button class="btn btn-danger btnEliminarMatricula" idAlumno="'.$value["IDA"].'" idMatricula="'.$value["IDMAT"].'"><i class="fa fa-times"></i></button>

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



<?php

include 'matricula1.php';

 ?>

 <?php

   $borrarMatricula = new ControladorMatricula();
   $borrarMatricula -> ctrBorrarMatricula();

 ?>

<script src="../acead/vistas/js/matricula1.js"></script>
