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
                    
                  <div class="card-header backgr-blue" id="headingOne" data-toggle="tooltip" title="Presione sobre el texto para desplegar">
                    <h6 class="mb-0 h6">
                      <button class="btn btn-link w-100 col-white font-weight-bold" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree">
                        <i class="material-icons">assignment_ind</i> REINSCRIPCION DE ALUMNADO
                      </button>
                    </h6>
                  </div>

                  <div class="card-body">
                    <div id="collapseTree" class="collapse show " aria-labelledby="headingOne" data-parent="#accordion">
                    
                     <div class="container-fluid">
                      <div class="row">
                       <div class="col-md-12">
                        <div class="card">
                          <div class="card-header card border bg-teal col-white font-weight-bold " style="border-radius: 10px;">
                           <h4 class="card-title  font-weight-bold">REINSCRIPCION DEL ALUMNADO</h4>
                           <p class="card-category ">Complete el formulario</p>
                          </div>
                        </div>
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
                            <button class="btn btn-sm bg-teal " type="button" onclick="buscarDatos()">BUSCAR</button>
                            <button class="btn btn-sm bg-red" type="button" onclick="Resett()">RESETEAR</button>
                            </div>
                            </div>
                            </div>
                          </div>  
                                        
                          <div class="col-md-6"></div>

                          <div class="col-md-6">
                            <div class="card-header card border bg-teal col-white font-weight-bold " style="border-radius: 10px;">
                              Estudiante 
                            </div>    
                          
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                              <label class="form-control-label col-purple">Primer Nombre</label>
                              <input type="text" name="rpnoma" id="rpnoma" onkeypress="pulsarn(event)" class="form-control">
                              </div>
                            </div>
                                        
                            <div class="col-md-6">
                              <div class="form-group">
                              <label class="form-control-label col-purple">Segundo Nombre</label>
                              <input type="text" name="rsnoma" id="rsnoma" class="form-control">
                              </div>
                            </div>
                                        
                            <div class="col-md-6">
                              <div class="form-group">
                              <label class="form-control-label col-purple">Primer Apellido</label>
                              <input type="text" name="rpapa" id="rpapa" class="form-control">
                              </div>
                            </div>
                                        
                            <div class="col-md-6">
                              <div class="form-group">
                              <label class="form-control-label col-purple">Segundo Apellido</label>
                              <input type="text" name="rsapa" id="rsapa" class="form-control">
                              </div>
                            </div>
                                        
                          </div> <!-- row -->
                        </div> <!-- col-md-6 -->

                     <div class="col-md-6 ">
                      <div class="card-header card border bg-teal col-white font-weight-bold " style="border-radius: 10px;">
                       Residencia (Domicilio)
                      </div>

                     <div class="row">
                      <?php
                        $consulta="SELECT * FROM departamento";
                        $resultado=mysqli_query($conexion,$consulta);
                      ?>
                    
                    <div class="col-md-6">
                      <div class="form-group">
                       <label class="form-control-label col-purple">Departamento Residencia</label>
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
                       <label class="form-control-label col-purple">Municipio Residencia</label>
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
                       <label class="form-control-label col-purple">Direccion de Residencia</label>
                       <input type="text" name="rdira" id="rdira" class="form-control">
                      </div>
                    </div>
                    </div> <!-- row -->
                   </div> <!-- col-md-6 -->
                  </div> <!-- row -->

                <div class="row">
                  <div class="col-md-6">
                  <div class="card-header card border bg-teal col-white font-weight-bold " style="border-radius: 10px;">Nacimiento </div>

                  <div class="row">
                   <div class="col-md-6 mt-4">
                     <div class="form-group">
                      <label class="form-control-label col-purple">Fecha de Nacimiento</label>
                      <input type="date" id="rfechana" name="rfechana" class="form-control">
                     </div>
                   </div>
                    
                  <div class="col-md-6">
                    <div class="form-group">
                     <label class="form-control-label col-purple">Género</label>
                     <select class="form-control form-control-md " required  name="rgenero" id="rgenero">
                     <option class="font-weight-bold" value="">GÉNERO</option>
                     <option class="font-weight-bold text-masculino" value="MASCULINO">Masculino</option>
                     <option class="font-weight-bold text-cari" value="FEMENINO">Femenino</option>
                     </select>
                    </div>
                  </div>
                 </div>

                 <div class="row">
                  <div class="col-md-6">
                  <?php
                  $consult="SELECT * FROM areaescolar";
                  $resultad=mysqli_query($conexion,$consult);  ?>
                   <div class="form-group">
                    <label class="form-control-label col-purple">Nivel Academico</label>
                    <select class="form-control  select2" required name="rarea"  id="rarea">
                    <option class="font-weight-bold" value="0">Seleccione el Nivel</option>
                  <?php
                  while ($mostra = mysqli_fetch_array($resultad)) : ?>
                    <option value="<?php echo $mostra[0];?>"><?php echo $mostra[1];?></option>
                  <?php endwhile; ?>
                    </select>     
                   </div>
                  </div>

                  <div class="col-md-6">
                   <div class="form-group">
                    <label class="form-control-label col-purple">Grado Academico</label>
                    <select class="form-control form-control-md select2" required  name="rgrado" id="rgrado">
                    <option class="font-weight-bold" value="0">Seleccione el Grado</option>
                    </select>
                   </div>
                  </div>
                 </div>
                </div>

                <div class="col-md-6">
                  <div class="card-header card border bg-teal col-white font-weight-bold " style="border-radius: 10px;">
                    Información Adicional
                  </div>
                <div class="row ">
            
                 <div class="col-md-6 mt-4">
                 <div class="form-group">
                 <label class="form-control-label col-purple">Codigo Personal</label>
                 <input type="text"  name="rcodigo"  id="rcodigo"  class="form-control">   
                 </div>
                 </div>

                 <div class="col-md-6 mt-4">
                 <div class="form-group">
                 <label class="form-control-label col-purple">Carné</label>
                 <input type="text" name="carnea" id="carnea"  class="form-control">
                  </div>
                 </div>

                  <div class="col-md-6 d-none mt-4" id="divcarrera">
                   <div class="form-group">
                   <label class="form-control-label col-purple">Carrera Escolar</label>
                   <select class="form-control form-control-md select2" required  name="carrera" id="carrera">
                   <option class="font-weight-bold" value="0">Seleccione la Carrera</option>
                            
                   </select>
                   </div>
                   </div>

                   </div> <!-- row -->      
                   </div> <!-- col-md-6 -->                     
                  </div>

                  <div class="row mt-4">
                    <div class="col-md-12">
                      
                      <div class="card-header card border bg-teal col-white font-weight-bold " style="border-radius: 10px;">
                       <h5 class="card-title col-white font-weight-bold">REGISTRO DEL REPRESENTANTE</h5>
                       <div class="row">
                         <div class="col-md-6">
                           <p class="card-category col-white">Complete el formulario</p>
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
                                      <div class="card-header card border bg-teal col-white font-weight-bold " style="border-radius: 10px;">
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
                                       <div class="card-header card border bg-teal col-white font-weight-bold " style="border-radius: 10px;">
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
                                    <div class="card-header card border col-white bg-teal font-weight-bold rounded" style="border-radius: 10px;">
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
                     <div class="card-header card border bg-teal" style="border-radius: 10px;">
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







                    </div>
                  </div>
                  </form> <!-- form- -->

                      </div>
                     </div>
                    
                    </div>
                  </div>

                  </div>
                </div> <!-- card -->
               </div> <!-- accordion -->
             </div> <!-- content -->
            </div> <!-- row -->
                  
                  <div class="row mt-2">
                  <div class="col-md-12">
                  <button type="button" id="BTNACTALUMNO" class="btn bg-light-green col-black font-weight-bold float-right">REINSCRIBIR ALUMNO</button>
                  </div>
                  
                  <div class="clearfix"></div>
                  </div>

                  </div>
                </div>
               </div> 
              </div>
            </div>

             </div>
             </div>
            </div>

            </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  <?php require_once 'footer/scripts.php'; ?>
    <script src="<?php echo SERVERURL; ?>js/alumno/reinscripcion/index.js"></script>
</html>
<?php 
}
else{
  header("location:index");
}
?>  