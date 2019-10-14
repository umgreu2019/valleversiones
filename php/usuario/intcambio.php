<?php 
require_once "../usuario/Claseprofesor.php";
require_once "../conexion/conexion.php";

$cantidad=$_POST['canti'];
$unidad = $_POST['unidad'];
$cantidad=abs($cantidad);
$datos= array($cantidad,
			  $unidad);


$us=new Profesor();
$usuar= $us->mdlCambiarContra($datos);

echo $usuar;	