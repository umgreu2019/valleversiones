<?php
require_once "../php/conexion.php";

session_start();
if(!$_SESSION['nombre'])
{
  header("location:../index.php");
}
$c = new conex();
$conexion=$c->conexion();
$nombre=$_SESSION['nombre'];
$apellido=$_SESSION['apellido'];
$puesto=$_SESSION['puesto'];
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
     <link rel="apple-touch-icon" href="../img/2ICAT.png">
 <link href="../img/2ICAT.png" rel="icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
        <!-- <link rel="stylesheet" href="css/style.css" /> -->

<link rel="stylesheet" href="../assets/css/css.css" />
<link rel="stylesheet" href="../assets/css/font-awesome.min.css" />
<link rel="stylesheet" href="../assets/css/material-dashboard.css?v=2.0.0">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/sweetalert2.min.css">
<script src="../js/sweetalert2.all.min.js"></script>
<script src="../js/sweetalert2.min.js"></script>
    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
     <!--<link href="../assets/assets-for-demo/demo.css" rel="stylesheet" /> CSS Just for demo purpose, don't include it in your project -->    
     
<link rel="stylesheet" href="../DataTable/dataTables.bootstrap4.min.css">
<!-- plugins -->

<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/bootstrap-material-design.js"></script>


<script src="../assets/js/plugins/chartist.min.js"></script>

<script src="../DataTable/jquery.dataTables.min.js"></script>
<script src="../DataTable/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- Library for adding dinamically elements -->
<script src="../assets/js/plugins/arrive.min.js" type="text/javascript"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="../assets/js/material-dashboard.js?v=2.0.0"></script>
<!-- demo init -->
<script src="../js/perfect-scrollbar/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/js/plugins/demo.js"></script>
<script src="../js/llenado.js"></script>

    <!-- <link rel="stylesheet" href="../chosen/chosen.css"> -->
    <!-- <script src="../chosen/chosen.jquery.js"></script> -->
<!--     <script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/plugins/demo.js"></script>
<script src="../js/llenado.js"></script> -->

 
   <title>SISTEMA@ICAT</title>
  
    <!--     Fonts and icons     -->
    
<script>
$(document).ready(function(){
    $('#IdDepto').change(function(){
        $('#IdDepto option:selected').each(function(){
            id_dept=$(this).val();
            $.post("datos.php",{ id_dept: id_dept
            }, function(data){
            $("#IdMuni").html(data);
            });
    });
    });

    $('#IdDeptor').change(function(){
        $('#IdDeptor option:selected').each(function(){
            id_dept=$(this).val();
            $.post("datos.php",{ id_dept: id_dept
            }, function(data){
            $("#IdMunir").html(data);
            });
    });
    });

      $('#ideptorr').change(function(){
        $('#ideptorr option:selected').each(function(){
            id_dept=$(this).val();
            $.post("datos.php",{ id_dept: id_dept
            }, function(data){
            $("#idmunirr").html(data);
            });
         });
         });

      $('#IdDepton').change(function(){
        $('#IdDepton option:selected').each(function(){
            id_dept=$(this).val();
            $.post("datos.php",{ id_dept: id_dept
            }, function(data){
            $("#IdMunin").html(data);
            });
    });
    });

      // 
});
</script>
    <!-- iframe removal -->
</head>

<body class="">
<div class="wrapper">
    
   <?php require_once "../dependencia/sidebar.php"; ?>
    
     <div class="main-panel">
           <!-- Navbar -->
     <?php require_once "../dependencia/navbar.php"; ?>
         <!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
      <div class="row ">
          <div class="col-sm-12 mt-2">
            <div class="card mb-3 border-light ">
              <div class="card-header">
            
                <nav>
            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">INSCRIPCION</a>
            </div>
            </nav>

              </div>
              <div class="card-body">
              <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <p class="h5 card-title col-red font-weight-bold text-center">REGISTRO DEL ALUMNO</p>
              <div class="content">
              <div id="accordion" >
              <div class="card">
              
              <div class="card-header" id="headingOne" data-toggle="tooltip" title="Presione sobre el texto para desplegar">
                <h6 class="mb-0 h6">
                    <button class="btn btn-link text-uvg font-weight-bold" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="material-icons">assignment_ind</i> INSCRIPCION ALUMNADO
                    </button>
                </h6>
              </div>   <!-- card-header -->
           
              <div class="card-body">
              <div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordion">
                <div class="container-fluid">
                  <div class="row">
                   <div class="col-md-12"> 
                   
                   <div class="card">
                   
                   <div class="card-header col-md-12" style="background-color: rgba(208,29,34,0.9);">
                   <h5 class="card-title text-dark font-weight-bold">REGISTRO DEL ALUMNO</h5>
                   <p class="card-category text-dark">Complete el formulario</p>
                   </div>

                    <div class="card-body">
                    <form id="FRMA">
                    <div class="row">

                    <div class="col-md-6 ">
                    <div class="card-header card border" style="background-color: rgba(208,29,34,0.9); border-radius: 10px;">
                    Estudiante 
                    </div>
                    
                    <div class="row">
                    
                    <div class="col-md-6">
                    <div class="form-group ">
                   <label class="bmd-label-floating">Primer Nombre</label>
                    <input type="text" name="pnoma" class="form-control">
                    </div>
                    </div>
                                        
                    <div class="col-md-6">
                    <div class="form-group">
                    <label class="bmd-label-floating">Segundo Nombre</label>
                    <input type="text" name="snoma" class="form-control">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label class="bmd-label-floating">Primer Apellido</label>
                    <input type="text" name="papa" class="form-control">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                    <label class="bmd-label-floating">Segundo Apellido</label>
                    <input type="text" name="sapa" class="form-control">
                    </div>
                    </div>

                                        
                    </div> <!-- primer row -->                                         
                    </div> <!-- primer col-md-6 -->

                    <div class="col-md-6 ">
                    <div class="card-header card border" style="background-color: rgba(208,29,34,0.9); border-radius: 10px;">
                    Residencia
                    </div>
                    
                    <div class="row">
              <?php
                   $consulta="SELECT * FROM departamento";
                   $resultado=mysqli_query($conexion,$consulta);
                 ?>
                   <div class="col-md-6">
                   <div class="form-group">
                   <label class="bmd-label-floating">Departamento Residencia</label>
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
                  <label class="bmd-label-floating">Municipio Residencia</label>
                  <select class="form-control form-control-md select2" name="idmunira" id="IdMunir">
                  <option  value="" required>SELECCIONE EL MUNICIPIO</option>
                  </select>
                  </div> 
                  </div>

                  <div class="col-md-12">
                  <div class="form-group">
                  <label class="bmd-label-floating">Direccion de Residencia</label>
                  <input type="text" name="dira" class="form-control">
                  </div>
                  </div>
                                    
                  </div>
                  </div>


                    </div> <!-- row -->

                    <div class="row">
                         <div class="col-md-6 ">
                          <div class="card-header card border " style="background-color: rgba(208,29,34,0.9); border-radius: 10px;">
                             Nacimiento
                    </div>

                    <div class="row">
                    <div class="col-md-6 ">
                      <div class="form-group">
                      <label class="bmd-label-floating">Fecha de Nacimiento</label>
                      <input type="date" name="fechana" class="form-control">
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                 <div class="form-group">
                   <label class="bmd-label-floating">Género</label>
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
                   <label class="bmd-label-floating">Nivel Academico</label>
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
                   <label class="bmd-label-floating">Grado Academico</label>
                   <select class="form-control form-control-md select2" required  name="grado" id="grado">
                   <option class="font-weight-bold" value="0">Seleccione el Grado</option>
                   </select>
                    </div>
                                <!--     <div class="form-group">
                          <label class="bmd-label-floating">Municipio Nacimiento</label>
                        <select class="form-control form-control-md" name="idmunina" id="IdMuni">
                         <option  value=" " required>SELECCIONE EL MUNICIPIO</option>
                             </select>
                        </div>  -->
                  </div>
               </div> <!-- row -->
               </div> <!-- col-md-6 -->

                <div class="col-md-6">
                  <div class="card-header card border" style="background-color: rgba(208,29,34,0.9); border-radius: 10px;">
                    Información Adicional
                  </div>
                <div class="row">

                
            
              <!-- <div class="col-md-3"> -->
              <!-- <div class="form-group">
               <label class="bmd-label-floating">Nacionalidad</label>
               <select class="form-control form-control-md" required  name="nacionalidada" id="naciona">
               <option class="font-weight-bold" value="">NACIONALIDAD</option>
               <option class="font-weight-bold text-masculino" value="Guatemaltec@">Guatemaltec@</option>
               <option class="font-weight-bold text-cari" value="Extranjer@">Extranjer@</option>
                </select>
                </div> -->
               <!-- </div> -->

            
                 
                 <div class="col-md-6">
                 <div class="form-group">
                 <label class="bmd-label-floating">Codigo Personal</label>
                 <input type="text"  name="latera" required id="Lateralidad"  class="form-control">   
                 </div>
                 </div>

                 <div class="col-md-6 ">
                 <div class="form-group">
                 <label class="bmd-label-floating">Carné</label>
                 <input type="text" name="carne" id="carnea"  class="form-control">
                  </div>
                 </div>

                  <div class="col-md-6 hidden" id="divcarrera">
                   <div class="form-group">
                   <label class="bmd-label-floating">Carrera Escolar</label>
                   <select class="form-control form-control-md select2" required  name="carrera" id="carrera">
                   <option class="font-weight-bold" value="0">Seleccione la Carrera</option>
                            
                   </select>
                   </div>
                   </div>
                         
                   </div> <!-- col-md-6 -->  
                   </div> <!-- row -->
                     
                    
                  <!--   <div class="col-md-12">
                    <label class="bmd-label-floating">Tomar Foto</label> 
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
                </div> <!-- row -->

                </div>
              </div>  
              </div> <!-- card-body -->

              </div> <!-- card -->
              </div> <!-- accordion -->

             <div id="accordion" >
             <div class="card">
    
             <div class="card-header" id="headingtwo" data-toggle="tooltip" title="Presione sobre el texto para desplegar">
             <h6 class="mb-0 h6">
                    
             <button class="btn btn-link text-uvg font-weight-bold" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapseOne">
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
                    <div class="card-header col-md-12" style="background-color: rgba(208,29,34,0.9); border-radius: 10px;">
                       <h5 class="card-title text-dark font-weight-bold">REGISTRO DEL REPRESENTANTE</h5>
                       <div class="row">
                         <div class="col-md-6">
                           <p class="card-category text-dark">Complete el formulario</p>
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
                        <label class="bmd-label-floating">BÚSQUEDA: </label>
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
                     <div class="card-header card border" style="background-color: rgba(208,29,34,0.9); border-radius: 10px;">
                      Encargado
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group ">
                    <label class="bmd-label-floating">Primer Nombre</label>
                    <input type="text" name="pnombree" id="pnombree" class="form-control">
                    </div>
                    </div>

                     <div class="col-md-6">
                     <div class="form-group ">
                     <label class="bmd-label-floating">Segundo Nombre</label>
                     <input type="text" name="snomr" id="snomr" class="form-control">
                     </div>
                     </div>

                     <div class="col-md-6">
                     <div class="form-group ">
                     <label class="bmd-label-floating">Primer Apellido</label>
                     <input type="text" name="paper" id="paper" class="form-control">
                     </div>
                     </div>

                    <div class="col-md-6">
                    <div class="form-group ">
                    <label class="bmd-label-floating">Segundo Apellido</label>
                    <input type="text" name="saper" id="saper" class="form-control">
                    </div>
                    </div>                                        
                    </div> <!-- row --> 
                    </div> <!-- col-md-6 --> 
                    
                    <div class="col-md-6 ">
                     <div class="card-header card border" style="background-color: rgba(208,29,34,0.9); border-radius: 10px;">
                     Residencia
                     </div>
                                
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group ">
                    <?php
                     $consult3="SELECT * FROM departamento";
                     $resultado3=mysqli_query($conexion,$consult3);
                                
                    ?>
                    <label class="bmd-label-floating">Departamento Residencia</label>
                     <select class="form-control form-control-md " name="ideptorr" id="ideptorr">
                      <option class="text-success" value="">SELECCIONE EL DEPARTAMENTO</option>
                      <?php
                       while ($mostrar3 = mysqli_fetch_array($resultado3)) {
                       ?>
                    <option class="<?php echo $mostrar3['id_depto'];?>" value="<?php echo $mostrar3['id_depto'];?>"><?php echo $mostrar3['nombred'];?></option>
                     <?php } ?>
                    </select>
                    </div>
                   </div>

                     <div class="col-md-6">
                     <div class="form-group ">
                                       
                     <label class="bmd-label-floating">Municipio Residencia</label>
                     <select class="form-control form-control-md" name="idmunirr" id="idmunirr">
                     <option  value="" required >SELECCIONE EL MUNICIPIO</option>
                    </select>
                    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group ">
                    <label class="bmd-label-floating">Dirección de Residencia</label>
                    <input type="text" name="dirr" id="dirr" class="form-control">
                    </div>
                    </div>

                    </div> <!-- row -->
                   </div> <!-- col-md-6 -->
                   </div> <!-- row --> 
                  
                   <div class="row">
                    <div class="col-md-12 ">
                     <div class="card-header card border" style="background-color: rgba(208,29,34,0.9); border-radius: 10px;">
                       Nacimiento e Información Adicional
                     </div>
                     
                       <div class="row">
                       
                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="bmd-label-floating">DPI</label>
                                         <input type="text" name="dpi" id="dpi" class="form-control">
                                        </div>
                                        </div>
                                                                                                                    
                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="bmd-label-floating">E-MAIL</label>
                                         <input type="text" name="email" id="email" class="form-control">
                                        </div>
                                        </div>

                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="bmd-label-floating">Numero(s) de Contacto</label>
                                         <input type="text" name="numer" id="numer" class="form-control">
                                        </div>
                                        </div>
                      </div> <!-- row -->
                      </div> <!-- col-md-12 -->
                      </div> <!-- row -->

                      <div class="row">
                    <div class="col-md-12 ">
                     <div class="card-header card border" style="background-color: rgba(208,29,34,0.9); border-radius: 10px;">
                       Encargado Titular 
                     </div>
                    
                       <div class="row">
                       
                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="bmd-label-floating">Nombre:</label>
                                         <input type="text" id="nombreet" name="nombreet" class="form-control">
                                        </div>
                                        </div>
                                                                                                                    
                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="bmd-label-floating">Teléfono:</label>
                                         <input type="text" id="numeroet" name="numeroet" class="form-control">
                                        </div>
                                        </div>

                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="bmd-label-floating">Número de Casa:</label>
                                         <input type="text" id="casaet" name="casaet" class="form-control">
                                        </div>
                                        </div>
                      </div> <!-- row -->
                      </div> <!-- col-md-12 -->
                      </div> <!-- row -->

                    </div> <!-- row -->
                    </form> <!-- FORM -->
                    </div> <!-- card-body -->

                    <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 ml-5">
                    <button type="button" id="BTNALUMNO" class="btn btn-success float-right ">INGRESAR ALUMNO</button>
                    </div>
                    <div class="col-md-2"></div>
                    </div>
                    <div class="clearfix"></div>                   
                            <div class="copyright pull-right">
                            <script>
                            document.write(new Date().toISOString().substr(0, 19).replace('T', ' '));
                            //document.write(new Date().getFullYear());
                            </script>
                            </div>
                            
                            <footer class="card-footer ">
                            
                            </footer>
                  </div> <!-- card -->
                </div> <!-- col-md-12 -->
              </div> <!-- row -->
                </div> <!-- container-fluid -->
                </div> <!-- collapse -->
              </div> <!-- card-body -->

             </div> <!-- card -->
             </div>   <!-- accordion -->

              </div> <!-- content -->

              </div>
              </div>
            </div> <!-- card-body -->
            </div> <!-- card -->
          </div>
      </div> <!-- row -->
    </div> <!-- container-fluid -->
  </div> <!-- content -->

</div> <!-- main-panel -->
</div> <!-- wrapper -->


<div class="modal fade " id="modalfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tomando Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <video muted="muted"  style="margin-left: 65px !important;" id="video"></video>
        <canvas id="canvas" class="ml-5" style="display: none;"></canvas>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="boton">Guardar</button>
        <p id="estado"></p>
      </div>
    </div>
  </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="../js/sidebar/sidebar.js"></script>

<script>

    function Mostrar(){
      document.getElementById('busq').style.display = 'block';
    }

    function Ocultar(){
      document.getElementById('busq').style.display = 'none';
    }

    function fnbusqueda()
    {
      var texto = document.getElementById('busq');

      if (texto.style.display == 'none') {
        Mostrar();
        document.getElementById('btnbusqueda').innerHTML = 'Ocultar Busqueda'; 
      }
      else{
        Ocultar();
        document.getElementById('btnbusqueda').innerHTML = 'Habilitar Busqueda';
      }
    } 
</script>
<script>
  function datos(id_dept){
    alert(id_dept);
  $.post("datos.php",{ id_dept: id_dept
            }, function(data){
            $("#idmunirr").html(data);
            });
  }
</script>
<script>
$(document).ready(function(){
    //cuando hagamos submit al formulario con id id_del_formulario
    //se procesara este script javascript
    $('#area').change(function(){
          $('#area option:selected').each(function(){
            id_area=$(this).val();
            alert(id_area);
            if(id_area>=4){
              var divcarr=$('#divcarrera').hasClass('hidden')
               if(divcarr==true){
               $('#divcarrera').removeClass('hidden')
               }
             }else {
             var divcarr=$('#divcarrera').hasClass('hidden')
               if(divcarr==false){
               $('#divcarrera').addClass('hidden')
               }
            }

            $.post("../php/pagos/grado.php",{ id_area: id_area
            }, function(data){

              $("#grado").html(data);
            });
          });
        });

     $('#grado').change(function() {
      $('#grado option:selected').each(function(){
          id_area=$(this).val();
          id_nivel=$('#area').val();
          if(id_nivel>=4){
             $.post("../php/pagos/carrera.php",{id_area: id_area
            }, function(data){
              $("#carrera").html(data);
            });
            }else{
              $("#carrera").html("<option value='0'>ninguna</option>");
            }
      });
     });

    $('.select2').select2({
     language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  },
    placeholder: 'Seleccione una opcion',
    width: '100%'
   }) 

     $("#BTNALUMNO").click(function(){       
       verif=validarFormVacio('FRMA');
       verifa=validarFormVacio('FRMR');
       if(verif>0||verifa>0){
        demo.showWarning('top','right'); 
       }else{
           $dato=$("#FRMA").serialize()+'&';
           $dato2=$("#FRMR").serialize();
           $elem=$dato.concat($dato2);
            alert($elem);
        $.ajax({
         //action del formulario, ej:          
          type: "POST",//el método post o get del formulario
          data: $elem,//obtenemos todos los datos del formulario
          url: "../php/alumno/informr.php", 
          success:function(r){
              alert(r);
              if(r==1){
                demo.showPar('top','right','Alumno Inscrito','el proceso termino con exito');
                $('#FRMA')[0].reset();
                $('#FRMR')[0].reset();
                }
                else{
                    demo.showDepar('top','right','Hubo un Error','no se completo el proceso');  
                }
             }
         });
        }
      });

    

    });
</script>

<!-- <script src="../js/camara.js"></script> -->
<script>
function GenerarCarnet(){
       $.ajax({
       url: "../php/alumno/informa.php",
       method: "POST",
       success: function(respuesta) {
         //Accion 1
             dat=jQuery.parseJSON(respuesta);
             demo.showGenerar('top','right');
             $("#carnea").val(dat['carnet']);
           
       }    
       });
    }
</script>

<script>
  $(document).ready(function(){
    $('#busqueda').change(function(){
      $.ajax({
        type:"POST",
        data:"idmosenc=" + $('#busqueda').val(),
        url:"../php/encargado/obtenerEnc.php",
        success: function(r){
          dato=jQuery.parseJSON(r);
          alert(r);
          $('#pnombree').val(dato['pnombre']); 
          $('#snomr').val(dato['snombre']);  
          $('#paper').val(dato['papellido']);
          $('#saper').val(dato['sapellido']);
          $('#ideptorr').val(dato['id_deptoresidencia']);
          datos(dato['id_deptoresidencia']);
          setTimeout(function(){$('#idmunirr').val(dato['municipio_residencia']);},800);
          
          $('#dirr').val(dato['direccion_reside']); 
          $('#dpi').val(dato['dpi']);
          $('#email').val(dato['email']);
          $('#numer').val(dato['numer']);
          $('#nombreet').val(dato['nombreet']);
          $('#numeroet').val(dato['numeroet']);
          $('#casaet').val(dato['casaet']); 
        }
      });
    });
  });
</script>

</html>
