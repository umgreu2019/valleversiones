<?php
session_start();
require_once "../../php/conexion.php";


$c        = new conex();
$conexion = $c->conexion();


$valor=$_SESSION['grado'];
$carne=$_SESSION['carnet'];
$ciclo=$_SESSION['ciclo'];
// $bimestre='1';

$cont=0;
$sql = "SELECT c.CURSO,c.id_curso FROM curso c INNER JOIN obtener o ON o.id_curso=c.id_curso INNER JOIN grado g ON o.id_grado=g.id_grado WHERE g.id_grado='$valor'";

$sql3="SELECT a.pnombre,a.snombre,a.papellido,a.sapellido,g.grado,a.carnet FROM alumno a INNER JOIN grado g ON a.id_grado=g.id_grado WHERE g.id_grado='$valor' AND a.carnet='$carne'";

$sql2 = "SELECT g.No_Unidades FROM grado g WHERE g.id_grado='$valor'";

$result = mysqli_query($conexion, $sql);

$sult=mysqli_query($conexion, $sql3);

$nombre=mysqli_fetch_array($sult);

$result1 = mysqli_query($conexion, $sql2);
$NoUnidades= mysqli_fetch_array($result1);

 
 function a_romano($integer, $upcase = true) 
    {
        $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 
                       'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9,   
                       'V'=>5, 'IV'=>4, 'I'=>1);
        $return = '';
        while($integer > 0) 
        {
            foreach($table as $rom=>$arb) 
            {
                if($integer >= $arb)
                {
                    $integer -= $arb;
                    $return .= $rom;
                    break;
                }
            }
        }
        return $return;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="icon" href="../assets/img/favicon.png">
    <title>
        Cursos
    </title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="../../assets/css/material-dashboard.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
  
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css" />
    <script src="../js/plugins/dataTables.fixedColumns.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <link rel="stylesheet" href="../../DataTable/dataTables.bootstrap4.min.css">
<!-- plugins -->
<link rel="stylesheet" href="../../css/animate/animate.css">
<script src="../../js/wow/wow.min.js"></script>
  <script>
      new WOW().init();
  </script> 
<script src="../../assets/js/core/jquery.min.js"></script>
<script src="../../assets/js/core/popper.min.js"></script>
<script src="../../assets/js/bootstrap-material-design.js"></script>
<script src="../../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="../../assets/js/material-dashboard.js?v=2.0.0"></script>
<!-- demo init -->
<script src="../../assets/js/plugins/demo.js"></script>
<script src="../../js/llenado.js"></script>
    
    </head>
<body class="" style="overflow-x: hidden;">
<div class="wrapper">
    
<div class="main-panel w-100" >
            <!-- Navbar -->
<div class="row">
<div class="  card col-md-11 mx-auto mt-5" style="border: none; box-shadow: none;">
  <div class="card-header">
  <div class="row">
    <div class="col-md-5 mx-auto" style="left: 15%;">
      <img src="../../img/1536166462796.png" style="width: 100px; height: 100px;" class="wow zoomInRight img-fluid text-center" align="center" alt="">
    </div>
    <div class="col-md-8 mx-auto">
      <p class="h4 text-center font-weight-bold text-uvg">LICEO EVANGELICO "ISRAEL"</p>
      <p class="h6 text-center font-weight-bold">CUADRO DE NOTAS BIMESTRALES</p>
    </div>
  </div>
</div>
<div class="card-body">
  
  <div class="row mb-0" style=" margin-top: -0.6rem!important; margin-bottom: -0.9rem !important;">
    <div class="col-md-3">
      <div class="input-group mb-3">
      <div class="input-group-prepend">
      <span class="input-group-text font-weight-bold" id="basic-addon1">Carnet:</span>
      </div>
      <input type="text" class="form-control" style="border:none; margin-left: 1.8rem ;" value="<?php echo $nombre[5] ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
      </div>
    </div>
  </div>

  <div class="row mb-0 mt-0" style="margin-top: -0.6rem!important; margin-bottom: -0.9rem !important;">
  <div class="col-md-5">
      <div class="input-group mb-3">
      <div class="input-group-prepend">
      <span class="input-group-text font-weight-bold" id="basic-addon1">Grado:</span>
      </div>
      <input type="text" class="form-control" style="border:none; margin-left: 2rem;" value="<?php echo $nombre[4] ?>" placeholder="Username" aria-label="Username" readonly aria-describedby="basic-addon1">
      </div>
    </div>  
  </div>

  <div class="row mt-0 mb-0" style="margin-top: -0.6rem!important; margin-bottom: -0.9rem !important;">
  <div class="col-md-5">
      <div class="input-group mb-3">
      <div class="input-group-prepend">
      <span class="input-group-text font-weight-bold" id="basic-addon1">Estudiante:</span>
      </div>
      <input type="text" class="form-control" style="border:none;" value="<?php echo $nombre[2]." ".$nombre[3].", ".$nombre[0]." ".$nombre[1] ?>" placeholder="Username" readonly aria-label="Username" aria-describedby="basic-addon1">
      </div>
    </div>  
  </div>

</div>
</div>


<div class=" card col-md-11 mx-auto mt-0" style="border: none; box-shadow: none; overflow-x: hidden !important;">
  <div class="card-header"></div>
  <div class="card-body">
<div class="content ">
<div class="container-fluid ">


<div class="table-responsive ">
  <table id="IdNOTAS" class="table table-striped table-borderless   " style="overflow-x: hidden !important;">
    <thead style="background-color: rgba(250,255,255,0.9); color:black; font-weight: bold;">
      <tr>
        <th rowspan="2"><p class="h6 font-weight-bold">No.</p></th>
        <th rowspan="2" ><p class="h6 text-center font-weight-bold">Curso (Materia)</p></th> 


<?php for($i=0; $i<$NoUnidades[0]; $i++):
        $roma=a_romano($i+1); ?>
    <th colspan="3"><p class="h6 text-center font-weight-bold"><?php echo $roma." "."Bimestre"  ?></p></th>
<?php endfor;?>
    <th rowspan="2"><p class=" h6 font-weight-bold">NOTA FINAL</p></th>
    </tr>
      <tr>
  <?php for($i=0;$i<$NoUnidades[0];$i++): ?>

       <td>Zona</td>
        <td>Evaluacion</td>
        <td>Total</td>
<?php endfor; ?>
</tr>
 </thead>
    
 <tbody style="background-color:white; ">

<?php while($mos=mysqli_fetch_array($result)): ?>
<tr>
    <td ><?php echo($cont+1) ?></td>
    <td ><?php echo $mos[0] ?></td>

<?php for($i=0;$i<$NoUnidades[0];$i++):
      $bimestre=($i+1);
      $res="SELECT n.zona,n.nota,n.notafinal FROM nota n INNER JOIN obtener o ON n.id_obtener=o.id_obtener INNER JOIN grado g ON g.id_grado=o.id_grado INNER JOIN curso c ON o.id_curso=c.id_curso INNER JOIN alumno a ON a.carnet = n.id_alumno WHERE n.id_alumno='$carne' AND ciclo_escolar='$ciclo' AND g.id_grado='$valor' AND c.id_curso='$mos[1]' AND n.bimestre='$bimestre'";

      $ejectar=mysqli_query($conexion,$res);
      $respuesta=mysqli_fetch_array($ejectar); ?>

    <td><p class="text-center"><?php echo $respuesta[0]?></p></td>
    <td><p class="text-center"><?php echo $respuesta[1] ?></p></td>
    <td><p class="text-center" id="to"><?php echo $respuesta[2] ?></p></td>
  <?php endfor; ?>
  <td><p class="text-center" id="nott"></p></td>
  </tr>
  <?php 
    $cont=$cont+1;
  endwhile; 
   ?>
</tbody>
</table>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>

