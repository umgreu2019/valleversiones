<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
   <meta content="Bootstrap, Parallax, Template, Registration, Landing" name="keywords">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <title>LOGIN @VALLEDELSUR</title>
  <link href="css/boostrap/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link href="login/css/font-awesome.min.css" rel="stylesheet">
  <link href="login/css/line-icons.css" rel="stylesheet">
  <link href="login/css/owl.carousel.css" rel="stylesheet">
  <link href="login/css/owl.theme.css" rel="stylesheet">
  <link href="login/css/nivo-lightbox.css" rel="stylesheet">
  <link href="login/css/magnific-popup.css" rel="stylesheet">
  <link href="login/css/slicknav.css" rel="stylesheet">
  <link href="login/css/animate.css" rel="stylesheet">
  <link href="login/css/style.css" rel="stylesheet">
  <link href="login/css/responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="login/css/animate/animate.css">
  <script src="login/js/sweetalert2.all.min.js"></script>
  <script src="login/js/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="login/css/sweetalert2.min.css">
  <script src="login/js/wow/wow.min.js"></script>  
  <script>
      new WOW().init();
  </script> 
  <link href="img/valle/logovalle.png" rel="icon">
</head>
<style>
.imgRedonda {
    width:100px;
    height:100px;
    border-radius:100px;
    border:5px solid #0000ff;
}
</style>
<body>
  <header>
   
  </header>
<section class="wrapper">

  <section class="container col-md-4 mt-5">
  <div class="wow jackInTheBox alert alert-success alert-dismissible fade show " role="alert">
    HOLA @INGRESA A: <strong><?php echo "@SISTEMA"." "; ?></strong>
    <button type="button" class="close wow hinge" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
  
  <div class="card border mx-auto border-danger rounded">
    <img src="login/img/bg1.jpg" alt="Card image cap" class="wow zoomInDown card-img-top img-fluid ">
    <div class="text-center ">
      <img src="img/valle/logovalle.jpg" alt="Card" class="img-fluid yoimagen wow zoomInUp imgRedonda">
    </div>
    <div class="card-block ">
      <div class="card-body wow rotateInUpLeft">
      <form id="frmlog">
        <div class="form-row">
         <div class="col-md-12 form-group">
         <label for="usuario">Usuari@</label>
       <div class="input-group mb-3">
       <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon0"><i class="fas fa-user-secret  fa-lg text-success font-weight-bold"></i></span>
       </div>
       <input type="text" class="form-control" name="usuario"id="usuario" placeholder="Usuari@" aria-label="Producto" aria-describedby="basic-addon0">
       </div>
      </div>
         </div>
         <div class="form-row">
         <div class="col-md-12 form-group">
         <label for="contra">Contraseña</label>
       <div class="input-group mb-3">
       <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt  fa-lg text-success font-weight-bold"></i></span>
       </div>
       <input type="password" class="form-control"  name="contra" id="contra" placeholder="Contraseña" aria-label="Contra" aria-describedby="basic-addon1">
       </div>
      </div>
      <button type="button" id="btningresar" class="btn btn-outline-danger ml-auto">INGRESAR<span class="ml-2"><i class="fas fa-sign-in-alt fa-lg text-dark"></i></span></button>
      </div>
      </form>
      </div>
    </div>
    <?php 
    date_default_timezone_set('America/Guatemala');
    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    ?>
    <div class="card-footer">
      <small class="text-muted"><?php echo "En Guatemala".": "." ".$dias[date('w')].", ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');?></small> <br>
      <small class="text-muted"><?php echo "Hora:"." ".date('h:i:s A'); ?></small>
    </div>
    </div>
    </section>
</section>
  
</body>

        <script src="login/js/jquery.min.js"></script>
        <script src="login/js/popper.min.js"></script>
        <script src="login/js/bootstrap.min.js"></script>
        <script src="login/js/jquery.mixitup.js"></script>
        <script src="login/js/nivo-lightbox.js"></script>
        <script src="login/js/owl.carousel.js"></script>
        <script src="login/js/jquery.stellar.min.js"></script>
        <script src="login/js/jquery.nav.js"></script>
        <script src="login/js/scrolling-nav.js"></script>
        <script src="login/js/jquery.easing.min.js"></script>
        <script src="login/js/smoothscroll.js"></script>
        <script src="login/js/jquery.slicknav.js"></script>
        <script src="login/js/wow.js"></script>
        <script src="login/js/jquery.vide.js"></script>
        <script src="login/js/jquery.counterup.min.js"></script>
        <script src="login/js/jquery.magnific-popup.min.js"></script>
        <script src="login/js/waypoints.min.js"></script>
        <script src="login/js/form-validator.min.js"></script>
        <script src="login/js/contact-form-script.js"></script>
        <script src="login/js/main.js"></script>
        <script src="login/js/validar.js"></script>
    <script>
$(document).ready(function(){
    //cuando hagamos submit al formulario con id id_del_formulario
    //se procesara este script javascript
    
     $("#btningresar").click(function(){
              var x=5;
      var verif=validarFormVacio('frmlog');
                     
       if(verif>0){
              swal({
                type: 'warning',
                title: 'Oops...',
                width: 700,
                animation: false,
                customClass: 'animated tada',
                background: 'url(https://sweetalert2.github.io/images/trees.png)',
                html: '<p class="text-warning font-weight-bold">POR FAVOR COMPLETE LOS CAMPOS!</p>',
                 // footer: '<img class="img-fluid  yoimagen ml-auto" height="45px" src="login/img/FRAMA/farmasalog1.png" alt="Logo de Frama">'
            })
               }
            else{
                      dato = $("#frmlog").serialize();
                               
                        $.ajax({
                         //action del formulario, ej:          
                          type: "POST",//el método post o geXt del formulario
                          data: dato,//obtenemos todos los datos del formulario
                          url: "php/login/loguear.php", 
                          success:function(ra){
                               // alert(ra);
                             r=jQuery.parseJSON(ra);      
                            if(r['accion']==1){
                              const toast = swal.mixin({
                              toast: true,
                              position: 'top-end',
                              showConfirmButton: false,
                              timer: 3000
                              });
                              
                              toast({
                              type: 'success',
                              title: 'Inicia Sessión Exitosamente'
                              })
                                 window.location="tablero";
                             }
                             if(r['accion']==0){
                              var res=(5 - parseInt(r['contador']));
                              swal({
                                   type: 'error',
                                  title: 'Oops...',
                                  width: 500,
                                  text: 'Error en la autencificacion quedan: '+res
                                }) 
                             }
                             if(r==2){
                                swal({
                        title: '<p class="h4 text-warning">HA LLEGADO EL MOMENTO DE CAMBIAR LA CONTRASEÑA</p>',
                        width: 700,
                        imageUrl: 'http://frama.hol.es/img2/log2.png',
                        imageWidth: 70,
                        imageHeight: 80,
                        imageAlt: 'Custom image',
                        background: '#fff url(https://sweetalert2.github.io/images/trees.png)',
                        backdrop: `
                        rgba(0,0,123,0.4)
                        url("https://images.adsttc.com/media/images/5774/3d50/e58e/ce31/0a00/0026/original/GIF.gif?1467235660")
                        center left
                        `,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si De acuerdo'
                    }).then((result) => {
                      if (result.value) {
                      let timerInterval
                      swal({
                        
                        title: 'Enviando Correo',
                        imageUrl: 'http://frama.hol.es/img2/log2.png',
                        imageWidth: 70,
                        imageHeight: 80,
                        imageAlt: 'Custom image',
                        background: 'url(https://sweetalert2.github.io/images/trees.png)',
                        html: 'Esta ventana se cerrara automaticamente en: <strong></strong> segundos.',
                        timer: 6000,
                        onOpen: () => {
                          swal.showLoading()
                          timerInterval = setInterval(() => {
                            swal.getContent().querySelector('strong')
                              .textContent = (swal.getTimerLeft()/1000);
                          }, 100)
                        },
                        onClose: () => {
                          clearInterval(timerInterval)
                        }
                      }).then((result) => {
                        if (
                          // Read more about handling dismissals
                          result.dismiss === swal.DismissReason.timer
                        ) {
                           $.ajax({
                            url: "php/envio.php",
                            success:function(r){
                              if(r!=null){
                                  swal(
                          '<p class="h4 text-success">EXITO AL ENVIAR</p>',
                          '<p class="text-info">Porfavor consulte su correo electronico</p>',
                          'success'
                          )
                              }
                              else{
                                   swal(
                          '<p class="h4 text-danger">ERROR AL ENVIAR</p>',
                          '<p class="text-info">Porfavor consulte su correo electronico</p>',
                          'error')
                              }
                            } // Podrías separar las funciones de PHP en un fichero a parte
                            })
                          
                        }
                        })
            
                      }
                      })
                             }
                             if(r==3){
                                   swal({
                                   type: 'info',
                                  title: 'Oops...',
                                  width: 500,
                                  text: 'Tu Contraseña ha sido bloqueada por favor comunicate con tu supervisor'
                                }) 
                             }
                              if(r==4){
                                   swal({
                                   type: 'error',
                                  title: 'Oops...',
                                  width: 500,
                                  text: 'Por favor revisa todos los datos'
                                }); 
                             }
                              if(r==5){
                                  swal({
                                   type: 'warning',
                                  title: 'Oops...',
                                  width: 500,
                                  text: 'Tu contraseña esta bloqueada espera 72 horas o comunicate con el administrador'
                                }); 
                             }
                            }
                         });
                      }
                    });
                 });
// document.oncontextmenu=function(){
//      swal({
//             type: 'error',
//             title: 'Oops...',
//             width: 500,
//             text: 'No se puede hacer click derecho'
//          })
//     return false;
//   }
            
</script>

<script>
  document.oncontextmenu=function(){
    swal("No se puede usar click derecho");
    return false;
  }
</script>

</html>

