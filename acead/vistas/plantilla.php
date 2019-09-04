<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Academia CEAD</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/icono-negro.png">

   <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">

  <!-- CSS checkbox -->
  <link rel="stylesheet" href="vistas/dist/css/check.css">

  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

  <!-- bootstrap datepicker -->
  <script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">

  <?php
  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
   echo '<div class="wrapper">';
    /*=============================================
    CABEZOTE
    =============================================*/
    include "modulos/cabezote.php";
    /*=============================================
    MENU
    =============================================*/
    include "modulos/menu.php";
    /*=============================================
    CONTENIDO
    =============================================*/
    if(isset($_GET["ruta"])){
      if($_GET["ruta"] == "inicio" ||
         $_GET["ruta"] == "usuarios" ||
         $_GET["ruta"] == "alumnos" ||
         $_GET["ruta"] == "autoregistro" ||
         $_GET["ruta"] == "gestionacademica" ||
         $_GET["ruta"] == "modalidades" ||
         $_GET["ruta"] == "orientaciones" ||
         $_GET["ruta"] == "seccion" ||
         $_GET["ruta"] == "clases" ||
         $_GET["ruta"] == "ventas" ||
         $_GET["ruta"] == "crear-venta" ||
         $_GET["ruta"] == "reportes" ||
         $_GET["ruta"] == "preguntas" ||
         $_GET["ruta"] == "cambiopass" ||
         $_GET["ruta"] == "cambiapasspreg" ||
         $_GET["ruta"] == "cambiocontrasena" ||
         $_GET["ruta"] == "recupera" ||
         $_GET["ruta"] == "historialacademico" ||
         $_GET["ruta"] == "configuracion" ||
         $_GET["ruta"] == "periodoacademico" ||
         $_GET["ruta"] == "registracalificaciones" ||
         $_GET["ruta"] == "pagomes" ||
         $_GET["ruta"] == "cobromatricula" ||
         $_GET["ruta"] == "preguntasedit" ||
         $_GET["ruta"] == "alumdata" ||
         $_GET["ruta"] == "roles" ||
         $_GET["ruta"] == "cambiopassedit" ||
         $_GET["ruta"] == "salir"){
        include "modulos/".$_GET["ruta"].".php";
      }else{
        include "modulos/404.php";
      }
    }else{
      include "modulos/inicio.php";
    }
    /*=============================================
    FOOTER
    =============================================*/
    include "modulos/footer.php";
    echo '</div>';
    //rutas que se requieren sin manejo de sesion(por ejemplo recuperacion de contraseña etc)
  }else{
    //include "modulos/login.php";
      if(isset($_GET['ruta'])){
          if($_GET["ruta"] == "inicio" ||
                $_GET["ruta"] == "" ||
                $_GET["ruta"] == "" ||
                $_GET["ruta"] == "autoregistro" ||
                $_GET["ruta"] == "cambiocontrasena" ||
                $_GET["ruta"] == "cambiopass" ||
                $_GET["ruta"] == "cambiocontrasena-correo" ||
                $_GET["ruta"] == "metodorecup" ||
                $_GET["ruta"] == "contestapreg" ||
                $_GET["ruta"] == "" ||
                $_GET["ruta"] == "preguntas" ||
                $_GET["ruta"] == "cambiopass" ||
                $_GET["ruta"] == "recupera" ||
                $_GET["ruta"] == "cambiapasspreg" ||
                $_GET["ruta"] == "salir"){
               include "modulos/".$_GET["ruta"].".php";
             }else{
                 include "modulos/login.php";
             }
      } else{
           include "modulos/login.php";
      }
  }
  ?>


<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/alumnos.js"></script>
<script src="vistas/js/ctrespacios.js"></script>
<script src="vistas/js/matricula1.js"></script>
<script src="vistas/js/modalidades.js"></script>
<script src="vistas/js/configuracion.js"></script>
<script src="vistas/js/orientaciones.js"></script>
<script src="vistas/js/periodoacm.js"></script>
<script src="vistas/js/gestionacademica.js"></script>
<script src="vistas/js/clases.js"></script>
<script src="vistas/js/cobromatricula.js"></script>
<script src="vistas/js/historialacademico.js"></script>
<script src="vistas/js/mostrarprecio.js"></script>
<script src="vistas/js/pagomes.js"></script>
<script src="vistas/js/seccion.js"></script>
<script src="vistas/js/roles.js"></script>
<script src="vistas/js/aulas.js"></script>

</body>
</html>
