$(document).ready(function(){
    
    // seccion tabla no.1
    $('#view-prom').DataTable()
    $('#view2').DataTable()
    ComboAnio()
    ComboAnio2()

    $('.select2').select2({
        width: '100%'
    })

    //carga de areas
    $.post("http://localhost/ValleSistema2/php/alumno/promover/area.php", function(result){
	    $('#idarea').html(result);
    });
    //carga de grados segun el area
    $('#idarea').change(function(){
        $('#idarea option:selected').each(function(){
            var idarea=$(this).val();
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
                $("#idnivel").html(data);
            });
        });
    });
    //carga de carreras segun el grado
    $('#idnivel').change(function(){
        $('#idnivel option:selected').each(function(){
            let idnivel=$(this).val();
            let idarea =$('#idarea').val();
            $.post("http://localhost/ValleSistema2/php/alumno/promover/carrera.php",{ idnivel: idnivel,
            }, function(data){
                if(idarea<=3)
                {
                    let idcarrera=0;
                    var anio=$('#anio').val();
                    $.post("http://localhost/ValleSistema2/php/alumno/promover/tabla1.php",{ idnivel: idnivel, anio: anio, idarea: idarea, idcarrera: idcarrera,
                    }, function(data){ 
                        $("#contenido").html(data);
                    });
                    
                }
                $("#idcarrera").html(data);
            });
        });
    });

    //select carreras
    $('#idcarrera').change(function(){
        tabla1()
    });

    //carga de tabla ciclo anterior
    $('#anio').change(function(){
        $('#anio option:selected').each(function(){
            var anio=$(this).val();
            var idnivel=$('#idnivel').val();
            var idarea=$('#idarea').val();
            var idcarrera=$('#idcarrera').val();
            $.post("http://localhost/ValleSistema2/php/alumno/promover/tabla1.php",{ idnivel: idnivel, anio: anio, idarea: idarea, idcarrera: idcarrera,
            }, function(data){ 
                $("#contenido").html(data);
            });
        });
    });

    //-- seccion tabla no.2 --//

    //carga de areas
    $.post("http://localhost/ValleSistema2/php/alumno/promover/area2.php", function(result){
	    $('#idarea2').html(result);
    });

    $("#btnactual").click(function(){ 
        var aux4 = $('#table2').hasClass('d-none');
        var aux2 = $('#btnoculto').hasClass('d-none');
        var aux3 = $('#contenedoroculto').hasClass('d-none');
        if(aux4==true){
            $('#table2').removeClass('d-none');
            $('#btnoculto').removeClass('d-none');
            $('#contenedoroculto').removeClass('d-none');
        }else{
            $('#table2').addClass('d-none');
            $('#btnoculto').addClass('d-none');
            $('#contenedoroculto').addClass('d-none');
        }
    });

    $('#idarea2').change(function(){
        $('#idarea2 option:selected').each(function(){
            var idarea=$(this).val();
            if(idarea>3){
                var aux = $('#containercarrera2').hasClass('d-none');
                if(aux==true){
                    $('#containercarrera2').removeClass('d-none');
                }
            }else{
                var aux = $('#containercarrera2').hasClass('d-none');
                if(aux==false){
                    $('#containercarrera2').addClass('d-none');
                }
            }
            $.post("http://localhost/ValleSistema2/php/alumno/promover/grado2.php",{ idarea: idarea,
            }, function(data){ 
                $("#idnivel2").html(data);
            });
        });
    });

    //carga de carreras segun el grado
    $('#idnivel2').change(function(){
        $('#idnivel2 option:selected').each(function(){
            let idnivel2=$(this).val()
            let idarea2 =$('#idarea2').val()
            let anio2   =$('#anio2').val()
            $.post("http://localhost/ValleSistema2/php/alumno/promover/carrera2.php",{ idnivel2: idnivel2,
            }, function(data){
                console.log(idarea2) 
                if(idarea2<=3)
                {
                    let idcarrera2=0;
                    $.post("http://localhost/ValleSistema2/php/alumno/promover/tabla2.php",{ idnivel2: idnivel2, idarea2: idarea2, idcarrera2: idcarrera2, anio2: anio2,
                    }, function(data){ 
                        $("#contenido2").html(data);
                    });
                    
                }
                $("#idcarrera2").html(data);
            });
        });
    });

    $('#idcarrera2').change(function(){
        tabla2()
    });

    $('#anio2').change(function(){
        tabla2()
    })

    //btn ver
    // $("#btnget").click(function(){
    //     var idnivel2=$('#idnivel2').val();
    //     var idarea2=$('#idarea2').val();
    //     var idcarrera2=$('#idcarrera2').val();
    //     $.post("http://localhost/ValleSistema2/php/promover/tabla2.php",{ idnivel2: idnivel2, idarea2: idarea2, idcarrera2: idcarrera2,
    //     }, function(data){ 
    //         $("#contenido2").html(data);
    //     });
    // });

    // script btn promover //
    $('#btnpromover').click(function(){ 
        datos=$('#chekk,#idarea2,#idnivel2,#idcarrera2,#anio').serialize();
         $.ajax({
          type:"POST",
          data:datos,
          url:"http://localhost/ValleSistema2/php/alumno/promover/cntrlPromover.php", 
          success:function(r){
              alert(r)
              if(r==1){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 6000
                  })
                  
                  Toast.fire({
                    type: 'success',
                    title: 'Promocion Realizada'
                  })
                  tabla1();
                  tabla2();
              }else{
                Swal.fire({
                    type: 'error',
                    title: 'Oops...Accion Invalida',
                    text: 'Revise los campos!'
                  })
              }
          }
        });
      });



    //*************** tab busqueda por carnet ***************//
    $('#btnbuscar').click(function(){
        var id=$('#id').val();
        $.post("http://localhost/ValleSistema2/php/alumno/promover/card.php",{ id: id,
        }, function(data){
            $("#print-card").html(data);
        });
    });

    //btncontroles
    $('#btncontroles').click(function(){
        var auxd = $('#print-card2').hasClass('d-none');
        if(auxd==true){
            $('#print-card2').removeClass('d-none');
        }else{
            $('#print-card2').addClass('d-none');
        }
    });

     //carga de areas3
     $.post("http://localhost/ValleSistema2/php/alumno/promover/area3.php", function(result){
	    $('#idarea3').html(result);
    });

    //carga de grados3 segun el area3
    $('#idarea3').change(function(){
        $('#idarea3 option:selected').each(function(){
            var idarea=$(this).val();
            if(idarea>3){
                var aux = $('#containercarrera3').hasClass('d-none');
                if(aux==true){
                    $('#containercarrera3').removeClass('d-none');
                }
            }else{
                var aux = $('#containercarrera3').hasClass('d-none');
                if(aux==false){
                    $('#containercarrera3').addClass('d-none');
                }
            }
            $.post("http://localhost/ValleSistema2/php/alumno/promover/grado3.php",{ idarea: idarea,
            }, function(data){ 
                $("#idnivel3").html(data);
            });

        });
    });

    //carga de carreras segun el grado
    $('#idnivel3').change(function(){
        $('#idnivel3 option:selected').each(function(){
            var idnivel=$(this).val();
            $.post("http://localhost/ValleSistema2/php/alumno/promover/carrera3.php",{ idnivel: idnivel,
            }, function(data){ 
                $("#idcarrera3").html(data);
            });
        });
    });

    //btnefectuar
    $('#btnefectuar').click(function(){
        var a = document.getElementById('idcarnet');
        var b  = document.getElementById('idciclo');
        var idcarnet = a.innerHTML;
        var idciclo = b.innerHTML;
        var idarea3  = $('#idarea3').val();
        var idnivel3 = $('#idnivel3').val();
        var idcarrera3 = $('#idcarrera3').val();

        var datos = {
            "idcarnet": idcarnet,
            "idciclo" : idciclo,
            "idarea3" : idarea3,
            "idnivel3" : idnivel3,
            "idcarrera3" : idcarrera3
        };
        $.ajax({
            type: 'POST',
            data: datos,
            url: 'http://localhost/ValleSistema2/php/alumno/promover/promover2.php',
            success:function(r){
                if(r){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      
                      Toast.fire({
                        type: 'success',
                        title: 'Promocion Realizada'
                      })
                }else{
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      
                      Toast.fire({
                        type: 'success',
                        title: 'Ha ocurrido un error'
                      })
                }
            }
        })
    });

});

function tabla1(){
    var anio=$('#anio').val();
    var idnivel=$('#idnivel').val();
    var idarea=$('#idarea').val();
    var idcarrera=$('#idcarrera').val();
    $.post("http://localhost/ValleSistema2/php/alumno/promover/tabla1.php",{ idnivel: idnivel, anio: anio, idarea: idarea, idcarrera: idcarrera,
    }, function(data){ 
        $("#contenido").html(data);
    });
}

function tabla2(){
    alert('año')
    let idnivel2=$('#idnivel2').val();
    let idarea2=$('#idarea2').val();
    let idcarrera2=$('#idcarrera2').val()
    let anio2 =$('#anio2').val()
    $.post("http://localhost/ValleSistema2/php/alumno/promover/tabla2.php",{ idnivel2: idnivel2, idarea2: idarea2, idcarrera2: idcarrera2, anio2: anio2,
    }, function(data){ 
        $("#contenido2").html(data);
    });
}

function ComboAnio(){
    var n = (new Date()).getFullYear()
    var select = document.getElementById("anio");
    select.options.add(new Option('Seleccione ciclo'))
    for(var i = n; i>=n-4; i--)select.options.add(new Option(i,i)); 
}

function ComboAnio2(){
    var n = (new Date()).getFullYear()
    n=n+1;
    var select = document.getElementById("anio2");
    select.options.add(new Option('Seleccione ciclo'))
    for(var i = n; i>=n-1; i--)select.options.add(new Option(i,i)); 
}