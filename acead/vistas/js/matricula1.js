var modalidadID, orientacionID, claseID, seccionID;

$('#matriculaModalidad').change(function(){
    modalidadID = $(this).val();

    rellenaOrientacion(modalidadID);
    rellenarClases(modalidadID);
});

//$('#adicionar1').click(function(){
    //alert($('select[name=adicionar1] option:selected').text());
  //  orientacioID = $('select[name=adicionar1] option:selected').val();
  //  rellenarClases(orientacionID);
//});

$('#adicionar2').click(function(){
    //alert($('select[name=adicionar1] option:selected').text());
    claseID = $('select[name=adicionar2] option:selected').val();
    rellenarSecciones(claseID);

});

function rellenaOrientacion(idm){

    param1 = {
        "idmodalidad": idm
    };

    $.ajax({
        type: "POST",
        url: "../acead/modelos/alumnos.modelo.php?caso=cargaorientacion",
        data: param1,
        dataType: 'json',
        success: function(data){
            $('#adicionar1').empty();
            $.each(data, function(i, item){
                //alert(item.ID);
                $('#adicionar1').append('<option value="'+item.ID+'">'+item.nombre+'</option>');
            });
        },
        error: function(xhr, status){
            alert("ERROR: " + xhr + " >> " + status);
        }
    });
}

function rellenarClases(idm){
    param1 = {
        "idmodalidad": idm
    };

    $.ajax({
        type: "POST",
        url: "../acead/modelos/alumnos.modelo.php?caso=cargaclases",
        data: param1,
        dataType: 'json',
        success: function(data){
            $('#adicionar2').empty();
            $.each(data, function(i, item){
                //alert(item.ID);
                $('#adicionar2').append('<option value="'+item.IDC+'">'+item.DC+'</option>');
            });
        },
        error: function(xhr, status){
            alert("ERROR: " + xhr + " >> " + status);
        }
    });
}
function rellenarSecciones(idc){

    param1 = {
        "idclase": idc
    };

    $.ajax({
        type: "POST",
        url: "../acead/modelos/alumnos.modelo.php?caso=cargasecciones",
        data: param1,
        dataType: 'json',
        success: function(data){
            //alert(data);
            $('#adicionar3').empty();
            $.each(data, function(i, item){
                //alert(item.ID);
                $('#adicionar3').append('<option value="'+item.ISE+'">'+item.DS+'</option>');
            });
        },
        error: function(xhr, status){
            alert("ERROR: " + xhr + " >> " + status);
        }
    });
}



/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#adicionar3").change(function(){
//alert("Clase Matriculada");
    alumno = $('#IdAlumno').val();
    modalidad = $('#matriculaModalidad').val();
    orientacion = $('#adicionar1').val();
    clase = $('#adicionar2').val();
    secc = $('#adicionar3').val();

    var datos = {
        "Id_Alumno": alumno,
        "Id_Modalidad": modalidad,
        "Id_Orientacion": orientacion,
        "Id_Clase": clase,
        "Id_Seccion": secc
      };

   $.ajax({

        url:"../acead/modelos/matricula.modelo.php?caso=verificarmatricula",
        data: datos,
        type:"post",
        dataType: 'json',
        success:function(data){
            //alert(data);
            //Aqui se filtra lo que se quiera hacer si recibe 1 permite matricular, si recibe 0 no permite la matricula
            if(data === 1 || data === '1'){
                //Codigo para mandar a matricular
            }else{
                //Codigo para evitar la matricula
                alert('El Alumno ya se encuentra matriculado en esa seccion.');
                $("#matriculaModalidad").val("");
                $("#adicionar1").empty();
                $("#adicionar2").empty();
                $("#adicionar3").empty();

            }
        },
        error:function(xhr, status){
            alert("Seleccione una Orientacion");
        }

    });
});

function envia_matricula(){

}

/*=============================================
ELIMINAR MATRICULA
=============================================*/
$(".tablas").on("click", ".btnEliminarMatricula", function(){

  var idMatricula = $(this).attr("idMatricula");
  var idAlumno = $(this).attr("idAlumno");


  swal({
    title: '¿Está seguro de borrar la matricula?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar matricula!'
  }).then((result)=>{

    if(result.value){


      window.location = "index.php?ruta=alumdata&idAlumno="+idAlumno+"&idMatricula="+idMatricula;


    }

  })

})

/*=============================================
IMPRIMIR MATRICULA ALUMNOS
=============================================*/

$(".tablas").on("click", ".btnImprimirMatricula",function(){
  var aid = $(this).attr("idAlumno");
  //var nombrealumno = $(this).attr("Alumno");
  //alert(idAlumno);
    var obj =$(this).parent().parent();
    //aid = $('idAlumno', obj).eq(0).text();
    //alert(aid);
    //alert(nombrealumno);
    //nombrealumno = $('IDA', obj).eq(1).text();
   // alert(aid);
    if(aid=='' || aid==0 || aid==null || aid==undefined){
        alert('Error!!!!!')
    }else{
        window.open("../acead/extensiones/tcpdf/examples/formamatricula.php?id_alumno="+aid, "_blank");
    }
});

/*=============================================
IMPRIMIR MATRICULA GLOBAL
=============================================*/

$(".btnImprimirMatriculaGlobal").on("click",function(periodo){

  var periodo = $(this).attr("peri");

        window.open("../acead/extensiones/tcpdf/examples/matriculaglobal.php?periodo="+periodo);

});

/*=============================================
MATRICULA ALUMNO
=============================================*/

$(".tablas").on("click", ".btnMatriculaAlumno", function(){

 var idAlumno = $(this).attr("idAlumno");
 var nombre = $(this).attr("nombre");

 var datos = new FormData();

  datos.append("idAlumno", idAlumno);

  $.ajax({

    url:"ajax/alumnos.ajax.php",
    method: "POST",
    data: datos,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

      //$("#matriculaAlumno").val(respuesta["Id_Alumno"]);
      $("#matriculaAlumno").val(respuesta["PrimerNombre"]);


  },
                error: function(xhr, status){
                    alert("ERROR: " + xhr + " >> " + status);
              }

  });

  window.location = "index.php?ruta=alumdata&idAlumno="+idAlumno+"&nombre="+nombre;

})


$(".btnAgregarMatricula").on("click",function(){

  var idAlumno = $(this).attr("idAlumno");

  var datos = new FormData();

   datos.append("idAlumno", idAlumno);

   $.ajax({

     url:"ajax/alumnos.ajax.php",
     method: "POST",
     data: datos,
     contentType: false,
     processData: false,
     dataType: "json",
     success: function(respuesta){

                         //alert(respuesta);
       $("#IdAlumno").val(respuesta["Id_Alumno"]);
       $("#matriculaAlumno").val(respuesta["PrimerNombre"]);


   },
                 error: function(xhr, status){
                     alert("ERROR: " + xhr + " >> " + status);
               }

   });


});




$(".salir").on("click",function(){

  var idAlumno = $(this).attr("idAlumno");
  var nombre = $(this).attr("nombre");

  swal({
    title: '¿Está seguro que desea salir?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, salir.'
  }).then((result)=>{

    if(result.value){

      $("#matriculaModalidad").val("");
      $("#adicionar1").empty();
      $("#adicionar2").empty();
      $("#adicionar3").empty();

      window.location = "index.php?ruta=alumdata&idAlumno="+idAlumno+"&nombre="+nombre;


    }

  })

})

/*======================================================
OBTENER LA VARIABLE DEL PERIODO ACADEMICO PARA FILTRAR
LOS ALUMNOS MATRICULADOS POR PERIODO
=======================================================*/

$("#gestionPeriodo").change(function(){

  var periodo = $(this).val();


  if(periodo != null){

    window.location = "index.php?ruta=gestionacademica&periodo="+periodo;

  }else{

    window.location = "gestionacademica"

  }

})
