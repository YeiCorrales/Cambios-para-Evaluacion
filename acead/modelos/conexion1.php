<?php
    /*
    $servidor = "localhost";
    $usuario = "root";
    $password = "";

    $db = "ACADEMIACEAD";
    $mysqli = new mysqli($servidor, $usuario, $password, $db);
    mysqli_set_charset($mysqli, 'utf8'); */

  define("bd_h", "localhost");
  define("bd_b", "academiacead");
  define("bd_u", "root");
  define("bd_p", "");

  class ConexionBD{

      private $host = bd_h;
      private $basedatos = bd_b;
      private $usuario = bd_u;
      private $password = bd_p;
      private $conexion;
      
      private $uname;

      //Metodo para abrir la conexion
      public function Abrir_ConexionE(){
          $this->conexion = new mysqli($this->host, $this->usuario, $this->password, $this->basedatos);
          $this->conexion->set_charset("utf8");
          if($this->conexion->connect_errno){
              echo 'Falló la conexión a MYSQL: ('.$this->conexion->connect_errno.") ".$this->conexion->connect_error;
          }
      }

      //Método para cerrar la conexión
      public function Cerrar_Conexion(){
          mysqli_close($this->conexion);
      }

      //PROPIEDADADES PUBLICAS
      public function getCONEXION(){
          return $this->conexion;
      }

      public function getBASEDATOS(){
          return $this->basedatos;
      }

      public function inserta_bitacora($a, $d, $iu, $io){
          $hoy = getdate();
          $f = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];
          $cons = "CALL sp_addbitacora('".$f."','".$a."','".$d."',".$iu.",".$io.");";
          $resp = $this->getCONEXION()->query($cons);
      }
      
      //SET-GET para el usuario que trata de recuperar su contraseña
      public function set_usertemp($un){
          $this->uname = $un;
      }
      
      public function get_usertemp(){
          return $this->uname;
      }

  }
