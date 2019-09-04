//archivo jquery para controlar el formulario y el ajax

var id_pregunta, respuesta, contrasena, confcontrasena; //variables para obtener los datos

var usuariotemporal = JSON.parse(localStorage.getItem("obj1")); //variable global para obtener el usuario requerido

var uT;
var dataT = JSON.parse(localStorage.getItem("obj2")); //tomando el usuario de la cache del sistema

$('#btngenviar').on("click", function () { //accion del boton enviar al darle click
    //se obtiene el id_pregunta y la respuesta del control select y el input
    id_pregunta = $("#cbopreguntas").val();
    respuesta = $("#resp1").val();
//    contrasena = $("#nuevopass").val();
//    confcontrasena = $("#confirmapass").val();

    
    //se evalua que los datos no esten vacios ni nulos
    if ((id_pregunta == '' || id_pregunta == null) || (respuesta == '' || respuesta == null) ) {
        alert("Debe contestar la pregunta!"); 
    } else { // si todo va bien se define el ajax
        //se obtiene el usuario de cache 
        alert("Respuesta recibida!!");
        uT = usuarioT;
        var param2= { //se llena un objeto json con los datos a enviar
            "uname": dataT.uname,
            "idpreg": id_pregunta,
            "resp": respuesta
         };

        //definicion del ajax por el metodo post
        $.ajax({
            type: "POST",
            url: "../acead/modelos/usuarios.modelo.php?caso=contpregunta&un=" + dataT.uname,
            data: param2,
            dataType: 'json',
            success: function(msj){  //captura resultado exitoso
                //alert("EEE::" + msj);
                if(msj==1){
                    window.location.href='cambiapasspreg'; //redirecciona a la ruta cambiapasspreg
                }else{
                    alert('Respuesta incorrecta');
                }
            },
            error: function(xhr, status){ //captura resultado fallido
                alert(xhr.response + " -- " + status);
            }
        }); 
    }


});

//function act_pass(){
//    uT = usuarioT;
//            var param3= {
//                "uname": dataT.uname,
//                "idpreg": id_pregunta,
//                "resp": respuesta,
//                "contrasena": contrasena,
//                "confcontrasena": confcontrasena
//            }
//            
//    $.ajax({
//                type: "POST",
//                url: "../acead/modelos/usuarios.modelo.php?caso=actpass&un=" + dataT.uname,
//                data: param3,
//                dataType: 'json',
//                success: function(msj){
//                    //alert(msj);
//                },
//                error: function(xhr, status){
//                    //alert(xhr.response);
//                }
//            });
//}