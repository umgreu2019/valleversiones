 var htidnivel;
 var htiarea;
 var htcarrera;
  //carga de areas
    $.post("http://localhost/ValleSistema2/php/alumno/promover/area.php", function(result){
      $('#sarea').html(result);
    });

    $.post("http://localhost/ValleSistema2/php/alumno/promover/area.php", function(result){
      $('#sarean').html(result);
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
            $.post("http://localhost/ValleSistema2/php/alumno/promover/grado.php",{ idarea: idarea,
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
            $.post("http://localhost/ValleSistema2/php/alumno/promover/carrera.php",{ idnivel: idnivel,
            }, function(data){ 
                if(idarea<=3)
                {
                    let idcarrera=0;
                    $.post("http://localhost/ValleSistema2/vistas/Tablas/TablaListadoA.php",{idnivel: idnivel, idarea: idarea, idcarrera: idcarrera,
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
            $.post("http://localhost/ValleSistema2/vistas/Tablas/TablaListadoA.php",{idnivel: idnivel, idarea: idarea, idcarrera: idcarrera,
            }, function(data){
              // alert(data)
              $('#grado').val(htcarrera.toUpperCase());
              $('#nivel').val(htiarea.toUpperCase());
                $('#CargarCuadros').html(data)
            })
        })
    });

    $('#sarean').change(function(){
        $('#sarean option:selected').each(function(){
            let idarea = $(this).val();
            let area   = $(this).html();
            $.post("http://localhost/ValleSistema2/vistas/Tablas/TablaListadoB.php",{idarea: idarea,
            }, function(data){
                $('#nivel2').val(area.toUpperCase())
                $('#printlistadoB').html(data)
            })
        })
    })
      
