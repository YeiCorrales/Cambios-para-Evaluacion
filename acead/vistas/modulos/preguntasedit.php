<?php
//session_start();

$idu = isset($_SESSION['id']) ?: null;
?>
<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Seguridad del sistema

            <small>Preguntas de seguridad</small>

        </h1>    

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Listado de preguntas</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                                    <label>Pregunta</label>
                                    <label id="cantpreg" class="text-red">
                                        <?php
                                            $idu=$_SESSION['id'];
                                            $stmt= ConexionBD::Abrir_Conexion()->prepare("select preguntascontestadas AS PC from tbl_usuarios where id_usuario=".$idu.";");
                                            $stmt->execute();
                                            $resultado = $stmt->fetchAll(PDO::FETCH_BOTH);
                                            $CONT=$resultado[0]['PC'];
                                            echo $CONT;
                                        ?>
                                        
                                    </label>
                                    
                                    <label> de 3 permitidas </label>
                                </div>
                    <div class="form-group">
                      
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%; text-transform: uppercase;" tabindex="-1" aria-hidden="true" id="cboPreguntas">
                            <option selected="selected" value="0" disabled="">Seleccione pregunta</option>
                            <!-- <option value="1">¿Cual era el nombre de tu primer mascota?</option>
                            <option value="2">¿Cual es el nombre de la ciudad en que naciste?</option>
                            <option value="3">¿Cual era tu apodo de niño?</option>
                            <option value="4">¿Cual era el nombre de tu primer maestro?</option>
                            <option value="5">¿Cual es tu color favorito? </option> -->
                            <?php
                                $stmt = ConexionBD::Abrir_Conexion()->prepare('SELECT P.Id_Pregunta, P.Pregunta FROM tbl_Preguntas P WHERE P.Id_Pregunta IN(SELECT ID_Pregunta FROM tbl_Preguntasusuario WHERE Id_usuario = '.$_SESSION['id'].');'); 
                                $stmt ->execute();
                                
                                $result = $stmt->fetchAll(PDO::FETCH_BOTH);
                                
                                //echo '<script>alert("'.$result['Id_Pregunta'].'");</script>';
                                $long = count($result);
                                for($i=0; $i<$long; $i++){
                                    //echo '<script>alert("'.$result[$i]['Pregunta'].'");</script>';
                                    echo '<option value="' . $result[$i]['Id_Pregunta'] . '">' . $result[$i]['Pregunta'] . '</option>';
                                }
                                
                                
                            ?>
                        </select>
                        <br><br>
                        <input type="text" class="form-control" placeholder="Ingrese su respuesta" id="txtRespuesta" style="text-transform: uppercase;">
                      
                    </div> 
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-success" id="btnActualizar">Actualizar</button>
<!--                <button  class="btn btn-primary" id="btnGuardar" disabled="true">Guardar y Avanzar</button> <BR><BR>-->
                <!--
                <div class="alert alert-warning alert-dismissable" id="alerta1" >
                    
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-warning"></i>alerta</h4>
                    ya se han contestado las 3 preguntas de seguridad para este usuario!!
                    
                </div> -->
                
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="../acead/vistas/js/agregarespuestasedit.js"></script>
