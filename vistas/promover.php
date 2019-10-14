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
                        <div class="card border-light mb-3">
                            <div class="card-header text-right  backgr-purple">
                                <p class="h3 font-weight-bold col-deep-orange">Promoción de estudiantes </p>
                            </div>
                            <!-- card body 1 -->
                            <div class="card-body">
                                <!-- tab -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active bg-deep-orange text-white" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Grado</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-deep-orange text-white" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Estudiante</a>
                                    </li>
                                </ul>
                                <!-- end tab -->
                                <!-- tab-content -->
                                <div class="tab-content" id="myTabContent">
                                    <!-- tab-pane1 -->
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="form-group">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="area">Nivel</label>
                                                        <select class="form-control select2" id="idarea" name="idarea"></select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="nivel">Grado</label>
                                                        <select class="form-control select2" id="idnivel" name="idnivel"></select>
                                                    </div>
                                                    <div class="form-group col-md-3 d-none" id="containercarrera">
                                                        <label for="grado">Carrera</label>
                                                        <select class="form-control select2" name="idcarrera" id="idcarrera"></select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="anio">Ciclo</label>
                                                        <select class="form-control select2" name="anio" id="anio">
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- row tabla 1 -->
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <table id="view-prom" class="table table-hover table-condense table-striped table-sm" style="text-align: center;">
                                                        <thead style="background-color: #134C7D; color:white; font-weight: bold; width: 100%">
                                                        <tr>
                                                            <td>Codigo P.</td>
                                                            <td>Nombre</td>
                                                            <td>Grado</td>
                                                            <td>Estado</td>
                                                            <td>Acciones</td>
                                                        </tr>
                                                        </thead>
                                                        <tfoot style="background-color: #2874BB; color: white; font-weight: bold;">
                                                        <tr>
                                                            <td></td> 
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        </tfoot>
                                                        <tbody id="contenido">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row tabla 1 -->
                                        <!-- Botones -->
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <button type="button" id="btnactual" class="btn btn-warning">Ciclo Actual</button>
                                                </div>
                                                <div class="form-group col-md-3 d-none" id="btnoculto">
                                                    <button type="button" id="btnpromover" class="btn bg-deep-orange">Promover</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Botones -->
                                        <!-- seccion select no.2 -->
                                        <div class="form-group d-none" id="contenedoroculto">
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="area">Nivel</label>
                                                    <select class="form-control select2" id="idarea2" name="idarea2"></select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="nivel">Grado</label>
                                                    <select class="form-control select2" id="idnivel2" name="idnivel2"></select>
                                                </div>
                                                <div class="form-group col-md-3 d-none" id="containercarrera2">
                                                    <label for="grado">Carrera</label>
                                                    <select class="form-control select2" name="idcarrera2" id="idcarrera2"></select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="anio">Ciclo</label>
                                                    <select class="form-control select2" name="anio2" id="anio2"></select>
                                                </div>
                                                <!-- <div class="form-group col-md-2">
                                                    <br>
                                                    <button type="button" id="btnget" class="btn btn-warning">Ver</button>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!-- End seccion select no.2 -->
                                        <!-- row tabla 2 -->
                                        <div class="form-group d-none" id="table2">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <table id="view2" class="table table-hover table-condense table-striped table-sm" style="text-align: center; width: 100%">
                                                        <thead style="background-color: #134C7D; color:white; font-weight: bold; ">
                                                            <tr>
                                                                <td>Codigo P.</td>
                                                                <td>Nombre</td>
                                                                <td>Grado</td>
                                                                <td>Estado</td>
                                                                <td>Acciones</td>
                                                            </tr>
                                                        </thead>
                                                        <tfoot style="background-color: #2874BB; color: white; font-weight: bold;">
                                                            <tr>
                                                                <td></td> 
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody id="contenido2">
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row tabla 2 -->
                                    </div>
                                    <!-- end tab-pane1 -->
                                    <!-- tab-pane2 -->
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <input type="text" id="id" class="form-control" placeholder="Carnet o CP" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
                                                    <div class="input-group-append" id="button-addon4">
                                                        <button class="btn btn-sm btn-outline-primary" type="button" id="btnbuscar">Buscar</button>
                                                        <button class="btn btn-sm btn-outline-danger" type="button">Button</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12" id="print-card">
                                                
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button class='btn btn-sm btn-outline-danger' type='button' id='btncontroles'>Promover</button>
                                            </div>
                                        </div>
                                        <div class="form-row d-none" id="print-card2">
                                            <div class="form-group col-md-3">
                                                <label for="area">Nivel</label>
                                                <select class="form-control select2" id="idarea3" name="idarea3"></select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="nivel">Grado</label>
                                                <select class="form-control select2" id="idnivel3" name="idnivel3"></select>
                                            </div>
                                            <div class="form-group col-md-3 d-none" id="containercarrera3">
                                                <label for="grado">Carrera</label>
                                                <select class="form-control select2" name="idcarrera3" id="idcarrera3"></select>
                                            </div>
                                            <div class="form-group col-md-3">
                                            <button class='btn btn-sm btn-outline-danger' type='button' id='btnefectuar'>Efectuar Promocion</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end tab-pane2 -->
                                </div>
                                <!-- end tab-content -->
                            </div>
                            <!-- end card body 1 -->
                        </div>
                    </div>
              </div> <!-- row -->
       </div> <!-- container-fluid -->
      </div> <!-- content -->
    </div> <!-- main-panel -->
 

  <?php require_once 'footer/scripts.php'; ?>
  <script src="<?php echo SERVERURL; ?>js/alumno/promover/index.js"></script>
  

</html>
<?php 
}
else{
  header("location:index");
}
?>