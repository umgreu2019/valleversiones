<?php 
require_once '../../conexion/conexion.php';

$c = new conex();
$conexion=$c->conexion();

$html = "<option value='0'>Seleccionar</option>";

$sql = "SELECT id_area, DESCRIPCION_AREA FROM areaescolar";
$consulta = mysqli_query($conexion,$sql);

$cont = 0;

echo $html;

while($get = mysqli_fetch_array($consulta)){
	$html = "<option value='".$get[0]."'>".$get[1]."<option>";
	echo $html;
}