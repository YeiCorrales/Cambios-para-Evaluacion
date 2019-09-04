var pass, nuevopass,confpass;

$('.main-sidebar').css('display', 'none');

$('.logo').removeAttr('href');

$("#btnojito1").mousedown(function(){
    $("#passactual").removeAttr("type");
    $("#passactual").attr("type","text");

});

$("#btnojito1").mouseup(function(){
    $("#passactual").removeAttr("type");
    $("#passactual").attr("type","password");

});


$("#btnojito2").mousedown(function(){
    $("#nuevopass").removeAttr("type");
    $("#nuevopass").attr("type","text");

});

$("#btnojito2").mouseup(function(){
    $("#nuevopass").removeAttr("type");
    $("#nuevopass").attr("type","password");

});


$("#btnojito3").mousedown(function(){
    $("#confirmapass").removeAttr("type");
    $("#confirmapass").attr("type","text");

});

$("#btnojito3").mouseup(function(){
    $("#confirmapass").removeAttr("type");
    $("#confirmapass").attr("type","password");

});

$("#btnojito4").mouseup(function(){
    $("#nuevopass").removeAttr("type");
    $("#nuevopass").attr("type","password");

});

$("#btnojito4").mouseup(function(){
    $("#confirmapass").removeAttr("type");
    $("#confirmapass").attr("type","password");

});

$("#btnenviar").click(function(){

   pass=$("#passactual").val();
   nuevopass=$("#nuevopass").val();
   confpass=$("#confirmapass").val();

   if(pass=="" || nuevopass=="" || confpass==""){
       $("#pie1").append(' <div class="alert alert-warning alert-dismissable" id="alerta2"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-warning"></i>alerta</h4>debe completar los datos!!</div>');
   }else{
       if(nuevopass !== confpass){
           $("#pie1").append(' <div class="alert alert-warning alert-dismissable" id="alerta2"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-warning"></i>alerta</h4>Las contraseñas no coinciden!!</div>');
       }else{

           var params={
                'Contrasena': pass,
                'nuevopass': nuevopass,
                'confpass': confpass
            };
             $.ajax({
                 url:"../acead/modelos/usuarios.modelo.php?caso=cambiopass",
                 data: params,
                 type:"post",
                 success:function(data){
                     if(data === 1 || data === '1'){
                         alert('Password agregado exitosamente!!');
                         window.location.href = "salir";
                     }else{
                         $("#pie1").append(' <div class="alert alert-warning alert-dismissable" id="alerta2"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-warning"></i>alerta</h4>El password actual es Incorrecto!</div>');
                     }
                 },
                 error:function(xhr, status){
                     alert("¡Algo salió mal! : " + xhr + "(" + status + ")");
                 }
             });
       }

    }

});
