

 var htidnivel;
 var htiarea;
 var htcarrera;
  //carga de areas
    $.post("https://sistema.colegiovalledelsur.com/php/alumno/promover/area.php", function(result){
      $('#sarea').html(result);
    });

    //carga de grados segun el area
    $('#sarea').change(function(){
        $('#sarea option:selected').each(function(){
            var idarea=$(this).val();
            htiarea=$(this).html();
            if(idarea>3){
                var aux = $('#containercarrera').hasClass('d-none');
                if(aux==true){
                    $('#containercarrera').removeClass('d-none');
                }
            }else{
                var aux = $('#containercarrera').hasClass('d-none');
                if(aux==false){
                    $('#containercarrera').addClass('d-none');
                }
            }
            $.post("https://sistema.colegiovalledelsur.com/php/alumno/promover/grado.php",{ idarea: idarea,
            }, function(data){ 
                $("#sgrado").html(data);
            });
        });
    });
    //carga de carreras segun el grado
    $('#sgrado').change(function(){
        $('#sgrado option:selected').each(function(){
            var idnivel=$(this).val()
            htidnivel=$(this).html();
            var idarea =$('#sarea').val()
            $.post("https://sistema.colegiovalledelsur.com/php/alumno/promover/carrera.php",{ idnivel: idnivel,
            }, function(data){ 
                if(idarea<=3)
                {
                    let idcarrera=0;
                    $.post("https://sistema.colegiovalledelsur.com/vistas/Tablas/TablaCuadrosBi.php",{idnivel: idnivel, idarea: idarea, idcarrera: idcarrera,
                    }, function(data){
                      // alert(data)
                          $('#grado').val(htidnivel.toUpperCase());
                          $('#nivel').val(htiarea.toUpperCase());
                        $('#CargarCuadros').html(data)
                    })
                }
                $("#scarrera").html(data);

            });
        });
    });

    //select carreras
    $('#scarrera').change(function(){
        $('#scarrera option:selected').each(function(){
            let idcarrera   =$(this).val()
            htcarrera=$(this).html();
            let idarea      =$('#sarea').val()
            let idnivel     =$('#sgrado').val()
            $.post("https://sistema.colegiovalledelsur.com/vistas/Tablas/TablaCuadrosBi.php",{idnivel: idnivel, idarea: idarea, idcarrera: idcarrera,
            }, function(data){
              // alert(data)
              $('#grado').val(htcarrera.toUpperCase());
              $('#nivel').val(htiarea.toUpperCase());
                $('#CargarCuadros').html(data)
            })
        })
    });

    $('.buttonImage').click(function(){
     g = $('#grado').val();
     n = $('#nivel').val();
     alert(g+"--"+n);
     $.post("https://sistema.colegiovalledelsur.com/63cvs",{envio1: g, envio2: n}, function(data){
         var doc=window.open('https://sistema.colegiovalledelsur.com/63cvs', 'Cuadros Imprimir','toolbar=yes,menubar=yes,titlebar=yes,location=yes,resizable=no'); 
         doc.print();   
        })
  
    })
      
   


