<?php
require_once "../php/conexion/conexion.php";
session_start();
if(isset($_SESSION['usuario']))
{
$c = new conex();
$conexion=$c->conexion();
$nombre=$_SESSION['nombre'];
$apellido=$_SESSION['apellido'];
$puesto=$_SESSION['puesto'];
$fondo="black";
//$consulta="SELECT Imagen,dpi FROM administrador WHERE user='$usuario'";
//$resultado=mysqli_query($conexion,$consulta);
//$mostrar=mysqli_fetch_array($resultado);
 ?>
<!DOCTYPE html>
<html lang="en">
 
<?php require_once 'header/header.php'; ?>

    <!-- sidebar -->
    <?php require_once 'footer/sidebar.php'; ?>
    <!-- End Sidebar -->

    <div class="main-panel ">
      <!-- Navbar -->
    <?php require_once 'header/navbar.php'; ?>
      <!-- End Navbar -->
      <div class="content wow slideInRight delay-1s">
        <div class="container-fluid">
         <div class="row ">
           <div class="col-md-12">
             <div class="card mb-3  bg-transparent ">
            <div class="card-header  ">
              <nav>
              <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">INSCRIPCION</a>
              </div>
              </nav>
            </div>

              <div class="card-body bg-transparent">
              <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <p class="h5 card-title col-red font-weight-bold text-center">REGISTRO DEL ALUMNO</p>
              
              <div class="content">
              <div id="accordion" >
              <div class="card bg-transparent">
              <div class="card-header bg-white" id="headingOne" data-toggle="tooltip" title="Presione sobre el texto para desplegar">
                <h6 class="mb-0 h6">
                    <button class="btn btn-link col-purple w-100 text-left font-weight-bold" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="material-icons">assignment_ind</i> INSCRIPCION ALUMNADO
                    </button>
                </h6>
              </div>   <!-- card-header -->

              <div class="card-body bg-transparent">
              <div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordion">
                <div class="container-fluid">
                  <div class="row">
                   <div class="col-md-12"> 
                   
                   <div class="card bg-transparent">
                   
                   <div class="card-header col-md-12 backgr-light-blue" style="border-radius: 10px;">
                   <h5 class="card-title col-black font-weight-bold">REGISTRO DEL ALUMNO</h5>
                   <p class="card-category col-black">Complete el formulario</p>
                   </div>

                   <div class="card-body bg-transparent">
                    <form id="FRMA">
                    <div class="row">

                    <div class="col-md-6 ">
                    <div class="card-header card border bg-teal" style="border-radius: 10px;">
                    Estudiante 
                    </div>
                    
                    <div class="row">
                    
                    <div class="col-md-6">
                    <div class="form-group ">
                   <label class="form-control-label col-purple">Primer Nombre</label>
                    <input type="text" name="pnoma" class="form-control ">
                    </div>
                    </div>
                                        
                    <div class="col-md-6">
                    <div class="form-group">
                    <label class="form-control-label col-purple">Segundo Nombre</label>
                    <input type="text" name="snoma" class="form-control ">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label class="form-control-label col-purple">Primer Apellido</label>
                    <input type="text" name="papa" class="form-control ">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label class="form-control-label col-purple">Segundo Apellido</label>
                    <input type="text" name="sapa" class="form-control ">
                    </div>
                    </div>

                                        
                    </div> <!-- primer row -->                                         
                    </div> <!-- primer col-md-6 -->

                    <div class="col-md-6 ">
                    <div class="card-header card border bg-teal" style="border-radius: 10px;">
                    Residencia
                    </div>
                    
                    <div class="row">
              <?php
                   $consulta="SELECT * FROM departamento";
                   $resultado=mysqli_query($conexion,$consulta);
                 ?>
                   <div class="col-md-6">
                   <div class="form-group">
                   <label class="form-control-label col-purple">Departamento Residencia</label>
                   <select class="form-control form-control-md select2" name="ideptora" id="IdDeptor">
                   <option class="text-success" value="">SELECCIONE EL DEPARTAMENTO</option>
                   <?php
                   while ($mostrar = mysqli_fetch_array($resultado)) {
                   ?>
                   <option value="<?php echo $mostrar['id_depto'];?>"><?php echo $mostrar['nombred'];?></option>
                    <?php } ?>
                   </select>
                   </div>
                   </div>

                  <div class="col-md-6">
                  <div class="form-group">
                  <label class="form-control-label col-purple">Municipio Residencia</label>
                  <select class="form-control form-control-md select2" name="idmunira" id="IdMunir">
                  <option  value="" required>SELECCIONE EL MUNICIPIO</option>
                  </select>
                  </div> 
                  </div>

                  <div class="col-md-12">
                  <div class="form-group">
                  <label class="form-control-label col-purple">Direccion de Residencia</label>
                  <input type="text" name="dira" class="form-control">
                  </div>
                  </div>
                                    
                  </div>
                  </div>


                    </div> <!-- row -->

                    <div class="row">
                         <div class="col-md-6 ">
                          <div class="card-header card border bg-teal " style="border-radius: 10px;">
                             Nacimiento
                    </div>

                    <div class="row">
                    <div class="col-md-6 ">
                      <div class="form-group">
                      <label class="form-control-label col-purple">Fecha de Nacimiento</label>
                      <input type="date" name="fechana" class="form-control">
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                 <div class="form-group">
                   <label class="form-control-label col-purple">Género</label>
                  <select class="form-control form-control-md select2" required  name="generoa" id="genero">
                <option class="font-weight-bold" value="">GÉNERO</option>
                <option class="font-weight-bold text-masculino" value="MASCULINO">Masculino</option>
                <option class="font-weight-bold text-cari" value="FEMENINO">Femenino</option>
                   </select>
                </div>
                </div>

                    <div class="col-md-6">
                        <?php
                              $consult="SELECT * FROM areaescolar";
                          $resultad=mysqli_query($conexion,$consult);
                               
                          ?>
                      <div class="form-group">
                   <label class="form-control-label col-purple">Nivel Academico</label>
                   <select class="form-control  select2" required name="arean"  id="area">
                   <option class="font-weight-bold" value="0">Seleccione el Nivel</option>
                   <?php
                      while ($mostra = mysqli_fetch_array($resultad)) :
                   ?>
                    <option value="<?php echo $mostra[0];?>"><?php echo $mostra[1];?></option>
                   <?php endwhile; ?>
                   </select>     
                      </div>

                    </div>

                  <div class="col-md-6">
                    <div class="form-group">
                   <label class="form-control-label col-purple">Grado Academico</label>
                   <select class="form-control form-control-md select2" required  name="grado" id="grado">
                   <option class="font-weight-bold" value="0">Seleccione el Grado</option>
                   </select>
                    </div>
                                <!--     <div class="form-group">
                          <label class="form-control-label col-purple">Municipio Nacimiento</label>
                        <select class="form-control form-control-md" name="idmunina" id="IdMuni">
                         <option  value=" " required>SELECCIONE EL MUNICIPIO</option>
                             </select>
                        </div>  -->
                  </div>
               </div> <!-- row -->
               </div> <!-- col-md-6 -->

                <div class="col-md-6">
                  <div class="card-header card border bg-teal" style="border-radius: 10px;">
                    Información Adicional
                  </div>
                <div class="row">

                
            
              <!-- <div class="col-md-3"> -->
              <!-- <div class="form-group">
               <label class="form-control-label col-purple">Nacionalidad</label>
               <select class="form-control form-control-md" required  name="nacionalidada" id="naciona">
               <option class="font-weight-bold" value="">NACIONALIDAD</option>
               <option class="font-weight-bold text-masculino" value="Guatemaltec@">Guatemaltec@</option>
               <option class="font-weight-bold text-cari" value="Extranjer@">Extranjer@</option>
                </select>
                </div> -->
               <!-- </div> -->

            
                 
                 <div class="col-md-6">
                 <div class="form-group">
                 <label class="form-control-label col-purple">Codigo Personal</label>
                 <input type="text"  name="latera" required id="Lateralidad"  class="form-control">   
                 </div>
                 </div>

                 <div class="col-md-6 ">
                 <div class="form-group">
                 <label class="form-control-label col-purple">Carné</label>
                 <input type="text" name="carne" id="carnea"  class="form-control">
                  </div>
                 </div>

                  <div class="col-md-6 d-none" id="divcarrera">
                   <div class="form-group">
                   <label class="form-control-label col-purple">Carrera Escolar</label>
                   <select class="form-control form-control-md select2" required  name="carrera" id="carrera">
                   <option class="font-weight-bold" value="0">Seleccione la Carrera</option>
                            
                   </select>
                   </div>
                   </div>
                         
                   </div> <!-- col-md-6 -->  
                   </div> <!-- row -->
                     
                    
                  <!--   <div class="col-md-12">
                    <label class="form-control-label col-purple">Tomar Foto</label> 
                     <div class="form-group"> 
                     <div class="row">
                      <div class="col-md-6">
                     <select class="form-control-lg col-md-12 mt-1" name="listaDeDispositivos" id="listaDeDispositivos"></select>
                     </div>
                     <div class="col-md-6">
                     <button class="btn btn-outline-danger col-md-12" data-toggle="modal" data-target="#modalfoto" type="button" id="btnfoto">Tomar Foto <i class="material-icons">camera</i></button>
                     </div>
                     </div>
                     </div>
                   </div> -->

                </div> <!-- segundo row -->
                  </form> <!-- FRMA -->
                  </div> <!-- card-body -->

                   </div> <!-- card -->
                  </div> <!-- col-md-12 -->  
                  </div><!-- row -->
                 </div> <!-- container -->
               </div> <!-- collapseOne -->
              </div> <!-- card-body -->

              </div> <!-- card -->
              </div> <!-- accordion -->


            <div id="accordion" >
             <div class="card">
    
             <div class="card-header" id="headingtwo" data-toggle="tooltip" title="Presione sobre el texto para desplegar">
             <h6 class="mb-0 h6">
                    
             <button class="btn btn-link col-purple w-100 text-left font-weight-bold" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapseOne">
               <i class="material-icons">laptop_mac</i> DATOS DEL ENCARGADO
             </button>
             </h6>
             </div>

             <div class="card-body">
               <div id="collapsetwo" class="collapse show " aria-labelledby="headingtwo" data-parent="#accordion">
                 <div class="container-fluid">
                   <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                      
                      <div class="card-header col-md-12 backgr-light-blue" style="border-radius: 10px;">
                       <h5 class="card-title col-black font-weight-bold">REGISTRO DEL REPRESENTANTE</h5>
                       <div class="row">
                         <div class="col-md-6">
                           <p class="card-category col-black">Complete el formulario</p>
                         </div>
                         <div class="col-md-6">
                           <button type="button" id="btnbusqueda" style="background-color: rgba(208,29,34,0.9) " onclick="fnbusqueda()" class="btn btn-danger float-right">Habilitar Búsqueda</button>
                         </div>
                       </div>
                      </div>

                      <div class="card-body">
                        <form id="FRMR">
                            <?php 
                        $temple= "select id_representante,dpi, pnombre, snombre, papellido, sapellido from representante";
                        $col= mysqli_query($conexion,$temple);
                      ?>
                      <div class="col-md-6" id="busq" style="display: none;">
                        <div class="form-group" >
                        <label class="form-control-label col-purple">BÚSQUEDA: </label>
                        <select class="form-control form-control-sm select2" id="busqueda" name="busqueda">
                          <option value="" class="text-muted text-condensedLight">SELECCIONE ENCARGADO</option>
                            <?php while ($cons=mysqli_fetch_array($col)){ 
                            ?>
                          <option value="<?php echo $cons['id_representante'] ?>"><?php echo $cons['dpi']." ". $cons['pnombre']." ". $cons['snombre']." ". $cons['papellido']." ". $cons['sapellido']?></option>
                            <?php }?>
                        </select>
                        </div>
                      </div>
                    
                     <div class="row">
                     <div class="col-md-6 ">
                     <div class="card-header card border bg-teal" style=" border-radius: 10px;">
                      Encargado
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group ">
                    <label class="form-control-label col-purple">Primer Nombre</label>
                    <input type="text" name="pnombree" id="pnombree" class="form-control">
                    </div>
                    </div>

                     <div class="col-md-6">
                     <div class="form-group ">
                     <label class="form-control-label col-purple">Segundo Nombre</label>
                     <input type="text" name="snomr" id="snomr" class="form-control">
                     </div>
                     </div>

                     <div class="col-md-6">
                     <div class="form-group ">
                     <label class="form-control-label col-purple">Primer Apellido</label>
                     <input type="text" name="paper" id="paper" class="form-control">
                     </div>
                     </div>

                    <div class="col-md-6">
                    <div class="form-group ">
                    <label class="form-control-label col-purple">Segundo Apellido</label>
                    <input type="text" name="saper" id="saper" class="form-control">
                    </div>
                    </div>                                        
                    </div> <!-- row --> 
                    </div> <!-- col-md-6 --> 
                    
                    <div class="col-md-6 ">
                     <div class="card-header card border bg-teal" style="border-radius: 10px;">
                     Residencia
                     </div>
                                
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group ">
                    <?php
                     $consult3="SELECT * FROM departamento";
                     $resultado3=mysqli_query($conexion,$consult3);
                                
                    ?>
                    <label class="form-control-label col-purple">Departamento Residencia</label>
                     <select class="form-control form-control-md " name="ideptorr" id="ideptorr">
                      <option class="text-success" value="">SELECCIONE EL DEPARTAMENTO</option>
                      <?php
                       while ($mostrar3 = mysqli_fetch_array($resultado3)) {
                       ?>
                    <option id="dept<?php echo $mostrar3['id_depto'];?>" value="<?php echo $mostrar3['id_depto'];?>"><?php echo $mostrar3['nombred'];?></option>
                     <?php } ?>
                    </select>
                    </div>
                   </div>

                     <div class="col-md-6">
                     <div class="form-group ">
                                       
                     <label class="form-control-label col-purple">Municipio Residencia</label>
                     <select class="form-control form-control-md " name="idmunirr" id="idmunirr">
                     <option  value="" >SELECCIONE EL MUNICIPIO</option>
                    </select>
                    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group ">
                    <label class="form-control-label col-purple">Dirección de Residencia</label>
                    <input type="text" name="dirr" id="dirr" class="form-control">
                    </div>
                    </div>

                    </div> <!-- row -->
                   </div> <!-- col-md-6 -->
                   </div> <!-- row --> 
                  
                   <div class="row">
                    <div class="col-md-12 ">
                     <div class="card-header card border bg-teal" style="border-radius: 10px;">
                       Nacimiento e Información Adicional
                     </div>
                     
                       <div class="row">
                       
                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="form-control-label col-purple">DPI</label>
                                         <input type="text" name="dpi" id="dpi" class="form-control">
                                        </div>
                                        </div>
                                                                                                                    
                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="form-control-label col-purple">E-MAIL</label>
                                         <input type="text" name="email" id="email" class="form-control">
                                        </div>
                                        </div>

                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="form-control-label col-purple">Numero(s) de Contacto</label>
                                         <input type="text" name="numer" id="numer" class="form-control">
                                        </div>
                                        </div>
                      </div> <!-- row -->
                      </div> <!-- col-md-12 -->
                      </div> <!-- row -->

                      <div class="row">
                    <div class="col-md-12 ">
                     <div class="card-header card border bg-teal" style="border-radius: 10px;">
                       Encargado Titular 
                     </div>
                    
                       <div class="row">
                       
                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="form-control-label col-purple">Nombre:</label>
                                         <input type="text" id="nombreet" name="nombreet" class="form-control">
                                        </div>
                                        </div>
                                                                                                                    
                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="form-control-label col-purple">Teléfono:</label>
                                         <input type="text" id="numeroet" name="numeroet" class="form-control">
                                        </div>
                                        </div>

                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="form-control-label col-purple">Número de Casa:</label>
                                         <input type="text" id="casaet" name="casaet" class="form-control">
                                        </div>
                                        </div>
                      </div> <!-- row -->
                      </div> <!-- col-md-12 -->
                      </div> <!-- row -->

                    </div> <!-- row -->
                        </form>
                      </div>

                    <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8 ">
                    <button type="button" id="BTNALUMNO" class="btn bg-light-green float-right ">INGRESAR ALUMNO</button>
                    </div>
                    <div class="col-md-2"></div>
                    </div>

                    </div> <!-- card -->  
                  </div><!--  col-md-12 -->
                  </div><!--  row-->
                 </div><!--  container-fluid-->
               </div><!--collapsetwo-->
             </div><!--card-body-->


            </div> <!-- card -->
            </div><!-- accordion -->

              </div> <!-- content -->

              </div> <!-- tab-pane -->
              </div> <!-- tab-content -->
              </div> <!-- card-body -->

              </div>
           </div>
       </div>
      </div>

    </div>
</div> <!-- main-panel -->
 

  <?php require_once 'footer/scripts.php'; ?>
  <script src="<?php echo SERVERURL; ?>js/alumno/inscripcion/index.js"></script>
  
</html>
<?php 
}
else{
  header("location:index");
}
?>  