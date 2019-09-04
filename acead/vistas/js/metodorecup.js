//archivo jquery para controlar el formulario y las peticiones ajax 
//variables para obtener el id_usuario y el nombre de usuario global
var usuario;
var idusuario;
var usuarioT;
//funcion del boton recupcorreo
$("#recupcorreo").click(function () {
    
    usuario = $("input[name=txtusuario]").val(); 
    usuarioT = $("input[name=txtusuario]").val();
    if (usuario == "" || usuario == null) {
        alert("Debe introducir el nombre de usuario!!");
    } else { 
        params = { 
            "usuario": usuario
        };
        $.ajax({ 
            url: "../acead/modelos/usuarios.modelo.php?caso=metcorreo",
            data: params,
            type: "post",
          
            success: function (data) { 
                if(data=='exito'){
                  window.location.href='cambiocontrasena';
                  
                }else{
                    alert("lo siento");
                }
            },
            error: function () {} 
        });
    }

});

$("#recupreguntas").click(function () {
    //se captura el usuario del input 
    usuario = $("input[name=txtusuario]").val();
    var data2 = {
            "uname": usuario
        }
        // se almacena tambien en la variable global obj2
    localStorage.setItem("obj2", JSON.stringify(data2));
    
    if (usuario == '' || usuario == null || usuario == 'undefined') { //se revisa que los inputs no vengan vacios
        alert("Debe ingresar un usuario valido!!");
    } else {
        var param1 = {//si todo va bien se define el objeto json a utilizar
            "usuario": usuario
        }

        $.ajax({ //se define ajax con metodo post
            url: "../acead/modelos/usuarios.modelo.php?caso=verifuser",
            data: param1,
            type: "post",
            dataType: 'json',
            success: function (data) { //captura estado exitoso
                if (data == '') { //si el resultado viene vacio es porque usuario no exite en la bd
                    alert('Usuario no existe en el sistema!!'); 
                    $('input[name=txtusuario]').val('');
                } else { //si el usuario exite se agrega a la variable id_usuario
                    $.each(data, function (i, item) {
                        //alert(item[0]);
                        idusuario = item[0];
                    });

                    var data1 = { //nuevo objeto json con el nombre del usuario
                        "uname": usuario
                    }

                    localStorage.setItem("obj1", JSON.stringify(data1)); //se almacena en la cache el usuario capturado
                    window.location.href = "contestapreg"; //se redirecciona a la ruta contestapreg
                }

            },
            error: function () {}
        });

    }

});


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

//AJAX para cargar el SELECT de las preguntas disponibles para el usuario
$.ajax({
    type: "POST",
    url: "../acead/modelos/usuarios.modelo.php?caso=cargapreguntas&idu=" + idusuario,
    success: function (response)
    {
        //alert(response);
        //$('#preguntas').html(response).fadeIn();
    }
});

