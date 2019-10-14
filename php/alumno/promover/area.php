<?php 
require_once '../../conexion/conexion.php';

$c = new conex();
$conexion=$c->conexion();



$sql = "SELECT id_area, DESCRIPCION_AREA FROM areaescolar";
$consulta = mysqli_query($conexion,$sql);

$html = "<option value='0'>Seleccionar Area</option>";
echo $html;
while($get = mysqli_fetch_array($consulta)){
	$html = "<option class='text-danger' value='".$get[0]."'>".$get[1]."</option>";
	echo $html;
}