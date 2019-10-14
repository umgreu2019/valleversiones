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
        <div class="container-fluid">
        
        
        <div class="row"><!-- row --> 
         <div class="card col-md-12 mb-3">
         <div class="card-header backgr-indigo h3 text-right font-weight-bold col-white">
         ACTUALIZACION DE DATOS 
         </div>
        <div class="card-body">
        <div id="tableUsuariosLoad" class="col-md-12 col-xl-12 col-sm-12">
                        
        </div>
        </div>
        </div>
        </div> <!-- row -->

        </div> <!-- container-fluid -->
      </div> <!-- content -->
    </div> <!-- main-panel -->

     <div class="modal fade" id="Mupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="text-left font-weight-bold col-red" id="exampleModalLabel">Actualizar Datos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form id="frmUpdateUsuarios">
              <input type="text" hidden="" name="UpIdUsuario" id="UpIdUsuario">

              <label class="bmd-label-floating font-weight-bold text-uvg">DPI</label>
              <input type="text" maxlength="13" name="UpDPI" id="UpDPI" class="form-control input-sm">
              <br>
              <?php
$consulta="SELECT * FROM departamento";
$resultado=mysqli_query($conexion,$consulta);
?>
                                                
        <label class="bmd-label-floating font-weight-bold text-uvg">Nombre de Pila</label>
        <input type="text" maxlength="30" name="UpNombre" id="UpNombre" class="form-control input-sm"> 
<br>
<label class="bmd-label-floating font-weight-bold text-uvg">Apellido Completo</label>
        <input type="text" maxlength="50" name="UpApellido" id="UpApellido" class="form-control input-sm"> 
<br>
<label class="bmd-label-floating text-uvg font-weight-bold">DEPARTAMENTO DE NACIMIENTO</label>
<select class="form-control form-control-md" name="Updepton" id="Updepton">
<option class="text-danger" value="A">SELECCIONE EL DEPARTAMENTO</option>
<?php
while ($mostrar3 = mysqli_fetch_array($resultado)) {
?>
<option value="<?php echo $mostrar3['id_depto'];?>"><?php echo $mostrar3['nombred'];?></option>
<?php } ?>
</select>
<br>
    <?php
        $consulta2="SELECT * FROM municipio";
        $resultado2=mysqli_query($conexion,$consulta2);
        ?>

            <label class="bmd-label-floating text-uvg font-weight-bold">MUNICIPIO DE NACIMIENTO</label>
            <select class="form-control form-control-md" name="Upmunin" id="Upmunin">
            <option  value=" " required>SELECCIONE EL MUNICIPIO </option>                                                     
            </select>
            <br>
            <?php
 $con="SELECT t.* FROM tipoemple t,areatrabajo a WHERE t.id_area=a.id_area ";
 $resul=mysqli_query($conexion,$con);                                            
?>
            <label class="bmd-label-floating text-uvg font-weight-bold">PUESTO DE INCURSION</label>
            <select class="form-control form-control-md" name="Uppuesto" id="Uppuesto">
            <option  value=" " required>SELECCIONE EL PUESTO</option>  
            <?php
             while ($mostr = mysqli_fetch_array($resul)) {
                ?>
             <option value="<?php echo $mostr['id_tipoem'];?>"><?php echo $mostr['Nom_Rol'];?></option>
            <?php } ?>                                                   
            </select>
            <br>
            <label class="bmd-label-floating font-weight-bold text-uvg">DIRECCION RESIDENCIA</label>
        <input type="text" maxlength="60" name="Updireccion" id="Updireccion" class="form-control input-sm"> 
        <br>
        <label class="bmd-label-floating font-weight-bold text-uvg">NUMERO DE TELEFONO</label>
        <input type="text" maxlength="11" name="Uptelefono" id="Uptelefono" class="form-control input-sm">
        <br>
        <label class="bmd-label-floating font-weight-bold text-uvg">USUARIO</label>
        <input type="text" maxlength="25" name="Upusuario" id="Upusuario" class="form-control input-sm">
        <label class="bmd-label-floating font-weight-bold text-uvg">CONTRASEÑA</label>
        <input type="password" maxlength="25" name="Uppass" id="Uppass" class="form-control input-sm">  
        
              </form>
          </div>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-outline-success btn-lg" data-dismiss="modal" id="btnUpdate">Actualizar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="Control" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header backgr-black">
            <h4 class="modal-title  text-left font-weight-bold col-white" id="exampleModalLabel">Actualizar Permisos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="col-white">&times;</span>
            </button>
          </div>
        <form id="frmPermisos">
          <div class="card mx-auto col-xl-12 col-sm-12 col-md-12">
            <div class="card-body">
              <div id="tabla-permisos" class="col-xl-12 col-md-12 col-sm-12">
                  
              </div>
            </div>
          </div>
       </form>
    </div>
    </div>
  </div>
 

  <?php require_once 'footer/scripts.php'; ?>
  <script src="<?php echo SERVERURL; ?>js/usuarios/usuarios.js"></script>
</html>
<?php 
}
else{
  header("location:index");
}
?>