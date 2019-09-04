var ida, ids,idc;
var idalumno;
var notafinal;
var alumnoactual;
var idclase;
var codobs;
var calificaciones=[];
var contador;
contador=0;
var prueba;
var nuevoid;
var nota2;



$('#modalagregarnota').css('display','none');

$('#btnx').on('submit', function(evt){
    evt.preventdefault();
});
$('#btnnotatodos').on('submit', function(evt){
    evt.preventdefault();
});
$('#btnagrega').on('submit', function(evt){
    evt.preventdefault();
});
$('#btnprint').on('submit', function(evt){
    evt.preventdefault();
});

param3={
    "":""
};
$.ajax({
    type: "POST",
    url: "../acead/modelos/alumnos.modelo.php?caso=llenaselectclases",
    data: param3,
    dataType: 'json',
    success: function(data){
       $.each(data, function(i, item){
           $('#cboclases').append('<option value="'+item.IDC+'">'+item.DC+'</option>');
       });
    },
     error: function(xhr, status){
        alert("ERROR: " + xhr + " >> " + status);
    }
});

//aqui se envia el id de la clase seleccionada en el primer select para cargar las secciones que pertenecen a dicha clase
$('#cboclases').change(function(){
   idclase=$(this).val();
   
    param={
      "idclase":idclase
  };
  $.ajax({
      type: "POST",
      url: "../acead/modelos/alumnos.modelo.php?caso=llenaselect",
      data: param,
      dataType: 'json',
      success: function(data){
          $('#cbosecciones').html('');
          $('#cbosecciones').append('<option value="" selected="" disabled="">seleccione una seccion...</option>');
         $.each(data, function(i, item){
             $('#cbosecciones').append('<option value="'+item.IDS+'">'+item.DS+'</option>');
         });
      },
       error: function(xhr, status){
          alert("ERROR: " + xhr + " >> " + status);
      }
  }); 
   
});

$('#cbosecciones').change(function(){
    ids=$(this).val();
    idc=$('#cboclases').val();
    
    if(ids!==null && ids!==undefined && idc!==null && idc!==undefined){
        param1={
            "id_seccion":ids,
            "id_clase":idc
        };
    }else{
        param1={
            "id_seccion":'0',  
            "id_clase":'0'
        };
    }
//    
    $.ajax({
        type: "POST",
        url: "../acead/modelos/alumnos.modelo.php?caso=cargaalumnos",
        data: param1,
        dataType: 'json',
        success: function(data){
            
            $('#tblalumnos tbody').html('');
             
                $.each(data, function(i, item){
//                    $('#cbosecciones').append('<option value="'+item.IDS+'">'+item.DS+'</option>');
                    $('#tblalumnos tbody').append('<tr style="text-align: center;"><td>'+item.IDA+'</td><td>'+item.nombre+'</td><td>'+item.CE+'</td><td>'+item.TEL+'</td><td>'+item.NF+'</td><td>'+item.OBS+'</td><td><button class="btn btn-warning" name="btnnota" data-toggle="modal" data-target="#modalagregarnota"><i class="fa fa-pencil"></i></button></td></tr>');
                });
          

             },
        error: function(xhr, status){
                 alert("ERROR: " + xhr + " >> " + status);
         }
    });
//    

});


$('#tblalumnos tbody').on('click','button[name=btnnota]',function(){
    var obj=$(this).parent().parent();
    var objid=$('td',obj).eq(0).text();
    var aa=$('td',obj).eq(1).text();
    idalumno=objid;
    alumnoactual=aa;
    $('#modalagregarnota .modal-dialog .modal-content form .modal-body .box-body .form-group .label').html('');
    $('#modalagregarnota .modal-dialog .modal-content form .modal-body .box-body .form-group .label').append('<h4 style="z-index:90; color:#000; font-zise:20px;">'+alumnoactual+'</h4>');
});

//$('button[name=btnnota]').on('click',function(){
//    alert(alumnoactual);
//    //$('#alumnoactual').append('<h2>'+alumnoactual+'</h2>');
//});

//$('#btnnotatodos').on('click', function(){
////    $('#tblalumnos').each(function(value,index){
////        alert(value);
////    });
//    alert('shsgjsgjhsgjgjsgjsjgh');
//});


$('#btnagrega').on('click', function(){
    notafinal=$('#txtnota').val();
    if(notafinal==0 || notafinal==null || notafinal=='' || notafinal==undefined){
        alert('DEBE INSERTAR UNA NOTA!');
    }else{
         if(notafinal>=70){
                codobs=1;
            }
            if(notafinal>0 && notafinal<70){
                codobs=2;
            }
            if(notafinal==0){
                codobs=3;
            }

            param5={
                'notafinal':notafinal,
                'id_alumno':idalumno,
                'id_seccion':ids,
                'cod_obs':codobs,
                'id_clase':idc
            };
            $.ajax({
                 type: "POST",
                 url: "../acead/modelos/alumnos.modelo.php?caso=insertanota",
                 data: param5,
                 dataType: 'json',
                 success: function(data){
                     //alert(data);
                     $('#txtnota').val('');
                     $('#salirmodal1').click();


         //            $('#tblalumnos tbody').html('');
         //             
         //                $.each(data, function(i, item){
         ////                    $('#cbosecciones').append('<option value="'+item.IDS+'">'+item.DS+'</option>');
         //                    $('#tblalumnos tbody').append('<tr style="text-align: center;"><td>'+item.IDA+'</td><td>'+item.nombre+'</td><td>'+item.CE+'</td><td>'+item.TEL+'</td><td><button class="btn btn-warning" name="btnnota" data-toggle="modal" data-target="#modalagregarnota"><i class="fa fa-pencil"></i></button></td></tr>');
         //                });
         //          

                      },
                 error: function(xhr, status){
                          alert("ERROR: " + xhr + " >> " + status);
                  }
             });
    }
    

   
});

$('#btnx').on('click', function(){
   
    param6={
      'id_seccion':ids,
      'id_clase':idc
     };
    
    $.ajax({
        type: "POST",
        url: "../acead/modelos/alumnos.modelo.php?caso=obtienecalificaciones",
        data: param6,
        dataType: 'json',
        success: function(data){
            //alert(data);
            $.each(data, function(i,item){
//                $('#alumnoactual2').html('');
//                $('#alumnoactual2').append('<h4 style="z-index:90; color:#000; font-zise:20px;">'+item.nombre+'</h4>');
                calificaciones.push(item);
//               alert(item.nombre);
            });
//            $('#txtnota').val('');
//            $('#salirmodal1').click();
               $('#alumnoactual2').html('');
               $('#txtnota2').val('');
               $('#alumnoactual2').append('<h4 style="z-index:90; color:#000; font-zise:20px;">'+calificaciones[0].nombre+'</h4>');
               contador=0;
               nuevoid=calificaciones[0].IDAL;
               //contador++;
        },
        error: function(xhr, status){
            alert("ERROR: " + xhr + " >> " + status);
        }
    });
    
});

$('#btnagreganotaactual').on('click',function(){
    
    nota2=$('#txtnota2').val();
    
    
    if(nota2==0 || nota2=='' || nota2==null || nota2==undefined){
        alert('nota no debe ir vacia');
        
    }else{
        
       if(nota2>=70){
           codobs=1;
       } if(nota2<70 && nota2>0){
           codobs=2;
       }if(nota2==0){
           codobs=3;
       }
           
        param7={
            'notafinal':nota2,
            'idalumno':calificaciones[contador].IDAL,
            'idseccion':ids,
            'cod_obs':codobs,
            'id_clase':idc
        };
        
       //alert(calificaciones[contador].IDAL+'-'+calificaciones[contador].nombre);
        if(contador<calificaciones.length-1){
            nota2=$('#txtnota2').val('');
            $('#alumnoactual2').html('');
            $('#alumnoactual2').append('<h4 style="z-index:90; color:#000; font-zise:20px;">'+calificaciones[contador+1].nombre+'</h4>');
            contador++;
        }else{
            nota2=$('#txtnota2').val(''); 
            alert('SE HAN AGREGADO LAS CALIFICACIONES DE ESTA SECCION!!');
            contador=0;
            $('#alumnoactual2').html('');
            $('#alumnoactual2').append('<h4 style="z-index:90; color:#000; font-zise:20px;">'+calificaciones[contador].nombre+'</h4>');
        }
        //alert(param7.notafinal+'-'+param7.idalumno+'-'+param7.idseccion+'-'+param7.cod_obs+'-'+param7.id_clase);
        //FUNCION AJAX  QUE INSERTA O ACTUALIZA LA NOTA
        $.ajax({
            type: "POST",
            url: "../acead/modelos/alumnos.modelo.php?caso=califtodo",
            data: param7,
            dataType: 'json',
            success: function(data){
               if(data==1 || data=='1'){
                   alert('NOTA AGREGADA!!');
               }else{
                   alert('NO SE PUDO AGREGAR LA NOTA!!');
               }
            },
            error: function(xhr, status){
                alert("ERROR: " + xhr + " >> " + status);
            }
        });
    }
    
    
});

$('#btnprint').on('click', function(){
    if(idc=='' || idc==0 || idc==null || idc==undefined || ids=='' || ids==0 || ids==null || ids == undefined){
        alert('NO SE PUEDE IMPRIMIR');
    }else{
        //alert('AQUI SI SE IMPRIME');
        window.open("../acead/extensiones/tcpdf/examples/reportecalif.php?docente=Nicolle&clase="+idc+"&seccion="+ids, "_blank");
    }
});