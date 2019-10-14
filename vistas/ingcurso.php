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
<div class="row">
    <div class="col-md-12 col-xl-12 col-sm-12 mx-auto">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="card border-light mb-3" >
                    <div class="card-header backgr-black ">
                        <p class="h3 text-left font-weight-bold col-teal">ASIGNACION DE CURSOS</p>
                    </div>
                    <!-- contenido -->
                    <!-- card body -->
                    <div class="card-body">
                        <!-- content -->
                        <div class="content">
                        <!-- accordion -->
                        <div id="accordion" >
                            <div class="card ">
                                <div class="card-header" id="headingOne" data-toggle="tooltip" title="Presione sobre el texto para desplegar">
                                    <h6 class="mb-0 h6">
                                    <button class="btn btn-link h-100 w-100" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <p class="h6 col-teal font-weight-bold text-left"><i class="material-icons mr-4">table_chart</i> FILTROS DE LA TABLA</p>
                                    </button>
                                    </h6>
                                </div>   
                                <!-- contenido -->
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <!-- selects -->
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
                                            <!-- end selects -->
                                            <div class="form-group col-md-12">
                                                <span class="btn btn-warning btn-sm" id="btnadd"><i class=""></i><strong>AGREGAR</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End contenido -->
                            </div>
                        </div>
                        <!-- End accordion -->
                        <div class="form-row">
                            <!-- table -->
                            <div class="form-group col-md-12" id="conttable">
                                <table class="table table-hover table-condensed table-sm" id="printtable">
                                    <thead  style="background-color: #455A64; color:white; font-weight: bold; width: 100%">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table">
                                    
                                    </tbody>
                                </table>									
                            </div>
                            <!-- end table -->
                            <!-- table temp-->
                            <div class="form-group col-md-12 d-none" id=temptable>
                                <table class="table table-hover table-condensed table-sm" id="tablecursos">
                                    <thead  style="background-color: #455A64; color:white; font-weight: bold; width: 100%">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <!-- end table temp-->
                            <div class="form-group col-md-12">
                                <span class="btn btn-warning btn-sm" id="btnguardar"><i class=""></i><strong>GUARDAR</strong></span>
                            </div>
                        </div>
                        </div>
                        <!-- End content -->
                    </div>
                    <!-- End carbody -->                    
                    <!-- End contenido -->
                </div> <!-- tab-content -->
            </div> <!-- tab-pane -->
        </div>
    </div>
</div> 
<!-- container-fluid#1  -->
</div> <!-- content -->
</div> <!-- main-panel -->
<?php require_once 'footer/scripts.php'; ?>
<script src="<?php echo SERVERURL; ?>js/cursos/indexc.js"></script>

</html>
<?php 
}
else{
  header("location:index");
}
?>