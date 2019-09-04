<!-- 
archivo:            formulario para contestar la pregunta de seguridad predefinida por el usuario
autor:              nicolle varela
fecha:              02/2019
correo:             nicollevarela1995@gmail.com
proyecto:           academia cead
-->

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Seguridad del Sistema


            <small>Contestando las preguntas de seguridad</small>

        </h1>



    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            <div class="box-body">


                <div class="box-body">
                    <div class="box box-primary">
                        <div class="box-header with-border">

                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                
                                <div class="form-group">
                                    <label>Seleccione la pregunta</label>
                                    <select class="form-control" id="cbopreguntas" style="text-transform: uppercase;">
                                        <option value="" selected="" disabled="">seleccione...</option>
                                       
                                    </select>
                                </div>

                                <div class="form-group">

                                    <label for="resp1"></label>
                                    <input type="text" class="form-control" id="resp1" placeholder="Ingrese la respuesta a la pregunta seleccionada" name="txtresp" autocomplete="off" style="text-transform: uppercase;">
                                </div>
<!--                                <div class="form-group">
                                    <div class="input-group">

                                        <input type="password" class="form-control" id="nuevopass" name="nuevopass" placeholder="Nueva contraseña">
                                        <span class="input-group-btn"> 
                                            <button id="btnojito2" class="btn btn-default reveal1" type="button"> <i class="fa fa-eye" id="ojito"></i></button>
                                        </span>                          

                                    </div>
                                </div>-->
<!--                                <div class="form-group">
                                    <div class="input-group">
<
                                        <input type="password" class="form-control" id="confirmapass" name="confirmapass" placeholder="Confirma la nueva contraseña">
                                        <span class="input-group-btn"> 
                                            <button id="btnojito3" class="btn btn-default reveal1" type="button"> <i class="fa fa-eye" id="ojito"></i></button>
                                        </span>                          

                                    </div>
                                </div>-->

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="" class="btn btn-primary" id="btngenviar">Guardar y Avanzar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--asociando los archivos js que controlan el formulario-->
<script src="../acead/vistas/js/metodorecup.js"></script>
<script src="../acead/vistas/js/contestapreg.js"></script>
<script src="../acead/vistas/js/recupera.js"></script>