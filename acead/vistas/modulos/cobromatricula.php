<div class="content-wrapper">
  <section class="content-header">
    <h1>      Reportes de Pagos de Matrícula   </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Reportes de Pagos de Matricula</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">


<!-- BOTON AGREGAR ALUMNOS -->
      <div class="box-header with-border">
        <a class="btn btn-primary" href="../acead/extensiones/tcpdf/examples/reportecobrosmatri.php">
          Mostrar Reporte General de Pagos
        </a>
      </div>


      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th style="width:10px">Id</th>
           <th>Primer Nombre</th>
           <th>Primer Apellido</th>
           <th>Comprobante de Pago</th>
         </tr>
        </thead>

        <tbody>
        <?php
        $item = null;
        $valor = null;
       $alumnos = ControladorAlumnos::ctrMostrarAlumnos($item, $valor);
       foreach ($alumnos as $key => $value)
       {
         echo ' <tr>
                 <td>'.($key+1).'</td>
                 <td>'.$value["Id_Alumno"].'</td>
                 <td>'.$value["PrimerNombre"].'</td>
                 <td>'.$value["PrimerApellido"].'</td>
                  ';


                 echo '  <td>

                    <div class="btn-group">
                    <button class="btn btn-info btnfacturamatri" idAlumno="'.$value["Id_Alumno"].'">
                    <i class="fa fa-print"></i></button>
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
