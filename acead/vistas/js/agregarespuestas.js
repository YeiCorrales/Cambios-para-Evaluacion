
var Resp, idus, idpreg, contVeces;
contVeces = 1;
//$("#alerta1").hide();
$('.main-sidebar').css('display', 'none');

$('.logo').removeAttr('href');

//Este ajax se ejecuta siempre que se cargue la pagina preguntas ya que esta libre
$.ajax({
    url: "../acead/modelos/usuarios.modelo.php?caso=evaluaresp",
    type:"POST", 
    dataType:"json",
    success:function(data){
        $.each(data.data,function(i,item){
            if (item.cantidad>=3){
                $("#cboPreguntas").attr("disabled", "true");
                $('#btnAgregar').attr('disabled', "true")
                $('#btnGuardar').removeAttr('disabled');
                actualizaprimeringreso();
                window.location.href ="cambiopass";
                
                //$('#alerta1').show();
            }
        });
    },
    error: function (xhr,status){
        alert("Algo salio mal!: "+xhr+"("+ status + ")");
    }
    
});


$('#btnAgregar').click(function () {
    
    Resp = $('#txtRespuesta').val();
    idpreg = $('#cboPreguntas').val();

    var params = {
        'Respuesta': Resp,
        'Id_Pregunta': idpreg
    };

    if (contVeces <= 3) {
    
        $.ajax({            
            url: "../acead/modelos/usuarios.modelo.php?caso=respuestas",
            data: params,
            type: 'post',
            success: function(msj) {
                //alert("Mensaje: " + msj);
                if (msj === ''){
                    alert('Respuesta agregada Exitosamente!');
                    location.reload();
                }
            },
            error: function(xhr, status){
                alert("¡Algo salió mal! : " + xhr + "(" + status + ")");
            }
            //reset();
        });
    }else{
//        alert('YA COMPLETASTE LAS 3 PREGUNTAS!!!!');
          
    }
    
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
