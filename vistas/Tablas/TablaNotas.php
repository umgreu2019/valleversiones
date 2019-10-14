<?php
session_start();
require_once "../../php/conexion.php";
$c        = new conex();
$conexion = $c->conexion();

$bimestre=0;

if(!isset($_SESSION['respaldo'])):
$_SESSION['respaldo']=0;
$_SESSION['resbim']=0;
endif;

if(!(isset($_SESSION['grado'])) || (!isset($_SESSION['bimestre']))):
$valor=0;
$bimestre=0;
endif;


if(isset($_SESSION['grado']) && isset($_SESSION['bimestre'])){
$valor=$_SESSION['grado'];
$bimestre=$_SESSION['bimestre'];

$_SESSION['respaldo']=$valor;
$_SESSION['resbim']=$bimestre;
}


$cont=0;
$sql = "SELECT c.CURSO,c.id_curso FROM curso c INNER JOIN obtener o ON o.id_curso=c.id_curso INNER JOIN grado g ON o.id_grado=g.id_grado WHERE g.id_grado='$valor'";

$sql2="SELECT a.carnet,a.pnombre,a.snombre,a.papellido,a.sapellido FROM alumno a INNER JOIN grado g ON a.id_grado=g.id_grado WHERE g.id_grado='$valor'";

$result = mysqli_query($conexion, $sql);

$result1 = mysqli_query($conexion, $sql2);

if((!isset($_SESSION['mostrar'])) || (isset($_SESSION['mostrar']) && ($_SESSION['mostrar']==1) )):
?>
<div class="table-responsive" id="MostraOculta">
<?php endif; 
if((isset($_SESSION['mostrar'])) && ($_SESSION['mostrar']==0)):
?>
<div class="table-responsive hidden" id="MostraOculta">
<?php endif; ?>

  <table id="IdNOTAS" class="table table-striped table-bordered rounded nowrap  " style="width:100%; ">
    <thead style="background-color: rgba(250,90,45,0.9); color:white; font-weight: bold;">
      <tr>
        <th rowspan="2">#</th>
        <th rowspan="2">Carnet</th>
        <th rowspan="2" >Nombre Completo</th>    
        <?php while($mos=mysqli_fetch_array($result)):?>    
        <th colspan="3"><?php echo $mos[0]; ?></th>        
        <?php 
        $codigo[$cont]=$mos[1];
        $cont=$cont+1;
        endwhile;
        ?>          
      </tr>

      <tr>
        <?php for($i=0;$i<$cont;$i++):?>    
        <td>Zona</td>
        <td>Evaluacion</td>
        <td>Total</td>
        <?php endfor; ?>      
      </tr>
    </thead>
    
 <tbody style="background-color:white; ">
  <?php 
  $ia=0;
  while($most1=mysqli_fetch_array($result1)): ?>
 <tr>
  <td ><?php echo $ia ?></td>
  <td ><?php echo $most1[0] ?></td>
  <td ><?php echo $most1[3]." ".$most1[4]." , ".$most1[1]." ".$most1[2] ?></td>
  <?php for($i=0;$i<$cont;$i++):

  $fecha="SELECT YEAR(NOW())";
  $mos=mysqli_query($conexion,$fecha);
  $f=mysqli_fetch_array($mos);
  $year=$f[0];

  $notas="SELECT n.zona,n.nota,n.notafinal FROM nota n INNER JOIN alumno a ON n.id_alumno=a.carnet INNER JOIN obtener o ON n.id_obtener = o.id_obtener INNER JOIN grado g ON o.id_grado=g.id_grado INNER JOIN curso c ON c.id_curso=o.id_curso WHERE a.carnet='$most1[0]' AND bimestre='$bimestre' AND c.id_curso='$codigo[$i]' AND g.id_grado='$valor' AND n.ciclo_escolar='$year'";

  $resp=mysqli_query($conexion,$notas);
  $res=mysqli_fetch_array($resp);
    ?>   

  <td><input type="text" id="<?php echo "a".$codigo[$i]."-".$most1[0]; ?>" onchange="sumar('<?php echo $codigo[$i]."-".$most1[0]; ?>')" class="form-control form-control-sm" value="<?php echo $res[0] ?>"></td>
  <td><input type="text" id="<?php echo "b".$codigo[$i]."-".$most1[0]; ?>" onchange="sumar('<?php echo $codigo[$i]."-".$most1[0]; ?>')" class="form-control form-control-sm" value="<?php echo $res[1] ?>"></td>
  <td><input type="text" id="<?php echo  "spTotala-".$codigo[$i]."-".$most1[0] ?>" readonly class="form-control form-control-sm" value="<?php echo $res[2] ?>"></td>
  <?php endfor; ?>      
 </tr>
 <?php 
  $ia++;
  endwhile;
  ?>
</tbody>
</table>
</div>



<script type="text/javascript">
  $(document).ready(function() {
   var table= $('#IdNOTAS').DataTable({
    "language": {
            "url": "http://localhost/Liceo/js/plugins/lenguaje.json"
        },
      scrollY: false,
      scrollX: true,
      scrollCollapse: true,
      paging: true,
      // buttons:        [ 'colvis' ],
      fixedColumns:{
       leftColumns:3
      }
    });

    

  } );
</script>
<script>
  
</script>

 <?php 
unset($_SESSION['grado']);
unset($_SESSION['bimestre']);
// echo $_SESSION['respaldo'];
// echo $_SESSION['resbim'];
 ?> 