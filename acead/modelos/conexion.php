<?php

class ConexionBD{
	public $conn ;
	public $statement ;
	public $result ;
        
        private $idu;
        private $cont;

	static public function Abrir_Conexion(){

		$link = new PDO("mysql:host=localhost;dbname=academiacead",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

	  static public function Inserta_bitacora($f, $a, $d, $iu, $io){
            $stmt = ConexionBD::Abrir_Conexion()->prepare("CALL sp_addbitacora('".$f."','".$a."','".$d."',".$iu.",".$io.");");
            $stmt->execute();
        }
        
        static public function obtieneHash($pass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            return (string)$hash;
        }




    //Irma Lastenia Alonzo: se crearon funciones con el fin de manejor toda gestión por medio del objeto que ha sea instanciado

 	//creamos una conexión
	public function establecerConexion()
	{
	$this->conn = new PDO("mysql:host=localhost;dbname=academiacead","root", "");
	}

	//Generamos un prepare en base al query de la variable $statement
	public function prepareStatement($statement)
	{
		$this->statement = $this->conn->prepare($statement);
	}

   /*Ejecuta el prepare statement generado en la función prepareStatement($statement)
    * Recibe los parametros a manera de arreglo de la siguiente manera
    * array
    *  (
    *    "nombreParametro1" : valorParametro1,
    *    "nombreParametro2" : valorParametro2
    *  )
    */
	public function executeStatement($parametros = NULL)
	{
		if ($parametros == NULL)
		{
			$this->statement->execute();
		}
		else
		{
			$this->statement->execute($parametros);
		}
	}

   //Obtener los resultados
	public function getResult()
	{
		return $this->statement->fetchAll();
	}

	//liberamos los recursos
	public function freeResult()
	{
		$this->statement->closeCursor();
	}

   //Obtenemos los parametros de salida
   public function getParametrosOUT($parametros)
   {
       $parametroString = implode(',', $parametros);
       return $this->conn->query("SELECT " . $parametroString)->fetch(PDO::FETCH_ASSOC);
   }

   //inicia una transacción
   public function beginTransaction()
   {
       $this->conn->beginTransaction();
   }

   //confima una transacción
   public function commit()
   {
       $this->conn->commit();
   }

   //deshace una transacción
   public function rollback()
   {
       $this->conn->rollBack();
   }
   
   static public function setUID($id){
       $this->idu = $id;
   }
   
   static public function getUID(){
       return $this->idu;
   }
   static public function setCONT($c){
       $this->cont = $c;
   }
   
   static public function getCONT(){
       return $this->cont;
   }

}
