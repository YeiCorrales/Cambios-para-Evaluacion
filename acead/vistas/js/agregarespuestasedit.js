
var Resp, idus, idpreg, contVeces;
contVeces = 1;
//$("#alerta1").hide();
//$('.main-sidebar').css('display', 'none');

$('.logo').removeAttr('href');

//Este ajax se ejecuta siempre que se cargue la pagina preguntas ya que esta libre
$.ajax({
    url: "../acead/modelos/usuarios.modelo.php?caso=evaluarespedit",
    type:"POST", 
    dataType:"json",
    success:function(data){
        $.each(data.data,function(i,item){
//            if (item.cantidad>=3){
//                $("#cboPreguntas").attr("disabled", "true");
//                $('#btnAgregar').attr('disabled', "true")
//                $('#btnGuardar').removeAttr('disabled');
//                actualizaprimeringreso();
//                window.location.href ="cambiopass";
//                
//                //$('#alerta1').show();
//            }
        });
    },
    error: function (xhr,status){
        alert("Algo salio mal!: "+xhr+"("+ status + ")");
    }
    
});


$('#btnActualizar').click(function () {
    alert('sdsds');
    Resp = $('#txtRespuesta').val();
    idpreg = $('#cboPreguntas').val();

    var params5 = {
        'Respuesta': Resp,
        'Id_Pregunta': idpreg
    };

    $.ajax({            
            url: "../acead/modelos/usuarios.modelo.php?caso=respuestasedit",
            data: params5,
            type: 'post',
            
            success: function(msj) {
                //alert("Mensaje: " + msj);
                if (msj === ''){
                   // alert('Respuesta agregada Exitosamente!');
                   // $('#cantpreg').append('<span>'+contVeces+'</span>');
                   alert('respuesta actualizada!!');
                    location.reload();
                }
            },
            error: function(xhr, status){
                alert("¡Algo salió mal! : " + xhr + "(" + status + ")");
            }
            //reset();
        });
    
contVeces = contVeces + 1;

});

$('#btnGuardar').click(function(){
    
});


function actualizaprimeringreso(){
    $.ajax({
       url: "../acead/modelos/usuarios.modelo.php?caso=cambiapass",
            data:"",
            type: 'post',
            success: function(msj) {
                //alert("Mensaje: " + msj);
                           
                if (msj === ''){
                    window.location.href ="cambiopass";
                }
            },
            error: function(xhr, status){
                alert("¡Algo salió mal! : " + xhr + "(" + status + ")");
            }
    });
}
