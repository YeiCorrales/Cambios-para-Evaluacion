<?php

$item = null;
$valor = null;

$Contadoralumnos = ControladorAlumnos::ctrMostrarAlumnos($item, $valor);
$totalAlumnos = Count($Contadoralumnos);

$Contadorusuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
$totalUsuarios = Count($Contadorusuarios);

$ContadorMatricula = ControladorMatricula::ctrMostrarMatricula($item, $valor);
$totalMatricula = Count($ContadorMatricula);


  ?>


<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo Number_format($totalAlumnos);?></h3>

              <p>Alumnos Registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="alumnos" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo Number_format($totalUsuarios);?></h3>

              <p>Docentes Activos</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="usuarios" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo Number_format($totalMatricula);?></h3>

              <p>Matrícula Actual</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="gestionacademica" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Mensualidad</h3>

              <p>Pagos</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="pagomes" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
