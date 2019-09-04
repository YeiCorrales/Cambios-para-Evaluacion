<?php   require_once "conexion.php";

class ModeloPrecio
{
  
   /*=============================================
   SELECT
  =============================================*/
  static public function MdlPrecio($tabla)
  {
    $stmt = ConexionBD::Abrir_Conexion()->prepare("SELECT * FROM $tabla");
    $stmt -> execute();
    return $stmt -> fetchall();
  }

}
?>