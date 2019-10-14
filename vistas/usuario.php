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
           <div class="col-md-12 col-xl-12 col-sm-12 mx-auto">
           <nav>
            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">REGISTRO</a>
            </div>
           </nav>
            
            <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
             <div class="card border-light mb-3" style="max-width: 80rem;">
             <div class="card-header text-center font-weight-bold col-pink">
              REGISTRO DE EMPLEAD@S
             </div>
             <div class="card-body">
              
              <div class="content">
               <div id="accordion" >
               <div class="container-fluid">
               <div class="row">
               <div class="col-md-12">
                <div class="card">
                
                <div class="card-header backgr-indigo2 font-weight-bold col-md-12">
                 <h3 class="card-title col-white font-weight-bold">REGISTRO DE USUARIO</h3>
                 <p class="card-category col-white">Complete todos los campos</p>
                </div>

                <div class="card-body">
                <form id="FRMPROFE">
                                        <div class="row">
                                          <div class="col-md-6">
                                           <div class="card">
                                               <div class="card-body">
                                                <div class="row">

                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                    <label class="text-teal font-weight-bold">DPI</label>
                                                    <input type="text"  name="dpi" placeholder="DPI: xxxx-xxxxx-xxxx" class="form-control dpi" maxlength="16">
                                                </div>
                                                </div>

                                                <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class=" text-teal font-weight-bold">NÚMERO DE TELEFONO</label>
                                                    <input type="text" name="tel"  placeholder="+(502)xxxx-xxxx" class="form-control celular">
                                                </div>
                                                </div>

                                                <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class=" text-teal font-weight-bold">EMAIL COMPLETO</label>
                                                    <input type="text" name="email" class="form-control email" placeholder="example@example.com">
                                                </div>
                                                </div>

                                                <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class=" text-teal font-weight-bold">NOMBRES</label>
                                                    <input type="text" name="nombre" id="nombre" placeholder="Puede colocar mas de un nombre" class="form-control verificar">
                                                </div>
                                                </div>

                                                <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class=" text-teal font-weight-bold">APELLIDOS </label>
                                                    <input type="text"name="apellido" id="apellido" placeholder="Puede colocar mas de un apellido" class="form-control verificar">
                                                </div>
                                                </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class=" text-teal font-weight-bold">CEDULA DOCENTE</label>
                                                    <input type="text" name="cedula"  placeholder="XXXXXXXXXX-X" class="form-control cedula">
                                                </div>
                                            </div>

                                            <?php
                                             $con="SELECT t.* FROM tipoemple t,areatrabajo a WHERE t.id_area=a.id_area";
                                            $resul=mysqli_query($conexion,$con);
                                            
                                            ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class=" text-teal font-weight-bold">PUESTO DEL EMPLEADO</label>
                                                    <select class="form-control form-control-md select2" name="idemple" id="Idprofe">
                                                        <option class="text-success" value="A">SELECCIONE EL PUESTO</option>
                                                        <?php
                                                        while ($mostr = mysqli_fetch_array($resul)) {
                                                        ?>
                                                        <option value="<?php echo $mostr['id_tipoem'];?>"><?php echo $mostr['Nom_Rol'];?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">PROFESION</label>
                                                    <input type="text" name="profesion" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                               <div class="form-group">
                                                 <label class="font-weight-bold text-real ">USUARIO</label>
                                                 <input type="text"  name="usuario" class="form-control resultadoUsuario">
                                               </div>
                                            </div>
                                        
                                            <div class="col-md-3  mt-2">
                                             <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="radio" name="estado[]" id="exampleRadios1" value="Activado">
                                              <label class="form-check-label" for="exampleRadios1">
                                               Activado
                                              </label>
                                               
                                            </div>
                                            </div>

                                            <div class="col-md-3 mt-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="estado[]" id="exampleRadios2" value="Desactivado" checked>
                                            <label class="form-check-label" for="exampleRadios2">
                                                Desactivado
                                            </label>
                                            </div>
                                            </div>

                                            <div class="col-md-7 mt-3">
                                               <div class="form-group">
                                               <label class="font-weight-bold text-teal">CONTRASEÑA</label>
                                                 <input type="text" name="pass" class="resultadoContra form-control ">
                                               </div>
                                            </div>

                                            <div class="col-md-4 mt-3">
                                                <div class="form-group">
                                                <button type="button" class="btngenerarContra btn btn-primary rounded btn-lg text-center ">GENERAR</button>
                                                </div>
                                            </div>



                                                </div> <!-- row -->
                                               </div> <!-- card-body #1 -->
                                           </div> <!-- card #1 -->   
                                          </div>  
                                          <div class="col-md-6">
                                            <div class="card">
                                            <div class="card-body">
                                             <div class="row">
                                               
                                               <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class=" text-teal font-weight-bold">GENERO</label>
                                                    <select class="form-control form-control-md select2" required  name="genero" id="Genero">
                                                        <option class="font-weight-bold" value="" disable>GENERO</option>
                                                        <option class="font-weight-bold text-masculino" value="MASCULINO">MASCULINO</option>
                                                        <option class="font-weight-bold text-cari" value="FEMENINO">FEMENINO</option>
                                                    </select>
                                                  </div>
                                                </div>

                                                <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class=" text-teal font-weight-bold">RESIDENCIA</label>
                                                    <textarea name="residencia"  class="form-control" id="residencia" placeholder="Ingrese su direccion de Residencia" rows="5"></textarea>
                                                </div>
                                            </div>

                                            <?php
                                             $consulta="SELECT * FROM departamento";
                                            $resultado=mysqli_query($conexion,$consulta);
                                            
                                            ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class=" text-teal font-weight-bold ">DEPARTAMENTO DE RESIDENCIA</label>
                                                    <select class="form-control select2"  tabindex="-98" name="ideptor" id="IdDeptor">
                                                        <option class="text-success" value="">SELECCIONE EL DEPARTAMENTO</option>
                                                        <?php
                                                        while ($mostrar = mysqli_fetch_array($resultado)) {
                                                        ?>
                                                        <option value="<?php echo $mostrar['id_depto'];?>"><?php echo $mostrar['nombred'];?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                              <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-teal font-weight-bold">MUNICIPIO DE RESIDENCIA </label>
                                                    <select class="form-control form-control-md select2" name="idmunir" id="IdMunir">
                                                        <option class="text-success"  value=" ">SELECCIONE EL MUNICIPIO</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class=" text-teal font-weight-bold">FECHA NACIMIENTO</label>
                                                    <input type="date" name="fecha" placeholder="dd/mm/yyyy"class="form-control fecha">
                                                  </div>
                                            </div>

                                            <?php
                                                $consulta="SELECT * FROM departamento";
                                                $resultado=mysqli_query($conexion,$consulta);
                                            ?>
                                                
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class=" text-teal font-weight-bold">DEPARTAMENTO DE NACIMIENTO</label>
                                                    <select class="form-control form-control-md select2" name="idepto" id="IdDepto">
                                                        <option class="text-teal" value="" disable>SELECCIONE EL DEPARTAMENTO</option>
                                                        <?php
                                                        while ($mostrar3 = mysqli_fetch_array($resultado)) {
                                                        ?>
                                                        <option value="<?php echo $mostrar3['id_depto'];?>"><?php echo $mostrar3['nombred'];?></option>
                                                    <?php } ?>
                                                    </select>
                                                  </div>
                                                </div>

                                                 <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class=" text-teal font-weight-bold">MUNICIPIO DE NACIMIENTO</label>
                                                    <select class="form-control form-control-md select2" name="idmuni" id="IdMuni">
                                                    <option  value=" " required>SELECCIONE EL MUNICIPIO</option>
                                                        
                                                     
                                                    </select>
                                                  </div>
                                                </div>

                                                <div class="col-md-12 mt-2">
                                                <div class="form-group">                                                    
                                                  <div class="form-group">
                                                    <label class="font-weight-bold ">ACERCA DE</label>
                                                        <textarea class="form-control" placeholder="Puede escribir referencias o acontecimiento, anotaciones sobre el empleado a contratar." name="acerca"rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>



                                             </div> <!-- row -->
                                            </div> <!-- card-body #2 -->
                                           </div> <!-- card #2 -->     
                                          </div>
                                        </div>
                                        <div class="row">
                                         <div class="col-md-12 col-sm-12 col-xl-12">
                                          <button type="button" id="PROFE" class="btn bg-indigo float-right">Ingresar Usuario</button>
                                         </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                </div> <!-- card-body -->
                
                </div><!-- card -->
              </div><!-- col-md-12 -->
              </div><!-- row -->

               </div><!-- container-fluid #2 -->
               </div> <!-- acordion -->
              </div><!-- content#2 -->


             </div> <!-- card-body -->
             </div> <!-- card #1 -->   
            </div> <!-- tab-content -->
            </div> <!-- tab-pane -->

           </div>
         </div>
        </div> <!-- container-fluid -->
      </div> <!-- content -->
    </div> <!-- main-panel -->
 

  <?php require_once 'footer/scripts.php'; ?>
  <script src="<?php echo SERVERURL; ?>js/usuarios/usuarios.js"></script>
  

</html>
<?php 
}
else{
  header("location:index");
}
?>