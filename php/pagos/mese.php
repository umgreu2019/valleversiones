<?php

require_once "../conexion/conexion.php";
$c        = new conex();
$conexion = $c->conexion();

$id_area = $_POST['id_mes'];

$anno="SELECT YEAR(NOW())";
$consano=mysqli_query($conexion,$anno);
$ano=mysqli_fetch_array($consano)[0];


$html     = "<option  value=''>Seleccione Cuantos Meses Desee2</option>";

echo $html;

$sql2="SELECT id_mes,mes FROM mes";
$consulta2 = mysqli_query($conexion, $sql2);

$carnet="SELECT  carnet FROM alumno WHERE carnet='$id_area' OR cpersonal LIKE '%".$id_area."%'";
$consulta3 = mysqli_query($conexion, $carnet);
$carne=mysqli_fetch_array($consulta3)[0]; 



while ($mostrar = mysqli_fetch_array($consulta2)):


$sql="SELECT d.id_mes,tp.tipo FROM detalle_pago d INNER JOIN alumno a ON a.carnet=d.carnet INNER JOIN tipopago tp ON tp.id_tipo=d.id_tipopago INNER JOIN pago p ON p.id_boleta=d.no_boleta WHERE tp.id_tipo='3' AND p.ciclo='$ano' AND d.carnet='$carne' AND d.id_mes='$mostrar[0]'";

$consulta = mysqli_query($conexion,$sql);
$car= mysqli_fetch_array($consulta);

$sql2="SELECT d.id_mes,tp.tipo FROM detalle_pago d INNER JOIN alumno a ON a.carnet=d.carnet INNER JOIN tipopago tp ON tp.id_tipo=d.id_tipopago INNER JOIN pago p ON p.id_boleta=d.no_boleta WHERE tp.id_tipo='2' AND p.ciclo='$ano' AND d.carnet='$carne'";

$annio=mysqli_query($conexion,$sql2);
$anioc=mysqli_fetch_array($annio);
	if($car[0]==$mostrar[0] || ($anioc!=null || $anioc!="")){
    $html = "<option  disabled value='" . $mostrar[0] . "' > " .$mostrar[1]." </option> ";
    echo $html;
	}
	else if($anioc==0){
	$html = "<option value='" . $mostrar[0] . "' > " .$mostrar[1]." </option> ";
	echo $html;
	}

endwhile;
