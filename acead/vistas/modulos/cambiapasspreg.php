<!-- 
archivo:            formulario para actualizar la contraseña del usuario que contesto bien la pregunta
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
                                    <div class="input-group">

                                        <input type="password" class="form-control" id="nuevopass" name="nuevopass" placeholder="Nueva contraseña" maxlength="15" minlength="5" required="" autocomplete="off">
                                        <span class="input-group-btn"> 
                                            <button id="btnojito2" class="btn btn-default reveal1" type="button"> <i class="fa fa-eye" id="ojito"></i></button>
                                        </span>                          

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">

                                        <input type="password" class="form-control" id="confirmapass" name="confirmapass" placeholder="Confirma la nueva contraseña" maxlength="15" minlength="5" required="" autocomplete="off">
                                        <span class="input-group-btn"> 
                                            <button id="btnojito3" class="btn btn-default reveal1" type="button"> <i class="fa fa-eye" id="ojito"></i></button>
                                        </span>                          

                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="" id="btng" class="btn btn-primary">Guardar</button>
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
<!--
<script src="../acead/vistas/js/metodorecup.js"></script>
<script src="../acead/vistas/js/contestapreg.js"></script>
<script src="../acead/vistas/js/recupera.js"></script>-->


<!--aqui se asocia el js que servira como ajax a este formulario-->
<script src="../acead/vistas/js/cambiapasspreg.js"></script>