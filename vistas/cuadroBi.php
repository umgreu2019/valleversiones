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
      <?php require_once 'header/navbar.php';?>
      <!-- End Navbar -->

      <div class="content wow slideInRight delay-1s">
        <div class="container-fluid">

        <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="" class="col-light-green ml-4"><p class="h4 font-weight-bold">Nivel:</p></label>
                        </div>
                        
                        <select name="" class="form-control form-control-sm form-control-danger select2 " id="sarea">
                            <option value="0">Seleccione el Nivel</option>
                            <?php 
                            while($mo=mysqli_fetch_array($ejecuta)):
                            ?>
                            <option value="<?php echo $mo[0] ?>"><?php echo $mo[1] ?></option>

                        <?php endwhile; ?>
                        </select>
                        
                    </div>           

                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="" class="col-light-green ml-4"><p class="h4 font-weight-bold">GRADO:</p></label>
                        </div>
                        
                            <select name="" class="form-control form-control-sm form-control-danger select2" id="sgrado">
                            <option value="0">Seleccione el Grado</option>            
                            </select>
                            
                    </div>
                    
                    <div class="col-md-3 d-none" id="containercarrera">
                        <div class="form-group">
                            <label for="scarrera" class="col-light-green ml-4"><p class="h4 font-weight-bold">CARRERA:</p></label>
                        </div>
                        <select  class="form-control form-control-sm form-control-danger select2" id="scarrera" name="scarrera">
                            <option value="0">Seleccione el carrera</option>
                        </select> 
                    </div>
                    </div>


        <br>
        <div class="card">
           <div class="capture card-body" id="capture">
          <div class="row">
            <div class="col-md-12">
              <h3 class="col-black text-center font-weight-bold">Colegio Cristiano "El Valle del Sur"</h3>  
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label for="grado" class="form-control-label col-purple mt-1">Grado:</label>
                <input type="text" class="form-control" disabled id="grado">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group ">
              <label for="Curso" class="form-control-label col-purple mt-1">Curso:</label>
              <input type="text" class="form-control" disabled id="Curso" disabled>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
              <input type="text" class="form-control form-control-lg anioe"  disabled>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="nivel" class="form-control-label col-purple mt-1">Nivel:</label>
                <input type="text" class="form-control" disabled id="nivel">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="cate" class="form-control-label col-purple mt-1">Catedratico(a):</label>
                <input type="text" class="form-control" disabled id="cate">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">                
                <input type="text" class="form-control" disabled id="pendiente">
              </div>
            </div>
          </div>
            <table id="IdTableEmpleados" class="table table-sm table-striped table-hover table-bordered   " style="text-align: center;">
                <thead class="bg-white col-black font-weight-bold" >
                  <tr>
                    <td rowspan="2" class="text-center" style="width: 8px;" >No. </td>
                    <td rowspan="2" colspan="2" class="text-center">Nombre del Estudiante(a)</td>
                    <td colspan="10" class="text-center">Actividades de conograma</td>
                    <td rowspan="2" class="text-center" style="width: 20px";>Zona</td>
                    <td rowspan="2" class="text-center" style="width: 20px;">Total</td>
                    <td rowspan="2" class="text-center" style="width: 20px;">Examen</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                  </tr>
                </thead>
                
                <tbody id="CargarCuadros" style="background-color:white; color:#0e5430; ">
                  
                 
                
                </tbody>
              </table>  
              <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-5"></div>
          <div class="col-md-3 mt-2">
            <button type="button"  class="btn backgr-red col-black font-weight-bold buttonImage">IMPRIMIR CUADROS</button>
          </div>
        </div>
        </div> 
         </div> <!-- fin del capture -->
        </div>

       </div> <!-- container-fluid -->
      </div>
    </div>
 

  <?php require_once 'footer/scripts.php'; ?>
  <script src="<?php echo SERVERURL; ?>js/alumno/cuadrosBi/cuadros.js"></script>

</html>
<?php 
}else{
  header("location:index");
}
 ?>

<script>
  $(document).ready(function(){
     $('.anioe').val("CICLO ESCOLAR "+moment().format('YYYY'));
      // $('#tableedades').load("http://localhost/ValleSistema2/vistas/TablaEdades.php");     

      // $('#tablerepresentante').load("http://localhost/ValleSistema2/vistas/TablaRepresentante.php");     
  });

   
</script>