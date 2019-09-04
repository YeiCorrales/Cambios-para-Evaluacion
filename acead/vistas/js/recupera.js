//archivo jquery para llenar el select con las preguntas contestadas por el usuario interesado
var dataFromLocalStorage = JSON.parse(localStorage.getItem("obj1"));//almacenando el usuario interesado en la cache del sistema

//alert(dataFromLocalStorage.uname);

$.ajax({ //ajax global para llenar el select
    type: "POST",
    url: "../acead/modelos/usuarios.modelo.php?caso=cargapreguntas&un="+dataFromLocalStorage.uname,
    dataType: 'json',
    success: function(data)
    { //capptura resultado exitoso recibiendo un objeto json llamado data
        //alert(data);
        //$('#preguntas').html(response).fadeIn();
        $.each(data, function(i, item){ //metodo each para recorrer el resultado recibido
            //alert(item[1]);
            $('#cbopreguntas').append("<option value='"+item[0]+"'>"+item[1]+"</option>"); //agrega cada item al input
        });
    }, 
    error: function(xhr, status){ //caputa resultado fallido
        alert(xhr + " >> " + status);
    }
});