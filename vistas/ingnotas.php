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

$consulta="SELECT a.id_area,a.DESCRIPCION_AREA FROM areaescolar a";
$ejecuta=mysqli_query($conexion,$consulta);
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
        <!-- container-fluid#1 -->
        <div class="container-fluid">
            <div class="form-row">
                <div class="card  mx-auto mb-3">
                    <div class="card-header backgr-green">
                        <div class="card-title  "><p class="h4 col-white font-weight-bold">CUADRO DE NOTAS</p></div>

                    </div>
                    <div class="dropdown-divider mt-0" style="border:2px solid #000;"> </div>
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="" class="col-light-green ml-4"><p class="h4 font-weight-bold">AREA ESCOLAR</p></label>
                        </div>
                        
                        <select name="" class="form-control form-control-sm form-control-danger select2 " id="sarea">
                            <option value="0">Seleccione el Area Escolar</option>
                            <?php 
                            while($mo=mysqli_fetch_array($ejecuta)):
                            ?>
                            <option value="<?php echo $mo[0] ?>"><?php echo $mo[1] ?></option>

                        <?php endwhile; ?>
                        </select>
                        
                    </div>           

                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="" class="col-light-green ml-4"><p class="h4 font-weight-bold">GRADO</p></label>
                        </div>
                        
                            <select name="" class="form-control form-control-sm form-control-danger select2" id="sgrado">
                            <option value="0">Seleccione el Grado</option>            
                            </select>
                            
                    </div>
                    
                    <div class="col-md-3 d-none" id="containercarrera">
                        <div class="form-group">
                            <label for="scarrera" class="col-light-green ml-4"><p class="h4 font-weight-bold">CARRERA</p></label>
                        </div>
                        <select  class="form-control form-control-sm form-control-danger select2" id="scarrera" name="scarrera">
                            <option value="0">Seleccione el carrera</option>
                        </select> 
                    </div>
                    

                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="sbimestre" class="col-light-green ml-4"><p class="h4 font-weight-bold">BIMESTRE I- IV</p></label>
                        </div> 
                        <select name="sbimestre" class="form-control form-control-sm form-control-danger select2" id="sbimestre">
                        <option value="0">Seleccione el Bimestre</option>
                        </select>
                    </div>
                    </div>
                        <div class="row mt-0">
                            <div class="card col-md-12 mx-auto">
                                <div class="card-body">
                                    <div class="tablaCuadro" id="tablaCuadro">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="dropdown-divider"></div>
                     <div class="row"> 
                        
                        <div class="col-md-5 col-sm-8 float-lg-left mx-sm-auto">
                            <button class="btn btn-outline-success " type="button" id="regist">REGISTRAR LOS CAMBIOS DE LAS NOTAS <i class="material-icons">chrome_reader_mode</i></button>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 col-sm-8 mx-sm-auto">
                          <div class="row float-lg-right ">
                        
                            <div class="input-group-prepend" id="button-addon3">
                                <button class="btn bg-red ocultar">OCULTAR TABLA <i class="material-icons ml-2">remove_from_queue</i></button>
                                <button class="btn bg-orange mostrar d-none">MOSTRAR TABLA  <i class="material-icons ml-2">pageview</i></button>
                            </div> <!-- fin input-group-prepend -->

                          </div> <!-- fin del row -->
                        </div>

                     </div>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div> 
        <!-- container-fluid#1  -->
    </div> <!-- content -->
</div> <!-- main-panel -->
<?php require_once 'footer/scripts.php'; ?>
<script src="<?php echo SERVERURL; ?>js/notas/index.js"></script>
</html>
<?php 
}
else{
  header("location:http://localhost/ValleSistema2/index.php");
}
?>