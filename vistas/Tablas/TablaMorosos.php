<?php 
session_start();
require_once "../../php/conexion.php";
require_once '../../php/pagos/ClasePago.php';

$obj=new Pago();
$c        = new conex();
$conexion = $c->conexion();

 $nottot=0;    
 $contnot=0;
if(isset($_SESSION['grado']) && isset($_SESSION['area']) && isset($_SESSION['carrera'])){
$valor=$_SESSION['grado'];
$ciclo=$_SESSION['area'];
$carrera=$_SESSION['carrera'];  
}
else if(empty($_SESSION['grado']) && empty($_SESSION['area']) && empty($_SESSION['carrera'])){
$valor=0;
$ciclo=0;
$carrera=0;
}




$fila=0;
$filaanio=0;
$cont=0;
  $consulta = "SELECT YEAR(NOW())";
   $resultt  = mysqli_query($conexion, $consulta);
    $cont     = mysqli_fetch_array($resultt);
    $verif      = $cont[0];
    $anio    = (int) $verif;

$sql3="SELECT a.pnombre,a.snombre,a.papellido,a.sapellido,a.carnet,a.cpersonal FROM alumno a INNER JOIN grado g ON a.id_grado=g.id_grado WHERE g.id_grado='$valor'";

$sult=mysqli_query($conexion, $sql3);

$fila=mysqli_num_rows($sult);
$pagina=$fila/1;
$pagina=ceil($pagina);



 while($nombre=mysqli_fetch_array($sult)): 

$sqlanio="SELECT dp.id_mes,dp.monto,p.id_boleta,p.ciclo,p.fecha FROM detalle_pago dp INNER JOIN pago p ON dp.no_boleta=p.id_boleta INNER JOIN alumno al on al.carnet=dp.carnet INNER JOIN grado g ON g.id_grado=al.id_grado INNER JOIN areaescolar ar ON g.id_area=ar.id_area INNER JOIN carrera c ON g.id_carrera=c.id_carrera WHERE al.carnet='$nombre[4]' AND p.ciclo='$anio' AND g.id_grado='$valor' AND g.id_carrera='$carrera' AND dp.id_tipopago='2'";
$sultanio=mysqli_query($conexion, $sqlanio);
$filaanio=mysqli_num_rows($sultanio);
if($filaanio==0 || $filaanio==null || $filaanio==""){
?>


<table id="IdNOTAS1" class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <thead >
      <tr style="background-color: #0e5430; color:white; font-weight: bold;">
        <td rowspan="2">Fecha de Pago</td>
        <td rowspan="2">No. Recibo de Pago</td>
        <td rowspan="2">MES MOROSO</td>
        <td colspan="3">OPERACION</td>
        <td >Nombre del Estudiante</td>
        <td rowspan="1">No. de Telefono</td>
      </tr>
      <tr style="background-color: #0e5430; color:white; font-weight: bold;">
        <td>DEBE</td>
        <td>HABER</td>
        <td>SALDO</td>
        <td><?php  echo $nombre[0]." ".$nombre[1].",".$nombre[2]." ".$nombre[3]."-".$nombre[5]; ?></td>
        <td>*</td>
      </tr>
    </thead>
<tbody>
<?php 
for($mesess=1;$mesess<11;$mesess++):
?>
<tr>
<?php 
$sql2="SELECT dp.id_mes,dp.monto,p.id_boleta,p.ciclo,p.fecha FROM detalle_pago dp INNER JOIN pago p ON dp.no_boleta=p.id_boleta INNER JOIN alumno al on al.carnet=dp.carnet INNER JOIN grado g ON g.id_grado=al.id_grado INNER JOIN areaescolar ar ON g.id_area=ar.id_area INNER JOIN carrera c ON g.id_carrera=c.id_carrera WHERE al.carnet='$nombre[4]' AND p.ciclo='$anio' AND g.id_grado='$valor' AND g.id_carrera='$carrera' AND dp.id_mes='$mesess'";

$result1 = mysqli_query($conexion, $sql2);
$mesesmoro= mysqli_fetch_array($result1);

if($mesess==$mesesmoro[0]){
?>

<?php 
}
else if($mesess!=$mesesmoro[0] && $mesess<="10")
{  
$messes=$obj->Mesesito($mesess);
$resultado=$obj->MesMoroso($mesess,$valor);
?>
<td>X</td>
<td>X</td>
<td><?php echo $messes ?></td>
<td>X</td>
<td></td>
<td><?php echo $resultado[0]; ?></td>
<td></td>
<td></td>
<?php 
}
?>
</tr>
<?php 
endfor;
?>
</tbody>
    <tfoot style="background-color: #7a757d;color: white; font-weight: bold;">
 <tr>
        <td>Fecha de Pago</td>
        <td>No. Recibo de Pago</td>
        <td>MES MOROSO</td>
        <td colspan="3">OPERACION</td>
        <td>Nombre del Estudiante</td>
        <td>No. de Telefono</td>
      </tr>
    </tfoot>
</table>
<?php 
}else{

}
endwhile;?>

<div class="row col-md-12 ml-auto hidden">
      <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-end">
      <li class="page-item disabled">
     <a class="page-link" href="reporteriapago.php?pagina=<?php echo $_GET['pagina']-1 ?>" tabindex="-1">Anterior</a>
     </li>
     <?php for($i=0;$i<$pagina;$i++): ?>
       <li class="page-item">
        <a class="page-link" href="reporteriapago.php?pagina=<?php echo ($i+1)?>"><?php echo ($i+1) ?></a></li>
      <?php endfor; ?>

          <?php echo 'reporteriapago.php?pagina'>$pagina ?'disabled':' ' ?>
            <li class="page-item">
            <a class="page-link" href="reporteriapago.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a>
            </li>
            </ul>
            </nav>
  </div> 





