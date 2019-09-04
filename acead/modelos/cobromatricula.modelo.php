  <?php   require_once "conexion.php";

class ModeloCobroMatricula
{
  /*============== REGISTRO COBRO DE MATRICULA       =============================================*/
  static public function mdlIngresarMatriculaCobrada($tabla, $datos)
  {
    $stmt = ConexionBD::Abrir_Conexion()->prepare("INSERT INTO  $tabla
                                                                ( Id_Cobro,
                                                                  Id_Alumno,
                                                                  TotalMatricula    )
                                                        VALUES  ( :IdCobro,
                                                                  :IdAlumno,
                                                                  :totalmatricula1  )");
    $stmt->bindParam(":IdCobro",          $datos["Id_cobro"],       PDO::PARAM_STR);
    $stmt->bindParam(":IdAlumno",         $datos["Id_Alumno"],      PDO::PARAM_STR);
    $stmt->bindParam(":totalmatricula1",  $datos["TotalMatricula"], PDO::PARAM_STR);

    if($stmt->execute())
    {
      return "ok";
    }
    else
    {
      return "error";
      echo "<script type='text/javascript'>alert('neles')</script>";
    }
    $stmt->close();
    $stmt = null;
  }

 
/*====================  MOSTRAR PAGOS DE MATRICULA COBRADOS ===================================*/
        static public function mdlPagosMatricula($ida)
        {    
            if($ida !== null)
            {
                $stmt0 = ConexionBD::Abrir_Conexion()->prepare("select  concat(TA.PrimerNombre, ' ', TA.SegundoNombre, ' ', TA.PrimerApellido, ' ', TA.segundoapellido) AS nombre,TCM.TotalMatricula AS TM from tbl_cobromatricula TCM inner join tbl_alumnos TA on TCM.Id_Alumno = TA.Id_Alumno WHERE TA.Id_Alumno = ".$ida.";");
                $stmt0->execute();
                $resultado0 = $stmt0->fetchAll(PDO::FETCH_BOTH);
                
                return $resultado0;
            }   
            
            
        }

/*====================  MOSTRAR VALIDAR PAGOS DE MATRICULA YA COBRADOS =============================*/
static public function metodo_verificarpagomatri()
{
    //Recibiendo los parametros del ajax
    $ida = filter_input(INPUT_POST, 'Id_Alumno');
    $ico = filter_input(INPUT_POST, 'Id_cobro');
    $tom = filter_input(INPUT_POST, 'TotalMatricula');
    // = filter_input(INPUT_POST, 'Id_PeriodoAcm');
    $tabla = "tbl_cobromatricula";

    //Obtener el ID del periodo actual para evaluar que no este matriculado en este periodo
  /*  $stmtA = ConexionBD::Abrir_Conexion()->prepare("SELECT PA.id_periodoacm AS IDP FROM tbl_periodoacademico PA WHERE NOW() >= FechaInicio AND NOW() <= FechaFin;");
    $stmtA->execute();
    $resultadoA = $stmtA->fetchAll(PDO::FETCH_BOTH);
    $idPeriodoActual = $resultadoA[0]['IDP'];*/

    //Query que valida si el alumno ya está matriculado según el resto de parámetros
    $stmtB = ConexionBD::Abrir_Conexion()->prepare("SELECT COUNT(*) AS cantidad FROM tbl_cobromatricula TM INNER JOIN tbl_alumnos TPA ON TM.Id_Alumno= TPA.Id_Alumno WHERE TM.id_alumno = ".$ida." AND TM.Id_cobro = ".$ico." AND TM.TotalMatricula= ".$tom.";");
    $stmtB->execute();
    $resultadoB = $stmtB->fetchAll(PDO::FETCH_BOTH);
    $cantidadResult = $resultadoB[0]['cantidad'];

    if($cantidadResult > 0)
    {   //No lo puede matricular
        echo json_encode('0');
    }
    else
    {   //Si lo puede matricular
        echo json_encode('1');
    }
}


}
