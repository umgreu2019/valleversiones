<?php
session_start();
require_once "../../php/conexion/conexion.php";
$c        = new conex();
$conexion = $c->conexion();

$bimestre=0;
$area=0;
$valor=0;
if(!isset($_SESSION['respaldo'])):
$_SESSION['respaldo']=0;
$_SESSION['resbim']=0;
endif;

if(!(isset($_SESSION['grado'])) || (!isset($_SESSION['bimestre'])) || (!isset($_SESSION['carrera'])) ):
$valor=0;
$carrera=0;
$bimestre=0;
endif;

if(isset($_SESSION['grado']) && isset($_SESSION['bimestre']) && isset($_SESSION['carrera']) && isset($_SESSION['area'])){
$valor=$_SESSION['grado'];
$bimestre=$_SESSION['bimestre'];
$carrera=$_SESSION['carrera'];
$area=$_SESSION['area'];

$_SESSION['respaldo']=$valor;
$_SESSION['resbim']=$bimestre;
}

$grado="SELECT id_grado FROM grado WHERE grado='$valor' AND id_area='$area' AND id_carrera='$carrera'";
$r = mysqli_query($conexion,$grado);
$obt=mysqli_fetch_row($r);

$cont=0;
$sql = "SELECT c.CURSO,c.id_curso FROM curso c INNER JOIN obtener o ON o.id_curso=c.id_curso 
        INNER JOIN grado g ON o.id_grado=g.id_grado WHERE g.id_grado='$obt[0]'";

$sql2="SELECT a.carnet,a.pnombre,a.snombre,a.papellido,a.sapellido FROM alumno a 
       INNER JOIN grado g ON a.id_grado=g.id_grado WHERE g.id_grado='$obt[0]'";

$result = mysqli_query($conexion, $sql);
$result1 = mysqli_query($conexion, $sql2);
?>

<div class="table-responsive" id="MostraOculta">
<table id="IdNOTAS" class="table table-responsive table-striped table-bordered nowrap" style="width:100%;" >
<thead class="bg-teal col-white font-weight-bold">
  <tr>
    <td rowspan="2">#</td>
    <td rowspan="2">Carnet</td>
    <td rowspan="2">Nombre Completo</td>
    <td colspan="3" class="text-center">Curso # N</td> 
    <td colspan="3" class="text-center">Curso # N</td>
    <td colspan="3" class="text-center">Curso # N</td>
    <td colspan="3" class="text-center">Curso # N</td> 
    <td colspan="3" class="text-center">Curso # N</td>
    <td colspan="3" class="text-center">Curso # N</td>    
  </tr>
  <tr>
    <td>Zona</td>
    <td>Evaluacion</td>
    <td>Total</td>
    <td>Zona</td>
    <td>Evaluacion</td>
    <td>Total</td>
    <td>Zona</td>
    <td>Evaluacion</td>
    <td>Total</td>
    <td>Zona</td>
    <td>Evaluacion</td>
    <td>Total</td>
    <td>Zona</td>
    <td>Evaluacion</td>
    <td>Total</td>
    <td>Zona</td>
    <td>Evaluacion</td>
    <td>Total</td>
  </tr>
</thead>
<tbody class="bg-white col-black" >
 <tr>
  <td >1</td>
  <td >CV-231234</td>
  <td>Jose Daniel Galindo</td>
   <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>
 </tr>
 <tr>
  <td>2</td>
  <td>CV-31234</td>
  <td>Juan David Gonzales Melquiades</td>
  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>
 </tr>
 <tr>
  <td>3</td>
  <td>CV-31234</td>
  <td>Jose Daniel Galindo</td>
  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>

  <td><input type="text" id="" class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id=""  class="form-control form-control-sm" value="0"></td>
  <td><input type="text" id="" readonly class="form-control form-control-sm" value="0"></td>
 </tr>
</tbody>

</table>
</div>

<script type="text/javascript">
  $(document).ready(function() {
   var table= $('#IdNOTAS').DataTable({
   
      "language": {
            "url": "http://localhost/ValleSistema2/js/plugins/lenguaje.json"
        },
      scrollY: false,
      scrollX: true,
      scrollCollapse: true,
      paging: true,
        fixedColumns:   {
            leftColumns: 3
        }
    
    });

    

  } );
</script>

<?php 
unset($_SESSION['grado']);
unset($_SESSION['bimestre']);
// echo $_SESSION['respaldo'];
// echo $_SESSION['resbim'];
 ?> 