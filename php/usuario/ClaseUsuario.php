<?php 
require_once "../conexion/conexion.php";

class Usuario{
public function Bloqueo($usuario){
    $c        = new conex();
    $conexion = $c->conexion();
 	
 	$update="UPDATE empleado SET Estado='Desactivado' WHERE Usuario='$usuario'";
	$resultad3=mysqli_query($conexion,$update);
	$select3="SELECT Estado FROM empleado WHERE Usuario='$usuario'";
	$resultad4=mysqli_query($conexion,$select3);
	$filas=mysqli_num_rows($resultad4);
	if($filas>0){
	return 3;	
	}
	else{
		unset($_SESSION['intento']);
	return  4;
	
	}
}

public function Diasparacambio($fecha,$usuario){
 	 $c   = new conex();
     $conexion = $c->conexion();
	$formato=$fecha;

$linka1="SELECT Fecha_actualizacion,DiasContra FROM empleado WHERE id_empleado='$usuario'";
$resultad=mysqli_query($conexion,$linka1);
$dl=mysqli_fetch_array($resultad);

// $formato=(strtotime ('-1 days' , strtotime ($formato)));
// $formato = date ( 'd-m-Y' , $formato);


$day  = self::dias_transcurridos($formato,$dl[0]);
return $day;
}

function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}

public function Obtener_Permiso($idusu){
	 $c        = new conex();
     $conexion = $c->conexion();
    $i=0;
  	$permi="SELECT id_permiso,estado FROM usuario_permiso WHERE id_usuario='$idusu'";
 	$r=mysqli_query($conexion,$permi);
  	while($devol=mysqli_fetch_array($r)){
  		$c=$devol[0]."||".$devol[1];
  		$_SESSION['permisos'][$i]=$c;
  		$i++;
  	}
 	
 }

}