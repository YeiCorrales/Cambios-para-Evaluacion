<?php

require_once("../modelos/conexion.php");
require_once("../libraries/password_compatibility_library.php");

if(isset($_POST["accion"]))
{
    $accion = $_POST["accion"];

    $connection = new ConexionBD();
    $connection->establecerConexion();
    
    switch($accion)
    {
		case 1:
		{            
			$query = 'CALL SP_OBTENER_GENEROS(@pcMensajeError)';
			$connection->prepareStatement($query);

            $connection->executeStatement();
            
            $result = $connection->getResult();
            $connection->freeResult();
            //Arreglo con los parametros de salida del procedimiento almacenado
            $parametrosDeSalida = array("@pcMensajeError");
            
            $outParameters = $connection->getParametrosOUT($parametrosDeSalida);
            $mensajeError = $outParameters["@pcMensajeError"];

            //Determinar si hubo algun error en la transaccion
            if($mensajeError == NULL)
            {
                $generos = array();
                
                foreach($result as $indice => $row)
                {
                    $generos[$indice] = array
                    (
                        "nombre" => $row["Descripcion"],
                        "codigo" => $row["Id_Genero"]
                    );
                }
                
                echo json_encode($generos);
            }
            else
            {
                //Realizar un volcado de las transacciones anteriores
                echo json_encode(array("error" => $mensajeError));
            }
            
			break;
		}

		case 2:
		{
            $query = 'CALL SP_OBTENER_ESTADOSCIVILES(@pcMensajeError)';
            $connection->prepareStatement($query);


            $connection->executeStatement();
            
            $result = $connection->getResult();
            $connection->freeResult();
            //Arreglo con los parametros de salida del procedimiento almacenado
            $parametrosDeSalida = array("@pcMensajeError");
            
            $outParameters = $connection->getParametrosOUT($parametrosDeSalida);
            $mensajeError = $outParameters["@pcMensajeError"];

            //Determinar si hubo algun error en la transaccion
            if($mensajeError == NULL)
            {
                $estadosCiviles = array();
                
                foreach($result as $indice => $row)
                {
                    $estadosCiviles[$indice] = array
                    (
                        "nombre" => $row["Descripcion"],
                        "codigo" => $row["Id_EstadoCivil"]
                    );
                }
                
                echo json_encode($estadosCiviles);
            }
            else
            {
                //Realizar un volcado de las transacciones anteriores
                echo json_encode(array("error" => $mensajeError));
            }
			break;
		}

		case 3:
		{
            $query = 'CALL SP_OBTENER_DEPARTAMENTOS(@pcMensajeError)';
            $connection->prepareStatement($query);


            $connection->executeStatement();
            
            $result = $connection->getResult();
            $connection->freeResult();
            //Arreglo con los parametros de salida del procedimiento almacenado
            $parametrosDeSalida = array("@pcMensajeError");
            
            $outParameters = $connection->getParametrosOUT($parametrosDeSalida);
            $mensajeError = $outParameters["@pcMensajeError"];

            //Determinar si hubo algun error en la transaccion
            if($mensajeError == NULL)
            {
                $departamentos = array();
                
                foreach($result as $indice => $row)
                {
                    $departamentos[$indice] = array
                    (
                        "nombre" => $row["DescripDepart"],
                        "codigo" => $row["Id_Departamentos"]
                    );
                }
                
                echo json_encode($departamentos);
            }
            else
            {
                //Realizar un volcado de las transacciones anteriores
                echo json_encode(array("error" => $mensajeError));
            }
			break;
		}

		case 4:
		{
            try 
            {
                $pcUsuario = $_POST["pcUsuario"];
                $pcContrasena = $_POST["pcContrasena"];
                $pcPrimerNombre = $_POST["pcPrimerNombre"];
                $pcSegundoNombre = $_POST["pcSegundoNombre"];
                $pcPrimerApellido = $_POST["pcPrimerApellido"];
                $pcSegundoApellido = $_POST["pcSegundoApellido"];
                $pcTelefono = $_POST["pcTelefono"];
                $pcCedula = $_POST["pcCedula"];
                $pcCorreoElectronico = $_POST["pcCorreoElectronico"];
                $pcId_Departamento = $_POST["pcId_Departamento"];
                $pcId_EstadoCivil = $_POST["pcId_EstadoCivil"];
                $pcId_Genero = $_POST["pcId_Genero"];

                $encriptar = password_hash($pcContrasena, PASSWORD_DEFAULT);

                $query = 'CALL SP_INSERTAR_USUARIO(:pcUsuario, :pcContrasena, :pcPrimerNombre, :pcSegundoNombre, '
                                            .':pcPrimerApellido, :pcSegundoApellido, :pcTelefono, :pcCedula, '
                                            .':pcCorreoElectronico, :pcId_Departamento, :pcId_EstadoCivil, '
                                            .':pcId_Genero, @pcMensajeError)';
                
                $connection->prepareStatement($query);

                $parametros =array
                (
                    "pcUsuario" => $pcUsuario,
                    "pcContrasena" => $encriptar,
                    "pcPrimerNombre" => $pcPrimerNombre,
                    "pcSegundoNombre" => $pcSegundoNombre,
                    "pcPrimerApellido" => $pcPrimerApellido,
                    "pcSegundoApellido" => $pcSegundoApellido,
                    "pcTelefono" => $pcTelefono,
                    "pcCedula" => $pcCedula,
                    "pcCorreoElectronico" => $pcCorreoElectronico,
                    "pcId_Departamento" => $pcId_Departamento,
                    "pcId_EstadoCivil" => $pcId_EstadoCivil,
                    "pcId_Genero" => $pcId_Genero                    
                );
                
                //Iniciar la transaccion
                $connection->beginTransaction();
                
                $connection->executeStatement($parametros);
                $result = $connection->getResult();
                
                //Liberar el resultset
                $connection->freeResult();
                
                //Arreglo con los parametros de salida del procedimiento almacenado
                $parametrosDeSalida = array("@pcMensajeError");
                
                $outParameters = $connection->getParametrosOUT($parametrosDeSalida);
                $mensajeError = $outParameters["@pcMensajeError"];
                
                //Determinar si hubo algun error en la transaccion
                if($mensajeError == NULL)
                {
                    //No hubo error en la transaccion.
                    $connection->commit();
                    echo json_encode(array("error" => NULL));
                }
                else
                {
                    //Realizar un volcado de las transacciones anteriores
                    $connection->rollback();
                    echo json_encode(array("error" => $mensajeError));
                }
            } 
            catch (PDOException $e) 
            {
                echo json_encode(array("error" => $e->getMessage()));
            }

			break;
		}				
    }
}

?>