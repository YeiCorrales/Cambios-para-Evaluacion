
var idSecc;
var idClase, descSeccion, hrSecc, aulaSecc, idPeriodo, idUser;

$('button[name=btneditarSecc]').on('click', function(evt){
	evt.preventDefault();
});

$('#TablaSecciones tbody').on('click', '.btnEditarSeccion', function(){

	var obj = $(this).parent().parent().parent();
	idSecc = $('td', obj).eq(1).text();
	idClase = $('td', obj).eq(2).text();

	$('#idseccionedit').val(idSecc);
        cargaElementosSeccion(idSecc);
        //$('select[name=nuevoperiodoedit]').val(2);

});

$('button[name=btneditarSecc]').on('click', function(){
	//SE USA UN AJAX PARA ENVIAR LOS DATOS AL CONTROLADOR
	//Se obtienen los datos de los controles del formulario

	idClase = $('select[name=nuevoclaseedit]').val();
	idPeriodo = $('select[name=nuevoperiodoedit]').val();
	idUser = $('select[name=nuevomaestroedit]').val();
	descSeccion = $('input[name=nuevadescedit]').val();
	hrSecc = $('input[name=hrsclaseedit]').val();
	aulaSecc = $('input[name=nuevaaulaedit]').val();

	var params = {
		"id_Seccion": idSecc,
		"DescripSeccion": descSeccion,
		"HraClase": hrSecc,
		"AulaClase": aulaSecc,
		"Id_PeriodoAcm": idPeriodo,
		"Id_usuario": idUser,
		"Id_Clase": idClase
	};


	//alert(idSecc +'-'+ descSeccion +'-'+ hrSecc +'-'+ aulaSecc +'-'+ idPeriodo +'-'+ idUser +'-'+ idClase);

	$.ajax({ //definicion de ajax por metodo post
       type: "POST",
        url: "../acead/modelos/secciones.modelo.php?caso=updateseccion",
        data: params,
        dataType: 'json',
        success: function(msj){  //si el modelo devuelve un resultado exitoso

        	if(msj == '1' || msj == 1){
        		//alert('swal({type: "success", title: "¡La Seccion ah sido guardada correctamente!", showConfirmButton: true, confirmButtonText: "Cerrar", closeOnConfirm: false }).then((result)=>{if(result.value){ window.location = "seccion"; }});');
        		swal({

							type: "success",
							title: "¡La Seccion ah sido actualizada correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false

						}).then((result)=>{

							if(result.value){

								window.location = "seccion";

							}

						});
        	}else{
        		swal({

							type: "error",
							title: "¡No se pudo actualizar la sección! Revise los datos de envío!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false

						}).then((result)=>{

							if(result.value){

								window.location = "seccion";

							}

						});
        	}
            //alert("ID: " + msj);
            /*cambiaPassUsuario(msj, contrasena);
            alert("Password actualizado correctamente!!");
            window.location.href="acceso";*/
        },
        error: function(xhr, status){ //si el modelo devuelve un resultado fallido
            //alert(xhr.response + " -- " + status);
        }
  });

/*=============================================
IMPRIMIR TOTAL SECCIONES
=============================================*//*IMPRIMIR FACTURA*/
$(".tablas").on("click", ".btnImprimirSeccion",function(){
  var IDSEC = $(this).attr("IDSEC");
  //var nombrealumno = $(this).attr("Alumno");
  //alert(idAlumno);
    var obj =$(this).parent().parent();
    //aid = $('idAlumno', obj).eq(0).text();
    //alert(aid);
    //alert(nombrealumno);
    //nombrealumno = $('IDA', obj).eq(1).text();
   // alert(aid);
    if(IDSEC=='' || IDSEC==0 || IDSEC==null || IDSEC==undefined){
        alert('Error!!!!!')
    }else{
        window.open("../acead/extensiones/tcpdf/examples/seccionestotal.php?Id_Seccion="+IDSEC, "_blank");
    }
});


});

//----------- Funcion para cargar elementos de sección-------------------------
//-----------------------------------------------------------------------------
function cargaElementosSeccion(ids){

    paramY = {
        "id_seccion":ids
    };

    $.ajax({
        type: "POST",
        url: "../acead/modelos/secciones.modelo.php?caso=cargaelementos",
        data: paramY,
        dataType: 'json',
        success: function(msj){
            if(msj == ''){
                swal({
                        type: "error",
                        title: "¡Esta sección no tiene data asignada!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                }).then((result)=>{

                        if(result.value){

                                window.location = "seccion";

                        }

                });
            }else{
               $.each(msj, function(i, item){
                   $('select[name=nuevoclaseedit]').val(item.IDC);
                   $('select[name=nuevoperiodoedit]').val(item.IDP);
                   $('select[name=nuevomaestroedit]').val(item.IDPf);
                   $('input[name=nuevadescedit]').val(item.DS);
                   $('input[name=hrsclaseedit]').val(item.HC);
                   $('select[name=nuevaaulaedit]').val(item.AC);
               });
            }

        },
        error: function(xhr, status){

        }
    });

}
