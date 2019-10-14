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
   <title>SISTEMA@ICAT</title>
   <link href="../img/2ICAT.png" rel="icon">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    
    <?php require_once "../dependencia/dependencia.php"; ?>

</head>
<body>
<div class="wrapper">
     <?php require_once "../dependencia/sidebar.php"; ?>



        <div class="main-panel">
            <!-- Navbar -->
            <?php require_once "../dependencia/navbar.php"; ?>
<section class="content">        
  <div class="container-fluid">
      <div class="row ">
        
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <nav>
            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active " id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">REINSCRIPCION</a>
            </div>
            </nav>
            </div>

            <div class="card-body">
            <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <p class="h5  text-center col-red font-weight-bold">REINSCRIPCION DEL ALUMNO <?php echo date('Y'); ?></p>
            </div>
            <div class="col-md-2"></div>
            </div>
            
            <div class="content">
            <div id="accordion" >
            <div class="card">

                <div class="card-header" id="headingOne" data-toggle="tooltip" title="Presione sobre el texto para desplegar">
                <h6 class="mb-0 h6">
                <button class="btn btn-link text-uvg font-weight-bold" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree">
                    <i class="material-icons">assignment_ind</i> REINSCRIPCION DE ALUMNADO
                </button>
                </h6>
                </div> <!-- card-header -->

            <div id="collapseTree" class="collapse show " aria-labelledby="headingOne" data-parent="#accordion">
            <div class="container-fluid">
               <div class="row">
                <div class="col-md-12">
                  <div class="card">
                  <div class="card-header col-md-12" style="background-color: rgba(208,29,34,0.9);">
                  <h4 class="card-title text-dark font-weight-bold">REINSCRIPCION DEL ALUMNADO</h4>
                  <p class="card-category text-dark">Complete el formulario</p>
                  </div>

                <div class="card-body">
                    <form id="FRMRA">             
                        <div class="row">

                          <div class="col-md-6">
                              <div class="form-group">  
                            <label>Carnet</label>                           
                            <div class="input-group mb-3">
                            <input type="text" class="form-control " onkeypress="pulsar(event)" id="recarnet" name="recarnet" aria-label="Carnet" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <button class="btn btn-sm btn-outline-primary " type="button" onclick="buscarDatos()">BUSCAR</button>                                
                            <button class="btn btn-sm btn-outline-danger" type="button" onclick="Resett()">RESET</button>
                            </div>
                            </div>
                            </div>
                          </div>  

                          <div class="col-md-6">
                              
                          </div>
                          <div class="col-md-6">
                            <div class="card-header card border " style="background-color: rgba(208,29,34,0.9); border-radius: 10px;">
                               Estudiante 
                              </div>    
                         
                            <div class="row">
                            
                           <!--  <div class="col-md-12"> 
                            
                            </div> -->

                        <div class="col-md-6">
                        <div class="form-group">
                        <label class="bmd-label-floating">Primer Nombre</label>
                        <input type="text" name="rpnoma" id="rpnoma" onkeypress="pulsarn(event)" class="form-control">
                        </div>
                        </div>
                                        
                        <div class="col-md-6">
                        <div class="form-group">
                        <label class="bmd-label-floating">Segundo Nombre</label>
                        <input type="text" name="rsnoma" id="rsnoma" class="form-control">
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <label class="bmd-label-floating">Primer Apellido</label>
                        <input type="text" name="rpapa" id="rpapa" class="form-control">
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <label class="bmd-label-floating">Segundo Apellido</label>
                        <input type="text" name="rsapa" id="rsapa" class="form-control">
                        </div>
                        </div>

                    </div> <!-- row -->
                    </div> <!-- col-md-6 -->


                    <div class="col-md-6 ">
                      <div class="card-header card border rounded" style="background-color: rgba(208,29,34,0.9);">
                      Residencia (Domicilio)
                      </div>

                    <div class="row">
                    <?php
                    $consulta="SELECT * FROM departamento";
                    $resultado=mysqli_query($conexion,$consulta);
                    ?>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label class="bmd-label-floating">Departamento Residencia</label>
                    <select class="form-control form-control-md" name="rideptor" id="rideptor">
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
                    <?php
                    $consultam="SELECT * FROM municipio";
                    $resultadom=mysqli_query($conexion,$consultam);
                    ?>  
                    <div class="form-group">
                    <label class="bmd-label-floating">Municipio Residencia</label>
                    <select class="form-control form-control-md" name="ridmunir" id="ridmunir">
                    <option  value="0" required>SELECCIONE EL MUNICIPIO</option>
                    <?php while ($muni = mysqli_fetch_array($resultadom)) : ?>
                    <option  value="<?php echo $muni[0] ?>" required><?php echo $muni[1] ?></option>
                    <?php endwhile; ?>
                     </select>
                    </div> 
                    </div>

                    <div class="col-md-12 ">
                    <div class="form-group">
                    <label class="bmd-label-floating">Direccion de Residencia</label>
                    <input type="text" name="rdira" id="rdira" class="form-control">
                     </div>
                    </div>
                    
                    <!-- <div class="col-md-7 ">
                    <div class="form-group">
                    <label class="bmd-label-floating">Codigo Personal</label>
                    <input type="text" name="rcodigo" id="rcodigo" class="form-control">
                     </div>
                    </div>

                    <div class="col-md-5">
                    <div class="form-group">
                    <label class="bmd-label-floating">Tipo de Sangre</label>
                    <input type="text" name="rtipsa" id="rtipsa" class="form-control">
                     </div>
                    </div> -->

                  </div>
                 </div>


<!-- hello -->
                     <!-- <div class="col-md-12 ">
                     <div class="card-header card border  text-dark font-weight-bold " style="background-color: rgba(208,29,34,0.9);">
                                Datlos de Nacimiento y Adicional
                      </div>
                      <div class="row">

                      <div class="col-md-3 ">
                    <div class="form-group">
                    <label class="bmd-label-floating">Edad del Estudiante</label>
                    <input type="text" name="rfechana" id="rfechana" class="form-control">
                     </div>
                    </div>
                    
                    <div class="col-md-4">
                      <?php
                       $consult="SELECT * FROM areaescolar";
                       $resultad=mysqli_query($conexion,$consult);
                                           
                       ?>
                      <div class="form-group">
                      <label class="bmd-label-floating">Area Escolar</label>
                    <select class="form-control form-control-md" name="rarea" id="rarea">
                    <option value="0">Division Escolar</option>
                        <?php while($area=mysqli_fetch_array($resultad)): ?>
                                                    
                    <option value="<?php echo $area[0] ?>"><?php echo $area[1] ?></option>
                    <?php endwhile; ?>
                      </select>
                    </div>
                   </div>
                                            
                       <div class="col-md-3">
                <?php 
                        $consult1="SELECT id_grado,grado FROM grado";
                       $resultad1=mysqli_query($conexion,$consult1);
                 ?>
                         <div class="form-group">
                           <label class="bmd-label-floating">Grado Cursante</label>
                           <select class="form-control form-control-md" name="rgrado" id="rgrado">
                           <option  value="0" required>Seleccione el Grado</option>
                           <?php while($grado=mysqli_fetch_array($resultad1)): ?>
                            <option  value="<?php echo $grado[0] ?>" required><?php echo $grado[1] ?></option>
                           <?php endwhile; ?>
                         </select>
                     </div> 
                    </div>

                                    <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Genero</label>
                                                    <select class="form-control form-control-md" required  name="rgenero" id="rgenero">
                                                        <option class="font-weight-bold" value="">GENERO</option>
                                                        <option class="font-weight-bold text-masculino" value="MASCULINO">Masculino</option>
                                                        <option class="font-weight-bold text-cari" value="FEMENINO">Femenino</option>
                                                    </select>
                                                </div>
                                       </div>
                   
                    </div> 
                </div>  -->

                <div class="row">
                         <div class="col-md-6">
                          <div class="card-header card border" style="background-color: rgba(208,29,34,0.9); border-radius: 10px;">Nacimiento </div>

                    <div class="row">
                    <div class="col-md-6 ">
                      <div class="form-group">
                      <label class="bmd-label-floating">Fecha de Nacimiento</label>
                      <input type="date" id="rfechana" name="rfechana" class="form-control">
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                 <div class="form-group">
                   <label class="bmd-label-floating">Género</label>
                  <select class="form-control form-control-md " required  name="generoa" id="generoa">
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
            
                 <div class="col-md-6">
                 <div class="form-group">
                 <label class="bmd-label-floating">Codigo Personal</label>
                 <input type="text"  name="rcodigo" required id="rcodigo"  class="form-control">   
                 </div>
                 </div>

                 <div class="col-md-6 ">
                 <div class="form-group">
                 <label class="bmd-label-floating">Carné</label>
                 <input type="text" name="carnea" id="carnea"  class="form-control">
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
                <br>
                <br>
                    <div class="row">

                            <div class="col-md-12">
                              <!-- <div class="card-header card border text-dark font-weight-bold " style="background-color: rgba(208,29,34,0.9);">Encargado ( Representante )</div>   -->
                               
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
                          <div class="row">
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
                          </div>
                               <div class="row">
                                
                                   <div class="col-md-6">
                                      <div class="card-header card border  text-dark font-weight-bold " style="background-color: rgba(208,29,34,0.9);">
                                          Encargado
                                         </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                             <div class="form-group ">
                                             <label class="bmd-label-floating">Primer Nombre</label>
                                             <input type="text" name="rpnombree" id="rpnombree" class="form-control">
                                            </div>
                                            </div> 
                                            
                                            <div class="col-md-6">
                                             <div class="form-group ">
                                             <label class="bmd-label-floating">Segundo Nombre</label>
                                             <input type="text" name="rsnomr" id="rsnomr" class="form-control">
                                             </div>
                                            </div>

                                            <div class="col-md-6">
                                             <div class="form-group ">
                                             <label class="bmd-label-floating">Primer Apellido</label>
                                             <input type="text" name="rpaper" id="rpaper" class="form-control">
                                             </div>
                                            </div>

                                            <div class="col-md-6">
                                             <div class="form-group ">
                                             <label class="bmd-label-floating">Segundo Apellido</label>
                                             <input type="text"  name="rsaper" id="rsaper" class="form-control">
                                             </div>
                                            </div>
                                         </div> 
                                   </div>

                                   <div class="col-md-6">
                                       <div class="card-header card border  text-dark font-weight-bold " style="background-color: rgba(208,29,34,0.9);">
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
                                                    <select class="form-control form-control-md" name="rideptorr" id="rideptorr">
                                                        <option class="text-success" value="">SELECCIONE EL DEPARTAMENTO</option>
                                                        <?php
                                                        while ($mostrar3 = mysqli_fetch_array($resultado3)) {
                                                        ?>
                                                        <option value="<?php echo $mostrar3['id_depto'];?>"><?php echo $mostrar3['nombred'];?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                        </div>

                                        <div class="col-md-6">
                                            <?php
                                             $consultm3="SELECT * FROM municipio";
                                            $resultadom3=mysqli_query($conexion,$consultm3);
                                            
                                            ?>
                                         <div class="form-group ">
                                         
                                                    <label class="bmd-label-floating">Municipio Residencia</label>
                                                    <select class="form-control form-control-md" name="ridmunirr" id="ridmunirr">
                                                    <option  value="0" required>SELECCIONE EL MUNICIPIO</option>
                                                    <?php while ($muni3 = mysqli_fetch_array($resultadom3)) : ?>
                                                    <option  value="<?php echo $muni3[0] ?>" required><?php echo $muni3[1] ?></option>
                                                    <?php endwhile; ?>
                                                    </select>
                                                </div>
                                        </div>

                                        <div class="col-md-12">
                                         <div class="form-group ">
                                         <label class="bmd-label-floating">Direcion de Residencia</label>
                                         <input type="text" name="rdirr" id="rdirr" class="form-control">
                                        </div>
                                        </div>
                    

                                        </div> <!-- row -->
                                   </div>
                               </div> 

                            </div>
                                         
                            <div class="col-md-12 ">
                                    <div class="card-header card border text-dark font-weight-bold rounded" style="background-color: rgba(208,29,34,0.9);">
                                          Nacimiento e Informacion Adicional
                                         </div>
                                        <div class="row">
                                        
                                        

                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="bmd-label-floating">DPI</label>
                                         <input type="text" name="rdpi" id="rdpi" class="form-control">
                                        </div>
                                        </div>
                                        

                                                                            
                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="bmd-label-floating">E-MAIL</label>
                                         <input type="text" name="remail" id="remail" class="form-control">
                                        </div>
                                        </div>

                                        <div class="col-md-4">
                                         <div class="form-group ">
                                         <label class="bmd-label-floating">Numero(s) de Contacto</label>
                                         <input type="text"  name="numer" id="numer"  class="form-control">
                                        </div>
                                        </div>
                                        
                                        </div>
                            </div>

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

                          </form> <!-- FRMRA -->

                <div class="row mt-5">
                <div class="col-md-12">
                <button type="button" id="BTNACTALUMNO" class="btn btn-success pull-right">REINSCRIBIR ALUMNO</button>
                </div>

                <div class="clearfix"></div>
                </div>

                </div> <!-- card-body -->

              </div> <!-- card -->

            </div> <!-- col-md-12 -->

        </div> <!-- row -->
        </div> <!-- container-fluid -->
        </div> <!-- collapse -->


            </div> <!-- card -->
            </div> <!-- accordion -->
            </div> <!-- content -->

            
            </div> <!-- tab-pane active -->
            </div> <!-- tab-content -->

        </div>
        </div>
        </div> <!-- col-md-11 -->
    </div> <!-- row -->
</div> <!-- container-fluid -->
</section> <!-- content -->
</div> <!-- main-panel -->
</div> <!-- wrapper -->

</body>

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
  //Busqueda encargado
  $(document).ready(function(){
    $('#busqueda').change(function(){
      $.ajax({
        type:"POST",
        data:"idmosenc=" + $('#busqueda').val(),
        url:"../php/encargado/obtenerEnc.php",
        success: function(r){
          dato=jQuery.parseJSON(r);
          alert(r);
          $('#rpnombree').val(dato['pnombre']); 
          $('#rsnomr').val(dato['snombre']);  
          $('#rpaper').val(dato['papellido']);
          $('#rsaper').val(dato['sapellido']);
          $('#rideptorr').val(dato['id_deptoresidencia']);
          datos(dato['id_deptoresidencia']);
          setTimeout(function(){$('#ridmunirr').val(dato['municipio_residencia']);},800);
          
          $('#rdirr').val(dato['direccion_reside']);
          $('#rdpi').val(dato['dpi']);
          $('#remail').val(dato['email']);
          $('#numer').val(dato['numer']);
          $('#nombreet').val(dato['nombreet']);
          $('#numeroet').val(dato['numeroet']);
          $('#casaet').val(dato['casaet']);  


          // $('#rdirr').val(dato['direccion_reside']); 
          // $('#rdpi').val(dato['dpi']);
          // $('#remail').val(dato['email']);
          // $('#numer').val(dato['numer']);
          // $('#nombreet').val(dato['nombreet']);
          // $('#numeroet').val(dato['numeroet']);
          // $('#casaet').val(dato['casaet']); 
        }
      });
    });
  });
</script>

<script>
    $(document).ready(function(){
          $('#rideptor').change(function(){
        $('#rideptor option:selected').each(function(){
            id_dept=$(this).val();
            $.post("datos.php",{ id_dept: id_dept
            }, function(data){
            $("#ridmunir").html(data);
            });
    });
    });

      $('#rideptorr').change(function(){
        $('#rideptorr option:selected').each(function(){
            id_dept=$(this).val();
            $.post("datos.php",{ id_dept: id_dept
            }, function(data){
            $("#ridmunirr").html(data);
            });
    });
    });
          


       $('#BTNACTALUMNO').click(function(){
        
        verif=validarFormVacio('FRMRA');
       if(verif>0){
        demo.showWarning('top','right'); 
       }else{
        datos=$('#FRMRA').serialize();
        alert(datos);
        $.ajax({
          type:"POST",
          data:datos,
          url:"../php/alumno/Re_Inscripcion.php",
          success:function(r){
            // alert(r);

            if(r==2){
              $('#FRMRA')[0].reset();
              demo.showPar('top','right','Alumno Re-inscrito','el proceso termino con exito');
            }else{
                demo.showDepar('top','right','Hubo un Error','no se completo el proceso');
            }
          }
        });
        }
     });

})
</script>

 <script>
    function buscarDatos(){
        datos=$('#recarnet').val();
      
      $.ajax({
        type:"POST",
        data:{"recarnet":datos,"function":"1"},
        url:"../php/alumno/ObtenerDatosE.php",
        success:function(r){
            // alert(r);
          dato=jQuery.parseJSON(r);
          alert(r);
          if(r==null){

            // alertify.error("Carnet Invalido");
            const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });
            
            toast({
            type: 'danger',
            title: 'Carnet No Encontrado'
            })
          }else{
            $('#carnea').val(dato['carnet']);
            $('#rpnoma').val(dato['pnombre']);
            $('#rsnoma').val(dato['snombre']);
            $('#rpapa').val(dato['papellido']);
            $('#rsapa').val(dato['sapellido']);
            $('#rideptor').val(dato['deptar']);
            $('#ridmunir').val(dato['muni']);
            $('#rdira').val(dato['direccion']);
            $('#rcodigo').val(dato['cpersonal']);
            $('#rtipsa').val(dato['sangre1']);
            $('#rfechana').val(dato['edad_alumno']);
            $('#rarea').val(dato['area']);            
            $('#rgrado').val(dato['grado']);
            $('#generoa').val(dato['genero']);
            $('#rpnombree').val(dato['rpnombre']);
            $('#rsnomr').val(dato['rsnombre']);
            $('#rpaper').val(dato['rpapellido']);
            $('#rsaper').val(dato['rsapellido']);
            $('#rideptorr').val(dato['rdeptar']);
            $('#ridmunirr').val(dato['rmuni']);
            $('#rdirr').val(dato['rdireccion']);
            $('#rtipsr').val(dato['rsangre']);
            $('#rdpi').val(dato['rdpi']);
            $('#remail').val(dato['remail']);
            $('#numer').val(dato['rnumer']);
            $('#nombreet').val(dato['nombreet']);
            $('#numeroet').val(dato['numeroet']);
            $('#casaet').val(dato['casaet']);
          }
        }
      });
    }

   
  </script>

<script>
    function pulsar(e) {
    if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault();
      datos=$('#recarnet').val();
  

  
      $.ajax({
        type:"POST",
        data:{"recarnet":datos,"function":"1"},
        url:"../php/alumno/ObtenerDatosE.php",
        success:function(r){
            // alert(r);
          dato=jQuery.parseJSON(r);
          if(r==null){
            // alertify.error("Carnet Invalido");
            const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });
            
            toast({
            type: 'danger',
            title: 'Carnet No Encontrado'
            })
          }else{
            $('#carnea').val(dato['carnet']);
            $('#rpnoma').val(dato['pnombre']);
            $('#rsnoma').val(dato['snombre']);
            $('#rpapa').val(dato['papellido']);
            $('#rsapa').val(dato['sapellido']);
            $('#rideptor').val(dato['deptar']);
            $('#ridmunir').val(dato['muni']);
            $('#rdira').val(dato['direccion']);
            $('#rcodigo').val(dato['cpersonal']);
            $('#rtipsa').val(dato['sangre1']);
            $('#rfechana').val(dato['edad_alumno']);
            $('#rarea').val(dato['area']);            
            $('#rgrado').val(dato['grado']);
            $('#generoa').val(dato['genero']);
            $('#rpnombree').val(dato['rpnombre']);
            $('#rsnomr').val(dato['rsnombre']);
            $('#rpaper').val(dato['rpapellido']);
            $('#rsaper').val(dato['rsapellido']);
            $('#rideptorr').val(dato['rdeptar']);
            $('#ridmunirr').val(dato['rmuni']);
            $('#rdirr').val(dato['rdireccion']);
            $('#rtipsr').val(dato['rsangre']);
            $('#rdpi').val(dato['rdpi']);
            $('#remail').val(dato['remail']);
            $('#numer').val(dato['rnumer']);
            $('#nombreet').val(dato['nombreet']);
            $('#numeroet').val(dato['numeroet']);
            $('#casaet').val(dato['casaet']);
          }
        }
      });
    } 
    }

 function pulsarn(e) {
    if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault();
      datos2=$('#rpnoma').val();
  
      $.ajax({
        type:"POST",
        data:{"nombre":datos,"function":"2"},
        url:"../php/alumno/ObtenerDatosE.php",
        success:function(r){
            // alert(r);
          dato=jQuery.parseJSON(r);
          if(r==null){
            // alertify.error("Carnet Invalido");
            const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });
            
            toast({
            type: 'danger',
            title: 'Carnet No Encontrado'
            })
          }else{
            $('#carnea').val(dato['carnet']);
            $('#rpnoma').val(dato['pnombre']);
            $('#rsnoma').val(dato['snombre']);
            $('#rpapa').val(dato['papellido']);
            $('#rsapa').val(dato['sapellido']);
            $('#rideptor').val(dato['deptar']);
            $('#ridmunir').val(dato['muni']);
            $('#rdira').val(dato['direccion']);
            $('#rcodigo').val(dato['cpersonal']);
            $('#rtipsa').val(dato['sangre1']);
            $('#rfechana').val(dato['edad_alumno']);
            $('#rarea').val(dato['area']);            
            $('#rgrado').val(dato['grado']);
            $('#generoa').val(dato['genero']);
            $('#rpnombree').val(dato['rpnombre']);
            $('#rsnomr').val(dato['rsnombre']);
            $('#rpaper').val(dato['rpapellido']);
            $('#rsaper').val(dato['rsapellido']);
            $('#rideptorr').val(dato['rdeptar']);
            $('#ridmunirr').val(dato['rmuni']);
            $('#rdirr').val(dato['rdireccion']);
            $('#rtipsr').val(dato['rsangre']);
            $('#rdpi').val(dato['rdpi']);
            $('#remail').val(dato['remail']);
            $('#numer').val(dato['rnumer']);
            $('#nombreet').val(dato['nombreet']);
            $('#numeroet').val(dato['numeroet']);
            $('#casaet').val(dato['casaet']);
          }
        }
      });
    }
    
    
    }
     
</script>
</html>
