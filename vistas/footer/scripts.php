  <audio src="" hidden class="speech"></audio>
  </div>
 <!--   Core JS Files   -->
<!--   <script src="<?php echo SERVERURL; ?>/js/plugins/jquery/jquery.min.js"></script> -->
  <script src="<?php echo SERVERURL; ?>js/plugins/MaterialTheme/core/jquery.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="<?php echo SERVERURL; ?>js/plugins/MaterialTheme/core/popper.min.js"></script>
  <script src="<?php echo SERVERURL; ?>js/plugins/MaterialTheme/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo SERVERURL; ?>js/plugins/perfect-scrollbar/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo SERVERURL; ?>js/plugins/moment/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo SERVERURL; ?>js/plugins/sweetalert/sweetalert2.all.min.js"></script>
  <!-- wow -->
  <script src="<?php echo SERVERURL; ?>js/plugins/wow/wow.js"></script>
  <!-- Font-awesome -->
  <!-- <script src="<?php echo SERVERURL; ?>/js/plugins/Fonts/js/fontawesome.js"></script> -->
  <link href="<?php echo SERVERURL; ?>js/plugins/fontawesomev2/js/all.js" rel="stylesheet">
  <!-- Forms Validations Plugin -->
  <script src="<?php echo SERVERURL; ?>js/plugins/jquery-validate/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?php echo SERVERURL; ?>js/plugins/jquery-bootstrap/jquery.bootstrap-wizard.js"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?php echo SERVERURL; ?>js/plugins/selectpicker/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?php echo SERVERURL; ?>js/plugins/bootstrap-material-datetimepicker/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?php echo SERVERURL; ?>js/plugins/jquery-datatable/jquery.dataTables.min.js"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo SERVERURL; ?>js/plugins/bootstrap-tags/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <!-- <script src="<?php echo SERVERURL; ?>/js/plugins/jquery/jasny-bootstrap.min.js"></script> -->
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?php echo SERVERURL; ?>js/plugins/fullcalendar/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?php echo SERVERURL; ?>js/plugins/jquery-jvector/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo SERVERURL; ?>js/plugins/nouislider/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="<?php echo SERVERURL; ?>js/plugins/MaterialTheme/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="<?php echo SERVERURL; ?>js/plugins/arrive/arrive.min.js"></script>
  <script src="<?php echo SERVERURL; ?>js/plugins/select2/select2.min.js"></script>

  <!-- Chartist JS -->
  <script src="<?php echo SERVERURL; ?>js/plugins/chartist/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo SERVERURL; ?>js/plugins/bootstrap-notify/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo SERVERURL; ?>js/plugins/MaterialTheme/material-dashboard.js?v=2.1.1" type="text/javascript"></script>

  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo SERVERURL; ?>js/plugins/demo/demo.js"></script>

  <!-- activando sidebar responsivo -->
  <script src="<?php echo SERVERURL; ?>js/plugins/sidebar/sidebar.js"></script>
  <!-- termina activacion sidebar -->

  <!-- plugin comando de voz -->
  <script src="<?php echo SERVERURL; ?>js/plugins/annyang/annyang.min.js"></script>
  <script src="<?php echo SERVERURL; ?>js/plugins/reponsivevoice/responsivevoice.js"></script>

                    <!-- Plugin Datatable -->
  <script src="<?php echo SERVERURL; ?>js/plugins/datatable/dataTables.bootstrap4.min.js"></script>
                          <!-- inputmask -->
  <script src="<?php echo SERVERURL; ?>js/plugins/inputmask/jquery.inputmask.js"></script>
  <script src="<?php echo SERVERURL; ?>js/plugins/inputmask/inputmask.js"></script>
  <script src="<?php echo SERVERURL; ?>js/plugins/inputmask/extensions/inputmask.extensions.js"></script>
  <script src="<?php echo SERVERURL; ?>js/plugins/validarformulario/llenado.js"></script>
  <script src="<?php echo SERVERURL; ?>js/plugins/inputmask.js"></script>
  <!-- mask -->
  <!-- <script src="</?php echo SERVERURL; ?>/js/plugins/mask/jquery.mask.js"></script> -->
  <!-- Smartsupp Live Chat script -->

  <script>
    $(document).ready(function() {

  if(localStorage.getItem("theme")){
      if($(".fondo").hasClass("bg-dark")==false && $(".fondo").hasClass("bg-white")==true){
         $(".fondo").removeClass("bg-white");
         $(".fondo").addClass("bg-dark");
      }
      else if($(".fondo").hasClass("bg-dark")==true && $(".fondo").hasClass("bg-white")==true){
         $(".fondo").removeClass("bg-white");
      }
  }else{
       if($(".fondo").hasClass("bg-dark")==false){
        $(".fondo").removeClass("bg-dark");
        }
  }

  $("#cambiartema").click(function(){
      if(localStorage.getItem("theme")){
       localStorage.removeItem("theme")
       location.reload();
      }else{
        
            localStorage.setItem("theme","activado")            
            location.reload();
       }
   })


      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

      if(annyang){
        var comando ={
          'Ve a Home':function(e){
            e.preventDefault();
                var text="Regresando a Menú Principal";
                text =encodeURIComponet(text);
                var url="http://translate.google.com/translate_tts?tl=es&q="+text;
                $("audio").attr('src',url).get(0).play;
                 setTimeout(function() {
                 window.location="tablero.php";
                 }, 2200); 
              
          },
          'Ir a Menu':function(){
              window.location="tablero.php";
              var text="Regresando a Menú Principal";
                text =encodeURIComponet(text);
                var url="http://translate.google.com/translate_tts?tl=es&q="+text;
                $("audio").attr('src',url).get(0).play;
                 setTimeout(function() {
                 window.location="tablero.php";
                 }, 2200); 
          },
          'abrir lotificacion':function(){
            $('#collapseLoti').addClass('show');
          },
           'cerrar lotificacion':function(){
            $('#collapseLoti').removeClass('show');
          },
          'salir':function(){
            window.location="<?php echo SERVERURL; ?>/php/Login/logout.php";
          },
          'menú Principal':function(e){
            
              var text="Regresando a Menú Principal";
                 
              responsiveVoice.speak(text,"Spanish Female");
              text=encodeURIComponent(text);
              var url="http://";

                 setTimeout(function() {
                 window.location="tablero.php";
                 }, 4200); 
          },
          'Ir a Menu Principal':function(){
              window.location="tablero.php";
          },
          'Imprimir':function(){
            var text="Ok. Imprimiendo";
                 
              responsiveVoice.speak(text,"Spanish Female");
              text=encodeURIComponent(text);
              var url="http://";
              setTimeout(function() {
                alert("Imprimiendo");
              }, 4200); 
              
          }
        }
          annyang.setLanguage('es-MX');
          annyang.addCommands(comando);
          annyang.debug();
          annyang.start({continuous:false});
      }

      $('.select2').select2({
         language: {
         noResults: function() {
         return "No hay resultado";        
         },
         searching: function() {
         return "buscando";
         }
         },
         placeholder: 'Seleccione una opcion',
         width: '100%'
        });
    });
  </script>

  <script>
      new WOW().init();
  </script> 
  
</body>
