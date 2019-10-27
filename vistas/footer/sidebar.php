<?php 

$aux=$_SESSION['permisos'];
for($i=0; $i<count($_SESSION['permisos']); $i++){
$c = explode("||",$aux[$i]);
$acceso[$i]=$c[0];
$estado[$i]=$c[1];
}
 ?>
 <style>
::-webkit-scrollbar{
    width: 8px;
    background-color: #00a8f3;
 
}
::-webkit-scrollbar-track{
    border-radius: 8px;
    background-color: #CCCCCC;
    display: none;
}
::-webkit-scrollbar-thumb{
    border-radius: 8px;
    background-color: #00a8f3;
    display: none;
    /*background-image: -webkit-linear-gradient(90deg,transparent,rgba(0, 0, 0, 0.4) 50%,transparent,transparent)*/
}
</style>

<div class="sidebar wow slideInLeft delay-1s" data-color="azure" data-background-color="<?php echo $fondo ?>" data-image="<?php echo SERVERURL; ?>img/sidebar-3.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="tablero" class="logo-normal">
          <div class="row">
          <div class="col-md-7 mx-auto">
              <img src="<?php echo SERVERURL; ?>img/valle/logovalle.png" class="img-fluid logosidebar" alt="Responsive">     
          </div>
          </div>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link bg-teal" href="tablero">
              <i class="fas fa-home"></i>
              <p class="font-weight-bold ">Menu Principal</p>
            </a>
          </li>
          
          <?php if(($acceso[2]==3 && $estado[2]==1) ||($acceso[4]==5 && $estado[4]==1)){
                    ?>
              <li class="nav-item active " id="accordion" role="tablist">
                    <a class="nav-link bg-teal text-white" href="#collapse1" data-toggle="collapse"  data-parent="#acordion">
                    <i class="material-icons text-white">account_circle</i>
                    <i class="material-icons float-right pl-4">keyboard_arrow_down</i> 
                    <p class="font-weight-bold">1. Usuarios</p>
                    
                    </a>

            <div id="collapse1" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
              
              <ul  class="list-group " >
                <?php if(($acceso[2]==3 && $estado[2]==1)): ?>
                <li class="list-group-item">
                <a class="nav-link amplia" href="11cvs">
                   <i class="fas fa-address-card"></i>
                   <p>1.1 Registro de Usuario</p></a>
                </li>
                <?php endif; ?>
              

                <?php if(($acceso[4]==5 && $estado[4]==1)): ?>
                <li class="list-group-item">
                  <a class="nav-link amplia" href="12cvs">
                     <i class="fas fa-search"></i>
                     <p>1.2 Actualizar Usuario</p></a>
                </li>
                <?php endif; ?>
              </ul>
            </div>
            <div class="dropdown-divider"></div>
          </li>
          <?php } ?>

           <?php if(($acceso[1]==2 && $estado[1]==1) ||($acceso[3]==4 && $estado[3]==1)):
                    ?>
          <li class="nav-item " id="accordion" role="tablist">
              <a class="nav-link bg-teal text-white" href="#collapse2" data-toggle="collapse"  data-parent="#acordion">
               <i class="material-icons text-white">school</i>
               <i class="material-icons float-right pl-4">keyboard_arrow_down</i> 
               <p class="font-weight-bold">2. Alumno</p>        
              </a>

            <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
              <ul  class="list-group " >
                <?php if(($acceso[1]==2 && $estado[1]==1)):?>
                <li class="list-group-item">
                 <a class="nav-link amplia" href="21cvs">
                  <i class="fas fa-plus"></i>
                  <p>2.1 Ingresar Alumno</p></a>
                </li>
              <?php endif; ?>
              
              <?php if(($acceso[3]==4 && $estado[3]==1)):?>
                 <li class="list-group-item">
                      <a class="nav-link amplia" href="22cvs">
                        <i class="fas fa-folder-open"></i>
                      <p>2.2 Reinscribir Alumno</p></a>
                </li>
              <?php endif; ?>

              <?php if(($acceso[3]==4 && $estado[3]==1)):?>
                 <li class="list-group-item">
                  <a class="nav-link amplia" href="23cvs">
                   <i class="fas fa-star"></i>
                  <p>2.3 Promocion Alumnos</p></a>
                </li>
              <?php endif; ?>

              </ul>
            </div>
            <div class="dropdown-divider"></div>
          </li>
          <?php endif; ?>

          <?php if(($acceso[0]==1 && $estado[0]==1)): ?>
            <li class="nav-item " id="accordion" role="tablist">
             <a class="nav-link bg-teal text-white" href="#collapse3" data-toggle="collapse"  data-parent="#acordion">
             <i class="material-icons text-white">money</i>
             <i class="material-icons float-right pl-4">keyboard_arrow_down</i> 
             <p class="font-weight-bold">3. Pagos</p>        
             </a>

            <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
              <ul  class="list-group " >

                <?php if(($acceso[0]==1 && $estado[0]==1)): ?>
                <li class="list-group-item">
                  <a class="nav-link amplia" href="31cvs">
                   <i class="fas fa-folder"></i>
                  <p style="font-size: 12.5px;">3.1 Pagos Mensual/Especial</p></a>
                </li>
                 <?php endif; ?>

                 <?php if(($acceso[0]==1 && $estado[0]==1)): ?>
                <li class="list-group-item">
                 <a class="nav-link amplia" href="32cvs">
                  <i class="fas fa-calendar"></i>
                  <p style="font-size: 12.5px;">3.2 Comprobantes de salario</p></a>
                </li>
                 <?php endif; ?>
              

            <?php if(($acceso[0]==1 && $estado[0]==1)): ?>
                 <li class="list-group-item">
                   <a class="nav-link amplia" href="33cvs">
                    <i class="fas fa-calendar-alt"></i>
                  <p style="font-size: 12.5px;">3.3 Cierre de Caja</p></a>  
                </li>
            <?php endif; ?>
              </ul>
            </div>
            <div class="dropdown-divider"></div>
          </li>
          <?php endif; ?>

        
         <?php if(($acceso[8]==9 && $estado[8]==1) || ($acceso[9]==10 && $estado[9]==1)): ?>
              <li class="nav-item active" id="accordion" role="tablist">
               <a class="nav-link bg-teal text-white" href="#collapse4" data-toggle="collapse"  data-parent="#acordion">
                <i class="material-icons text-white">collections_bookmark</i>
                <i class="material-icons float-right pl-4">keyboard_arrow_down</i> 
                <p class="font-weight-bold">4.Cursos</p>        
               </a>

            <div id="collapse4" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
              <ul  class="list-group " >
                <?php if(($acceso[8]==9 && $estado[8]==1)): ?>
                <li class="list-group-item">
                  <a class="nav-link amplia" href="41cvs">
                    <i class="fas fa-book-reader"></i>
                  <p style="font-size: 12.5px;">4.1 Asignacion Catedraticos</p></a>
                </li>
               <?php endif; ?>

              <?php  if(($acceso[9]==10 && $estado[9]==1)):?>
                 <li class="list-group-item">
                  <a class="nav-link amplia" href="42cvs">
                   <i class="fas fa-book-open"></i>
                  <p style="font-size: 12.5px;">4.2 Ingreso Cursos/Grado</p></a>
                </li>
              <?php endif; ?>

              </ul>
            </div>
            <div class="dropdown-divider"></div>
         </li>
         <?php endif; ?>


          <?php if(($acceso[6]==7 && $estado[6]==1) || ($acceso[7]==8 && $estado[7]==1)): ?>
            <li class="nav-item " id="accordion" role="tablist">
             <a class="nav-link bg-teal text-white" href="#collapse5" data-toggle="collapse"  data-parent="#acordion">
              <i class="material-icons text-white">notes</i>
              <i class="material-icons float-right pl-4">keyboard_arrow_down</i> 
               <p class="font-weight-bold">5.Notas</p>    
             </a>

            <div id="collapse5" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
              <ul  class="list-group " >

                <?php if(($acceso[7]==8 && $estado[7]==1)): ?>
                    
                <li class="list-group-item">
                  <a class="nav-link amplia" href="51cvs">
                     <i class="material-icons">speaker_notes</i>
                  <p style="font-size: 12px;">5.1 Revision/ Ingreso de Notas</p></a>
                </li>
              <?php endif; ?>

              <?php if(($acceso[7]==8 && $estado[7]==1)): ?>
                 <li class="list-group-item">
                   <a class="nav-link amplia" href="52cvs">
                     <i class="material-icons">print</i>
                   <p style="font-size: 12.5px;">5.2 Reporte de Notas</p></a>
                </li>
                <?php endif; ?>

              </ul>
            </div>
            <div class="dropdown-divider"></div>
          </li>
          <?php endif; ?>

          <?php  if($acceso[5]==6 && $estado[5]==1):?>
             <li class="nav-item " >
                  <a class="nav-link bg-teal text-white" href="#collapse6" data-toggle="collapse"  data-parent="#acordion">
                    <i class="material-icons text-white">settings_ethernet</i>
                    <i class="material-icons float-right pl-4">keyboard_arrow_down</i> 
                    <p class="font-weight-bold">6. Reportes</p>
                  </a>

                  <div id="collapse6" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                    <ul  class="list-group " >
                    <?php if(($acceso[7]==8 && $estado[7]==1)): ?>
                     <li class="list-group-item">
                        <a class="nav-link amplia" onclick="reports('1')" href="#?">
                         <i class="material-icons">speaker_notes</i>
                        <p style="font-size: 13px;">6.1 Reporte Boleta de Pago</p></a>
                      </li>
                      <?php endif; ?>
                    
                       <?php if(($acceso[7]==8 && $estado[7]==1)): ?>
                       <li class="list-group-item">
                        <a class="nav-link amplia" onclick="reports('2')" href="#?">
                          <i class="material-icons">speaker_notes</i>
                         <p style="font-size: 13px;">6.2 Reporte Alumnos</p></a>
                      </li>
                      <?php endif; ?>

                      <?php if(($acceso[7]==8 && $estado[7]==1)): ?>
                       <li class="list-group-item">
                        <a class="nav-link amplia" onclick="reports('3')" href="#?">
                          <i class="material-icons">speaker_notes</i>
                        <p style="font-size: 13px;">6.3 Reporte Usuarios</p></a>
                      </li>
                      <?php endif; ?>

                      <?php if(($acceso[7]==8 && $estado[7]==1)): ?>
                       <li class="list-group-item">
                        <a class="nav-link amplia" href="62cvs">
                          <i class="material-icons">speaker_notes</i>
                        <p style="font-size: 13px;">6.4 Reporte Cuadros Bi</p></a>
                      </li>
                      <?php endif; ?>
                      
                    </ul>
                  </div>
                  <div class="dropdown-divider"></div>
                </li>
           <?php endif; ?>
        </ul>
      </div>
    </div>

     <script>
          function reports($valor){
                $.post("http://localhost/ValleSistema2/vistas/reportes.php",{"envio": $valor
            }, function(data){
              window.location="61cvs"
            });
             }   
    </script>