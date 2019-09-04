
//en este archivo se programa todo el funcinamiento del formulario con jquery y ajax

//variables que recibiran la contraseña y la confirmacion de contraseña del formulario
var contrasena, confcontrasena;
var dataT1 = JSON.parse(localStorage.getItem("obj2"));  //variable de tipò json global para almacenar el nombre de usuario logeado, esta variable de puede usar en otros archivos js


//control de la visualizacion de la contraseña por los botones de cada input 
$("#btnojito2").mousedown(function () {
    $("#nuevopass").removeAttr("type");
    $("#nuevopass").attr("type", "text");

});

$("#btnojito2").mouseup(function () {
    $("#nuevopass").removeAttr("type");
    $("#nuevopass").attr("type", "password");

});


$("#btnojito3").mousedown(function () {
    $("#confirmapass").removeAttr("type");
    $("#confirmapass").attr("type", "text");

});

$("#btnojito3").mouseup(function () {
    $("#confirmapass").removeAttr("type");
    $("#confirmapass").attr("type", "password");

});

//accion del boton guardar
$('#btng').on('click', function(){
//     se reciben los valor de los inputs de las contraseñas con jquery
    contrasena = $('#nuevopass').val();
    confcontrasena= $('#confirmapass').val();
 //se valida que las variables no esten vacias ni nulas
    if(contrasena=="" || contrasena == null || confcontrasena == "" || confcontrasena == null){
        alert("Los datos vienen vacios!!!");
    }else{ //si todo esta en orden se usa ajax
        
        if(contrasena == confcontrasena){ //se evalua que las contraseñan coincidan
            
          params = { //objeto json que se enviara por ajax asu metodo (modelo) respectivo
              'contra1': contrasena, 
              'contra2': confcontrasena,
              'uname': dataT1.uname  
          } ;
          
          $.ajax({ //definicion de ajax por metodo post
               type: "POST",
                url: "../acead/modelos/usuarios.modelo.php?caso=nuevopass&un=" + dataT1.uname,
                data: params,
                dataType: 'json',
                success: function(msj){  //si el modelo devuelve un resultado exitoso
                    //alert("ID: " + msj);
                    cambiaPassUsuario(msj, contrasena);
                    alert("Password actualizado correctamente!!");
                    window.location.href="acceso";
//                    if(msj==1){
//                        window.location.href='cambiapasspreg';
//                    }else{
//                        alert('Respuesta incorrecta');
//                    }
                },
                error: function(xhr, status){ //si el modelo devuelve un resultado fallido
                    //alert(xhr.response + " -- " + status);
                }
          });
          
        }else{
            alert('las contraseñas no coinciden!');
        }
            
    }
        
});

//Funcion que se llama para poder cambial el Password del usuario validado
function cambiaPassUsuario(idu, pass){
    
    if(pass !== '' && pass !== null && idu !== '' && idu !== null){
        
        paramx = {
            "contrasena": pass
        };
        
        $.ajax({
            type: "post",
            url: "../acead/modelos/usuarios.modelo.php?caso=confcambiapass&idu=" + idu,
            data: paramx,
            dataType: 'json',
            success: function(data){
                //alert(data);
            },
            error: function(xhr, status){
                //alert("ERROR: " + xhr + " >> " + status);
            }
        });
        
    }else{}
}
