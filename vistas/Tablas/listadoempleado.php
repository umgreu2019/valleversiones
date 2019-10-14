<?php
session_start();
require_once "../../php/conexion/conexion.php";

$c        = new conex();
$conexion = $c->conexion();

$id = $_SESSION['iduser'];

$qli="SELECT COUNT(id_permiso) as total FROM permiso";
 $rli=mysqli_query($conexion,$qli);
  $rcount=mysqli_fetch_array($rli);
   $nPermiso=5;
   $paginas=$rcount['total']/$nPermiso;
   $paginas=ceil($paginas); 

// $sql = "SELECT  up.estado FROM usuario_permiso up, permiso p, empleado u  WHERE up.id_permiso=p.id_permiso AND up.id_usuario=u.id_empleado AND up.id_usuario='$id'";

// $cont   = 0;
// $result = mysqli_query($conexion, $sql);
// $cont   = mysqli_num_array($result);
for($j=0; $j<$paginas; $j++):

  $iniciar=$j*$nPermiso;
  $ini = (string)$iniciar;
?>
<div class="col-md-6">
    <ul class="list-group">
<?php 
    $seli="SELECT p.id_permiso,p.permiso,up.estado,up.id_asigna from usuario_permiso up, permiso p, empleado u  WHERE up.id_permiso=p.id_permiso AND up.id_usuario=u.id_empleado AND up.id_usuario='$id' LIMIT ".$ini.",$nPermiso";
    $resil=mysqli_query($conexion,$seli);
    $cont   = mysqli_num_rows($resil);

    if ($cont > 0) {
    while($mostr=mysqli_fetch_array($resil)):
     ?>
 <li class="list-group-item list-group-item-light rounded">
        <div class="form-check form-check-inline">
        <?php if ($mostr[2] == 1) {?>
        <input class="form-check-input" type="checkbox" checked onclick="CambiarEst('<?php echo $mostr[3]?>')" id="f<?php echo $mostr[0]?>" >
        <?php } else {?>
		 <input class="form-check-input" type="checkbox"  onclick="CambiarEst('<?php echo $mostr[3]?>')" id="f<?php echo $mostr[0]?>" >
		 <?php }?>
        <label class="form-check-label text-uvg" for="f<?php echo $mostr[0]?>"><?php echo $mostr[1] ?></label>
        </div>
       </li>
     <br>
     <?php endwhile; 
 }?>    
    </ul>
    </div>
<?php endfor; ?>
