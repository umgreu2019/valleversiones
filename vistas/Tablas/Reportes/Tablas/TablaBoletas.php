<?php 
require_once "../../../../php/conexion.php";
$c        = new conex();
$conexion = $c->conexion();

session_start();
$aux=$_SESSION['permisos'];
for($i=0; $i<count($_SESSION['permisos']); $i++){
$c = explode("||",$aux[$i]);
$acceso[$i]=$c[0];
$estado[$i]=$c[1];
}

 $sql = "SELECT * FROM pago WHERE 1";
$cont=0;
$result = mysqli_query($conexion, $sql);
$cont= mysqli_num_rows($result);
?>
 

<div class="table-responsive">
  <table id="IdTalonarios" class="table  table-hover table-sm  table-striped" style="text-align: center;">
    <thead style="background-color: rgba(80,30,250,0.98); color:white; font-weight: bold;">
      <tr>
        <th>No.Boleta</th>
        <th>Persona que realizo el pago</th>
        <th>Concepto de pago</th>
        <th>Cantidad Monetaria</th>
        <th>Alumno (s)</th>
        <th>Fecha de Pago</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <!-- <tfoot style="background-color: rgba(10,10,255,0.45);color: white; font-weight: bold;">
      <tr>
      <td>No.Boleta</td>
        <td>Persona que realizo el pago</td>
        <td>Concepto de pago</td>
        <td>Cantidad Monetaria</td>
        <td>Alumnos</td>
        <td>Acciones</td>
      </tr>
    </tfoot> -->
    <tbody style="background-color:white">
  <?php 
  if($cont>0){
  while ($mostrar = mysqli_fetch_array($result)): 
  $alumnos=alumnos($mostrar['id_boleta']);
	$persona=explode("-",$mostrar['concepto_pago']);
	$fecha=$mostrar['fecha']."-".$mostrar['ciclo'];
  $pagos=pagos($mostrar['id_boleta']);
  	?>
  <tr>
  <td><?php echo $mostrar['id_boleta'] ?></td>
  <td>
  	<?php 
	if(count($persona)>1){
  		echo $persona[1];
  		}else{
  		echo "No Registrado"; 
  		}
  	?>
  	</td>
  <td><?php echo $pagos ?></td>
  <td><?php echo $persona[0]." ".$mostrar['total']?></td>
  <td><?php echo $alumnos?></td>
  <td><?php echo $fecha?></td>
  <?php 
   if(($acceso[2]==3 && $estado[2]==1))
        {
         ?>
  	<td>
  	    <button type="button" rel="tooltip" title="Edit Task" data-toggle="modal" data-target="#Mupdate" class="btn btn-outline-warning btn-sm" onclick="VerLista('<?php echo $mostrar['id_boleta'] ?>')">
            <i class="material-icons">edit</i>
          </button>

        <button type="button" rel="tooltip" title="Delete Task" class="btn btn-outline-danger btn-sm" onclick="eliminaDato('<?php echo $mostrar['id_boleta'] ?>')">
          <i class="material-icons">delete_sweep</i>
          </button>
        </td>
 	 
	<?php } ?>
</tr>
<?php endwhile;?>
  <?php }?>
</tbody>
</table>
</div>

<script>
function VerLista($noboleta){
  $.ajax({
    type:"POST",
    data:{"pagoss":$noboleta},
    url:"Pagos/VerPago.php",
    success:function(ra){
      alert(ra);
      var params = [ 
    'height='+screen.height, 
    'width='+screen.width, 
    'fullscreen=yes' // only works in IE, but here for completeness 
    ].join(',');
    window.open('talonario.php','Continuar con la impresion',params);
    }
  })

}
</script>
<script type="text/javascript">
  $(document).ready(function() {

    $('#IdTalonarios').DataTable();
  } );
</script>

<?php 
function alumnos($idboleta){
  $c        = new conex();
$conexion = $c->conexion();
  $cons="SELECT DISTINCT al.pnombre,al.snombre,al.papellido,al.sapellido FROM detalle_pago dp INNER JOIN alumno al ON al.carnet=dp.carnet WHERE  dp.no_boleta='$idboleta'";
  $ejec=mysqli_query($conexion,$cons);
  $dato=" ";
  $i=0;
  $cont=0;
  $cont=mysqli_num_rows($ejec);
  while($most=mysqli_fetch_array($ejec)){
    if($i==0){
    $dato=$dato.$most[0]." ".$most[1]." ".$most[2]." ".$most[3]." , ";  
    $i++;
    }
    else if($i == ($cont-1)){
    $dato=$dato." ".$most[0]." ".$most[1]." ".$most[2]." ".$most[3];  
    }else{
      $dato=$dato." ".$most[0]." ".$most[1]." ".$most[2]." ".$most[3].",";  
    }
    
    $i++;
 }
    return $dato;
 }

 function pagos($idboleta){
  $c        = new conex();
$conexion = $c->conexion();
  $cons="SELECT DISTINCT tp.tipo FROM detalle_pago dp INNER JOIN tipopago tp ON tp.id_tipo=dp.id_tipopago WHERE  dp.no_boleta='$idboleta'";
  $ejec=mysqli_query($conexion,$cons);
  $dato=" ";
  $i=0;
  $cont=0;
  $cont=mysqli_num_rows($ejec);
  while($most=mysqli_fetch_array($ejec)){
    if($i==0){
    $dato=$dato.$most[0]."-";  
    $i++;
    }
    else if($i == ($cont)){
    $dato=$dato."-".$most[0];  
    } 
    $i++;
 }
  return $dato;
 }
 ?>
