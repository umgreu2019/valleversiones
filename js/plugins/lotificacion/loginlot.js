$(document).ready(function() {
$('.enviar').click(function() {



 var verif=validarFormVacio('frmlogin');
                     
       if(verif>0){
              swal({
                type: 'warning',
                title: '<p class="h3 text-warning">Oops...</p>',
                width: 700,
                animation: false,
                customClass: 'animated zoomIn',
                html: '<p class=" text-warning h3 text-center font-weight-bold">POR FAVOR COMPLETE LOS CAMPOS!</p>',
                 // footer: '<img class="img-fluid  yoimagen ml-auto" height="45px" src="login/img/FRAMA/farmasalog1.png" alt="Logo de Frama">'
            })
              var text="Oo, no. ¡Parece que los datos van incompletos!";                 
              responsiveVoice.speak(text,"Spanish Female",{pinch:1},{rate: 0.9});
              text=encodeURIComponent(text);
              var url="http://";
        } 
      else{
        var log=$('#frmlogin').serialize();

             var text="¡Autenticando!...";                 
              responsiveVoice.speak(text,"Spanish Female",{pinch:1},{rate: 0.9});
              text=encodeURIComponent(text);
              var url="http://";

     $(".login").addClass("test");
  setTimeout(function() {
    $(".login").addClass("testtwo");
  }, 300);
  setTimeout(function() {
    $(".authent")
      .show()
      .animate(
        { right: -320 },
        { easing: "easeOutQuint", duration: 600, queue: false }
      );
    $(".authent")
      .animate({ opacity: 1 }, { duration: 200, queue: false })
      .addClass("visible");
  }, 500);


  setTimeout(function() {
  $.ajax({
    type:"POST",
    data:log,
    url:"php/Login/logueo.php",
    success:function(respuesta){

      setTimeout(function() {
    $(".authent")
      .show()
      .animate(
        { right: 90 },
        { easing: "easeOutQuint", duration: 600, queue: false }
      );
    $(".authent")
      .animate({ opacity: 0 }, { duration: 200, queue: false })
      .addClass("visible");
    $(".login").removeClass("testtwo");
  }, 2500);
  
  setTimeout(function() {
    $(".login").removeClass("test");
    $(".login div").fadeOut(123);
  }, 2800);

  if(respuesta==1){
  setTimeout(function() {
    $(".success").fadeIn();
var text="¡La Autenticación fue un exito. Redirigiendo al menú principal!...";                 
              responsiveVoice.speak(text,"Spanish Female",{pinch:1},{rate: 1});
              text=encodeURIComponent(text);
              var url="http://";
    }, 3000);

    

 setTimeout(function() {
   
   let timerInterval
Swal.fire({
  title: '<p class="h3 text-warning font-weight-bold">Redirigiendo!</p>',
  timer: 3000,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      Swal.getContent().querySelector('strong')
        .textContent = Swal.getTimerLeft()
    }, 1000)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.timer
  ) {
   window.location="modulos/tablero.php"
  }
})


    }, 5200);

  }
    else if(respuesta==2){
     setTimeout(function() {
    $(".fail").fadeIn();

    var text="¡Oo no! La Autenticación falló, vuelva a intentarlo.";                 
              responsiveVoice.speak(text,"Spanish Female",{pinch:1},{rate: 1});
              text=encodeURIComponent(text);
              var url="http://";
  }, 3200); 
    
  } 
    }

  }) },2000)

   }     
  
});

$('.regres').click(function(){
  $('.fail').hide();
  $('.authent').hide();
  $('.log').show();
})

$('input[type="text"],input[type="password"]').focus(function() {
  $(this)
    .prev()
    .animate({ opacity: "1" }, 200);
});
$('input[type="text"],input[type="password"]').blur(function() {
  $(this)
    .prev()
    .animate({ opacity: ".5" }, 200);
});

$('input[type="text"],input[type="password"]').keyup(function() {
  if (!$(this).val() == "") {
    $(this)
      .next()
      .animate({ opacity: "1", right: "30" }, 200);
  } else {
    $(this)
      .next()
      .animate({ opacity: "0", right: "20" }, 200);
  }
});

var open = 0;
$(".tab").click(function() {
  $(this).fadeOut(200, function() {
    $(this)
      .parent()
      .animate({ left: "0" });
  });
});

});


function validarFormVacio(formulario){
    datos=$('#' + formulario).serialize();
    d=datos.split('&');
    vacios=0;
    for(i=0;i< d.length;i++){
            controles=d[i].split("=");
            if(controles[1]=="A" || controles[1]==""){
                vacios++;
            }
    }
    return vacios;
}