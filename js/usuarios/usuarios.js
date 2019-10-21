$(document).ready(function(){
    //cuando hagamos submit al formulario con id id_del_formulario
    //se procesara este script javascript

    $('#IdDepto').change(function(){
        $('#IdDepto option:selected').each(function(){
            id_dept=$(this).val();
            $.post("http://localhost/ValleSistema2/php/usuario/datos.php",{ id_dept: id_dept
            }, function(data){
            $("#IdMuni").html(data);
            });
    });
    });


    $('#IdDeptor').change(function(){
        $('#IdDeptor option:selected').each(function(){
            id_dept=$(this).val();
            $.post("http://localhost/ValleSistema2/php/usuario/datos.php",{ id_dept: id_dept
            }, function(data){
            $("#IdMunir").html(data);
            });
    });
    });

     $('#IdDeptora').change(function(){
        $('#IdDeptora option:selected').each(function(){
            id_dept=$(this).val();
            $.post("http://localhost/ValleSistema2/php/usuario/datos.php",{ id_dept: id_dept
            }, function(data){
            $("#IdMunira").html(data);
            });
    });
    });

     $('#IdDeptona').change(function(){
        $('#IdDeptona option:selected').each(function(){
            id_dept=$(this).val();
            $.post("http://localhost/ValleSistema2/php/usuario/datos.php",{ id_dept: id_dept
            }, function(data){
            $("#IdMunina").html(data);
            });
    });
    });

     $('#IdDeptorf').change(function(){
        $('#IdDeptorf option:selected').each(function(){
            id_dept=$(this).val();
            $.post("http://localhost/ValleSistema2/php/usuario/datos.php",{ id_dept: id_dept
            }, function(data){
            $("#IdMunirf").html(data);
            });
    });
    });

     $('#IdDeptonf').change(function(){
        $('#IdDeptonf option:selected').each(function(){
            id_dept=$(this).val();
            $.post("http://localhost/ValleSistema2/php/usuario/datos.php",{ id_dept: id_dept
            }, function(data){
            $("#IdMuninf").html(data);
            });
    });
    });

   $('#Updepton').change(function(){
        $('#Updepton option:selected').each(function(){
            id_dept=$(this).val();
            $.post("http://localhost/ValleSistema2/php/usuario/datos.php",{ id_dept: id_dept
            }, function(data){
            $("#Upmunin").html(data);
            });
    });
    });


     $("#PROFE").click(function(){
       verif=validarFormVacio('FRMPROFE');
       if(verif>0){
        demo.showWarning('top','right'); 
       /* $('#IdDepto').val(function () {
        return $(this).find('option').filter(function () {
            return $(this).prop('defaultSelected');
        }).val(); 
        });*/
       }else{
           $dato=$("#FRMPROFE").serialize();
        $.ajax({
         //action del formulario, ej:          
          type: "POST",//el método post o get del formulario
          data: $dato,//obtenemos todos los datos del formulario
          url: "http://localhost/ValleSistema2/php/usuario/informp.php", 
          success:function(r){
               alert(r);
              if(r>1){
                demo.showSucces('top','right');
                $('#FRMPROFE')[0].reset();
                window.setTimeout('location.reload()', 500);
                }
                else{
                    demo.showDanger('top','right');  
                }
             }
         });
        }
      });

      // $("#BTNADMIN").click(function(){
       
      //  verif=validarFormVacio('FRMADMIN');
      //  if(verif>0){
      //   demo.showWarning('top','right'); 
      //  }else{
      //      $dato=$("#FRMADMIN").serialize();
      //   $.ajax({
      //    //action del formulario, ej:          
      //     type: "POST",//el método post o get del formulario
      //     data: $dato,//obtenemos todos los datos del formulario
      //     url: "../php/profesor/informp.php", 
      //     success:function(r){
              
      //         if(r==1){
      //           demo.showSucces('top','right');
      //           $('#FRMADMIN')[0].reset();
      //           }
      //           else{
      //               demo.showDanger('top','right');  
      //           }
      //        }
      //    });
      //   }
      // });

      // $("#BTNFINA").click(function(){
       
      //  verif=validarFormVacio('FRMFINAN');
      //  if(verif>0){
      //   demo.showWarning('top','right'); 
      //  }else{
      //      $dato=$("#FRMFINAN").serialize();
      //   $.ajax({
      //    //action del formulario, ej:          
      //     type: "POST",//el método post o get del formulario
      //     data: $dato,//obtenemos todos los datos del formulario
      //     url: "../php/profesor/informp.php", 
      //     success:function(r){
              
      //         if(r==1){
      //           demo.showSucces('top','right');
      //           $('#FRMFINAN')[0].reset();
      //           }
      //           else{
      //               demo.showDanger('top','right');  
      //           }
      //        }
      //    });
      //   }
      // });
     
        
    $("#Idprofe").change(function(){

        
        d=document.getElementById("Idprofe").value;
        // alert(d);  
        $.ajax({
         //action del formulario, ej:          
          type: "POST",//el método post o get del formulario
          data: {"d":d},//obtenemos todos los datos del formulario
          url: "http://localhost/ValleSistema2/php/usuario/permipuesto.php", 
          success:function(r){
              // alert(r);
               
              // if(r!=null){
              //   for(i=0; i<r.length; i++){
              //       alert(r[i]);
              //       $("#p"+r[i]).prop("checked",true);
              //   }
              //   }
              //   else{
              //       alert("error");
              //   }
             }
         });
    });
      
 $(".btngenerarContra").click(function(){
 	$.post("http://localhost/ValleSistema2/php/usuario/intermediarioRecursivo.php",{function:"GenerarContra"},function(data){
 		$(".resultadoContra").val(data);
 	})
 })

 $(".verificar").blur(function(){

 	var dato1=$("#nombre").val().length;
	var dato2=$("#apellido").val().length;	
	var resultado=$("#nombre").val();
	var resultado1=$("#apellido").val();
	if((dato1 && dato2)>0){
	var dato="nulo";
	var espacio = " ";
	var arrayDeCadenas1 = resultado.split(espacio);
	var arrayDeCadenas2 = resultado1.split(espacio);

	for(x=0; x<arrayDeCadenas1.length; x++){
      	if(x==0){
      	var dato=arrayDeCadenas1[x].charAt(0);
      	}
      }
    if(arrayDeCadenas2.length>=2){
      for(x1=0;x1<arrayDeCadenas2.length; x1++){
      	if(x1==0){
      	var dato=dato+arrayDeCadenas2[x1].toLowerCase();
      	}
      	else{
      	var dato=dato+arrayDeCadenas2[x1].charAt(0).toLowerCase();	
      	}
      }
    }else if(arrayDeCadenas2.length==1){
	 for(x1=0;x1<arrayDeCadenas2.length; x1++){
	  if(x1==0){
      	var dato=dato+arrayDeCadenas2[x1].toLowerCase();
       }
	 }
    }
    var datos=dato.normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    
		$.post("http://localhost/ValleSistema2/php/usuario/intermediarioRecursivo.php",{function:"GenerarUsuario",datos:datos},function(data){
			$(".resultadoUsuario").val(data);
		})
	}else{

	}
	
 })


    

   $('#tableUsuariosLoad').load("vistas/Tablas/TabalaEmpleado.php");

      $('#btnUpdate').click(function(){
        datos=$('#frmUpdateUsuarios').serialize();
        $.ajax({
          type:"POST",
          data:datos,
          url:"http://localhost/ValleSistema2/php/usuario/ActualizaUsuario.php",
          success:function(r){
              // alert(r);
            if(r==1){
                demo.showPar('top','right','ACTUALIZACION COMPLETA','el proceso termino con exito');
              $('#tableUsuariosLoad').load("vistas/Tablas/TabalaEmpleado.php");
            }else{
                demo.showDepar('top','right','ERROR AL ACTUALIZAR','Hubo un Error :(');  
            }
          }
        });
      });
 
});


 function agregarDato(idUser){
      $.ajax({
        type:"POST",
        data:"iduser="+ idUser,
        url:"http://localhost/ValleSistema2/php/usuario/ObtenerDatosUsuario.php",
        success:function(r){
          dato=jQuery.parseJSON(r);
          $('#UpIdUsuario').val(dato['id_usuario']);
          $('#UpDPI').val(dato['dpi']);
          $('#UpNombre').val(dato['nombre']);
          $('#UpApellido').val(dato['apellido']);
          $('#Updepton').val(dato['depto']);
          $('#Upmunin').val(dato['muni']);
          //('#UpUsuario').val(dato['usuario']);
          //('#UpPassword').val(dato['passwrodd']);
          $('#Uppuesto').val(dato['id_tipousuario']);
          $('#Updireccion').val(dato['direccion']);
          $('#Uptelefono').val(dato['telefono']);
          $('#Upusuario').val(dato['usuario']);
        }
      });
    }
    
function actualiza(idUser){
        $.ajax({
        type:"POST",
        data:"iduser="+ idUser,
        url:"http://localhost/ValleSistema2/php/usuario/actualizar.php",
        success:function(r){
            // alert(r);
              if (r!=null) {
                demo.showPar('top','right','DATO'+" "+r," "+'el proceso termino con exito');
                $('#tableUsuariosLoad').load("vistas/Tablas/TabalaEmpleado.php");
                
            }else{
                demo.showDepar('top','right','ERROR AL ELIMINAR','Hubo un Error :('); 
            }

        }
    });
    }

    function CambiarEst(id_usuariopermiso){
  var datos={"id_up":id_usuariopermiso};
  $.ajax({
    type:"POST",
    data:datos,
    url:"http://localhost/ValleSistema2/php/usuario/intpermiso.php",
    success:function(r){
      
      if (r==1) {

         swal({
                        title: 'Se Ha cambiado el estado del permiso',
                        width: 700,
                        imageUrl: '../img/prueba2.gif',
                        imageWidth: 260,
                        imageHeight: 200,
                        imageAlt: 'Custom image',
                        background: '#fff url(https://sweetalert2.github.io/images/trees.png)'
                       
                    })
        
        $('#tabla-permisos').load("vistas/Tablas/listadoempleado.php");
      }else{
        alert("Error al Cambiar");
      }
    }
  })
}

  function CargarPermisos(idusuario){
    $.ajax({
      type:"POST",
      data:"iduser="+idusuario,
      url:"http://localhost/ValleSistema2/php/usuario/intcargaper.php",
      success:function(r){
        $('#tabla-permisos').load("vistas/Tablas/listadoempleado.php");
      }
    });
  }

    function eliminaDato(idUser){

      Swal.fire({
  title: 'SEGURO DE ELIMINAR',
    text: 'si borra el registro no podra ser recuperado nuevamente',
    type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#0e5430',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.value) {
    $.ajax({
          type:"POST",
          data:"iduser="+idUser,
          url:"http://localhost/ValleSistema2/php/usuario/eliminaUsuario.php",
          success:function(r){

            if (r==1) {
                demo.showPar('top','right','DATO ELIMINADO','el proceso termino con exito');
                $('#tableUsuariosLoad').load("vistas/Tablas/TabalaEmpleado.php");
                
            }else{
                demo.showDepar('top','right','ERROR AL ELIMINAR','Hubo un Error :('); 
            }
          }
        });
  }
})
 
    }